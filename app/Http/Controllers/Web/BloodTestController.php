<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBloodTestRequest;
use App\Models\bloodTest;
use Dotenv\Store\StoreBuilder;
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
        $this->authorize('viewAny', bloodTest::class);
        $bloodTest = bloodTest::all();
        return view('test.index', [
            'bloodTest' => $bloodTest,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodTestRequest $request)
    {
        $this->authorize('create', bloodTest::class);
        $fields = $request->validated();
        $test = bloodTest::create($fields);
        return redirect('/test-manage')->with('message', 'blood test created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Http\Response
     */
    public function show(bloodTest $bloodTest)
    {
        return view('bloodTest.show', [
            'bloodTest' => $bloodTest,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Http\Response
     */
    public function edit(bloodTest $test_manage)
    {
        return view('test.edit', [
            'test' => $test_manage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBloodTestRequest $request, bloodTest $test_manage)
    {
        $this->authorize('update', $test_manage);
        $fields = $request->validated();
        $test = $test_manage->update($fields);
        return redirect('/test-manage')->with('message', 'blood test updated');
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
