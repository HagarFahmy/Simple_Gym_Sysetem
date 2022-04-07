<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name'=>['required','min:5','max:50'],

           'email'=>['required','email',  Rule::unique('admins')->ignore($this->email, 'email')],

            'password' => $this->routeIs('dashboard.city-managers.store')
                ? 'required|min:8|confirmed'
                : 'sometimes|nullable|min:8|confirmed',

            'city_id' => 'required',

            'image' => $this->routeIs('dashboard.city-managers.store')
                ? 'mimes:jpeg,jpg,png,gif|required|max:10000'
                : 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ];
    }
}
