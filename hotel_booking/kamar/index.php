<?php
// menghubungkan file config dengan index
include("../koneksi.php");
session_start(); // Mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kamar</title>
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
    <ul>
        <li><a href="../kamar/index.php">Data Kamar</a></li>
        <li><a href="../tamu/index.php">Data Tamu</a></li>
    </ul>

    <h2>Data Kamar</h2>
    <!-- Tampilkan Notifikasi Jika Ada -->
    <?php if (isset($_SESSION['notifikasi'])): ?>
        <p><?php echo $_SESSION['notifikasi']; ?></p>
        <!-- Hapus notifikasi setelah ditampilkan -->
        <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>
    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Status</th>
                <th><a href="tambah_kamar.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM tb_kamar");
        // perulangan while akan terus berjalan (menampilkan data)
        while ($kamar = $query->fetch_assoc()) { // Ganti $siswa menjadi $kamar
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $kamar['tipe'] ?></td>
                <td><?php echo $kamar['harga'] ?></td>
                <td><?php echo $kamar['status'] ?></td>
                <td align="center">
                    <a href="../kamar/edit_kamar.php?kamar_id=<?php echo $kamar['kamar_id'] ?>">Edit</a>
                    <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                       href="../kamar/hapus_kamar.php?kamar_id=<?php echo $kamar['kamar_id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php
        } // Mengakhiri proses perulangan while
        ?>
        </tbody>
    </table>
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>