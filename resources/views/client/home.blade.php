<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Dapur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Selamat Datang, Petugas Dapur</h1>
    <p>Anda berhasil login sebagai <b>Client Dapur</b>.</p>

    <a href="{{ url('/client/permintaan') }}" class="btn btn-primary">Buat Permintaan Bahan</a>
    <form action="{{ url('/logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>
