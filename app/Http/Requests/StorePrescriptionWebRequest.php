<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionWebRequest extends FormRequest
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
            'advice' => 'required|string',
            'prescriptionDrug' => 'required|array',
            // 'prescriptionDrug,category' => 'required|integer',
            // 'prescriptionDrug,drug' => 'required|integer',
            // 'prescriptionDrug,option' => 'required|integer',
            // 'prescriptionDrug,duration' => 'required|string',
        ];
    }
}
