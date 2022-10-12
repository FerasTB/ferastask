<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequestApiRequest extends FormRequest
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
            'type' => ['required', Rule::in(['BloodTest', 'Normal', 'Radiograph'])],
            'comment' => 'required',
            'BloodTestIdArray' => 'nullable|array',
            'BloodTestIdArray,*' => 'integer',
            'RadiographIdArray' => 'nullable|array',
            'RadiographIdArray,*' => 'integer',
        ];
    }
}
