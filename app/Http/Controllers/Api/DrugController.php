<?php

namespace App\Http\Controllers\Api;

use App\Models\Drug;
use App\Models\DrugCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrugRequest;
use App\Http\Resources\DrugResource;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::with('category')->get();
        return DrugResource::collection($drugs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrugRequest $request)
    {
        $fields = $request->validated();
        $category = DrugCategory::findOrFail($request->category_id);
        $drug = $category->drugs()->create($fields);
        return new DrugResource($drug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        return new DrugResource($drug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDrugRequest $request, Drug $drug)
    {
        $fields = $request->validated();
        if ($request->category_id === $drug->category_id) {
            $drug->update($fields);
            return new DrugResource($drug);
        } else {
            $drug->delete();
            $category = DrugCategory::findOrFail($request->category_id);
            $drug = $category->drugs()->create($fields);
            return new DrugResource($drug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        //
    }
}
