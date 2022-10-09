<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use App\Models\bloodTest;
use App\Models\Consultation;
use Livewire\WithFileUploads;
use App\Models\ConsultationStatus;
use Vildanbina\LivewireWizard\WizardComponent;

class ConsultationForm extends Component
{
    use WithFileUploads;

    public Consultation $consultation;
    // public $patientId;
    public $patients;
    // public $patient;
    public $photos = [];
    public $status;

    protected $rules = [
        'consultation.patient_complaint' => 'required|string',
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
        $this->consultation = new Consultation();
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

    // My custom class property
    // public $consultationId;


    // public array $steps = [
    //     PatientSelect::class,
    //     ConsultationInformation::class,
    //     MediaUpload::class,

    // ];


    /*
     * Will return App\Models\User instance or will create empty User (based on $userId parameter) 
     */
    // public function model(): Consultation
    // {
    //     return new Consultation();
    // }
    public function render()
    {
        return view('livewire.consultation-form', [
            'patients' => $this->patients,
            // 'patient' => $this->patient,
            // 'test' => bloodTest::find($this->consultation->patient_id),
            'test' => Patient::find($this->consultation->patient_id),
        ]);
    }

    // public function updatedPatientId()
    // {
    //     $this->patient = Patient::find($this->patientId);
    // }

    public function save()
    {
        $this->validate();
        $this->consultation->save();
        foreach ($this->photos as $photo) {
            $path = $photo->store('images/' . $this->consultation->patient_id . '/' . $this->consultation->id, 'public');
            $this->consultation->images()->create(['path' => $path]);
        }
        return redirect('consultation');
    }
}
