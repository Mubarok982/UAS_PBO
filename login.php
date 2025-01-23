<?php
session_start();
include 'koneksi.php';

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa kredensial di database
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Style for Facebook-like Login */
        body {
            background-color: #f0f2f5;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            font-size: 28px;
            font-weight: bold;
            color: #1877f2;
            text-align: center;
        }

        .login-btn {
            background-color: #1877f2;
            border-color: #1877f2;
            color: #fff;
        }

        .login-btn:hover {
            background-color: #166fe5;
            border-color: #166fe5;
        }

        .form-label {
            font-weight: bold;
        }

        .alert-danger {
            font-weight: bold;
            text-align: center;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
        }

        .footer a {
            text-decoration: none;
            color: #1877f2;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="login-container">
            <h1>Login</h1>

            <!-- Menampilkan pesan error jika ada -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn login-btn w-100">Login</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Belum punya akun? <a href="#">Daftar sekarang</a></p>
    </div>

    <!-- Link Bootstrap JS dan dependensi Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
