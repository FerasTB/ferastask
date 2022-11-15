<?php

namespace App\Http\Controllers\Api;

use App\Enums\TicketCategory;
use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Enums\UserRole;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketSupportResource;
use App\Models\TicketSupport;

class TicketController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $fields = $request->validated();
        if ($request->category) {
            $fields["category"] = TicketCategory::getValue($request->category);
        }
        $ticket = auth()->user()->tickets()->create($fields);
        return new TicketSupportResource($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TicketSupport $ticket)
    {
        return new TicketSupportResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, TicketSupport $ticket)
    {
        $fields = $request->validated();
        if ($request->priority) {
            $fields['priority'] = TicketPriority::getValue($request->priority);
        }
        if ($request->agent) {
            $fields['agent'] = UserRole::getValue($request->agent);
        }
        if ($request->status) {
            $fields['status'] = TicketStatus::getValue($request->status);
        }
        if ($request->category) {
            $fields['category'] = TicketCategory::getValue($request->category);
        }
        $ticket->update($fields);
        return new TicketSupportResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
