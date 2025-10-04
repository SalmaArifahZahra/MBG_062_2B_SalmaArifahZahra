<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Dapur - MBG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MBG Dapur</a>
            <form action="{{ url('/logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 bg-light p-3">
                <h5>Menu Dapur</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="/client/home" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="/client/permintaan" class="nav-link">Buat Permintaan</a></li>
                    <li class="nav-item"><a href="/client/status" class="nav-link">Status Permintaan</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>
</html>
