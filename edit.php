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

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];
    $jenis_mahasiswa = $_POST['jenis_mahasiswa'];
    $program_studi = $_POST['program_studi'] ?? null;
    $jumlah_sks = $_POST['jumlah_sks'] ?? null;
    $topik_tesis = $_POST['topik_tesis'] ?? null;
    $nama_pembimbing = $_POST['nama_pembimbing'] ?? null;

    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                jurusan = '$jurusan',
                angkatan = '$angkatan',
                jenis_mahasiswa = '$jenis_mahasiswa',
                program_studi = '$program_studi',
                jumlah_sks = '$jumlah_sks',
                topik_tesis = '$topik_tesis',
                nama_pembimbing = '$nama_pembimbing'
              WHERE id = $id";

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
    <title>Edit Mahasiswa</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Mahasiswa</h1>

        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mahasiswa['jurusan'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" value="<?= $mahasiswa['angkatan'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="jenis_mahasiswa" class="form-label">Jenis Mahasiswa</label>
                <select class="form-select" name="jenis_mahasiswa" id="jenis_mahasiswa" onchange="toggleFields()" required>
                    <option value="S1" <?= $mahasiswa['jenis_mahasiswa'] === 'S1' ? 'selected' : '' ?>>S1</option>
                    <option value="S2" <?= $mahasiswa['jenis_mahasiswa'] === 'S2' ? 'selected' : '' ?>>S2</option>
                </select>
            </div>

            <div id="s1_fields" style="<?= $mahasiswa['jenis_mahasiswa'] === 'S1' ? 'block' : 'none' ?>">
                <div class="mb-3">
                    <label for="program_studi" class="form-label">Program Studi</label>
                    <input type="text" class="form-control" name="program_studi" value="<?= $mahasiswa['program_studi'] ?>">
                </div>

                <div class="mb-3">
                    <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                    <input type="number" class="form-control" name="jumlah_sks" value="<?= $mahasiswa['jumlah_sks'] ?>">
                </div>
            </div>

            <div id="s2_fields" style="<?= $mahasiswa['jenis_mahasiswa'] === 'S2' ? 'block' : 'none' ?>">
                <div class="mb-3">
                    <label for="topik_tesis" class="form-label">Topik Tesis</label>
                    <input type="text" class="form-control" name="topik_tesis" value="<?= $mahasiswa['topik_tesis'] ?>">
                </div>

                <div class="mb-3">
                    <label for="nama_pembimbing" class="form-label">Nama Pembimbing</label>
                    <input type="text" class="form-control" name="nama_pembimbing" value="<?= $mahasiswa['nama_pembimbing'] ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Link Bootstrap JS dan dependensi Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function toggleFields() {
            const jenis = document.getElementById('jenis_mahasiswa').value;
            document.getElementById('s1_fields').style.display = (jenis === 'S1') ? 'block' : 'none';
            document.getElementById('s2_fields').style.display = (jenis === 'S2') ? 'block' : 'none';
        }
    </script>
</body>
</html>
