<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Greetings;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;

class AuthController extends BaseController
{
    use AuthTrait;

    public function register(Request $request)
    {
        // Array for the user inputs.
        $input = $request->all();

        // Validations for the user inputs.
        $validator = Validator::make($input, [
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|string|max:50|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'gym_id' => 'required'
        ]);

        // Validation failed or missing inputs will return error JSON message.
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        // Profile Image name serialization.
        $nameImg = request()->file('profile_image');
        $nameImgDB = 'Image-' . $input['name'] . '-' .  uniqid() . '.' . $nameImg->getClientOriginalExtension();

        // Saving the user credentials to database.
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'gender' => $input['gender'],
            'profile_image' => $nameImgDB,
            'gym_id' => $input['gym_id'],
            'date_of_birth' =>  $input['date_of_birth']
        ]);

        // Upload the image to server local (public/images/users/.....).
        $nameImg->move(public_path('images/users'), $nameImgDB);

        // Creating token to authenticate the user wherever he goes in the site.
        $success['token'] =  $user->createToken('justAToken')->plainTextToken;
        $success['name'] =  $user->name;

        // Email greetings body.
        $details = [
            'greeting' => 'Hi ' . $input['name'] . ' from ITI with love ❤️',
            'body' => 'Your registration is completed',
            'thanks' => 'thank you.',
        ];

        // Sending Queued Email to greet user after registration immediately.
        $user->notify(new Greetings($details));

        // Sending verification email.
        event(new Registered($user));

        return $this->handleResponse($success, 'User successfully registered! ya welcome ya welcome');
    }

    public function login(Request $request)
    {
        // Validate login inputs.
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Get the user cardinals if he/she exists in the database.
        $user = User::where('email', $input['email'])->first();

        // Checking the cardinals.
        if (!$user || $user->password != bcrypt($input['password'])) {
            $success['token'] =  $user->createToken('justAToken')->plainTextToken;
            $success['name'] =  $user->name;

            // Creating token and save it to the user.
            $user->remember_token = $success['token'];
            $user->last_login_at = date(Carbon::now()->toDateTimeString());
            $user->save();

            // Api Json response for success login.
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            // Api Json response for failed/unauthorized login.
            return $this->sendError('Unauthorized.', ['error' => 'Unauthorized you cant']);
        }
    }

    public function logout(Request $request)
    {
        $accessToken = $request->header('Access-Token');
        $user = User::where('remember_token', $accessToken)->first()
            ->update(['remember_token' => null]);
        return $this->createResponse(200, "Logout Successfully");;
    }
    
}
