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
  <title>Laporan Kas JBM.ID</title>
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
      <h1> Laporan Keuangan Per <?php echo tgl_indo($_GET['bulan']) ?></h1>
    </center>

    <div class="cart-view-table">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
            <th style='text-align: center;'>No</th>
            <th style='text-align: center;'>No Laporan</th>
			      <th style='text-align: center;'>Keterangan</th>
            <th style='text-align: center;'>Tanggal</th>
			      <th style='text-align: center;'>Debit</th>
			      <th style='text-align: center;'>Kredit</th>
            </tr>
          </thead>
          <tbody>
            <!-- CETAK PERBULAN (ACTIVATED)-->
            <!-- <?php
            // $no = 1;

            // $ambil = $koneksi->query("SELECT * FROM tb_keuangan WHERE tb_keuangan.tgl_transaksi LIKE '%$_GET[bulan]%'");
            // while ($pecah = $ambil->fetch_assoc()) :
            //   @$totalhargad += $pecah['debit'];
            //   @$totalhargak += $pecah['kredit'];
						// 	@$totalsaldokotor   = $totalhargak + $totalhargad ;
						// 	@$totalsaldobersih   = $totalhargak - $totalhargad ;
            ?> -->
            <?php
            $no = 1;

            $ambil = $koneksi->query("SELECT * FROM tb_keuangan");
            while ($pecah = $ambil->fetch_assoc()) :
              @$totalhargad += $pecah['debit'];
              @$totalhargak += $pecah['kredit'];
							@$totalsaldokotor   = $totalhargak + $totalhargad ;
							@$totalsaldobersih   = $totalhargak - $totalhargad ;
            ?>
              <tr>
              <td style='font-weight:bold; text-align:center;'><?php echo $no++ ?></td>
              <td style='text-align: center;'><?php echo $pecah['id_keuangan'] ?></td>
              <td><?php echo $pecah['keterangan'] ?></td>
              <td><?php echo tgl_indo(tgl_indo($pecah['tgl_transaksi'])) ?></td>
              <td><?php echo $pecah['debit'] ?></td>
              <td><?php echo $pecah['kredit'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" style='font-weight:bold';>Total</td>
              <td><?php echo rupiah($totalhargad) ?></td>
              <td><?php echo rupiah($totalhargak) ?></td>
            </tr>
            <td colspan="4" style='font-weight:bold';>laba Bersih</td>
            <td colspan="2" style='font-weight:bold; text-align:center;'><?php echo rupiah($totalsaldobersih) ?></td>
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