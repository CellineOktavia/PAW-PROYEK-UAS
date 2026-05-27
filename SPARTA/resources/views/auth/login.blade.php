<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #bfdbfe, transparent 30%),
                radial-gradient(circle at bottom right, #93c5fd, transparent 30%),
                linear-gradient(135deg, #eff6ff, #dbeafe);

            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
        }

        /* Background Blur */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .4;
            z-index: 1;
        }

        .shape1 {
            width: 300px;
            height: 300px;
            background: #2563eb;
            top: -100px;
            left: -100px;
        }

        .shape2 {
            width: 250px;
            height: 250px;
            background: #60a5fa;
            bottom: -100px;
            right: -100px;
        }

        /* Login Card */
        .login-card {
            position: relative;
            z-index: 2;

            border: none;
            border-radius: 28px;

            background: rgba(255, 255, 255, .75);

            backdrop-filter: blur(18px);

            box-shadow:
                0 20px 60px rgba(0, 0, 0, .08);

            overflow: hidden;

            animation: fadeUp .7s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .card-header {
            background:
                linear-gradient(135deg,
                    #2563eb,
                    #3b82f6) !important;

            padding: 35px 25px;
            border: none;
        }

        .logo-circle {
            width: 75px;
            height: 75px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .2);

            display: flex;
            align-items: center;
            justify-content: center;

            margin: auto auto 18px;

            color: white;
            font-size: 32px;

            backdrop-filter: blur(8px);
        }

        .card-header h4 {
            font-size: 30px;
            font-weight: 700;
        }

        .subtitle {
            color: rgba(255, 255, 255, .85);
            font-size: 14px;
            margin-top: 8px;
        }

        /* Form */
        .card-body {
            padding: 35px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .input-group {
            border-radius: 14px;
            overflow: hidden;
            transition: .3s;
        }

        .input-group:focus-within {
            box-shadow:
                0 0 0 4px rgba(37, 99, 235, .12);
        }

        .input-group-text {
            background: white;
            border-right: none;
            color: #64748b;
        }

        .form-control {
            height: 54px;
            border-left: none;
            font-size: 15px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        /* Login Button */
        .btn-login {
            height: 54px;

            border: none;

            border-radius: 14px;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #3b82f6);

            font-weight: 700;
            font-size: 16px;

            transition: .3s;
        }

        .btn-login:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 25px rgba(37, 99, 235, .3);
        }

        /* Footer */
        .card-footer {
            background: transparent;
            border-top: 1px solid #e2e8f0;
            padding: 20px;
        }

        .card-footer a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        /* Remember Me */
        .form-check-label {
            color: #475569;
            font-size: 14px;
        }

        /* Responsive */
        @media(max-width:768px) {

            .card-body {
                padding: 28px 22px;
            }

            .card-header h4 {
                font-size: 24px;
            }

            .logo-circle {
                width: 65px;
                height: 65px;
                font-size: 28px;
            }
        }

        @media(max-width:480px) {

            .container {
                padding: 20px;
            }

            .card-body {
                padding: 24px 18px;
            }

            .form-control {
                height: 50px;
            }

            .btn-login {
                height: 50px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- Background -->
    <div class="bg-shape shape1"></div>
    <div class="bg-shape shape2"></div>

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5 col-md-7">
                <div class="card login-card">
                    <!-- Header -->
                    <div class="card-header text-white text-center">
                        <div class="logo-circle">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4 class="mb-0">
                            LOGIN
                        </h4>
                        <div class="subtitle">
                            Silakan login untuk melanjutkan
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body">

                        {{-- Success --}}
                        @if (session('success'))
                            <div class="alert alert-success rounded-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Error --}}
                        @if ($errors->any())

                            <div class="alert alert-danger rounded-3">

                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach

                            </div>

                        @endif

                        <!-- Form -->
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="nama@email.com" required autofocus>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Masukkan password" required>
                                    <button type="button" class="input-group-text" onclick="togglePassword()">
                                        <i class="bi bi-eye" id="eyeIcon"></i>
                                    </button>
                                </div>

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>

                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-login">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-center text-muted">

                        Belum punya akun?

                        <a href="{{ url('/register') }}">

                            Daftar di sini

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePassword() {
            let password =
                document.getElementById('password');

            let eyeIcon =
                document.getElementById('eyeIcon');

            if (password.type === 'password') {
                password.type = 'text';

                eyeIcon.classList.remove('bi-eye');

                eyeIcon.classList.add('bi-eye-slash');
            } else {
                password.type = 'password';

                eyeIcon.classList.remove('bi-eye-slash');

                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>

</body>

</html>
