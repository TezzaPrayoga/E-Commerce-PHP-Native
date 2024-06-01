<?php
session_start();
include("kon.php");

if (!isset($_SESSION['id_login'])) {
    header("Location: index.php");
    exit();
}

// Ambil ID gambar dari parameter GET
if (isset($_GET['id'])) {
    $gambar_id = $_GET['id'];

    // Query untuk mendapatkan informasi gambar
    $query = "SELECT * FROM foto WHERE id = '$gambar_id'";
    $result = $kon->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gambar_path = $row['gambar'];
        $deskripsi = $row['deskripsi'];
    } else {
        echo "Gambar tidak ditemukan.";
        exit();
    }
} else {
    echo "ID gambar tidak valid.";
    exit();
}

// Proses form edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan deskripsi yang diinput pengguna
    $deskripsi_baru = $_POST["deskripsi"];

    // Update deskripsi di database
    $update_query = "UPDATE foto SET deskripsi = '$deskripsi_baru' WHERE id = '$gambar_id'";
    if ($kon->query($update_query) === TRUE) {
        echo "Deskripsi atau Gambar berhasil diperbarui.";
    } else {
        echo "Error: " . $update_query . "<br>" . $kon->error;
    }

    // Proses penggantian foto
    if (!empty($_FILES["fileToUpload"]["name"])) {
        $target_dir = "foto/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        // Mengunggah file baru
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Update path foto di database
            $update_foto_query = "UPDATE foto SET gambar = '$target_file' WHERE id = '$gambar_id'";
            if ($kon->query($update_foto_query) !== TRUE) {
                echo "Error updating foto: " . $kon->error;
            }
            header("location: album.php");
        } else {
            echo "Maaf, terdapat kesalahan saat mengunggah file Anda.";
        }
    }
}

// Menutup koneksi database
$kon->close();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="modes.js"></script>

  <meta charset="utf-8">

  <title>Album Keluarga</title>



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="css/album.css">


</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>



<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Gambar</h2>
        
        <img src="<?php echo $gambar_path; ?>" alt="Gambar yang akan diedit" class="img-fluid mb-4">
        
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileToUpload" >Pilih Foto Baru:</label>
                <input type="file" name="fileToUpload" accept="image/*">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <a href="album.php" class="btn btn-secondary mt-3">Kembali ke Album</a>
        </div>

<!-- Bootstrap JS dan dependensinya (Anda mungkin perlu menyertakan jQuery dan Popper.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
