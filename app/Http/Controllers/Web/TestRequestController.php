<?php

namespace App\Http\Controllers\Web;

use App\Enums\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Models\bloodTest;
use App\Models\BloodTestRequest;
use App\Models\Consultation;
use Illuminate\Http\Request;

class TestRequestController extends Controller
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
        $tests = bloodTest::all();
        return view('test_request.create', [
            'bloodTests' => $tests,
            'consultation' => $consultation,
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
        $tests = bloodTest::all();
        foreach ($tests as $test) {
            $id = $test->id;
            if ($request->$id) {
                $testRequest->bloodTests()->create([
                    'bloodTest_id' => $request->$id,
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
     * @param  \App\Models\BloodTestRequest  $bloodTestRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BloodTestRequest $bloodTestRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodTestRequest  $bloodTestRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodTestRequest $bloodTestRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodTestRequest  $bloodTestRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodTestRequest $bloodTestRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodTestRequest  $bloodTestRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodTestRequest $bloodTestRequest)
    {
        //
    }
}
