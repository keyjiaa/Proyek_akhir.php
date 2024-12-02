<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar</title>
</head>
<body>
    <h3>Tambah Kamar</h3>
    <form action="proses_tambah.php" method="POST">
        <table>
            <tr>
                <td>Tipe</td>
                <td>
                    <select name="tipe" required>
                        <option value="" disabled selected>-- Pilih Tipe Kamar --</option>
                        <option value="Single Room">Single Room</option>
                        <option value="Double Room">Double Room</option>
                        <option value="Deluxe Room">Deluxe Room</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" required>
                </td>
            </tr>
            <tr>
                <td>Status Pemesanan</td>
                <td>
                    <select name="status" required>
                        <option value="" disabled selected>-- Status Pemesanan --</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Sudah dipesan">Sudah dipesan</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>