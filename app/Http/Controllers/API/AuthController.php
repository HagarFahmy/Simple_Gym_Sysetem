<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Notifications\Greetings;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        // Array of user inputs
        $input = $request->all();

        // Validations for the user inputs
        $validator = Validator::make($input, [
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|string|max:100',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'gender' => 'required',
            'data_of_birth' => 'required',
            // 'gym_id' => 'required'
        ]);

        // Validation failed or missing inputs
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        // Profile Image
        $nameImg = request()->file('profile_image');
        $nameImgDB = 'Image-' . $input['name'] . '-' .  uniqid() . '.' . $nameImg->getClientOriginalExtension();

        // Creating and saving the user credentials and information to database
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'data_of_birth' =>  $input['data_of_birth'],
            'gender' => $input['gender'],
            'profile_image' => $nameImgDB,
            // 'gym_id' => $input['gym_id']
        ]);


        // Upload the image to server local
        $nameImg->move(public_path('images/users'), $nameImgDB);

        // Creating token
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $success['name'] =  $user->name;

        // Email greatings body
        $details = [
            'greeting' => 'Hi ' . $input['name'] . ' from ITI',
            'body' => 'Your registration is completed',
            'thanks' => 'thank you',
        ];

        // Sending Email to greet user by his email
        $user->notify(new Greetings($details));


        return $this->handleResponse($success, 'User successfully registered! ya welcome ya welcome');
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
