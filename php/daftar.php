<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "Users_db";

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form (POST)
$nama       = $_POST['nama_lengkap'];
$email      = $_POST['email'];
$password   = $_POST['password'];

// Hash password agar aman
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Query insert
$sql = "INSERT INTO users (nama_lengkap, email, password)
        VALUES ('$nama', '$email', '$password_hash')";

if (mysqli_query($conn, $sql)) {
    echo "Registrasi berhasil!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
