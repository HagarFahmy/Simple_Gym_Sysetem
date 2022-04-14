<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gym;
use App\Models\Admin;
use App\Models\User;
use App\Models\Revenue;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BuyPackageController extends Controller
{
    public function create()
    {
        $gymMembers = User::get();
        $trainingPackages = TrainingPackage::all();
        $user = Auth::user();
        if ($user->hasRole('Super Admin')) {
            $gyms = Gym::all();

        } else if ($user->hasRole('City Manager')) {
            $gyms = Gym::with('city_manager')->where('city_manager_id', $user->id)->get();

        } else if ($user->hasRole('Gym Manager')) {
            $gymID = Admin::where('id', $user->id)->first()->gym_id;
            $gym = Gym::find($gymID);
            $gyms = compact('gym');
        }
        return view('dashboard.buyPackage.create', compact('gymMembers', 'trainingPackages', 'gyms'));
    }

    public function store(Request $request)
    {
        $request->session()->put('gym', $request->gym);
        $request->session()->put('gym_member', $request->gym_member);
        $request->session()->put('training_package', $request->training_package);
       
        $user = User::find($request->gym_member);
        return view('dashboard.buyPackage.stripe', [
            'intent' => $user->createSetupIntent(),
            'price' => TrainingPackage::find($request->training_package)->price / 100,
            'gymMember' => User::where('id',$request->gym_member)->first()->name,

        ]);
    }

    public function singleCharge(Request $request)
    {
        $gymFromSession = $request->session()->get('gym');
        $gym_memberFromSession = $request->session()->get('gym_member');
        $training_packageFromSession = $request->session()->get('training_package');
        $amount = $request->amount;
        $amount = $amount * 100;
        $paymentMethod = $request->payment_method;
        $user = User::find($gym_memberFromSession);
        $user->createOrGetStripeCustomer();
        $paymentMethod = $user->addPaymentMethod($paymentMethod);
        $user->charge($amount, $paymentMethod->id);

        $triningPackage = TrainingPackage::find($training_packageFromSession);
        $gym = Gym::find($gymFromSession);
        $gymMember = User::where('id', $gym_memberFromSession)->get()->first();

        Revenue::insert([
            'gym_id' => $gymFromSession,
            'user_id' => $gym_memberFromSession,
            'package_id' => $training_packageFromSession,

            'amount_paid' => $triningPackage->price,
            'purchased_at' => now(),
        ]);
        return view('dashboard.buyPackage.show', compact('gym', 'triningPackage', 'gymMember'));
    }

    public function stripe()
    {
        $user = auth()->user();
        return view('dashboard.buyPackage.stripe', [
            'intent' => $user->createSetupIntent()
        ]);
    }
}