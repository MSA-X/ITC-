@extends('layouts.app')

@section('title', 'Rekomendasi')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/sidebar_pengguna.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/rek_per.css') }}">
@endpush

@section('content')
<div class="map-tb">
    <iframe src="https://www.google.com/maps/d/embed?mid=1YsIbrT0lcckAWC0RlwUQtzhf2kw&ehbc=2E312F" width="640" height="480"></iframe>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.js"></script>
@endpush