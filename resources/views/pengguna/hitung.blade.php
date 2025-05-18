@extends('layouts.app')

@section('title', 'Hitung Emisi Karbon')

@push('styles')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css" rel="stylesheet" />
<script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>

<link rel="stylesheet" href="{{ asset('assets/css/pengguna/hitung_utama.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/sidebar_pengguna.css') }}">
@endpush

@section('content')

<div class="chart">
    <div></div>
</div>

<section class="kendaraan">
    <div class="text-pilih">
        <h2 class="fw-bold">Pilih jenis kendaraan:</h2>
    </div>
    <div class="pilih-kendaraan">
        <div class="mobil">
            <img src="../../img/mobil.png">
        </div>
        <div class="motor">
            <img src="../../img/motor.png">
        </div>
    </div>
</section>

<div class="map-cont">
    <h2 class="fw-bold">Lokasi terkini:</h2>
    <div class="map">
        <div id="map" style="border-radius: 25px; border: black 1px solid;"></div>
    </div>
</div>

<button id="tombolPilih" class="btn btn-success"></button>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/pengguna/sidebar_pengguna.js') }}"></script>

<script>
    let map;
    const mobil = document.querySelector('.mobil');
    const motor = document.querySelector('.motor');
    const tombol = document.getElementById('tombolPilih');
    
document.addEventListener("DOMContentLoaded", function() {
    map = new maplibregl.Map({
        container: 'map',
        style: 'https://api.maptiler.com/maps/streets-v2/style.json?key=nGgvCq7JSZO1z43vqQKv',
        center: [104.0305, 1.0964],
        zoom: 13,
        pitch: 60, 
        bearing: -17.6,
        antialias: true,
        attributionControl: false
    });

    function displayUserLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                map.flyTo({ center: [lon, lat], zoom: 18 });

                new maplibregl.Marker({ color: "red" })
                    .setLngLat([lon, lat])
                    .addTo(map);

            }, function(error) {
                console.error("Geolocation error: " + error.message);
            }, {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            });
        } else {
            console.error('Geolocation tidak didukung.');
            tombol.disabled = false;
            tombol.innerText = "Lokasi Tidak Tersedia";
        }
        tombol.disabled = true;
        tombol.innerText = "Pilih Kendaraan";

        mobil.addEventListener('click', function () {
            tombol.disabled = false;
            tombol.innerText = "Mulai Hitung Emisi 🚗";
            tombol.onclick = function () {
                window.location.href = "hitung_mobil.php";
            };
        });

        motor.addEventListener('click', function () {
            tombol.disabled = false;
            tombol.innerText = "Mulai Hitung Emisi 🏍️";
            tombol.onclick = function () {
                window.location.href = "hitung_motor.php";
            };
        });
    }
    displayUserLocation();
});
document.getElementById("logoutButton").addEventListener("click", function (e) {
e.preventDefault();
Swal.fire({
  title: 'keluar dari Akun',
  html: `
    <p>Apakah anda yakin akan keluar?</p>
    <img src="../../img/human.jpg" width="300" height="150" style="margin-top: 20px; border-radius:10px;">
  `,
  background: '#256020',
  color: '#fff',
  showDenyButton: true,
  denyButtonText: 'Yakin banget!',
  confirmButtonText: 'Enggak jadi deh..',
  reverseButtons: true,
  draggable: true,
  confirmButtonColor: "#b4b4b4"
}).then((result) => {
  if (result.isDenied) {
    window.location.href = "../masuk/proses_keluar.php";
  }
});
});
</script>
@endpush