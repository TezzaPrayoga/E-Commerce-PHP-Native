<?php
session_start();

          include("kon.php");
          // Periksa apakah pengguna sudah login
          if (!isset($_SESSION['id_login'])) {
            header("Location: index.php");
            exit();
          }
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="modes.js"></script>

  <meta charset="utf-8">

  <title>Album Online</title>



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

  <header data-bs-theme="dark">
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="album.php" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" />
          </svg>
          <strong>Album</strong>
        </a>
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">PRIVATE ALBUM</h1>
          <p class="lead text-body-secondary">Selamat Datang  di Album Pribadi Ini Akan Khususkan Untuk Foto Dan Ini Masih Dalam Tahap Pengembangan</p>
          <p>
            <!-- Form untuk mengunggah foto -->
          <form action="upload.php" method="post" enctype="multipart/form-data" class="mb-3" id="uploadForm">
            <input type="file" name="fileToUpload[]" id="fileToUpload" class="d-none" multiple>
            <label for="fileToUpload" class="btn btn-primary my-2" id="addImageBtn">Tambahkan foto</label>
            <input type="submit" name="submit" value="kirim gambar" class="btn btn-primary my-2">
            <a href="logout.php" class="btn btn-secondary my-2">Log out</a><br/>
            <input type="text" name="deskripsi" placeholder="deskripsi gambar">
            
          </form>
          </p>
        </div>
      </div>
    </section>

    <!-- Display uploaded photos -->
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <!-- Di dalam div dengan class "row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3", tambahkan loop untuk menampilkan gambar-gambar dari database -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php

          // Ambil nama pengguna dari database
          $user_id = $_SESSION['id_login'];
          // Retrieve and display uploaded photos from the database
          $sql = "SELECT foto.id ,foto.gambar, login.username, foto.deskripsi 
          FROM foto
          INNER JOIN login ON foto.id_login = login.id_login
          WHERE foto.id_login = ?"; // Sesuaikan dengan struktur tabel Anda

          // Persiapkan pernyataan
          $stmt = $kon->prepare($sql);

          // Bind parameter
          $stmt->bind_param("i", $user_id);

          // Jalankan pernyataan
          $stmt->execute();

          // Ambil hasil
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="col">';
              echo '<div class="card shadow-sm">';
              echo '<p>' . $row['username'] . '</p>';
              echo '<img src="' . $row["gambar"] . '" class="bd-placeholder-img card-img-top" width="100%" height="225">';
              echo '<div class="card-body">';
              echo '<div class="d-flex justify-content-between align-items-center">';
              echo '<div class="btn-group">';
              echo '<a href="' . $row["gambar"] . '" class="btn btn-sm btn-outline-secondary">View</a>';
              echo '&nbsp;&nbsp;';
              echo "<a href='edit.php?id=".$row['id']."' class='btn btn-sm btn-outline-secondary'>Edit</a>";
              echo '&nbsp;&nbsp;';
              echo '<a href="' . $row["gambar"] . '" class="btn btn-sm btn-outline-secondary" download>Download</a>';
              echo '&nbsp;&nbsp;';
              echo "<a href='javascript:void(0);' onclick='confirmDelete(".$row['id'].")' class='btn btn-sm btn-outline-secondary'>Delete</a>";
              echo '</div>';
              echo '<p class="card-text">' . date("Y-m-d") . '</p>';
              echo '</div>';
              echo 'deskripsi : <br/>'.$row['deskripsi'];
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </main>

  <footer class="text-body-secondary py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="album.php">Back to top</a>
      </p>
      <p class="mb-1">Private Album, keluaran dari <a href="https://www.instagram.com/t__prayoga/">Tezza</a> <br/>Masih dalam tahap pengembangan ya semua nya jadi mohon bersabar ingat ini masih jauh dari kata sempurna hehehe.</p>
    </div>
  </footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<!-- Di akhir file, setelah konten HTML lainnya -->
<script>
    function confirmDelete(gambarId) {
        var password = prompt("Masukkan kata sandi untuk menghapus gambar:");

        if (password !== null) {
            // Kirim data ke delete.php untuk verifikasi
            window.location.href = "delete.php?id=" + gambarId + "&password=" + password;
        }
    }
    function confirmDelete(gambarId) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus gambar ini?");

        if (konfirmasi) {
            // Kirim data ke hapus.php untuk penghapusan
            window.location.href = "hapus.php?id=" + gambarId;
        }
    }
</script>
