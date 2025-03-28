<?php
include 'db.php'; // Pastikan file ini menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "Registrasi berhasil!";
        header("Location: ../login.html"); // Arahkan ke login setelah sukses
        exit();
    } else {
        echo "Gagal mendaftar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
