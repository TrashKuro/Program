<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_opm");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query. " ORDER BY nisn ASC");

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nisn = htmlspecialchars($data['nisn']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars ($data['alamat']);
    $berkelamin = htmlspecialchars ($data['berkelamin']);
    $presensi = htmlspecialchars ($data['presensi']);


    $sql = "INSERT INTO tb_yunus(nisn, nama, kelas, jurusan, alamat, berkelamin, presensi ) 
            VALUES ('$nisn','$nama','$kelas','$jurusan','$alamat','$berkelamin','$presensi')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nisn)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM tb_yunus WHERE nisn = $nisn");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nisn = htmlspecialchars($data['nisn']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars ($data['alamat']);
    $berkelamin = htmlspecialchars ($data['berkelamin']);
    $presensi = htmlspecialchars ($data['presensi']);

    $sql = "UPDATE tb_yunus SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', alamat = '$alamat', berkelamin = '$berkelamin', presensi = '$presensi' 
            WHERE nisn = $nisn";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

