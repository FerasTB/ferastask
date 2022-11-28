<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Enums\UserRole;
use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use function PHPUnit\Framework\isEmpty;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\ConsultationResource;

use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Http\Resources\ConsultationWithPatientAndUserResource;
use App\Models\ConsultationAudio;
use App\Models\ConsultationImage;
use App\Models\ConsultationPdf;
use App\Models\ConsultationPhoto;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === UserRole::Admin || auth()->user()->role === UserRole::Doctor) {
            $consultations = Consultation::all();
            return ConsultationWithPatientAndUserResource::collection($consultations);
        }

        return new UserResource(auth()->user());
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
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('images/' . $consultation->patient_id . '/' . $consultation->id, 'public');
                    $consultation->images()->create(['path' => $path]);
                }
            }
            if ($request->hasFile('audios')) {
                foreach ($request->file('audios') as $audio) {
                    $path = $audio->store('audio/' . $consultation->patient_id . '/' . $consultation->id, 'public');
                    $consultation->audios()->create(['path' => $path]);
                }
            }
            if ($request->hasFile('pdf')) {
                foreach ($request->file('pdf') as $pdf) {
                    $path = $pdf->store('pdf/' . $consultation->patient_id . '/' . $consultation->id, 'public');
                    $consultation->pdfs()->create(['path' => $path]);
                }
            }
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
        if ((auth()->user()->role == UserRole::Admin || auth()->user()->role == UserRole::Doctor) && $consultation->status->name === 'paid') {
            $status = ConsultationStatus::where('name', 'wait for doctor')->first();
            $status_id = $status->id;
            $consultation->update([
                'status_id' => $status_id,
            ]);
        }
        return new ConsultationWithPatientAndUserResource($consultation);
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
        if ($status->name === 'new' || $status->name === 'paid') {
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

    public function getImage(ConsultationPhoto $image)
    {
        $this->authorize('getImage', [Consultation::class, $image]);
        return response()->file(public_path("storage/" . $image->path));
    }
    public function getPdf(ConsultationPdf $pdf)
    {
        $this->authorize('getPdf', [Consultation::class, $pdf]);
        return response()->file(public_path("storage/" . $pdf->path));
    }
    public function getAudio(ConsultationAudio $audio)
    {
        $this->authorize('getAudio', [Consultation::class, $audio]);
        return response()->file(public_path("storage/" . $audio->path));
    }

    public function submitAsPaid(Consultation $consultation)
    {
        $this->authorize('view', $consultation);
        if ($consultation->status->name === 'new') {
            $status = ConsultationStatus::where('name', 'paid')->first();
            $status_id = $status->id;
            $consultation->update([
                'status_id' => $status_id,
            ]);
            return new ConsultationWithPatientAndUserResource($consultation);
        } else {
            return response('error', Response::HTTP_BAD_REQUEST);
        }
    }
}
