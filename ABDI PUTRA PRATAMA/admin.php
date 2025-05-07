<?php
session_start();
include 'koneksi.php';
if ($_SESSION['role'] !== 'admin') die("Akses ditolak.");
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date("Y-m-d");
$query = mysqli_query($conn, "SELECT * FROM absensi WHERE DATE(waktu_masuk)='$tanggal'");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Absensi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Data Absensi - <?= $tanggal ?></h2>
<form method="get">
  <input type="date" name="tanggal" value="<?= $tanggal ?>">
  <button type="submit">Filter</button>
</form>
<table>
<tr><th>Nama</th><th>Masuk</th><th>Pulang</th></tr>
<?php while ($row = mysqli_fetch_assoc($query)) { ?>
<tr>
  <td><?= $row['nama'] ?></td>
  <td><?= $row['waktu_masuk'] ?></td>
  <td><?= $row['waktu_pulang'] ?: '-' ?></td>
</tr>
<?php } ?>
</table>
<br>
<a href="export_excel.php?tanggal=<?= $tanggal ?>">Export ke Excel</a>
<br><br><a href="logout.php">Logout</a>
</div>
</body>
</html>