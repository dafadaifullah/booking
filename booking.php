<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $layanan = $_POST['layanan'];
    $berat = $_POST['berat'];

    $q = mysqli_query($conn, "SELECT harga FROM dafa_layanan WHERE id_layanan='$layanan'");
    $d = mysqli_fetch_assoc($q);
    $total = $d['harga'] * $berat;

    mysqli_query($conn, "INSERT INTO dafa_transaksi (nama_pelanggan, no_hp, id_layanan, berat, total_harga) 
                         VALUES ('$nama', '$hp', '$layanan', '$berat', '$total')");

    echo "<script>alert('Berhasil memesan laundry');window.location='booking.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Booking Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Form Pemesanan Laundry</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Layanan</label>
            <select name="layanan" class="form-control" required>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM dafa_layanan");
                while ($d = mysqli_fetch_assoc($q)) {
                    echo "<option value='{$d['id_layanan']}'>{$d['nama_layanan']} - Rp{$d['harga']}/kg</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Berat Cucian (kg)</label>
            <input type="number" name="berat" class="form-control" step="0.1" required>
        </div>
        <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
</div>
</body>
</html>