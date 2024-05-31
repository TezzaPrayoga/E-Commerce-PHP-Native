<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Pelanggan
	</li>

</ol>
<div class="card">
	<div class="card-header bg-primary">
		<h2>Data Pelanggan</h2>
	</div>
	<div class="card-body">
		<a class="btn btn-primary" href="?page=pages/pelanggan/tambah_pelanggan">Tambah Pelanggan</a>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style='text-align: center;'>No</th>
						<th style='text-align: center;'>User</th>
						<th style='text-align: center;'>Password</th>
						<th style='text-align: center;'>Nama</th>
						<th style='text-align: center;'>NIK</th>
						<th style='text-align: center;'>Jenis kelamin</th>
						<th style='text-align: center;'>Tanggal Lahir</th>
						<th style='text-align: center;'>Pekerjaan</th>
						<th style='text-align: center;'>Alamat</th>
						<th style='text-align: center;'>Nohp</th>
						<th style='text-align: center;'>Aksi</th>
					</tr>
					</thead>
			<tbody>	
					<?php 	
							$ambil	= $koneksi->query("SELECT * FROM tb_pelanggan");
									  $no = 1;
								while ($pecah = $ambil->fetch_assoc()) {
										# code...
					 ?>
						 <tr>	
								<td><?php 	echo $no++ ?></td>
								<td><?php 	echo $pecah['pelanggan_user'] ?></td>
								<td><?php 	echo $pecah['pelanggan_pass'] ?></td>
								<td><?php 	echo $pecah['pelanggan_nama'] ?></td>
								<td><?php 	echo $pecah['pelanggan_nik'] ?></td>
								<td><?php 	echo $pecah['pelanggan_jk'] ?></td>
								<td><?php 	echo $pecah['pelanggan_tgl_lahir'] ?></td>
								<td><?php 	echo $pecah['pelanggan_pekerjaan'] ?></td>
								<td><?php 	echo $pecah['pelanggan_alamat'] ?></td>
								<td><?php 	echo $pecah['pelanggan_nohp'] ?></td>
								<td>
						<a class="btn btn-warning" href="?page=pages/pelanggan/edit_pelanggan&idedit=<?php echo $pecah['pelanggan_id'] ?>">Edit</a>
						<a class="btn btn-primary" href="?page=pages/pelanggan/hapus_pelanggan&idhapus=<?php echo $pecah['pelanggan_id'] ?>">Hapus</a>
					
						</td>
						</tr>
						<?php 	} ?>
				</tbody>
			</table>




		</div>
	</div>
</div>



</div>