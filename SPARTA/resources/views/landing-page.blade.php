<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SPARTA - Sistem manajemen data barang dan supplier secara cepat dan terorganisir.">
    <title>SPARTA</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* BASE */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background-color: #f0f4ff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0f172a;
        }

        /* NAVBAR */
        .navbar {
            background: #ffffff;
            box-shadow: 0 1px 0 #e2e8f0;
            padding: 14px 0;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 800;
            color: #1e3a8a !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand i {
            color: #2563eb;
            font-size: 22px;
        }

        .navbar .nav-link {
            font-size: 14px;
            font-weight: 600;
            color: #64748b !important;
            padding: 6px 4px;
            position: relative;
            transition: color 0.25s;
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2.5px;
            background: #2563eb;
            border-radius: 10px;
            transition: width 0.25s ease;
        }

        .navbar .nav-link:hover {
            color: #2563eb !important;
        }

        .navbar .nav-link:hover::after {
            width: 100%;
        }

        .btn-login {
            background: #2563eb;
            color: #ffffff !important;
            font-size: 14px;
            font-weight: 700;
            padding: 9px 24px;
            border-radius: 50px;
            transition: background 0.2s, transform 0.2s;
        }

        .btn-login:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* HERO */
        .hero {
            padding: 72px 0 56px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.15;
        }

        .hero-title span {
            color: #2563eb;
        }

        .hero-text {
            font-size: 16px;
            color: #64748b;
            margin-top: 16px;
            line-height: 1.8;
            max-width: 440px;
        }

        .btn-hero-primary {
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            padding: 12px 28px;
            border-radius: 12px;
            border: none;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-hero-primary:hover {
            background: #1d4ed8;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.3);
        }

        .btn-hero-outline {
            background: #ffffff;
            color: #2563eb;
            font-weight: 700;
            font-size: 15px;
            padding: 12px 28px;
            border-radius: 12px;
            border: 2px solid #bfdbfe;
            transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-hero-outline:hover {
            border-color: #2563eb;
            color: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.12);
        }

        /* DASHBOARD PREVIEW CARD */
        .dashboard-preview {
            background: #ffffff;
            border-radius: 22px;
            padding: 24px;
            border: 0.5px solid #e2e8f0;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.07);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .dashboard-preview:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 0 24px 50px rgba(37, 99, 235, 0.15);
        }

        .stat-card {
            border-radius: 14px;
            padding: 18px 20px;
            transition: transform 0.25s;
            cursor: default;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-card.blue {
            background: #2563eb;
            color: #fff;
        }

        .stat-card.green {
            background: #059669;
            color: #fff;
        }

        .stat-card label {
            font-size: 12px;
            font-weight: 600;
            opacity: 0.85;
            display: block;
            margin-bottom: 6px;
        }

        .stat-card .stat-number {
            font-size: 36px;
            font-weight: 800;
            line-height: 1;
        }

        .table-card {
            background: #f8faff;
            border: 0.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px 18px;
        }

        .table-card-title {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .table-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-card th {
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 4px 0 8px;
        }

        .table-card td {
            font-size: 13px;
            color: #334155;
            padding: 8px 0;
            border-top: 0.5px solid #e2e8f0;
        }

        .badge-stok {
            background: #dcfce7;
            color: #15803d;
            font-size: 12px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 50px;
        }

        /* FITUR */
        .features-section {
            padding: 0 0 72px;
        }

        .feature-box {
            background: #ffffff;
            border-radius: 20px;
            padding: 28px 24px;
            text-align: center;
            height: 100%;
            cursor: pointer;
            border: 1px solid #e2e8f0;
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            border-color: #2563eb;
            box-shadow: 0 16px 32px rgba(37, 99, 235, 0.13);
        }

        .icon-box {
            width: 64px;
            height: 64px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            margin: 0 auto;
            font-size: 28px;
            transition: background 0.3s, color 0.3s, transform 0.3s;
        }

        .feature-box:hover .icon-box {
            background: #2563eb;
            color: #ffffff;
            transform: rotate(6deg) scale(1.1);
        }

        .feature-box h4 {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 18px;
            margin-bottom: 8px;
        }

        .feature-box p {
            font-size: 14px;
            color: #64748b;
            line-height: 1.65;
            margin: 0;
        }

        /* ANIMASI */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeup {
            animation: fadeUp 0.6s ease both;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        .delay-5 {
            animation-delay: 0.5s;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box-seam"></i> SPARTA
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                </ul>

                <a href="/login" class="btn-login text-decoration-none">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Kiri -->
                <div class="col-lg-6">
                    <div class="hero-badge animate-fadeup">
                        <i class="bi bi-stars"></i>
                        Sistem CRUD Barang & Supplier
                    </div>

                    <h1 class="hero-title animate-fadeup delay-1">
                        Kelola Barang & Supplier <span>Lebih Mudah</span>
                    </h1>

                    <p class="hero-text animate-fadeup delay-2">
                        Sistem sederhana untuk membantu pengelolaan data barang,
                        stok, supplier, dan laporan secara cepat dan terorganisir.
                    </p>

                    <div class="mt-4 d-flex gap-3 flex-wrap animate-fadeup delay-3">
                        <a href="#" class="btn-hero-primary">
                            <i class="bi bi-rocket-takeoff me-2"></i>Mulai Sekarang
                        </a>
                    </div>
                </div>

                <!-- Kanan -->
                <div class="col-lg-6 animate-fadeup delay-2">
                    <div class="dashboard-preview">

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="stat-card blue">
                                    <label>Total Barang</label>
                                    <div class="stat-number">245</div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="stat-card green">
                                    <label>Total Supplier</label>
                                    <div class="stat-number">32</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="table-card">
                                    <div class="table-card-title">
                                        <i class="bi bi-clock-history me-2 text-primary"></i>Barang Terbaru
                                    </div>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ban Hankook</td>
                                                <td><span class="badge-stok">12 unit</span></td>
                                            </tr>
                                            <tr>
                                                <td>Oli F1</td>
                                                <td><span class="badge-stok">35 unit</span></td>
                                            </tr>
                                            <tr>
                                                <td>Aki GS Astra</td>
                                                <td><span class="badge-stok">20 unit</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row g-4">

                <div class="col-md-4 animate-fadeup delay-3">
                    <div class="feature-box">
                        <div class="icon-box">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4>Manajemen Barang</h4>
                        <p>Tambah, edit, hapus, dan lihat data barang dengan mudah dan terstruktur.</p>
                    </div>
                </div>

                <div class="col-md-4 animate-fadeup delay-4">
                    <div class="feature-box">
                        <div class="icon-box">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Supplier</h4>
                        <p>Kelola data supplier secara rapi, lengkap, dan mudah diakses kapan saja.</p>
                    </div>
                </div>

                <div class="col-md-4 animate-fadeup delay-5">
                    <div class="feature-box">
                        <div class="icon-box">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4>Laporan</h4>
                        <p>Pantau stok dan transaksi melalui laporan sederhana yang mudah dipahami.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
