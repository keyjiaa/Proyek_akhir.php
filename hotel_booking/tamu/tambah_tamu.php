<!DOCTYPE html>
<html>
<head>
    <title>Data Tamu</title>
</head>
<body>
    <h3>Tambah Data Tamu</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
             <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
            </tr>
            <tr>
            <td>Kontak</td>
            <td><textarea name="kontak"></textarea></td>
        </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
     </form>
</body>
</html>