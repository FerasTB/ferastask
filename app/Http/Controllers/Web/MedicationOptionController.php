<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationOptionRequest;
use App\Models\MedicationOption;
use Illuminate\Http\Request;

class MedicationOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = MedicationOption::all();
        return view('option.index', [
            'options' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('option.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicationOptionRequest $request)
    {
        $fields = $request->validated();
        $option = MedicationOption::create($fields);
        return redirect('option')->with('message', 'option created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicationOption  $medicationOption
     * @return \Illuminate\Http\Response
     */
    public function show(MedicationOption $medicationOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicationOption  $medicationOption
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicationOption $option)
    {
        return view('option.edit', [
            'option' => $option,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicationOption  $medicationOption
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMedicationOptionRequest $request, MedicationOption $option)
    {
        $fields = $request->validated();
        $option = $option->update($fields);
        return redirect('option')->with('message', 'option updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicationOption  $medicationOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicationOption $medicationOption)
    {
        //
    }
}
