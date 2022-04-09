<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingSessionRequest extends FormRequest
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
            'name'=>['required','string','min:5','max:50','string',Rule::unique('training_sessions')->ignore($this->name,'name')],
            'starts_at'=>['required','date',Rule::unique('training_sessions')->ignore($this->starts_at,'starts_at')],
            'finishes_at'=>['required','date',Rule::unique('training_sessions')->ignore($this->finishes_at,'finishes_at'),'after:starts_at'],
            'gym_id' => ['required','int'],
            'coach_id'=>['int','required'],
        ];
    }
}
