<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GymManagerRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'name'=>['required','min:5','max:50'],

           'email'=>['required','email',  Rule::unique('admins')->ignore($this->email, 'email')],

            'password' => $this->routeIs('dashboard.gym-managers.store')
                ? 'required|min:8|confirmed'
                : 'sometimes|nullable|min:8|confirmed',

            'gym_id' => 'required',

            'image' => $this->routeIs('dashboard.gym-managers.store')
                ? 'mimes:jpeg,jpg,png,gif|required|max:10000'
                : 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ];
    }
}
