<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<?php
include 'koneksi.php';

// Periksa apakah ID mahasiswa diberikan
if (!isset($_GET['id'])) {
    die("ID mahasiswa tidak ditemukan!");
}

$id = $_GET['id'];

// Ambil data mahasiswa berdasarkan ID
$result = $conn->query("SELECT * FROM mahasiswa WHERE id = $id");
$mahasiswa = $result->fetch_assoc();

// Periksa apakah data ditemukan
if (!$mahasiswa) {
    die("Mahasiswa dengan ID $id tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detail Mahasiswa</h1>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <td><?= $mahasiswa['id'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $mahasiswa['nama'] ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td><?= $mahasiswa['jurusan'] ?></td>
            </tr>
            <tr>
                <th>Angkatan</th>
                <td><?= $mahasiswa['angkatan'] ?></td>
            </tr>
            <tr>
                <th>Jenis Mahasiswa</th>
                <td><?= $mahasiswa['jenis_mahasiswa'] ?></td>
            </tr>

            <?php if ($mahasiswa['jenis_mahasiswa'] === 'S1'): ?>
            <tr>
                <th>Program Studi</th>
                <td><?= $mahasiswa['program_studi'] ?></td>
            </tr>
            <tr>
                <th>Jumlah SKS</th>
                <td><?= $mahasiswa['jumlah_sks'] ?></td>
            </tr>
            <?php elseif ($mahasiswa['jenis_mahasiswa'] === 'S2'): ?>
            <tr>
                <th>Topik Tesis</th>
                <td><?= $mahasiswa['topik_tesis'] ?></td>
            </tr>
            <tr>
                <th>Nama Pembimbing</th>
                <td><?= $mahasiswa['nama_pembimbing'] ?></td>
            </tr>
            <?php endif; ?>
        </table>

        <a href="index.php" class="btn btn-primary">Kembali ke Daftar Mahasiswa</a>
    </div>

    <!-- Link Bootstrap JS dan dependensi Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
