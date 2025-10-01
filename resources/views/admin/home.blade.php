<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Selamat Datang, Petugas Gudang</h1>
    <p>Anda berhasil login sebagai <b>Admin Gudang</b>.</p>

    <a href="{{ url('/gudang/bahan') }}" class="btn btn-primary">Kelola Bahan Baku</a>

    <form action="{{ url('/logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>

