<?php

namespace App\Http\Controllers\Web;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Enums\ConsultationStatus;
use App\Enums\RequestStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestRequest;
use Illuminate\Http\Response;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Consultation $consultation)
    {
        $requests = $consultation->requests;
        return view('request.index', [
            'requests' => $requests,
            'consultation' => $consultation,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Consultation $consultation)
    {
        return view('request.create', [
            'consultation' => $consultation,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestRequest $request, Consultation $consultation)
    {
        $RequestFields = $request->validated();
        $Request = $consultation->requests()->create($RequestFields);
        $consultation->update([
            'status_id' => ConsultationStatus::NeedInfo,
        ]);
        return redirect('consultation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // return "<h1>hi</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation, Req $request)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Req $req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation, Req $request)
    {
        if ($request->status === RequestStatus::New) {
            $request->delete();
            return redirect()->back();
        } else {
            return redirect('/' . $consultation->id . '/request')->with('message', 'you can not delete this request anymore');
        }
    }

    public function viewed(Consultation $consultation, Req $request)
    {
        $request->update([
            'status' => RequestStatus::ViewedByDoctor,
        ]);
        $allRequestIsViewed = true;
        $consultation = $request->consultation;
        foreach ($consultation->requests as $req) {
            if ($req->status != RequestStatus::ViewedByDoctor) {
                $allRequestIsViewed = false;
            }
        }
        if ($allRequestIsViewed) {
            $consultation->update([
                'status_id' => ConsultationStatus::WaitForDoctor,
            ]);
        }
        return redirect()->back();
    }
}
