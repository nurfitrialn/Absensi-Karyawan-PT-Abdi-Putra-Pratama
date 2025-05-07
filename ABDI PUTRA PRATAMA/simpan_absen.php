<?php
session_start();
include 'koneksi.php';
$user_id = $_SESSION['user_id'];
$nama = $_POST['nama'];
$tanggal = date("Y-m-d");
$waktu = date("Y-m-d H:i:s");

if (isset($_POST['absen_masuk'])) {
    mysqli_query($conn, "INSERT INTO absensi (user_id, nama, waktu_masuk) VALUES ('$user_id', '$nama', '$waktu')");
} elseif (isset($_POST['absen_pulang'])) {
    mysqli_query($conn, "UPDATE absensi SET waktu_pulang='$waktu' WHERE user_id='$user_id' AND DATE(waktu_masuk)='$tanggal'");
}
header("Location: index.php");
?>