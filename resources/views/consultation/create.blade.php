@extends('layouts.app', ['activePage' => 'consultations', 'titlePage' => __('consultation')])

@section('content')
    @livewire('consultation-form')
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
