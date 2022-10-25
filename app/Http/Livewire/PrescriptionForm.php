<?php

namespace App\Http\Livewire;

use App\Models\Drug;
use Livewire\Component;
use App\Models\DrugCategory;
use App\Models\Prescription;
use App\Models\MedicationOption;
use App\Models\PrescriptionDrug;

class PrescriptionForm extends Component
{

    // public Prescription $prescription;
    public $consultation;
    // public $category;
    // public $drug;
    // public $option;
    public $prescriptionDrug = [];

    public $categories;
    public $drugs;
    public $options;

    // protected $rules = [
    //     'prescription.advice' => 'required|string',
    //     'consultation.pregnant' => 'boolean',
    //     'consultation.breast_feeding' => 'boolean',
    //     'consultation.pregnant_month' => 'integer',
    //     'consultation.breast_feeding_month' => 'integer',
    //     'consultation.patient_id' => 'integer',
    //     'consultation.status_id' => 'integer',
    //     'photos.*' => 'image',
    // ];
    public function mount()
    {
        $this->categories = DrugCategory::all();
        // $this->drugs = Drug::all();
        $this->drugs = collect();
        $this->options = MedicationOption::all();
        // $this->drugs = Drug::where('category_id', $value)->get();
        $this->prescriptionDrug = [
            ['category' => '', 'drugs' => '', 'drug' => '', 'option' => '', 'duration' => '1 week']
        ];
    }

    public function addDrug()
    {
        $this->prescriptionDrug[] = ['category' => '1', 'drugs' => '', 'drug' => '', 'option' => '', 'duration' => '1 week'];
    }
    public function render()
    {
        return view('livewire.prescription-form');
    }

    public function updatedPrescriptionDrugCategory($value)
    {
        dump($this->updatedPrescriptionDrug);
        $this->drugs = Drug::where('category_id', $value)->get();
        // $this->PrescriptionDrug[$index]->drug = $this->drugs->first()->id;
    }
}
