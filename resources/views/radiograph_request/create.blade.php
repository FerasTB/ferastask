@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'consultation', 'title' => __('Material Dashboard')])

@section('content')
    <form class="content" action="/{{ $consultation->id }}/radiograph_request" method="POST">
        @csrf
        @foreach ($radiographs as $radiograph)
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value={{ $radiograph->id }}
                            name={{ $radiograph->id }}>
                        {{ $radiograph->radiographName }}
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
        @endforeach

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
