<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table mahasiswa berdasarkan nim secara Descending
$siswa = query("SELECT * FROM tb_yunus");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS untuk Dark Mode -->
    <style>
    body {
        background-color: #36393F; /* Warna latar belakang gelap */
        color: rgb(255, 255, 255); /* Warna teks putih */
    }
    .table { /* Mengatur gaya untuk tabel, header, dan sel tabel */
        background-color: rgb(255, 255, 255); /* Warna latar belakang menjadi putih */
        color: #000000; /* Warna teks menjadi hitam */
        border: 1px solid #000;
        border-collapse: collapse;
    }
    .table th, .table td {
    border: 1px solid #000; /* Menggunakan border yang sama dengan tabel */
    padding: 8px; /* Menambahkan padding untuk sel */
    }
    .btn-primary {
        background-color: #007bff; /* Warna tombol utama */
        border-color: #007bff; /* Border tombol utama */
    }
    </style>
</head>
<body>
    <div>
        <!-- 1 -->
        <div class="container">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Data Siswa</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="addData.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
            </div>
        </div>
        <!-- 2 -->
        <div class="row my-3">
            <div class="col-md">
                <table  class="table" id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead  >
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nisn</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>Presensi</th>
                            <th>Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <!-- menampilkan data ke tabel -->
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nisn']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['jurusan']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['berkelamin']; ?></td>
                                <td><?= $row['presensi']; ?></td>
                                
                                
                                <td>
                                    <!-- button detail -->
                                    <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['nisn']; ?>" 
                                    style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</button> |

                                    <!-- button ubah -->
                                    <a href="ubah.php?nisn=<?= $row['nisn']; ?>" class="btn btn-warning btn-sm" 
                                    style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                    <!-- button hapus -->
                                    <a href="hapus.php?nisn=<?= $row['nisn']; ?>" class="btn btn-danger btn-sm" 
                                    style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail Data -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase" id="detail" style="color: black" >Detail Data siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-siswa">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fungsi Table
            $('#data').DataTable();
            // Fungsi Table

            // Fungsi Detail
            $(document).on('click', '.detail', function () {
                var dataSiswa = $(this).attr("data-id");
                $.ajax({
                    url: "detail.php",
                    method: "post",
                    data: {
                        dataSiswa: dataSiswa
                    },
                    success: function(data) {
                        $('#detail-siswa').html(data);
                        $('#detail').modal("show");
                    }
                });
            });
            // Fungsi Detail
        });
    </script>
</body>
</html>