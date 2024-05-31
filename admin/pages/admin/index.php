<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
	
</ol>

<div class="card">
	<div class="card-header bg-primary">
		<h2>Data Admin</h2>
	</div>
	<div class="card-body">
		<a class="btn btn-primary" href="?page=pages/admin/tambah_admin">Tambah Data</a>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Username Admin</th>
						<th>Password Admin</th>
						<th>Nama Admin</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	
						<?php 	
								$ambil	= $koneksi->query("SELECT * FROM tb_admin");
										$no = 1;
									while ($pecah = $ambil->fetch_assoc()) {
										# code...
															 ?>
						<tr>	
								<td><?php 	echo $no++ ?></td>
								<td><?php 	echo $pecah['admin_user'] ?></td>
								<td><?php 	echo $pecah['admin_pass'] ?></td>
								<td><?php 	echo $pecah['admin_nama'] ?></td>
								<td>
									<a class="btn btn-warning" href="?page=pages/admin/edit_admin&idedit=<?php echo $pecah['admin_id'] ?>">Edit</a>
									<a class="btn btn-danger" href="?page=pages/admin/hapus_admin&idhapus=<?php echo  $pecah['admin_id'] ?>">Hapus</a>

								</td>
						</tr>
						<?php 	} ?>
				</tbody>
			</table>




		</div>
	</div>
</div>









</div>