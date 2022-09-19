@extends('layouts.app', ['activePage' => 'drug', 'titlePage' => __('drug')])

@section('content')
    <form class="content" action="/drug" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Drug Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('genericName') }}"
                name="genericName">
            @if ($errors->has('genericName'))
                <div id="name-error" class="error text-danger pl-3" for="genericName" style="display: block;">
                    <strong>{{ $errors->first('genericName') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Trade Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('tradeName') }}"
                name="tradeName">
            @if ($errors->has('tradeName'))
                <div id="name-error" class="error text-danger pl-3" for="tradeName" style="display: block;">
                    <strong>{{ $errors->first('tradeName') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Note</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('note') }}"
                name="note">
            @if ($errors->has('note'))
                <div id="name-error" class="error text-danger pl-3" for="note" style="display: block;">
                    <strong>{{ $errors->first('note') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category Select</label>
            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1"
                name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->categoryName }}</option>
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
