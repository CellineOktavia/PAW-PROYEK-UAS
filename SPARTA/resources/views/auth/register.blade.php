<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <h2 class="mb-4 text-center">
                        Registrasi
                    </h2>

                    <form action="/register" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label>Nama</label>

                            <input type="text"
                                   name="name"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control">
                        </div>

                        <button class="btn btn-primary w-100">
                            Daftar
                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="/login">
                            Sudah punya akun?
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
