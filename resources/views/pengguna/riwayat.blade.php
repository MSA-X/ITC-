@extends('layouts.app')

@section('title', 'Riwayat')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/sidebar_pengguna.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pengguna/riwayat.css') }}">
@endpush

@section('content')
<div class="pt-5"></div>
<div class="header">
    <h2>Hi!<span style="color: rgb(4, 80, 4)"> Pengguna!</span></h2>
    <p>Ini Riwayat perjalanan, Kamu!</p>
  </div>

  <div class="form-container">
    <input type="text" id="startDate" placeholder="Tanggal mulai">
    <input type="text" id="endDate" placeholder="Tanggal selesai">
    <button id="filterBtn">Submit</button>
  </div>

  <div class="chart-container">
      <canvas id="emissionChart"></canvas>
  </div>


  <div class="hist container mt-4">
  <table id="riwayatTable" class="display">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Tujuan</th>
        <th>Transportasi</th>
        <th>Jarak (km)</th>
        <th>Emisi (kg CO₂)</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($perjalanan as $item)
    <tr>
      <td>{{ $item->tanggal }}</td>
      <td>-</td> {{-- kolom tujuan belum ada di data, bisa dikosongkan atau diisi '-' --}}
      <td>{{ $item->jenis_kendaraan }}</td>
      <td>{{ $item->jarak_km }}</td>
      <td>{{ $item->hasil_emisi }}</td>
    </tr>
  @endforeach
</tbody>

  </table>
</div>

  </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="//cdn.datatables.net/2.3.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/pengguna/riwayat.js') }}"></script>
<script src="{{ asset('assets/js/pengguna/sidebar_pengguna.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#startDate", { dateFormat: "Y-m-d" });
  flatpickr("#endDate", { dateFormat: "Y-m-d" });
    window.dataPerjalanan = @json($perjalanan);
</script>

@endpush
