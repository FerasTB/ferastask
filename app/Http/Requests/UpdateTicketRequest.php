<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
            'category' => ['nullable', Rule::in(['Other', 'Mid', 'Tech', 'Payment'])],
            'status' => ['nullable', Rule::in(['Open', 'Closed', 'Rejected'])],
            'agent' => ['nullable', Rule::in(['Admin', 'Doctor', 'Ads'])],
            'priority' => ['nullable', Rule::in(['Medium', 'Heigh', 'Low'])],
            // 'consultation_id' => 'nullable',
        ];
    }
}
