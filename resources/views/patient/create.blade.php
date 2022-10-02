@extends('layouts.app', ['activePage' => 'patient', 'titlePage' => __('patient')])

@section('content')
    <form class="content" action="/patient" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('name') }}" name="name">
            @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputPassword1">Birth Date</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('birthDate') }}"
                name="birthDate">
            @if ($errors->has('birthDate'))
                <div id="name-error" class="error text-danger pl-3" for="birthDate" style="display: block;">
                    <strong>{{ $errors->first('birthDate') }}</strong>
                </div>
            @endif
        </div> --}}

        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input datepicker="" datepicker-autohide="" datepicker datepicker-format="yyyy/mm/dd" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                name="birthDate">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('phone') }}"
                name="phone">
            @if ($errors->has('phone'))
                <div id="name-error" class="error text-danger pl-3" for="phone" style="display: block;">
                    <strong>{{ $errors->first('phone') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Work</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('work') }}"
                name="work">
            @if ($errors->has('work'))
                <div id="name-error" class="error text-danger pl-3" for="work" style="display: block;">
                    <strong>{{ $errors->first('work') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</Address></label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('address') }}"
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
