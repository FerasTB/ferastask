<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBloodTestRequest;
use App\Http\Resources\BloodTestResource;
use App\Models\bloodTest;
use Illuminate\Http\Request;

class BloodTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBloodTest = bloodTest::all();
        return BloodTestResource::collection($allBloodTest);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodTestRequest $request)
    {
        $fields = $request->validated();
        $bloodTest = bloodTest::create($fields);
        return new BloodTestResource($bloodTest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Http\Response
     */
    public function show(bloodTest $bloodTest)
    {
        return new BloodTestResource($bloodTest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBloodTestRequest $request, bloodTest $bloodtest)
    {
        $fields = $request->validated();
        $bloodtest->update($fields);
        return new BloodTestResource($bloodtest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(bloodTest $bloodTest)
    {
        //
    }
}
