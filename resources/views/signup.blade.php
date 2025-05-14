
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-TransEC | Daftar Akun</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/sign_up.css') }}">
</head>
<body>
    <div class="signup-container">
        <form class="signup-box" id="signupForm">
            <h2 class="text-center">Daftar Akun</h2>

            <div class="form-row">
                <div class="form-column">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap">
                        <small class="error-message" id="nameError"></small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                        <small class="error-message" id="emailError"></small>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" placeholder="Buat kata sandi">
                        <small class="error-message" id="passwordError"></small>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Ulangi kata sandi">
                        <small class="error-message" id="confirmPasswordError"></small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Daftar</button>
                    <p class="text-center mt-2">
                        Sudah punya akun? <a href="{{ url('/login') }}">Masuk</a>
                    </p>
                </div>

                <div class="form-column">
                    <div class="image-container">
                        <img src="{{ asset ('assets/img/ilustration.jpg') }}" alt="ilustration">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/js/sign_up.js') }}"></script>
</body>
</html>
