<?php
// menghubungkan file config dengan index
include("../koneksi.php");
session_start(); // Mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Tamu</title>
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

    <h2>Data Tamu</h2>
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
                <th>Nama Siswa</th>
                <th>Email</th>
                <th>Kontak</th>
                <th><a href="tambah_tamu.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variable untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM tb_tamu");
        // perulangan while akan terus berjalan (menampilkan data)
        // selama kondisi $query bernilai true (adanya data pada table tb_siswa)
        while ($tamu = $query->fetch_assoc()) {
            /* fungsi fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array */
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $tamu['nama'] ?></td>
                <td><?php echo $tamu['email'] ?></td>
                <td><?php echo $tamu['kontak'] ?></td>
                <td align="center">
                    <!-- URL ke halaman edit data dengan menggunakan
                         parameter id pada kolom table -->
                    <a href="../tamu/edit_tamu.php?tamu_id=<?php echo $tamu['tamu_id'] ?>">Edit</a>
                    <!-- URL untuk menghapus data dengan menggunakan parameter id
                         pada kolom table dan alert konfirmasi hapus data -->
                    <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                       href="../tamu/hapus_tamu.php?tamu_id=<?php echo $tamu['tamu_id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php
    } // Mengakhiri proses perulangan while yang dimulai pada baris 48 
    ?>
    </tbody>
</table>
    <!-- Menghitung jumlah baris yang ada pada table (calon_siswa) -->
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>