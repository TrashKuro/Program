<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari nis dengan fungsi get
$nisn = $_GET['nisn'];

// Jika fungsi hapus jika data terhapus, maka munculkan alert dibawah
if (hapus($nisn) > 0) {
    echo "<script>
                alert('Data Mahasiswa berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
} else {
    // Jika fungsi hapus jika data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data mahasiswa gagal dihapus!');
        </script>";
}
?>