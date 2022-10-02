<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'marital' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'work' => 'required',
            'phone' => 'required',
            'birthDate' => 'required',
            'name' => 'required',
        ];
    }
}
