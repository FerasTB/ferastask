<?php

namespace App\Http\Controllers\Web;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Request as Req;
use App\Enums\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestRequest;

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
            'status_id' => ConsultationStatus::InfoRequested,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
    public function destroy(Request $request)
    {
        //
    }
}
