<?php

namespace App\Http\Resources;

use App\Models\Consultation;
use App\Models\FollowupConsultation;
use App\Models\Patient;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            'advice' => $this->advice,
            'patient' => new PatientIndexResource(Patient::findOrFail($this->patient_id)),
            'consultation' => new ConsultationResource(Consultation::find($this->consultation_id)),
            'followup' => FollowupConsultation::find($this->followup_id),
            'drug' => $this->drugs,
        ];
    }
}
