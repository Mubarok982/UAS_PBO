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

// Query untuk menghapus mahasiswa berdasarkan ID
$query = "DELETE FROM mahasiswa WHERE id = $id";

if ($conn->query($query)) {
    // Jika berhasil, redirect ke halaman utama
    header('Location: index.php');
} else {
    echo "Gagal menghapus data: " . $conn->error;
}
?>
