<?php
session_start();
include('kon.php');

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_login'])) {
    header("Location: index.php");
    exit();
}

// Ambil nama pengguna dari database
$user_id = $_SESSION['id_login'];
$query = "SELECT username FROM login WHERE id_login = $user_id";
$result = $kon->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_pengguna = $row['username'];
} else {
    $nama_pengguna = "Pengguna";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Beranda</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo $nama_pengguna; ?>!</h1>
    <p>Ini adalah tampilan beranda sederhana menggunakan PHP dan MySQL.</p>

    <a href="logout.php">Logout</a>
</body>
</html>
