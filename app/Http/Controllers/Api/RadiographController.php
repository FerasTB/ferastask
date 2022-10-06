<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRadiographRequest;
use App\Http\Resources\RadiographResource;
use App\Models\Radiograph;
use App\Models\RadiographRequest;
use Illuminate\Http\Request;

class RadiographController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radiographs = Radiograph::all();
        return RadiographResource::collection($radiographs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRadiographRequest $request)
    {
        $fields = $request->validated();
        $radiograph = Radiograph::create($fields);
        return new RadiographResource($radiograph);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function show(Radiograph $radiograph)
    {
        return new RadiographResource($radiograph);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRadiographRequest $request, Radiograph $radiograph)
    {
        $fields = $request->validated();
        $radiograph->update($fields);
        return new RadiographResource($radiograph);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radiograph $radiograph)
    {
        //
    }
}
