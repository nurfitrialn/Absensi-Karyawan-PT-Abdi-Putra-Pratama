<?php
session_start();
include 'koneksi.php';
$user = $_POST['username'];
$pass = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
$data = mysqli_fetch_assoc($query);
if ($data) {
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['role'] = $data['role'];
    header("Location: index.php");
} else {
    echo "Login gagal.";
}
?>