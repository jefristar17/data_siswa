<?php
    // menghubungkan file config dengan index 
    include("config.php"); 
    session_start(); // mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa | SMK Negeri 4 tanjungpinang</title>
    <style>
        /* membuat styling pada table */
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>data siswa</h2>
    <!-- tampilkan notifikasi jika ada -->
     <?php if (isset($_SESSION['notifikasi'])): ?>
     <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- Hapus notifikasi setelah ditampilkan -->
     <?php unset($_SESSION['notifikasi']); ?>
     <?php endif; ?>
<table>
    <thead>
        <tr align="center">
            <th>#</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>L/P</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th><a href="form-tambah.php" class="btn btn-primary">Tambah Data</a></th>
        </tr>
     </thead>
     <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variebel untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM tb_siswa");
        /* perulangan while akan terus berjalan (adanya data pada table tb_siswa) */
        while ($siswa = $query->fetch_assoc()) {
        /* fungsi fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array */
        ?> <!-- kode PHP ditutup untuk menyisipkan kode HTML yang akan di looping menggunakan while loop -->
       <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $siswa['nis'] ?></td>
            <td><?php echo $siswa['namaLengkap'] ?></td>
            <td><?php echo $siswa['jenis_kelamin'] ?></td>
            <td><?php echo $siswa['tempat_lahir'] ?></td>
            <td><?php echo $siswa['tanggal_lahir'] ?></td>
            <td><?php echo $siswa['alamat'] ?></td>
            <td align="center">
        <!-- URL ke halaman edite data dengan menggunakan parameter
         id pada kolom table -->
         <a href="form-edit.php?id=<?php echo $siswa['id'] ?>">Edit</a>
        <!-- URL untuk menghapus data dengan menggunakan parameter id 
         pada kolom table dan alert cofirmasi hapus data -->
         <a onclick="return confirm('Anda yakin ingin menghapus data?')"
         href="hapus.php?id=<?php echo $siswa['id'] ?>">Hapus</a>
         </td>
       </tr>
        <?php
        } /* mengakhiri proses perulangan while yang dimulai pada baris 48 */
        ?>
     </tbody>
</table>
<!-- menghitung jumlah baris yang ada pada table (calon_siswa) -->
 <P>Total: <?php echo mysqli_num_rows($query) ?></P>
</body>
</html>