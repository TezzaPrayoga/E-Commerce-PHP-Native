<?php session_start() ?>
<?php include 'partials/koneksi.php'; ?>
<?php
if (empty($_SESSION['admin'])) {
  echo "
    <script>
        alert('Anda Harus Login');
        location='login.php'   
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin JBM.ID</title>
  <?php include 'partials/head.php'; ?>

</head>
<!-- onload="window.print()" -->

<body style="margin-left: 100px;margin-right: 100px;" onload="window.print()">
  <div class="container">
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-4 col-xs-4 text-center">
        <img src="../assets/img/logojbm.png" alt="">
      </div>
      <div class="col-md-8 col-xs-8 ">
        <h3 style="margin-bottom: 0px;">JBM.ID</h3>
        <p>
          Alamat : Jl.Bypass KM 10 Pilakut, Padang. Sumatera Barat <br>
          No HP: 0853-7655-4646
        </p>
      </div>
    </div>
    <center>
      <h1> Laporan Produk</h1>
    </center>

    <div class="cart-view-table">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Stock</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.kategori_id =tb_kategori.kategori_id ");
            while ($pecah = $ambil->fetch_assoc()) :
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pecah['produk_nama'] ?></td>
                <td><?php echo $pecah['kategori_nama'] ?></td>
                <td><?php echo $pecah['produk_harga'] ?></td>
                <td><?php echo $pecah['produk_deskripsi'] ?></td>
                <td><?php echo $pecah['produk_stok'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-xs-4"></div>
      <div class="col-md-4 col-xs-4"></div>
      <div class="col-md-4 col-xs-4">
        <p>
          Padang, <?php echo date('d-m-Y') ?>
        </p>
        <br>
        <br>
        <br>
        <h5>Pimpinan</h4>
      </div>
    </div>
  </div>
  <?php include '../component/script.php' ?>
</body>

<?php include 'partials/script.php' ?>


</html>