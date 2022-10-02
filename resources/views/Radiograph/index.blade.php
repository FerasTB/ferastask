@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'radiograph-management', 'title' => __('Material Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Radiographs</h4>
                            <p class="card-category"> Here you can manage Radiographs</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="/radiograph/create" class="btn btn-sm btn-primary">Add
                                        Test</a>
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
                                                Comment
                                            </th>
                                            <th class="text-right">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Radiographs as $Radiograph)
                                            <tr>
                                                <td>
                                                    {{ $Radiograph->radiographName }}
                                                </td>
                                                <td>
                                                    {{ $Radiograph->comment }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="radiograph/{{ $Radiograph->id }}/edit" data-original-title=""
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
