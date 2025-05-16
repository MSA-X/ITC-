<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'I-TransEC')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />
    <!-- CSS eksternal yang umum -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.min.css" rel="stylesheet" />

    <!-- CSS khusus sidebar yang selalu dipakai -->
    <link rel="stylesheet" href="{{ asset('assets/css/pengguna/sidebar_pengguna.css') }}">

    <!-- CSS khusus halaman lain -->
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        @include('partials.sidebar_pengguna')
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- JS eksternal yang umum -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.js"></script>

    <!-- JS khusus sidebar -->
    <script src="{{ asset('assets/js/pengguna/sidebar_pengguna.js') }}"></script>

    <!-- JS khusus halaman lain -->
    @stack('scripts')
</body>
</html>
