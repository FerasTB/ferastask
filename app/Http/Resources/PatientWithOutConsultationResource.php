<?php

namespace App\Http\Resources;

use App\Enums\Gender;
use App\Enums\Marital;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientWithOutConsultationResource extends JsonResource
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
            'name' => $this->name,
            'birthDate' => $this->birthDate,
            'phone' => (0 . $this->phone),
            'work' => $this->work,
            'address' => $this->address,
            'gender' => Gender::getKey((int)$this->gender),
            'marital' => Marital::getKey((int)$this->marital),
        ];
    }
}
