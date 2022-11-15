<?php

namespace App\Http\Requests;

use App\Enums\TicketCategory;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'title' => 'required',
            'problem' => 'required',
            'category' => ['nullable', Rule::in(['Other', 'Mid', 'Tech', 'Payment'])],
            'consultation_id' => 'nullable',
        ];
    }
}
