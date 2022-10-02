@extends('layouts.app', ['activePage' => 'patient', 'titlePage' => __('patient')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Patient</h4>
                            <p class="card-category"> Here you can manage Patient</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="/patient/create" class="btn btn-sm btn-primary">Add
                                        Patient</a>
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
                                                Birth Date
                                            </th>
                                            <th>
                                                Phone
                                            </th>
                                            <th>
                                                Work
                                            </th>
                                            <th>
                                                Address
                                            </th>
                                            <th>
                                                Gender
                                            </th>
                                            <th>
                                                Marital
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>
                                                    {{ $patient->name }}
                                                </td>
                                                <td>
                                                    {{ $patient->birthDate }}
                                                </td>
                                                <td>
                                                    {{ $patient->phone }}
                                                </td>
                                                <td>
                                                    {{ $patient->work }}
                                                </td>
                                                <td>
                                                    {{ $patient->address }}
                                                </td>
                                                <td>
                                                    {{ App\Enums\gender::getKey((int) $patient->gender) }}
                                                </td>
                                                <td>
                                                    {{ App\Enums\marital::getKey((int) $patient->marital) }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="patient/{{ $patient->id }}/edit" data-original-title=""
                                                        title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
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
