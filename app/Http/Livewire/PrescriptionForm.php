<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use App\Models\PrescriptionDrug;
use Livewire\Component;

class PrescriptionForm extends Component
{

    public Prescription $prescription;
    public $drug;
    public $option;

    protected $rules = [
        'prescription.advice' => 'required|string',
        'consultation.pregnant' => 'boolean',
        'consultation.breast_feeding' => 'boolean',
        'consultation.pregnant_month' => 'integer',
        'consultation.breast_feeding_month' => 'integer',
        'consultation.patient_id' => 'integer',
        'consultation.status_id' => 'integer',
        'photos.*' => 'image',
    ];
    public function mount()
    {
        $this->consultation = new Prescription();
        $this->consultation->pregnant = 0;
        $this->consultation->pregnant_month = 0;
        $this->consultation->breast_feeding = 0;
        $this->consultation->breast_feeding_month = 0;
        $this->status = ConsultationStatus::where('name', 'new')->first();
        $this->consultation->status_id = $this->status->id;
        $this->patients = auth()->user()->patients;
        // $this->patient = Patient::find($this->consultation->patient_id);
        // $this->patientId = '';
    }
    public function render()
    {
        return view('livewire.prescription-form');
    }
}
