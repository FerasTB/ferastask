<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationOptionRequest;
use App\Http\Resources\DrugOptionResource;
use App\Models\MedicationOption;
use Illuminate\Http\Request;

class DrugOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = MedicationOption::all();
        return DrugOptionResource::collection($options);
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
        return new DrugOptionResource($option);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicationOption  $medicationOption
     * @return \Illuminate\Http\Response
     */
    public function show(MedicationOption $option)
    {
        return new DrugOptionResource($option);
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
        $option->update($fields);
        return new DrugOptionResource($option);
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
