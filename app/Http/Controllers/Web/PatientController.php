<?php

namespace App\Http\Controllers\Web;

use App\Enums\Gender;
use App\Enums\Marital;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = auth()->user()->patients;
        return view('patient.index', [
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Gender::asArray();
        $marital = Marital::asArray();
        return view('patient.create', [
            'gender' => $gender,
            'marital' => $marital,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $fields = $request->validated();
        $patient = auth()->user()->patients()->create($fields);
        return redirect('patient')->with('message', 'patient created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $gender = Gender::asArray();
        $marital = Marital::asArray();
        return view('patient.edit', [
            'patient' => $patient,
            'gender' => $gender,
            'marital' => $marital,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(StorePatientRequest $request, Patient $patient)
    {
        $fields = $request->validated();
        $patient = $patient->update($fields);
        return redirect('patient')->with('message', 'patient updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
