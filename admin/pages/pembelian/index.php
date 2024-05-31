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
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>No Transaksi </th>
							<th>Nama Pelanggan</th>
							<th>Pembelian Tanggal</th>
							<th>Pembelian Status</th>
							<th>Pembelian Total</th>
							<th width="270px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ambil	= $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.pelanggan_id=tb_pelanggan.pelanggan_id");
						$no = 1;
						while ($pecah = $ambil->fetch_assoc()) {
						?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $pecah['pembelian_id'] ?></td>
								<td><?php echo $pecah['pelanggan_nama'] ?></td>
								<td><?php echo tgl_indo ($pecah['pembelian_tgl']) ?></td>
								<td><?php echo $pecah['pembelian_status'] ?></td>
								<td><?php echo $pecah['pembelian_total'] ?></td>
								<td>
									<a class="btn btn-success" href="?page=pages/pembelian/edit&id=<?php echo $pecah['pembelian_id'] ?>">Update Pembayaran</a>
									<a class="btn btn-primary" href="?page=pages/pembelian/detail&id=<?php echo $pecah['pembelian_id'] ?>">Detail</a>
								</td>
							</tr>
						<?php 	} ?>
					</tbody>
				</table>




			</div>
		</div>
	</div>



</div>