<?php
session_start();
include("kon.php");

if (!isset($_SESSION['id_login'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna dari database
$user_id = $_SESSION['id_login'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah ada file yang diunggah
    if (!empty($_FILES["fileToUpload"]["name"][0])) {
        $target_dir = "foto/";

        // Loop melalui setiap file yang diunggah
        for ($i = 0; $i < count($_FILES["fileToUpload"]["name"]); $i++) {
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);

            // // Memeriksa jenis file yang diizinkan
            // $allowed_extensions = array('jpg', 'jpeg', 'png', 'bmp', 'gif', 'tiff', 'heif', 'raw', 'svg', 'psd');
            // $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // if (!in_array($file_extension, $allowed_extensions)) {
            //     header("Location: album.php");
            //     continue; // Skip to the next iteration
            // }

            // // Memeriksa ukuran file (maksimal 25 MB)
            // $maxFileSize = 25 * 1024 * 1024; // 25 MB in bytes
            // if ($_FILES["fileToUpload"]["size"][$i] > $maxFileSize) {
            //     echo "File " . $_FILES["fileToUpload"]["name"][$i] . " terlalu besar. Maksimal 25 MB.";
            //     continue; // Skip to the next iteration
            // }

            // Mengunggah file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                // Memasukkan informasi file ke dalam database
                $deskripsi = htmlspecialchars($_POST["deskripsi"]);
                $tanggalUpload = date("Y-m-d");
                $sql = "INSERT INTO foto (id_login, gambar, tanggal, deskripsi) VALUES ('$user_id', '$target_file', '$tanggalUpload', '$deskripsi');";

                if ($kon->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $kon->error;
                }
            } else {
                header("Location: album.php");

            }
        }

        // Mengarahkan ke halaman album.php setelah semua file diproses
        header("Location: album.php");
    }
}

// Menutup koneksi database
$kon->close();
?>
