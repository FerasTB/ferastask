<?php

namespace App\Http\Resources;

use App\Models\ConsultationStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
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
            'end_at' => $this->end_at,
            'start_at' => $this->start_at,
            'breast_feeding' => $this->breast_feeding,
            'breast_feeding_month' => $this->breast_feeding_month,
            'pregnant_month' => $this->pregnant_month,
            'pregnant' => $this->pregnant,
            'doctor_diagnosis' => $this->doctor_diagnosis,
            'patient_complaint' => $this->patient_complaint,
            'status' => ConsultationStatus::where('id', $this->status_id)->first(),
            'photos' => $this->images,
            'audios' => $this->audios,
            'pdf' => $this->pdfs,
            'patient' => new PatientResource($this->pdfs),
        ];
    }
}
