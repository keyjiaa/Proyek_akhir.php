<?php
session_start(); // Mulai sesi
include("../koneksi.php"); // Pastikan file koneksi.php benar

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kontak = $_POST['kontak'];

    $sql = "INSERT INTO tb_tamu (nama, email, kontak) VALUES ('$nama','$email','$kontak')";

    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data tamu berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data tamu gagal ditambahkan!";
    }

    header('Location: index.php');
} else {

    die("Akses ditolak...");
}
?>
    