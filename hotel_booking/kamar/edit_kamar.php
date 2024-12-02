<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Mengambil ID siswa dari parameter URL 
$kamar_id = $_GET['kamar_id']; 

 // Mengquery->fetch_assoc();

$query = $db->query("SELECT * FROM tb_kamar WHERE kamar_id = '$kamar_id'");
$kamar = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kamar</title>
</head>
<body>
    <h3>Edit Data Kamar</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="kamar_id" value="<?php echo $kamar['kamar_id']; ?>">
        <table border="0">
            <tr>
                <td>Tipe</td>
                <td>
                <select name="tipe" required>
                        <option value="" disabled>-- Pilih Tipe Kamar --</option>
                        <option value="Single Room" <?php echo ($kamar['tipe'] == 'Single Room') 
                        ? 'selected' : ''; ?>>Single Room</option>
                        <option value="Double Room" <?php echo ($kamar['tipe'] == 'Double Room') 
                        ? 'selected' : ''; ?>>Double Room</option>
                        <option value="Deluxe Room" <?php echo ($kamar['tipe'] == 'Deluxe Room') 
                        ? 'selected' : ''; ?>>Deluxe Room</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" 
                    value="<?php echo $kamar['harga']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Status Pemesanan</td>
                <td>
                    <select name="status" required>
                        <option value="status" disabled>-- Status Pemesanan --</option>
                        <option value="Tersedia" <?php echo ($kamar['status'] == 'Tersedia') 
                        ? 'selected' : ''; ?>>Tersedia</option>
                        <option value="Sudah dipesan" <?php echo ($kamar['status'] == 'Sudah dipesan') 
                        ? 'selected' : ''; ?>>Sudah dipesan</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>