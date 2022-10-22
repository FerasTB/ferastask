@extends('layouts.app', ['activePage' => 'consultation', 'titlePage' => __('attachment')])

@section('content')
    <form class="content" action="/{{ $request->id }}/attachment" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-6">
            <label class="form-label " for="files">upload any image or pdf can help the doctor</label>
            <input class="form-control mt-2" id="upload" type="file" name="photos[]" multiple>

            @error('photos.*')
                <span class="error">{{ $message }}</span>
            @enderror
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
