<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM dafa_admin WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("Location: admin.php");
} else {
    echo "<script>alert('Login gagal!'); window.location='login.php';</script>";
}
?>