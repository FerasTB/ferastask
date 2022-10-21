<?php

namespace App\Http\Controllers\Api;

use App\Enums\ConsultationStatus;
use App\Enums\RequestStatus;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\RequestAttachment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Resources\RequestResource;
use App\Models\Request as InnerRequest;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\RequestStack;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InnerRequest $req)
    {
        $attachments = $req->attachments;
        return $attachments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttachmentRequest $request, InnerRequest $req)
    {
        $patient = Patient::where('id', $req->consultation->patient->id)->first();
        if ($req->status === RequestStatus::FileUploaded) {
            foreach ($req->attachments as $attachment) {
                $attachment->delete();
            }
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('images/attachment/' . $req->consultation->patient->id . '/' . $req->id, 'public');
                $req->attachments()->create(['path' => $path]);
            }
            return new RequestResource($req);
        } else {
            $this->authorize('create', [RequestAttachment::class, $patient]);
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('images/attachment/' . $req->consultation->patient->id . '/' . $req->id, 'public');
                    $req->attachments()->create(['path' => $path]);
                }
                $req->update([
                    'status' => RequestStatus::FileUploaded,
                ]);
            }
            return new RequestResource($req);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(RequestAttachment $requestAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAttachmentRequest $request, InnerRequest $req, RequestAttachment $requestAttachment)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(InnerRequest $req, RequestAttachment $attachment)
    {
        if ($req->id === $attachment->request_id && $req->status === RequestStatus::FileUploaded) {
            $this->authorize('delete', $attachment);
            $attachment->delete();
            if ($req->attachments->isEmpty()) {
                $req->update([
                    'status' => RequestStatus::ViewedByPatient,
                ]);
            }
            return response('', Response::HTTP_NO_CONTENT);
        } else {
            return response('', Response::HTTP_BAD_REQUEST);
        }
    }
}
