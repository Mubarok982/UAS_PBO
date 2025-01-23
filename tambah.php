<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];
    $jenis_mahasiswa = $_POST['jenis_mahasiswa'];
    $program_studi = $_POST['program_studi'] ?? null;
    $jumlah_sks = $_POST['jumlah_sks'] ?? null;
    $topik_tesis = $_POST['topik_tesis'] ?? null;
    $nama_pembimbing = $_POST['nama_pembimbing'] ?? null;

    $query = "INSERT INTO mahasiswa (nama, jurusan, angkatan, jenis_mahasiswa, program_studi, jumlah_sks, topik_tesis, nama_pembimbing)
              VALUES ('$nama', '$jurusan', '$angkatan', '$jenis_mahasiswa', '$program_studi', '$jumlah_sks', '$topik_tesis', '$nama_pembimbing')";

    if ($conn->query($query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Mahasiswa</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan:</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" required>
            </div>

            <div class="mb-3">
                <label for="jenis_mahasiswa" class="form-label">Jenis Mahasiswa:</label>
                <select name="jenis_mahasiswa" id="jenis_mahasiswa" class="form-select" onchange="toggleFields()">
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
            </div>

            <!-- S1 Fields -->
            <div id="s1_fields" class="mb-3">
                <label for="program_studi" class="form-label">Program Studi:</label>
                <input type="text" class="form-control" name="program_studi">
            </div>

            <div id="s1_fields2" class="mb-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS:</label>
                <input type="number" class="form-control" name="jumlah_sks">
            </div>

            <!-- S2 Fields -->
            <div id="s2_fields" style="display:none;" class="mb-3">
                <label for="topik_tesis" class="form-label">Topik Tesis:</label>
                <input type="text" class="form-control" name="topik_tesis">
            </div>

            <div id="s2_fields2" style="display:none;" class="mb-3">
                <label for="nama_pembimbing" class="form-label">Nama Pembimbing:</label>
                <input type="text" class="form-control" name="nama_pembimbing">
            </div>

            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
    </div>

    <!-- Link Bootstrap JS dan dependensi Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function toggleFields() {
            const jenis = document.getElementById('jenis_mahasiswa').value;

            // Menampilkan dan menyembunyikan field berdasarkan jenis mahasiswa
            document.getElementById('s1_fields').style.display = (jenis === 'S1') ? 'block' : 'none';
            document.getElementById('s1_fields2').style.display = (jenis === 'S1') ? 'block' : 'none';

            document.getElementById('s2_fields').style.display = (jenis === 'S2') ? 'block' : 'none';
            document.getElementById('s2_fields2').style.display = (jenis === 'S2') ? 'block' : 'none';
        }
    </script>
</body>
</html>
