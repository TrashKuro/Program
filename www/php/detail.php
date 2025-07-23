<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika Data Mahasiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data Mahasiswa dari nim 
    $sql = "SELECT * FROM tb_yunus WHERE nisn = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '
                        <tr>
                            <th width="40%">nisn</th>
                            <td width="60%">' . $row['nisn'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">kelas</th>
                            <td width="60%">' . $row['kelas'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">jurusan</th>
                            <td width="60%">' . $row['jurusan'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">berkelamin</th>
                            <td width="60%">' . $row['berkelamin'] . '</td>
                        </tr>
                         <tr>
                            <th width="40%">presensi</th>
                            <td width="60%">' . $row['presensi'] . '</td>
                        </tr>
                         <tr>
                            <th width="40%">alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
?>
