<?php
session_start();
include "../koneksi.php";

// Ambil username dan password dari input form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek di tabel user
$sqluser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
$jumlahuser = mysqli_num_rows($sqluser);
$datauser = mysqli_fetch_array($sqluser);


if ($jumlahuser === 1) {
    // Jika ditemukan di tabel user
    
    $_SESSION['status_login'] = true;
    $_SESSION['waktu'] = time();

    // Redirect ke halaman user
    header("location:../admin.php");

}else{
    header("location:login.php?pesan=Gagal");
}
?>
