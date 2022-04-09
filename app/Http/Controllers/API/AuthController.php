<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function register(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'gender' => 'required',
            'data_of_birth' => 'required',
            // 'gym_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $nameImg = request()->file('profile_image');
        $nameImgDB = 'Image-' . $input['name'] . '-' .  uniqid() . '.' . $nameImg->getClientOriginalExtension();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'data_of_birth' =>  $input['data_of_birth'],
            'gender' => $input['gender'],
            'profile_image' => $nameImgDB,
            // 'gym_id' => $input['gym_id']
        ]);


        $nameImg->move(public_path('images/users'), $nameImgDB);

        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->handleResponse($success, 'User successfully registered!');
    }

    // public function login(Request $request)
    // {
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $auth = Auth::user();
    //         $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken;
    //         $success['name'] =  $auth->name;

    //         return $this->handleResponse($success, 'User logged-in!');
    //     } else {
    //         return $this->handleError('Unauthorised.', ['error' => 'Unauthorised']);
    //     }
    // }
}
