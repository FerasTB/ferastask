<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Validation\Rule;

class PatientSelect extends Step
{
    // Step view located at resources/views/steps/general.blade.php 
    protected string $view = 'consultation.steps.PatientSelect';

    /*
     * Initialize step fields
     */
    public function mount()
    {
        $this->mergeState([
            // 'patient_complaint'                  => $this->model->patient_complaint,
            // 'pregnant'                  => $this->model->pregnant,
            'breast_feeding'                  => $this->model->breast_feeding,
            // 'pregnant_month'                  => $this->model->pregnant_month,
            // 'breast_feeding_month'                  => $this->model->breast_feeding_month,
        ]);
    }

    /*
    * Step icon 
    */
    public function icon(): string
    {
        return 'check';
    }

    /*
     * Step Validation
     */
    public function validate()
    {
        return [
            [
                // 'state.patient_complaint'     => ['required', 'string'],
                // 'state.pregnant'     => ['required'],
                'state.breast_feeding'     => ['required'],
                // 'state.pregnant_month'     => ['required'],
                // 'state.breast_feeding_month'     => ['required'],
            ],
            [],
            [
                // 'state.patient_complaint'     => __('PatientComplaint'),
                // 'state.pregnant'     => __('Pregnant'),
                'state.breast_feeding'     => __('BreastFeeding'),
                // 'state.pregnant_month'     => __('PregnantMonth'),
                // 'state.breast_feeding_month'     => __('BreastFeedingMonth'),
            ],
        ];
    }

    /*
     * Step Title
     */
    public function title(): string
    {
        return __('PatientSelect');
    }
}
