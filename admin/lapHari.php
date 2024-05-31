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

<body style="margin-left: 100px;margin-right: 100px;" onload="window.print()">
  <div class="container">
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-4 col-xs-4 text-center">
        <img src="../assets/img/logojbm.png" alt="">
      </div>
      <div class="col-md-8 col-xs-8 ">
        <h3 style="margin-bottom: 0px;">JBM.ID</h3>
        <p>
          Alamat : l.Bypass KM 10 Pilakut, Padang. Sumatera Barat <br>
          No HP: 0853-7655-4646
        </p>
      </div>
    </div>
    <center>
      <h1> Laporan Per <?php echo tgl_indo($_GET['hari']) ?></h1>
    </center>

    <div class="cart-view-table">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>No Transaksi</th>
              <th>Tanggal</th>
              <th>Nama Produk</th>
              <th>Jumlah Beli</th>
              <th>Harga</th>
              <th>Sub Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            $ambil = $koneksi->query("SELECT * FROM `tb_pembelian` JOIN `tb_pembelian_produk` ON  `tb_pembelian`.`pembelian_id`=`tb_pembelian_produk`.`pembelian_id` JOIN `tb_produk` ON `tb_pembelian_produk`.`produk_id` = `tb_produk`.`produk_id` WHERE  `tb_pembelian`.pembelian_tgl = '$_GET[hari]' ");
            while ($pecah = $ambil->fetch_assoc()) :
              @$totalharga += $pecah['pembelian_sub_harga'];
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pecah['pembelian_id'] ?></td>
                <td><?php echo tgl_indo(tgl_indo($pecah['pembelian_tgl'])) ?></td>
                <td><?php echo $pecah['produk_nama'] ?></td>
                <td><?php echo $pecah['pembelian_produk_jumlah'] ?></td>
                <td><?php echo rupiah($pecah['pembelian_produk_harga']) ?></td>
                <td><?php echo rupiah($pecah['pembelian_sub_harga']) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6">Total</td>
              <td><?php echo rupiah($totalharga) ?></td>
            </tr>
          </tfoot>
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