<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header("Location: ../welcome.html");
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href='../login.html';</script>";
        }
    } else {
        // Jika email tidak ditemukan, alihkan ke halaman register
        echo "<script>alert('Akun belum terdaftar! Silakan daftar terlebih dahulu.'); window.location.href='../register.html';</script>";
    }
}
?>
