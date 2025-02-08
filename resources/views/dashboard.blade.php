@if(auth()->check())
    @extends('layouts.dashboardapp')

    @section('title', 'Take Your Note')

    @section('nav')
        @include('partials.dashboardnavbar')
    @endsection

    @section('notesdetail')
        @include('partials.notesdetail')
    @endsection
@else
    {{-- Redirect ke halaman welcome jika belum login --}}
    <script>window.location.href = "{{ route('welcome') }}";</script>
@endif