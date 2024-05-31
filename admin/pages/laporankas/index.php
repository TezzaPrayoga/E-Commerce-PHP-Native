<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Laporan Keuangan    
	</li>
</ol>

<div class="card">
	<div class="card-header bg-primary">
		<h2>Input Data Keuangan</h2>
	</div>
	<div class="card-body">
		<form method="post">

				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" name="keterangan" class="form-control">
				</div>

                <div class="form-group">
					<label>Tanggal Transaksi</label>   
					<input type="date" name="tgl_transaksi" class="form-control">
				</div>

				<div class="form-group">
					<label>Debit</label>
					<input type="number" name="debit" class="form-control">
				</div>

                <div class="form-group">
					<label>Kredit</label>   
					<input type="number" name="kredit" class="form-control">
				</div>

			<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>
				<?php 
					if (isset($_POST['simpan'])) {
					   $keterangan =  $_POST['keterangan']; 
					   $tgl_transaksi	  =  $_POST['tgl_transaksi'];
                       $debit	  =  $_POST['debit'];
                       $kredit	  =  $_POST['kredit'];
					    $koneksi->query("INSERT INTO tb_keuangan (keterangan,tgl_transaksi,debit,kredit) VALUES ('$keterangan','$tgl_transaksi','$debit','$kredit') ");

					 echo  "<script>
					   			alert('Data Berhasil Disimpan');
					   			window.location='?page=pages/laporankas/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>

<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">Home</a>
		</li>
		<li class="breadcrumb-item">
			Keuangan
		</li>

	</ol>
	<div class="card">
		<div class="card-header bg-primary">
			<h2>Laporan Keuangan Laba Rugi</h2>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
						<td colspan="7" style='font-weight:bold;'>Penjualan</td>
						</tr>
						<tr>
							<th style='text-align: center;'>No</th>
                            <th style='text-align: center;'>No Laporan</th>
							<th style='text-align: center;'>Keterangan</th>
                            <th style='text-align: center;'>Tanggal</th>
							<th style='text-align: center;'>Debit</th>
							<th style='text-align: center;'>Kredit</th>
                            <th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ambil	= $koneksi->query("SELECT * FROM tb_keuangan");
						$no = 1;
						while ($pecah = $ambil->fetch_assoc()) {
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
                                <td width="170px">
                                <a class="btn btn-danger" href="?page=pages/laporankas/hapuskas&idhapus=<?php echo $pecah['id_keuangan'] ?>">Hapus</a>
								<a class="btn btn-warning" href="?page=pages/laporankas/editkas&idedit=<?php echo $pecah['id_keuangan'] ?>">Edit</a>
								</td>
                            </tr>
                            
						<?php 	} ?>
					</tbody>
                    <tfoot>
                                <tr>
                                <td colspan="4" style='font-weight:bold;'>Total</td>
                                <td style='font-weight:bold;'><?php echo rupiah($totalhargad) ?></td>
                                <td style='font-weight:bold;'><?php echo rupiah($totalhargak) ?></td>
                                <div class="col-md-3">
									<form target="_blank" action="laporankas.php">
										<div class="form-group">
											<label style='font-weight:bold;'>Cetak Laporan</label>
											<input type="month" value="<?php echo date('Y-m') ?>" name="bulan" class="form-control  ">
										</div>
										<button class="btn btn-primary btn-sm" >Cetak</button>
									</form>
								</div>
                                </tr>
								<tr>
								<td colspan="4" style='font-weight:bold;'>Laba Bersih</td>
								<td colspan="2" style='font-weight:bold; text-align: center;'><?php echo rupiah($totalsaldobersih) ?></td>
								</tr>
								
                            </tfoot>
				</table>
			</div>
		</div>
	</div>
	
</div>