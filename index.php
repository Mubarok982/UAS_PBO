<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<?php
include 'koneksi.php';

// Ambil data dari database
$result = $conn->query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .action-btn {
            margin-right: 10px;
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .btn-custom {
            background-color: #1877f2;
            color: white;
        }

        .btn-custom:hover {
            background-color: #166fe5;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Mahasiswa</h1>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
    <a href="tambah.php" class="btn btn-custom mb-3">Tambah Mahasiswa</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Jenis Mahasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; // inisialisasi nomer urut
            while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td><?= $row['angkatan'] ?></td>
                <td><?= $row['jenis_mahasiswa'] ?></td>
                <td>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm action-btn">Detail</a>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm action-btn">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm action-btn" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Link Bootstrap JS dan dependensi Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
