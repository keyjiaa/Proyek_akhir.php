<?php
$server = "localhost";
$user = "root";  // Ganti dengan username database Anda
$password = "";      // Ganti dengan password database Anda
$nama_database = "hotel_booking";

// Membuat koneksi
$db = mysqli_connect($server, $user, $password, $nama_database);

// Mengecek koneksi
if (!$db) {
    die("Gagal terhubung dengan database: " .mysqli_connect_error());
}
?>
