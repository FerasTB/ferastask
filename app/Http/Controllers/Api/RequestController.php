<?php

namespace App\Http\Controllers\Api;

use App\Enums\RequestStatus;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\ConsultationStatus;
use App\Http\Controllers\Controller;
use App\Models\Request as innerRequest;
use App\Http\Requests\StoreRequestApiRequest;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Resources\RequestResource;
use Illuminate\Http\Response;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\RequestStack;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Consultation $consultation)
    {
        $request = $consultation->requests;
        return RequestResource::collection($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestApiRequest $request, Consultation $consultation)
    {
        if ($request->type === 'Normal') {
            $normalRequest = $consultation->requests()->create([
                'comment' => $request->comment,
            ]);
            $status = ConsultationStatus::where('name', 'need information')->first();
            $status_id = $status->id;
            $consultation->update([
                'status' => $status_id,
            ]);
            return new RequestResource($normalRequest);
        } elseif ($request->type === 'BloodTest') {
            $bloodtestRequest = $consultation->requests()->create([
                'comment' => $request->comment,
            ]);
            // return $request->BloodTestIdArray; 
            foreach ($request->BloodTestIdArray as $test) {
                $bloodtestRequest->bloodTests()->create([
                    'bloodTest_id' => $test,
                ]);
            }
            $status = ConsultationStatus::where('name', 'need information')->first();
            $status_id = $status->id;
            $consultation->update([
                'status' => $status_id,
            ]);
            return new RequestResource($bloodtestRequest);
        } else {
            $radiographRequest = $consultation->requests()->create([
                'comment' => $request->comment,
            ]);
            foreach ($request->RadiographIdArray as $radiograph) {
                $radiographRequest->radiographs()->create([
                    'radiograph_id' => $radiograph,
                ]);
            }
            $status = ConsultationStatus::where('name', 'need information')->first();
            $status_id = $status->id;
            $consultation->update([
                'status' => $status_id,
            ]);
            return new RequestResource($radiographRequest);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(innerRequest $request, Consultation $consultation)
    {
        return new RequestResource($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequestApiRequest $request, Consultation $consultation, innerRequest $req)
    {
        if ($req->status === RequestStatus::New) {
            $req->delete();
            if ($request->type === 'Normal') {
                $normalRequest = $consultation->requests()->create([
                    'comment' => $request->comment,
                ]);
                $status = ConsultationStatus::where('name', 'need information')->first();
                $status_id = $status->id;
                $consultation->update([
                    'status' => $status_id,
                ]);
                return new RequestResource($normalRequest);
            } elseif ($request->type === 'BloodTest') {
                $bloodtestRequest = $consultation->requests()->create([
                    'comment' => $request->comment,
                ]);
                // return $request->BloodTestIdArray; 
                foreach ($request->BloodTestIdArray as $test) {
                    $bloodtestRequest->bloodTests()->create([
                        'bloodTest_id' => $test,
                    ]);
                }
                $status = ConsultationStatus::where('name', 'need information')->first();
                $status_id = $status->id;
                $consultation->update([
                    'status' => $status_id,
                ]);
                return new RequestResource($bloodtestRequest);
            } else {
                $radiographRequest = $consultation->requests()->create([
                    'comment' => $request->comment,
                ]);
                foreach ($request->RadiographIdArray as $radiograph) {
                    $radiographRequest->radiographs()->create([
                        'radiograph_id' => $radiograph,
                    ]);
                }
                $status = ConsultationStatus::where('name', 'need information')->first();
                $status_id = $status->id;
                $consultation->update([
                    'status' => $status_id,
                ]);
                return new RequestResource($radiographRequest);
            }
        } else {
            return response('', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation, innerRequest $req)
    {
        if ($req->status === RequestStatus::New) {
            $req->delete();
            return response('', Response::HTTP_NO_CONTENT);
        } else {
            return response('', Response::HTTP_BAD_REQUEST);
        }
    }
}
