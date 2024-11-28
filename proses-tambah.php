<?php

session_start(); // mulai sesi
// menghubungkan file ini dengan file konfigurasi database
include("config.php");

//mengecek apakah tombol 'simpan' telah di tekan
if(isset($_POST['simpan'])) {
 /* mengambil nilai dari form input
 dan menyimpannya ke dalam variebel */
 $nis = $_POST['nis'];
 $namaLengkap = $_POST['namaLengkap'];
 $jk = $_POST['jenis_kelamin'];
 $tempat_lahir = $_POST['tempat_lahir'];
 $tanggal_lahir = $_POST['tanggal_lahir'];
 $alamat = $_POST['alamat'];

 /* menyusun query SQL untuk menambahkan data 
 ke tebal 'tb_siswa' */
 $sql = "INSERT INTO tb_siswa
        (nis, namaLengkap, jenis_kelamin,
        tempat_lahir, tanggal_lahir, alamat)
        VALUES ('$nis','$namaLengkap','$jk',
        '$tempat_lahir','$tanggal_lahir','$alamat')";

// menjalankan query dan menyimpan hasilnya dalam variebel $query
$query = mysqli_query($db, $sql);

// simpan pesan di sesi
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