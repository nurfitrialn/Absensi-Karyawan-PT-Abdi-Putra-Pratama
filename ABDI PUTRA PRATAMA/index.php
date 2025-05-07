<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Absensi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Form Absensi</h2>
<form action="simpan_absen.php" method="post">
  <input type="text" name="nama" placeholder="Nama Lengkap" required>
  <button type="submit" name="absen_masuk">Absen Masuk</button>
  <button type="submit" name="absen_pulang">Absen Pulang</button>
</form>
<a href="logout.php">Logout</a>
</div>
</body>
</html>