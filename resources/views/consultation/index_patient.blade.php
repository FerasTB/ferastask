@extends('layouts.app', ['activePage' => $patient->id . '_consultation', 'titlePage' => __('consultation')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">consultations</h4>
                            <p class="card-category"> Here you can manage consultations</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="/consultation/create" class="btn btn-sm btn-primary">Add
                                        consultation</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patient->consultations as $consultation)
                                            <tr>
                                                <td>
                                                    {{ $consultation->patient->name }}
                                                </td>
                                                <td>
                                                    {{ $consultation->status->name }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    @if ($consultation->status->name === 'Done')
                                                        <a href="#" class="btn btn-secondary btn "
                                                            role="button">Print
                                                            Diagnosis</a>
                                                    @endif
                                                    <div class="flex flex-row items-right">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#exampleModalLong{{ $consultation->id }}">
                                                            View Consultation
                                                        </button>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalLong{{ $consultation->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                                            Consultation
                                                                            Information</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
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
                                                        @if ($consultation->status->name === 'information requested')
                                                            <a href="{{ $consultation->id }}/test_request/create"
                                                                class="btn btn-secondary btn " role="button">add What
                                                                Doctor Need</a>
                                                        @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
