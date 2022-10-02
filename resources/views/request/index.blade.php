@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'consultation', 'title' => __('Material Dashboard')])

@section('content')
    <table class="table content">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>comment of request</th>
                <th>status</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td class="text-center">1</td>
                    <td>{{ $request->consultation->patient->name }}</td>
                    <td>{{ $request->comment }}</td>
                    <td class="text-right">{{ App\Enums\RequestStatus::getKey($request->status) }}</td>
                    @if ($request->status === App\Enums\RequestStatus::New)
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    @else
                        <td>No Action</td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
