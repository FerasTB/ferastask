<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserApiRequest extends FormRequest
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
            'name' => [
                'required', 'min:3'
            ],
            'email' => 'required|email|max:255|exists:users',
            'password' => 'sometimes|required|string|min:6',
            'password_confirmation' => 'sometimes|required_with:password|same:password',
            'role' => ['required', Rule::in(['Patient', 'Doctor', 'Admin', 'Ads'])],

        ];
    }
}
