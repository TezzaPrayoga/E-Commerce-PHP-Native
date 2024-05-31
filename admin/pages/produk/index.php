<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">Home</a>
		</li>
		<li class="breadcrumb-item">
			Produk
		</li>

	</ol>
	<div class="card">
		<div class="card-header bg-primary">
			<h2>Data Produk</h2>
		</div>
		<div class="card-body">
			<a class="btn btn-primary" href="?page=pages/produk/tambah_produk">Tambah Produk</a>
			<br>
			<br>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style='text-align: center;'>No</th>
							<th style='text-align: center;'>Nama Produk</th>
							<th style='text-align: center;'>Kategori</th>
							<th style='text-align: center;'>Harga produk</th>
							<th style='text-align: center;'>Jumlah produk</th>
							<th style='text-align: center;'>deskripsi produk</th>
							<th style='text-align: center;'>Foto produk</th>
							<th style='text-align: center;'>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ambil	= $koneksi->query("SELECT * FROM tb_produk");
						$no = 1;
						while ($pecah = $ambil->fetch_assoc()) {
							# code...
						?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $pecah['produk_nama'] ?></td>
								<td><?php echo $pecah['kategori_id'] ?></td>
								<td><?php echo $pecah['produk_harga'] ?></td>
								<td><?php echo $pecah['produk_stok'] ?></td>
								<td><?php echo $pecah['produk_deskripsi'] ?></td>
								<td><img style="width: 100%;height: 200px;" src="images/produk/<?php echo $pecah['produk_foto'] ?>" alt=""></td>
								<td>
									<a class="btn btn-warning" href="?page=pages/produk/edit_produk&idedit=<?php echo $pecah['produk_id'] ?>">Edit</a>
									<a class="btn btn-danger" href="?page=pages/produk/hapus_produk&idhapus=<?php echo $pecah['produk_id'] ?>">Hapus</a>

								</td>
							</tr>
						<?php 	} ?>
					</tbody>
				</table>




			</div>
		</div>
	</div>



</div>