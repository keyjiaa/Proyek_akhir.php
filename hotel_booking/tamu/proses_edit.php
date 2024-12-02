<?php

session_start(); // Mulai sesi
include("../koneksi.php"); // Pastikan file config.php benar

// Periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $tamu_id = $_POST['tamu_id'];
    
    // Buat query untuk memperbarui data siswa
    $sql = "UPDATE tb_tamu SET
            nama='$nama', 
            kontak='$kontak', 
            email='$email'
            WHERE tamu_id=$tamu_id";

            $query = mysqli_query($db, $sql);
            // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
            if ($query) {
                $_SESSION['notifikasi'] = "Data tamu berhasil diperbarui!";
            } else {
                $_SESSION['notifikasi'] = "Data tamu gagal diperbarui!";
            }
            // Alihkan ke halaman index.php
            header('Location: index.php');
        } else {
            // Jika akses langsung tanpa form, tampilkan pesan error
            die("Akses ditolak...");
        }
        ?>