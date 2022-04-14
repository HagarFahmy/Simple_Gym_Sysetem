<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller as Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends Controller
{

    use AuthTrait ;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    
    public function update(Request $request)
    {
        $user = Auth()->user();

        $validator = Validator::make($request->all(),[
            'name' => 'nullable',
            'email' => 'nullable|string|unique:users,email,' . $user->id,
            'gender' => 'nullable',
            'date_of_birth' => 'nullable',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg',
            'password' => 'nullable|min:6',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());     
        }
        
            $user->name = $request->name ? $request->name : $user->name;
            $user->email = $request->email ? $request->email : $user->email;
            $user->gender = $request->gender ? $request->gender : $user->gender;
            $user->birth_date = $request->birth_date ? $request->birth_date : $user->birth_date;
            $user->password = $request->password ? $request->bcrypt($request->password) : $user->password;
            $user->profile_image = $request->profile_image;
            $user->save();

            return $this->sendResponse($user, 'User updated successfully.');

    }


}
