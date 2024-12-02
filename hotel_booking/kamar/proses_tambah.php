<?php
session_start(); // Mulai sesi
include("../koneksi.php"); // Pastikan file koneksi.php benar

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {

    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tb_kamar (tipe, harga, status) VALUES ('$tipe','$harga','$status')";

    $query = mysqli_query($db, $sql);
    
    if ($query) {
        $_SESSION['notifikasi'] = "Data kamar berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data kamar gagal ditambahkan!";
    }
    

    header('Location: index.php');
} else {

    die("Akses ditolak...");
}
?>
    