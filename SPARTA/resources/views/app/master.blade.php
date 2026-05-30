<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .dashboard-hero {
            background: linear-gradient(135deg,
                    #2563eb,
                    #1e3a8a);
            color: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(37, 99, 235, .25);
        }

        .hero-title {
            font-size: 32px;
            font-weight: 800;
        }

        .hero-subtitle {
            color: #dbeafe;
        }

        .role-badge {
            background: rgba(255, 255, 255, .15);
            padding: 8px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-top: 10px;
        }

        .stats-card {
            padding: 25px;
            border-radius: 20px;
            color: white;
            transition: .3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-card i {
            font-size: 28px;
        }

        .stats-card h2 {
            font-size: 40px;
            font-weight: 800;
            margin-top: 10px;
        }

        .primary {
            background: #2563eb;
        }

        .success {
            background: #059669;
        }

        .warning {
            background: #f59e0b;
        }

        .danger {
            background: #dc2626;
        }

        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 22px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .05);
        }

        .activity-list {
            list-style: none;
            padding: 0;
        }

        .activity-list li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .quick-menu {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #1e293b;
            font-weight: 700;
            transition: .3s;
        }

        .quick-menu:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-4px);
        }

        .quick-menu i {
            font-size: 30px;
        }

        .system-badge {
            display: inline-block;
            background: white;
            color: #2563eb;
            font-weight: 800;
            letter-spacing: 2px;
            padding: 8px 18px;
            border-radius: 50px;
        }

        .system-title {
            margin-top: 15px;
            font-size: 40px;
            font-weight: 900;
        }

        .system-subtitle {
            color: #dbeafe;
            font-size: 15px;
        }

        .stats-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .stats-link:hover {
            text-decoration: none;
            color: inherit;
        }

        .stats-card {
            cursor: pointer;
        }

        .stats-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12);
        }

        .list-group-item {
            border: none;
            padding: 12px 18px;
            transition: background-color .25s ease,
                color .25s ease;
        }

        .list-group-item:hover {
            background-color: #f3f4f6;
        }

        .list-group-item.active {
            background-color: #0d6efd;
            color: white;
            font-weight: 600;
        }

        .logout-btn {
            color: #dc3545 !important;
            font-weight: 600;
        }

        .logout-btn:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }

        .top-navbar {
            background: #1f2937;
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
        }

        .brand-title {
            color: #2563eb;
            font-weight: 700;
            font-size: 32px;
        }

        .brand-subtitle {
            color: #9ca3af;
            font-size: 12px;
        }

        .user-info {
            color: white;
            text-align: right;
        }

        .header-brand h2 {
            margin: 0;
            color: #3b82f6;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .header-brand small {
            color: #cbd5e1;
            font-size: 13px;
        }

        .user-panel {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
        }

        .user-detail {
            line-height: 1.2;
        }

        .user-detail .name {
            color: white;
            font-weight: 600;
        }

        .user-detail .role {
            color: #cbd5e1;
            font-size: 12px;
        }

        .logout-btn-top {
            border-radius: 10px;
            padding: 8px 18px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark shadow-sm py-3">
        <div class="container-fluid">
            @include('app.navbar')
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 col-lg-2 bg-light border-end min-vh-100 p-3">
                @section('sidebar')
                    @include('app.sidebar')
                @show
            </aside>

            <main class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function confirmLogout() {
            return confirm(
                'Apakah Anda yakin ingin logout?'
            );
        }
    </script>
    @stack('scripts')

</body>

</html>
