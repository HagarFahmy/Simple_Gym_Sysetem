<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\RevenueDataTable;
use App\Models\Revenue;
use App\Models\Gym;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class RevenueController extends CommonController
{
    protected string $module = 'revenue';
    protected string $permissionGroup = 'revenue';

    public function __construct(RevenueDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }

    public function totalRevenue()
    {
        $totalRevenue = 0;
        $totalRevenueLastMonth = 0;
        $totalRevenueLastYear = 0;
        

        if (Auth::user()->hasRole ("Super Admin")) {
            $totalRevenue = Revenue::all()->sum('amount_paid');
            $totalRevenueLastMonth = Revenue::where('purchased_at', '>', Carbon::now()->subDays(30))->sum('amount_paid');
            $totalRevenueLastYear = Revenue::where('purchased_at', '>', Carbon::now()->subMonths(12))->sum('amount_paid');
        } elseif (Auth::user()->hasRole ("City Manager")) {
            $totalRevenue = Revenue::whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
            $totalRevenueLastMonth = Revenue::where('purchased_at', '>', Carbon::now()->subDays(30))->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
            $totalRevenueLastYear = Revenue::where('purchased_at', '>', Carbon::now()->subMonths(12))->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
        } elseif (Auth::user()->hasRole ("Gym Manager")) {
            $totalRevenue = Admin::where('id', Auth::user()->id)->get()->first() ? Revenue::where('gym_id', Admin::where('id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid') : 0;
            $totalRevenueLastMonth = Revenue::where('purchased_at', '>', Carbon::now()->subDays(30))->where('gym_id', Admin::where('id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
            $totalRevenueLastYear = Revenue::where('purchased_at', '>', Carbon::now()->subMonths(12))->where('gym_id', Admin::where('id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
        }
        return view('dashboard.revenue.totalRevenue', compact('totalRevenue', 'totalRevenueLastMonth', 'totalRevenueLastYear'));
    }
}