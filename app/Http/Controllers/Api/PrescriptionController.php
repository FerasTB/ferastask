<?php

namespace App\Http\Controllers\Api;

use App\Models\Consultation;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PrescriptionDrug;
use App\Models\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\DrugResource;
use App\Models\FollowupConsultation;
use App\Http\Requests\StorePatientRequest;
use App\Http\Resources\PrescriptionResource;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Http\Resources\PrescriptionDrugResource;
use App\Http\Requests\StorePrescriptionDrugRequest;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->consultation) {
            $prescriptions = Prescription::where('consultation_id', request()->consultation)->get();
            return PrescriptionResource::collection($prescriptions);
        } elseif (request()->followup) {
            $prescriptions = Prescription::where('followup_id', request()->followup)->get();
            return PrescriptionResource::collection($prescriptions);
        } else {
            return response('', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrescriptionRequest $request)
    {
        $fields = $request->validated();
        if ($request->consultation_id) {
            $consultation = Consultation::findOrFail($request->consultation_id);
            $fields['patient_id'] = $consultation->patient->id;
            $prescription = $consultation->prescriptions()->create($fields);
            // $status = ConsultationStatus::where('name', 'done')->first();
            // $status_id = $status->id;
            // $consultation->update([
            //     'status_id' => $status_id,
            // ]);
            return new PrescriptionResource($prescription);
        } elseif ($request->followup_id) {
            $followUp = FollowupConsultation::findOrFail($request->followup_id);
            $fields['patient_id'] = $followUp->patient_id;
            $prescription = $followUp->prescriptions()->create($fields);
            // $status = ConsultationStatus::where('name', 'done')->first();
            // $status_id = $status->id;
            // $followUp->update([
            //     'status_id' => $status_id,
            // ]);
            return new PrescriptionResource($prescription);
        } else {
            return response('', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        return new PrescriptionResource($prescription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrescriptionRequest $request, Prescription $prescription)
    {
        $consultation = $prescription->consultation;
        if ($consultation->status->name === 'wait for doctor') {
            $fields = $request->validated();
            $prescription->update($fields);
            return new PrescriptionResource($prescription);
        } else {
            return response('you can not update prescription for this consultation', Response::HTTP_BAD_REQUEST);
        }
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

    public function addDrug(StorePrescriptionDrugRequest $request, Prescription $prescription)
    {
        $consultation = $prescription->consultation;
        $status = ConsultationStatus::find($consultation->status_id);
        if ($status->name === 'wait for doctor') {
            $fields = $request->validated();
            $drug = $prescription->drugs()->create($fields);
            return new PrescriptionDrugResource($drug);
        } else {
            return response('you can not add drug to this consultation', Response::HTTP_BAD_REQUEST);
        }
    }

    public function editDrug(StorePrescriptionDrugRequest $request, PrescriptionDrug $drug)
    {
        $consultation = $drug->prescription->consultation;
        $status = ConsultationStatus::find($consultation->status_id);
        if ($status->name === 'wait for doctor') {
            $fields = $request->validated();
            $drug->update($fields);
            return new PrescriptionDrugResource($drug);
        } else {
            return response('you can not update drug to this consultation', Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteDrug(Prescription $prescription, PrescriptionDrug $drug)
    {
        $consultation = $prescription->consultation;
        $status = ConsultationStatus::find($consultation->status_id);
        if ($status->name === 'wait for doctor') {
            $drug->delete();
            return new PrescriptionResource($prescription);
        } else {
            return response('you can not delete drug from this consultation', Response::HTTP_BAD_REQUEST);
        }
    }

    public function submitPrescription(Prescription $prescription)
    {
        $consultation = $prescription->consultation;
        if ($consultation->status->name === 'wait for doctor') {
            $status = ConsultationStatus::where('name', 'done')->first();
            $status_id = $status->id;
            $consultation->update([
                'status_id' => $status_id,
            ]);
            return new PrescriptionResource($prescription);
        } else {
            return response('you can not submit this consultation', Response::HTTP_BAD_REQUEST);
        }
    }
}
