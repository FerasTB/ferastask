<?php

namespace App\Http\Controllers\Web;

use App\Models\Radiograph;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Enums\ConsultationStatus;
use App\Models\RadiographRequest;
use App\Http\Controllers\Controller;

class RadiographRequestController extends Controller
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
        $radiographs = Radiograph::all();
        return view('radiograph_request.create', [
            'consultation' => $consultation,
            'radiographs' => $radiographs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Consultation $consultation)
    {
        $RequestFields = [
            'comment' => $request->comment,
        ];
        $testRequest = $consultation->requests()->create($RequestFields);
        $radiographs = Radiograph::all();
        foreach ($radiographs as $radiograph) {
            $id = $radiograph->id;
            if ($request->$id) {
                $testRequest->radiographs()->create([
                    'radiograph_id' => $request->$id,
                ]);
            }
        }
        $consultation->update([
            'status_id' => ConsultationStatus::InfoRequested,
        ]);
        return redirect('consultation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RadiographRequest  $radiographRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RadiographRequest $radiographRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RadiographRequest  $radiographRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RadiographRequest $radiographRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RadiographRequest  $radiographRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadiographRequest $radiographRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RadiographRequest  $radiographRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadiographRequest $radiographRequest)
    {
        //
    }
}
