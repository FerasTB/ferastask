@extends('layouts.app', ['activePage' => 'prescription', 'titlePage' => __('prescription')])

@section('content')
    @livewire('prescription-form', ['consultation' => $consultation])
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
