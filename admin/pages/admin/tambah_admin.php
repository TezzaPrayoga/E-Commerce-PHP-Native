<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
		<li class="breadcrumb-item">
	Tambah Data
	</li>
</ol>



<div class="card">
	<div class="card-header bg-primary">
		<h2>Tambah Data Admin</h2>
	</div>
	<div class="card-body">
		<form method="post">

				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="namaadmin" class="form-control">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>

					<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>
				<?php 
					if (isset($_POST['simpan'])) {
					   $nama         =  $_POST['namaadmin']; 
					   $username	 =  $_POST['username'];
					   $pass		 =	$_POST['password'];

					   $koneksi->query("INSERT INTO tb_admin (admin_user,admin_pass,admin_nama) VALUES ('$nama','$username','$pass') ");

					 echo  "<script>
					   			alert('Data Berhasil Disimpan');
					   			window.location='?page=pages/admin/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>





</div>