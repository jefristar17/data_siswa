<?php

session_start(); // mulai sesi
include("config.php");

// periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // ambil data dari form
    $id = $_POST ['id'];
    $nis = $_POST['nis'];
    $namaLengkap = $_POST['namaLengkap'];
    $jk = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // buat query untuk memperbarui data siswa
    $sql = "UPDATE tb_siswa SET
     nis='$nis',
     namaLengkap='$namaLengkap',
     jenis_kelamin='$jk',
     tempat_lahir='$tempat_lahir',
     tanggal_lahir='$tanggal_lahir',
     alamat='$alamat'
     WHERE id=$id";

    $query = mysqli_query($db, $sql);
    // simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data siswa berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data siswa gagal ditambahkan!";
    }
    // alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>