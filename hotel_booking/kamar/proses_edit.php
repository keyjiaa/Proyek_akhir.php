<?php
session_start(); // Mulai sesi
include("../koneksi.php"); // Pastikan file koneksi.php benar

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $kamar_id = $_POST['kamar_id'];

    // Buat query untuk memperbarui data kamar berdasarkan ID
    $sql = "UPDATE tb_kamar SET
            tipe = '$tipe',
            harga = '$harga',
            status = '$status'
            WHERE kamar_id = $kamar_id";
    // Eksekusi query
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data kamar berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data kamar gagal diperbarui!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>