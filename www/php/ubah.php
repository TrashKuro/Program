<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari nisn dengan fungsi get
$nisn = $_GET['nisn'];

// Mengambil data dari table Mahasiswa dari nisn
$siswa = query("SELECT * FROM tb_yunus WHERE nisn = '$nisn'")[0];

// Jika fungsi ubah jika data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data mahasiswa berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi ubah jika data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data mahasiswa gagal diubah!');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data siswa</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= $siswa['nama']; ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control w-50" id="nisn" placeholder="Masukkan NISN" name="nisn" value="<?= $siswa['nisn']; ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control w-50" id="kelas" placeholder="Masukkan Kelas" name="kelas" value="<?= $siswa['kelas']; ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control w-50" id="jurusan" placeholder="Masukkan Jurusan" name="jurusan" value="<?= $siswa['jurusan']; ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control w-50" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="<?= $siswa['alamat']; ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label for="berkelamin" class="form-label">Berkelamin</label>
                        <input type="text" class="form-control w-50" id="berkelamin" placeholder="Berkelamin apa" name="berkelamin" value="<?= $siswa['berkelamin']; ?>" autocomplete="on" required>
                    </div>
                    <div class="mb-3">
                        <label for="presensi" class="form-label">Presensi</label>
                        <input type="text" class="form-control w-50" id="presensi" placeholder="Masukkan Presensi" name="presensi" value="<?= $siswa['presensi']; ?>" autocomplete="on" required>
                    </div>
                    <hr>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
