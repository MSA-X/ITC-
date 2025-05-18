@extends('layouts.app')

@section('title', 'Hitung Emisi Karbon')

@push('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

<link rel="stylesheet" href="{{ asset('assets/css/pengguna/simulasi.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/sidebar_pengguna.css') }}">
@endpush

@section('content')
<div class="pt-5"></div>
<!-- Peta -->
<div id="map"></div>

<!-- Tombol Pilih Lokasi -->
<div class="lokasi-control">
    <button id="btnAsal"><i class="fas fa-location-arrow me-1"></i> Lokasi Asal</button>
    <button id="btnTujuan"><i class="fas fa-map-marker-alt me-1"></i> Lokasi Tujuan</button>
</div>

<!-- Hasil -->
<div class="result-box">
    <h5 class="text-center mb-2">Perkiraan Emisi Karbon</h5>
    <table class="table table-bordered text-center">
        <thead class="table-dark">
        <tr>
            <th>Kendaraan</th>
            <th>Jarak (km)</th>
            <th>Emisi (gram CO₂)</th>
        </tr>
        </thead>
        <tbody id="tabel-emisi"></tbody>
    </table>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.js"></script>
  <script src="{{ asset('assets/js/pengguna/sidebar_pengguna.js')}}"></script>
  <script>
    let map, asalMarker, tujuanMarker, asalLatLng, tujuanLatLng, router;
    const emisiPerKm = {
      Mobil: 250,
      Motor: 90,
      "Mobil Hybrid": 120,
      Busway: 60
    };
    let modePilih = null;

    map = L.map('map').setView([1.0902852345908899, 104.02480998542111], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attributionControl: false
    }).addTo(map);

    const bounds = L.latLngBounds(
      [0.800, 103.700],
      [1.320, 104.400]
    );
    map.setMaxBounds(bounds);

    map.locate({ setView: true, maxZoom: 15 });
    map.on('locationfound', function (e) {
      asalLatLng = e.latlng;
      asalMarker = L.marker(asalLatLng).addTo(map).bindPopup('Lokasi Anda (Asal)').openPopup();
    });

    map.on('locationerror', function () {
      alert("Gagal mendeteksi lokasi.");
    });

    document.getElementById("btnAsal").addEventListener("click", () => {
      modePilih = 'asal';
      toggleActive('btnAsal');
    });

    document.getElementById("btnTujuan").addEventListener("click", () => {
      modePilih = 'tujuan';
      toggleActive('btnTujuan');
    });

    function toggleActive(id) {
      document.getElementById("btnAsal").classList.remove("active");
      document.getElementById("btnTujuan").classList.remove("active");
      if (id) document.getElementById(id).classList.add("active");
    }

    map.on('click', function (e) {
      if (!bounds.contains(e.latlng)) {
        alert("Pilih lokasi hanya di wilayah Batam.");
        return;
      }

      if (modePilih === 'asal') {
        if (asalMarker) map.removeLayer(asalMarker);
        asalLatLng = e.latlng;
        asalMarker = L.marker(asalLatLng).addTo(map).bindPopup("Lokasi Asal").openPopup();
      } else if (modePilih === 'tujuan') {
        if (tujuanMarker) map.removeLayer(tujuanMarker);
        tujuanLatLng = e.latlng;
        tujuanMarker = L.marker(tujuanLatLng).addTo(map).bindPopup("Lokasi Tujuan").openPopup();
      }

      toggleActive();
      modePilih = null;

      if (asalLatLng && tujuanLatLng) {
        if (router) map.removeControl(router);
        router = L.Routing.control({
          waypoints: [asalLatLng, tujuanLatLng],
          lineOptions: { styles: [{ color: 'blue', weight: 5 }] },
          routeWhileDragging: false,
          createMarker: () => null
        }).addTo(map);

        router.on('routesfound', function(e) {
          const jarakKm = e.routes[0].summary.totalDistance / 1000;
          tampilkanEmisi(jarakKm);
        });
      }
    });

    function tampilkanEmisi(jarakKm) {
      const tbody = document.getElementById("tabel-emisi");
      tbody.innerHTML = "";
      for (const [kendaraan, emisi] of Object.entries(emisiPerKm)) {
        const totalEmisi = jarakKm * emisi;
        tbody.innerHTML += `
          <tr>
            <td>${kendaraan}</td>
            <td>${jarakKm.toFixed(2)}</td>
            <td>${totalEmisi.toFixed(0)}</td>
          </tr>
        `;
      }
    }
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