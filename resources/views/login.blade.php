<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-TransEC | Masuk Akun</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />
    <!-- Bootstrap & SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <form class="login-box" method="POST" action="{{ route('login') }}">
            @csrf

            <h2 class="text-center">Masuk Akun</h2>

            <div class="form-row">
                <div class="form-column">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group mt-3">
                        <label for="password">Kata Sandi</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group mt-3 form-check">
                        <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                        <label for="remember_me" class="form-check-label">Ingat Saya</label>
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>

                    <!-- Links -->
                    <p class="text-center mt-2">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
                        @endif
                        | <a href="{{ route('signup') }}">Daftar</a>
                    </p>
                </div>

                <div class="form-column">
                    <div class="image-container">
                        <img src="{{ asset('assets/img/ilustration.jpg') }}" alt="ilustration">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '{{ session('status') }}'
            });
        </script>
    @endif

    <!-- SweetAlert for login error -->
    @if(session('login_error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('login_error') }}',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
