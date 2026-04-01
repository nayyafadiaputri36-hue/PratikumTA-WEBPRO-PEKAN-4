<?php
include 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// cek email
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah digunakan!";
    exit;
}

// simpan
mysqli_query($conn, "INSERT INTO users (username,email,password)
VALUES ('$username','$email','$password')");

echo "Registrasi berhasil! <a href='index.php'>Login</a>";
?>