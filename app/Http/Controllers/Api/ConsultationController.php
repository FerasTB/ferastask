<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\ConsultationResource;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Http\Resources\UserResource;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = User::findOrFail(auth()->id());
        // return $consultations;
        return new UserResource($consultations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsultationRequest $request)
    {
        $fields = $request->validated();
        $patient = Patient::where('id', $request->patient_id)->first();
        if ($patient) {
            $this->authorize('create', [Consultation::class, $patient]);
            $status = ConsultationStatus::where('name', 'new')->first();
            $fields['status_id'] = $status->id;
            $consultation = $patient->consultations()->create($fields);
            return new ConsultationResource($consultation);
        } else {
            return response('', RESPONSE::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        $this->authorize('view', $consultation);
        return new ConsultationResource($consultation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
        $fields = $request->validated();
        $this->authorize('update', $consultation);
        $status = ConsultationStatus::where('id', $consultation->status_id)->first();
        if ($status->name === 'new' || $status->name === 'paied') {
            $consultation->update($fields);
            return new ConsultationResource($consultation);
        } else {
            return response('', RESPONSE::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $this->authorize('delete', $consultation);
        $status = ConsultationStatus::where('id', $consultation->status_id)->first();
        if ($status->name === 'new') {
            $consultation->delete();
            return response('', RESPONSE::HTTP_NO_CONTENT);
        } else {
            return response('', RESPONSE::HTTP_BAD_REQUEST);
        }
    }
}
