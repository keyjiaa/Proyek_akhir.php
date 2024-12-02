<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Mengambil ID siswa dari parameter URL 
$tamu_id = $_GET['tamu_id']; 

    // Mengambil data siswa dari database berdasarkan ID
    $query = $db->query("SELECT * FROM tb_tamu WHERE tamu_id = '$tamu_id'");
    $tamu = $query->fetch_assoc();
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Tamu</title>
</head>
<body>
    <h3>Edit Data Tamu</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="tamu_id" value="<?php echo $tamu['tamu_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama" 
                    value="<?php echo $tamu['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" 
                    value="<?php echo $tamu['email']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Kontak</td>
                <td>
                    <input type="text" name="kontak" 
                    value="<?php echo $tamu['kontak']; ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>