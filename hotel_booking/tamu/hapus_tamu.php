<?php
session_start(); //Mulai sesi
include("../koneksi.php");

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['tamu_id'])) {
    // Ambil ID dari URL
    $tamu_id = $_GET['tamu_id'];

    // Buat query untuk menghapus data siswa berdasarkan ID
    $sql = "DELETE FROM tb_tamu WHERE tamu_id = $tamu_id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data tamu berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data tamu gagal dihapus!";
    }
    
    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak...");
}
?>