<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Dapur - MBG' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            width: 240px;
            background-color: #F3F3E0;
            color: #e0e0e0;
            padding-top: 10px;
        }

        .sidebar-header {
            font-size: 16px;
            font-weight: 700;
            padding: 20px;
            color: #1B3C53;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link {
            color: #1B3C53;
            font-size: 16px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 10px;
            transition: background 0.2s, color 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #DDA853;
        }

        .sidebar .nav-link.active {
            background-color: #1B3C53;
            color: #fff;
            font-weight: 600;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8fafc;
            min-height: 100vh;
            width: 100%;
        }

        .header {
            background-color: #1B3C53;
            color: #ffffff;
            padding: 15px 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h4 {
            margin: 0;
        }

        .card-dashboard {
            transition: transform 0.2s;
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-logout:hover {
            background-color: #d20000;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <div class="header">
        <h4>Sistem Dapur MBG</h4>
        <div>
            <button id="btnLogout" class="btn btn-outline-light btn-logout ms-3">Logout</button>
        </div>
    </div>

    <div class="d-flex">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h5 class="m-0">Menu Dapur</h5>
            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item mb-1">
                    <a href="/client/home" class="nav-link {{ request()->is('client/home') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/client/permintaan"
                        class="nav-link {{ request()->is('client/permintaan') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle"></i>
                        <span>Data Permintaan</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/client/status" class="nav-link {{ request()->is('client/status') ? 'active' : '' }}">
                        <i class="bi bi-check2-circle"></i>
                        <span>Status Permintaan</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="container-fluid">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('btnLogout').addEventListener('click', function() {
            Swal.fire({
                title: 'Logout?',
                text: "Apakah Anda yakin ingin keluar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formLogout').submit();
                }
            });
        });
    </script>

    <form id="formLogout" action="/logout" method="POST" class="d-none">
        @csrf
    </form>
</body>

</html>
```
