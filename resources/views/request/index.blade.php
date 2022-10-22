@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'consultation', 'title' => __('Material Dashboard')])

@section('content')
    <table class="table content">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>Type of request</th>
                <th>comment of request</th>
                <th>status</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td class="text-center">{{ $request->id }}</td>
                    <td>{{ $request->consultation->patient->name }}</td>
                    @if (!$request->radiographs->isEmpty())
                        <td>radiographs request</td>
                    @elseif(!$request->bloodTests->isEmpty())
                        <td>blood tests request </td>
                    @else
                        <td>request</td>
                    @endif
                    <td>{{ $request->comment }}</td>
                    <td class="text-right">{{ App\Enums\RequestStatus::getKey($request->status) }}</td>
                    @if ($request->status === App\Enums\RequestStatus::New)
                        <td class="td-actions text-right">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" rel="tooltip" data-toggle="modal"
                                    data-target="#exampleModalLong{{ $request->id }}">
                                    <i class="material-icons">person</i>
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong{{ $request->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Consultation
                                                    Information</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body flex flex-col">
                                                <div class="flex flex-row">
                                                    <h1>Name : </h1>
                                                    <p>{{ $consultation->patient->name }}</p>
                                                </div>
                                                <div class="flex flex-row">
                                                    <h1>Gender : </h1>
                                                    <p>{{ App\Enums\Gender::getKey($consultation->patient->gender) }}
                                                    </p>
                                                </div>
                                                <div class="flex flex-row">
                                                    <h1>Patient Complaint : </h1>
                                                    <p>{{ $consultation->patient_complaint }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action='request/{{ $request->id }}' method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                        </td>
                    @elseif($request->status === App\Enums\RequestStatus::FileUploaded ||
                        $request->status === App\Enums\RequestStatus::ViewedByDoctor)
                        <td class="td-actions text-right">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" rel="tooltip" data-toggle="modal"
                                    data-target="#exampleModalLong{{ $request->id }}">
                                    <i class="material-icons">info</i>
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong{{ $request->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    attachments</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body flex flex-col">
                                                @if (!$request->attachments->isEmpty())
                                                    @foreach ($request->attachments as $photo)
                                                        <div class="flex flex-row">
                                                            <h1>Name : <br>
                                                            </h1>
                                                            <img class="w-32"
                                                                src="{{ asset('storage/' . $photo->path) }}" />
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <a href="request/{{ $request->id }}/viewed" type="button"
                                                    class="btn btn-secondary">Viewed and Close</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    @else
                        <td class="td-actions text-right"> No Action Available
                        </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
