<?php
include 'koneksi.php';
$tanggal = $_GET['tanggal'] ?? date("Y-m-d");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=absensi_$tanggal.xls");

$query = mysqli_query($conn, "SELECT * FROM absensi WHERE DATE(waktu_masuk)='$tanggal'");
echo "<table border='1'>
<tr><th>Nama</th><th>Masuk</th><th>Pulang</th></tr>";
while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>
      <td>{$row['nama']}</td>
      <td>{$row['waktu_masuk']}</td>
      <td>" . ($row['waktu_pulang'] ?: '-') . "</td>
    </tr>";
}
echo "</table>";
?>