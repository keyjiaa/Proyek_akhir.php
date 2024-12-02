<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['kamar_id'])) {
    // Ambil ID dari URL dan filter untuk keamanan
    $kamar_id = $_GET['kamar_id']; // Pastikan ID adalah integer

    // Ganti 'id' dengan nama kolom utama yang benar, misalnya 'kamar_id'
    $sql = "DELETE FROM tb_kamar WHERE kamar_id = $kamar_id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data kamar berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data kamar gagal dihapus: " . mysqli_error($db);
    }

    // Alihkan ke halaman index_kamar.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak..");
}
?>