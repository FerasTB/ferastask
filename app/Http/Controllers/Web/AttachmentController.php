<?php

namespace App\Http\Controllers\Web;

use App\Models\Patient;
use App\Enums\RequestStatus;
use Illuminate\Http\Request;
use App\Models\RequestAttachment;
use App\Http\Controllers\Controller;
use App\Models\Request as InnerRequest;
use App\Http\Requests\StoreAttachmentRequest;

class AttachmentController extends Controller
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
    public function create(InnerRequest $req)
    {
        return view('attachment.create', [
            'request' => $req,
        ]);
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
            return redirect($req->consultation->patient->id . '/consultation');
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
            return redirect($req->consultation->patient->id . '/consultation');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestAttachment $requestAttachment)
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
    public function update(Request $request, RequestAttachment $requestAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestAttachment $requestAttachment)
    {
        //
    }
}
