<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Admin - MBG' }}</title>
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
            background-color: #073b3a;
            color: #e0e0e0;
            padding-top: 10px;
        }


        .sidebar-header {
            font-size: 16px;
            font-weight: 600;
            padding: 20px;
            color: #ffffff;
            justify-content: center;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }


        .sidebar .nav-link {
            color: #b0bec5;
            font-size: 14px;
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
            color: #ffffff;
        }

        .sidebar .nav-link.active {
            background-color: #0d9488;
            color: #fff;
            font-weight: 600;
        }


        .content {
            flex: 1;
            padding: 20px;
            background-color: #00030a;
            margin-left: 250px;
        }

        .header {
            background-color: #006A67;
            color: #FDF5AA;
            padding: 15px 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
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
        <h4>Sistem Pemantauan MBG</h4>
        <div>
            <span>{{ Auth::user()->full_name }}</span>
            <button id="btnLogout" class="btn btn-outline-light btn-logout ms-3">Logout</button>
        </div>
    </div>

    <div class="d-flex">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h5 class="m-0">Makan Bergizi</h5>
            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item mb-1">
                    <a href="/admin/home" class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin/bahan" class="nav-link {{ request()->is('admin/bahan') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Kelola Bahan Baku</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin/permintaan"
                        class="nav-link {{ request()->is('admin/permintaan') ? 'active' : '' }}">
                        <i class="bi bi-card-checklist"></i>
                        <span>Proses Permintaan</span>
                    </a>
                </li>
            </ul>
        </div>


        <div class="container-fluid">
            @if (request()->is('admin/home'))
                <div class="row g-3 mb-4 mt-4">
                    <div class="col-md-4">
                        <div class="card card-dashboard p-3">
                            <h5>Total Bahan Baku</h5>
                            <h2>{{ $totalBahan }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dashboard p-3 bg-success text-white">
                            <h5>Permintaan Masuk</h5>
                            <h2>{{ $permintaanProses }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dashboard p-3 bg-warning text-dark">
                            <h5>Proses</h5>
                            <h2>{{ $permintaanProses }}</h2>
                        </div>
                    </div>
                </div>
            @endif

            <div>
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
