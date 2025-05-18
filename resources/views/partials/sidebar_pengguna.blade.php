<!-- resources/views/partials/navsidebar.blade.php -->
<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
  <div class="container">
    <button class="navbar-toggler" type="button" id="toggleSidebar">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ url('/pengguna') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/hitung') }}">Hitung Emisi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/simulasi') }}">Simulasi Perjalanan</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Rekomendasi</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('/rekomendasi_perjalanan') }}">Rekomendasi Perjalanan</a></li>
            <li><a class="dropdown-item" href="{{ url('/rekomendasi_kegiatan') }}">Rekomendasi Kegiatan</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/riwayat') }}">Riwayat</a></li>
      </ul>
    </div>

    <div class="dropdown d-flex align-items-center">
      @if(session('nama'))
        <span class="text-white me-2 fw-semibold">{{ session('nama') }}</span>
      @endif
      <button class="btn profile ms-2 dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user-circle fa-lg"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
        <li><a class="dropdown-item" href="{{ url('/kelola-akun') }}">Kelola Akun</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><button class="dropdown-item" id="logoutButton">Keluar</button></li>
      </ul>
    </div>
  </div>
</nav>

<div class="sidebar" id="sidebar">
  <button class="close-btn" id="closeSidebar">&times;</button>
  <ul>
    <li><a href="{{ url('/pengguna') }}" class="nav-link">Beranda</a></li>
    <li><a href="{{ url('/hitung') }}" class="nav-link">Hitung Emisi</a></li>
    <li><a href="{{ url('/simulasi') }}" class="nav-link">Simulasi Perjalanan</a></li>
    <li>
      <a href="javascript:void(0)" class="nav-link" onclick="toggleSidebarDropdown()">Rekomendasi <i class="fas fa-caret-down"></i></a>
      <ul id="sidebarDropdown" style="display: none; list-style: none; padding-left: 15px;">
        <li><a href="{{ url('/rekomendasi_perjalanan') }}" class="nav-link">Rekomendasi Perjalanan</a></li>
        <li><a href="{{ url('/rekomendasi_kegiatan') }}" class="nav-link">Rekomendasi Kegiatan</a></li>
      </ul>
    </li>
    <li><a href="{{ url('/riwayat') }}" class="nav-link">Riwayat</a></li>
  </ul>
</div>
