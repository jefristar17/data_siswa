<?php
session_start(); // mulai sesi
include("config.php");

// periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    // ambil ID dari URL
    $id = $_GET['id'];
    // buat query untuk menghapus data siswa berdasarkan ID
    $sql = "DELETE FROM tb_siswa WHERE id =$id";
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
    die("akses ditolak...");
}
?>