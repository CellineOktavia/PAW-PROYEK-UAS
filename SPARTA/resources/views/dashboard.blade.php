<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SPARTA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f4f7ff;">

    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                SPARTA
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="fw-bold">Dashboard</h2>

        <p class="text-muted">
            Selamat datang, <b>{{ Auth::user()->name }}</b>
            sebagai <b>{{ Auth::user()->role }}</b>.
        </p>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="text-muted">Manajemen Barang</h6>
                        <h3 class="fw-bold text-primary">Produk</h3>
                        <p class="text-muted">Kelola data barang dan stok.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="text-muted">Supplier</h6>
                        <h3 class="fw-bold text-success">Supplier</h3>
                        <p class="text-muted">Kelola data supplier.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="text-muted">Stok</h6>
                        <h3 class="fw-bold text-warning">Mutasi</h3>
                        <p class="text-muted">Pantau keluar masuk stok.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
