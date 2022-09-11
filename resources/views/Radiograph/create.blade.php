@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'radiograph-management', 'title' => __('Material Dashboard')])

@section('content')
    <form class="content" action="/radiograph" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Radiograph Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('radiographName') }}"
                name="radiographName">
            @if ($errors->has('radiographName'))
                <div id="name-error" class="error text-danger pl-3" for="testName" style="display: block;">
                    <strong>{{ $errors->first('radiographName') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Comment</label>
            <input type="text" class="form-control" id="exampleInputEmail1" "
                                        value="{{ old('comment') }}" name="comment">
                                          @if ($errors->has('comment'))
            <div id="comment-error" class="error text-danger pl-3" for="comment" style="display: block;">
                <strong>{{ $errors->first('comment') }}</strong>
            </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
