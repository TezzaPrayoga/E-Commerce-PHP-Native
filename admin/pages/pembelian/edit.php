<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">Home</a>
		</li>
		<li class="breadcrumb-item">
			Pembelian
		</li>
	</ol>
	<div class="card">
		<div class="card-header bg-primary">
			<h2>Data Pembelian</h2>
		</div>
		<?php
		$trx	= $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_pembelian.pembelian_id = '$_GET[id]'")->fetch_assoc();
		?>
		<div class="card-body">
			<a href="index.php?page=pages/pembelian/index" class="btn btn-success">Kembali</a>
			<br>
			<br>
			<form method="POST">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $trx['pembelian_id'] ?>">
							<select class="form-control" name="status">
								<option value="Belum Di Konfirmasi">Belum Di Konfirmasi</option>
								<option value="Sudah Konfirmasi">Sudah Konfirmasi</option>
								<option value="Selesai">Selesai</option>
							</select>
						</div>
					</div>
					<div class="col-md-8">
						<button class="btn btn-primary">Update Status Pembayaran</button>
					</div>
				</div>
			</form>
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$update = $koneksi->query("UPDATE tb_pembelian SET `pembelian_status`='$_POST[status]' WHERE	`pembelian_id`='$_POST[id]' ");

				if ($update) {
					echo "<script>
					alert('Pembelian Berhasil di Update')
					location='index.php?page=pages/pembelian/index'
					</script>";
				}
			}

			?>
			<div class="table-responsive">
				<div class="row">
					<div class="col-md-6">
						Nama : <?php echo $trx['pelanggan_nama'] ?> <br>
						Jenis Kelamin : <?php echo $trx['pelanggan_jk'] ?> <br>
						Alamat : <?php echo $trx['pelanggan_alamat'] ?> <br>
						No HP : <?php echo $trx['pelanggan_nohp'] ?> <br>
					</div>
					<div class="col-md-6">
						Tanggal Pembelian : <?php echo $trx['pembelian_tgl'] ?> <br>
						Status: <?php echo $trx['pembelian_status'] ?> <br>
						Total Pembelian : <?php echo $trx['pembelian_total'] ?> <br>
					</div>
				</div>
				<br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ambil	= $koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.produk_id=tb_produk.produk_id WHERE tb_pembelian_produk.pembelian_id = '$trx[pembelian_id]'");
						$no = 1;
						while ($pecah = $ambil->fetch_assoc()) {
						?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $pecah['produk_nama'] ?></td>
								<td><?php echo $pecah['pembelian_produk_jumlah'] ?></td>
								<td><?php echo $pecah['pembelian_produk_harga'] ?></td>
								<td><?php echo $pecah['pembelian_sub_harga'] ?></td>
							</tr>
						<?php 	} ?>
					</tbody>
				</table>




			</div>
		</div>
	</div>



</div>