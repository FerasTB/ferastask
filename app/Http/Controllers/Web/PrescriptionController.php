<?php

namespace App\Http\Controllers\Web;

use App\Enums\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrescriptionWebRequest;
use App\Models\Consultation;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Consultation $consultation)
    {
        return view('prescription.create', [
            'consultation' => $consultation,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrescriptionWebRequest $request, Consultation $consultation)
    {
        $fields = $request->validated();
        $prescription = $consultation->prescriptions()->create([
            'advice' => $fields['advice'],
            'patient_id' => $consultation->patient->id,
        ]);
        foreach ($fields['prescriptionDrug'] as $prescriptionDrug) {
            $prescription->drugs()->create([
                'duration' => $prescriptionDrug['duration'],
                'drug_id' => $prescriptionDrug['drug'],
                'medication_option_id' => $prescriptionDrug['option'],
            ]);
        }
        $consultation->update([
            'status_id' => ConsultationStatus::Done,
        ]);
        return redirect('consultation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }

    public function downloadPDF(Prescription $prescription)
    {
        // return $prescription;
        $pdf = Pdf::loadView('prescription.pdf', [
            'prescription' =>  $prescription,
        ]);
        return $pdf->download('prescription.pdf');
    }
}
