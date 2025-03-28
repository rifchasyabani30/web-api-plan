<?php
$host = "localhost"; // Ganti dengan host server jika tidak di lokal
$user = "root"; // Username default XAMPP
$pass = ""; // Kosongkan jika tidak ada password
$dbname = "login_db"; // Nama database kamu

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
