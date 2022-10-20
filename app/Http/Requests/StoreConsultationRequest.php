<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
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
            'patient_id' => 'required',
            'end_at' => 'date_format|nullable',
            'start_at' => 'nullable|date',
            'breast_feeding' => 'required|boolean',
            'breast_feeding_month' => 'required|integer',
            'pregnant_month' => 'required|integer',
            'pregnant' => 'required|boolean',
            'patient_complaint' => 'required|string',
            'photos.*' => 'image',
            'audios.*' => 'mimes:mp3',
            'pdf.*' => 'mimes:pdf',
            'photos' => 'nullable',
            'audios' => 'nullable',
            'pdf' => 'nullable',
        ];
    }
}
