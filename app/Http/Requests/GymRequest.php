<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymRequest extends FormRequest
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
            'name'=>['required','string','min:5','max:50'],
            'cover_image' => $this->routeIs('dashboard.gyms.store')
            ? 'mimes:jpeg,jpg,png,gif|required|max:10000'
            : 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
            'city_manager_id' => 'required',
        ];
    }
}
