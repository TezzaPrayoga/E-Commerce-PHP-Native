<?php
session_start();
include("kon.php");

if (!isset($_SESSION['id_login'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Hapus data dari database
    $query = "DELETE FROM foto WHERE id = $id";
    if ($kon->query($query) === TRUE) {
        header("Location:album.php");
    } else {
        echo "Error: " . $query . "<br>" . $kon->error;
    }
}


$kon->close();
?>
