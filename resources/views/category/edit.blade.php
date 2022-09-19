@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('category')])

@section('content')
    <form class="content" action="/category/{{ $category->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $category->categoryName }}"
                name="categoryName">
            @if ($errors->has('categoryName'))
                <div id="name-error" class="error text-danger pl-3" for="categoryName" style="display: block;">
                    <strong>{{ $errors->first('categoryName') }}</strong>
                </div>
            @endif
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
