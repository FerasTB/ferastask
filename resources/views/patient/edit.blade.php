@extends('layouts.app', ['activePage' => 'patient', 'titlePage' => __('patient')])

@section('content')
    <form class="content" action="/patient/{{ $patient->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $patient->name }}" name="name">
            @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Birth Date</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $patient->birthDate }}"
                name="birthDate">
            @if ($errors->has('birthDate'))
                <div id="name-error" class="error text-danger pl-3" for="birthDate" style="display: block;">
                    <strong>{{ $errors->first('birthDate') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $patient->phone }}"
                name="phone">
            @if ($errors->has('phone'))
                <div id="name-error" class="error text-danger pl-3" for="phone" style="display: block;">
                    <strong>{{ $errors->first('phone') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Work</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $patient->work }}"
                name="work">
            @if ($errors->has('work'))
                <div id="name-error" class="error text-danger pl-3" for="work" style="display: block;">
                    <strong>{{ $errors->first('work') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</Address></label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $patient->address }}"
                name="address">
            @if ($errors->has('address'))
                <div id="name-error" class="error text-danger pl-3" for="address" style="display: block;">
                    <strong>{{ $errors->first('address') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Gender Select</label>
            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1"
                name="gender">
                @foreach ($gender as $key => $value)
                    <option value="{{ $value }}"> {{ $key }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Gender Select</label>
            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1"
                name="marital">
                @foreach ($marital as $key => $value)
                    <option value="{{ $value }}"> {{ $key }}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
