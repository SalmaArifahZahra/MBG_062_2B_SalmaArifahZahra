<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login MBG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html { height:100%; }
        .container { height:100%; display:flex; align-items:center; justify-content:center; }
        .card { background-color:#0BA6DF; padding:20px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.15); }
    </style>
</head>
<body>
<div class="container">
    <div class="col-md-4">
        <div class="card">
            <h3 class="text-center mb-4 fs-1 text-white">Login</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email</label>
                    <input autocomplete="off" autofocus type="text"
                           name="email" id="email"
                           class="form-control" placeholder="Masukkan email"
                           value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" name="password" id="password"
                           class="form-control" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-block text-white w-100" style="background-color:#154D71;">
                    Login
                </button>

                <p class="text-center mt-3 text-white">
                    Belum punya akun? <a href="/register" class="text-warning">Register di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
