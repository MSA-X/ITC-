@extends('layouts.app')

@section('title', 'Rekomendasi')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/sidebar_pengguna.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/rek_keg.css') }}">
@endpush

@section('content')
<section id="kegiatan" class="kegiatan-section py-5 pt-5">
<div class="container">
    <h3 class="section-title text-center mb-5 fw-bold">Rekomendasi kegiatan untuk Kamu</h3>
    <div class="kegiatan-grid">

    <div class="kegiatan-card">
        <img src="../../img/sponsor_2.jpg" alt="kegiatan 1" class="kegiatan-img">
        <div class="kegiatan-text">
        <h5 class="fw-bold">kegiatan 1</h5>
        <p>Ini adalah isi singkat kegiatan pertama yang menarik untuk dibaca.</p>
        <button class="btn btn-outline-primary">Lihat</button>
        </div>
    </div>

    <div class="kegiatan-card">
        <img src="../../img/sponsor_2.jpg" alt="kegiatan 2" class="kegiatan-img">
        <div class="kegiatan-text">
        <h5 class="fw-bold">kegiatan 2</h5>
        <p>Ini adalah isi singkat kegiatan kedua yang informatif dan terbaru.</p>
        <button class="btn btn-outline-primary">Lihat</button>
        </div>
    </div>

    <div class="kegiatan-card">
        <img src="../../img/I-TEC.png" alt="kegiatan 3" class="kegiatan-img">
        <div class="kegiatan-text">
        <h5 class="fw-bold">kegiatan 3</h5>
        <p>Isi singkat kegiatan ketiga, dengan informasi terkini yang bermanfaat.</p>
        <button class="btn btn-outline-primary">Lihat</button>
        </div>
    </div>

    </div>
</div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.js"></script>
@endpush
