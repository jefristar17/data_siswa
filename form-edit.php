<?php
// termasuk file konfurgurasi
include("config.php");

// mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM tb_siswa WHERE id ='$id'");
$siswa = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa | SMK Negeri 4 tanjungpinang</title>
</head>
<body>
    <h3>Edit data siswa</h3>
    <form action="proses-edit.php" method="POST">
<!-- menyimpan ID untuk proses selanjutkan -->
    <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
        <table border="0">
            <tr>
                <td>NIS</td>
                <td>
                <input type="text" name="nis"
                value="<?php echo $siswa['nis']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Nama lengkap</td>
                <td>
                <input type="text" name="namaLengkap"
                value="<?php echo $siswa['namaLengkap']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>
                <select name="jenis_kelamin" style="width: 100%" required>
                    <option value="" disabled>-- Pilih salah satu --</option>
                    <option value="L" <?php echo ($siswa['jenis_kelamin'] == 'L')
                    ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="P" <?php echo ($siswa['jenis_kelamin'] == 'P')
                    ? 'selected' : ''; ?>>Perempuan</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Tempat lahir</td>
                <td>
                <input type="text" name="tempat_lahir"
                value="<?php echo $siswa['tempat_lahir']; ?>">
                </td>
            </tr>
            <tr>
                <td>Tanggal lahir</td>
                <td>
                <input type="DATE" name="tanggal_lahir"
                value="<?php echo $siswa['tanggal_lahir']; ?>" style="width: 100%">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                <textarea name="alamat"><?php echo $siswa['alamat']; ?></textarea>
                </td>
            </tr>
        </table>
    <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>