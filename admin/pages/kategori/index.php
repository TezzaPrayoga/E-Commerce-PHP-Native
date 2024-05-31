<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">home</a>
		</li>
		<li class="breadcrumb-item">
			Kategori
		</li>

	</ol>

	<div class="card">
		<div class="card-header bg-primary">
			<h2>Data Kategori</h2>
		</div>
		<div class="card-body">
			<a class="btn btn-primary mb-3" href="?page=pages/kategori/tambah_kategori">Tambah Kategori</a>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori Nama</th>
							<th>Kategori Satuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ambil	= $koneksi->query("SELECT * FROM tb_kategori");
						$no = 1;
						while ($pecah = $ambil->fetch_assoc()) {
						?>
							<tr>
								<td width="10px"><?php echo $no++ ?></td>
								<td><?php echo $pecah['kategori_nama'] ?></td>
								<td><?php echo $pecah['kategori_satuan'] ?></td>
								<td width="170px">
									<a class="btn btn-warning" href="?page=pages/kategori/edit_kategori&idedit=<?php echo $pecah['kategori_id'] ?>">Edit</a>
									<a class="btn btn-danger" href="?page=pages/kategori/hapus_kategori&idedit=<?php echo $pecah['kategori_id'] ?>">Hapus</a>
								</td>
							</tr>
						<?php 	} ?>
					</tbody>
				</table>




			</div>
		</div>
	</div>









</div>