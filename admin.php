<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php" class="btn btn-danger btn-sm float-end">Logout</a>
    <h4 class="mt-4">Data Transaksi Laundry</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>HP</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT t.*, l.nama_layanan FROM dafa_transaksi t JOIN dafa_layanan l ON t.id_layanan = l.id_layanan");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_pelanggan']}</td>
                    <td>{$row['no_hp']}</td>
                    <td>{$row['nama_layanan']}</td>
                    <td>{$row['berat']}</td>
                    <td>{$row['total_harga']}</td>
                    <td>{$row['tanggal']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>