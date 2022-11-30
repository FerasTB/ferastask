<?php

namespace App\Http\Resources;

use App\Models\Drug;
use App\Models\MedicationOption;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionDrugResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'drug' => new DrugResource(Drug::findOrFail($this->drug_id)),
            'option' => new DrugOptionResource(MedicationOption::findOrFail($this->medication_option_id)),
            'duration' => $this->duration,
        ];
    }
}
