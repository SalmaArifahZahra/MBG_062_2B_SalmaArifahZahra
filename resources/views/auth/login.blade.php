<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login MBG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-card {
            display: flex;
            width: 800px;
            max-width: 90%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Left side */
        .login-left {
            flex: 1;
            background: #006A67;
            color: white;
            padding: 50px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .login-left h2 {
            font-weight: 700;
        }

        .login-left p {
            margin: 20px 0;
        }

        .login-left button {
            background: none;
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
            width: fit-content;
            transition: 0.3s;
        }

        .login-left button:hover {
            background: white;
            color: #0d9488;
        }

        .login-right {
            flex: 1;
            background: white;
            padding: 50px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right h3 {
            margin-bottom: 30px;
            color: #154D71;
            text-align: center;
        }

        .form-control {
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
        }

        .btn-login {
            background-color: #0d9488;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #FDF5AA;
        }

        @media(max-width: 768px) {
            .login-card {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-left">
                <h2>Welcome to MBG</h2>
                <p>
                    Sistem MBG membantu memantau dan mengelola bahan baku agar tetap aman dan tidak kadaluarsa.
                </p>

            </div>

            <div class="login-right">
                <h3>Sign In</h3>
                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <input type="text" name="email" class="form-control" placeholder="Enter Email"
                        value="{{ old('email') }}" required>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    <button type="submit" class="btn btn-login w-100">Login</button>
                </form>
                <p class="text-center mt-3 text-muted">Belum punya akun? <a href="/register">Sign Up</a></p>
            </div>
        </div>
    </div>

</body>

</html>
