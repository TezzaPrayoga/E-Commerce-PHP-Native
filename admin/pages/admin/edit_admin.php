<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
		<li class="breadcrumb-item">
	edit Data
	</li>
</ol>

<?php 	
		$id	=	$_GET['idedit'];
	$dataadmin  =	$koneksi->query("SELECT * FROM tb_admin WHERE admin_id = '$id'")->fetch_assoc();

	// var_dump($dataadmin);
 ?>

<div class="card">
	<div class="card-header bg-primary">
		<h2>Edit Data Admin</h2>
	</div>
	<div class="card-body">
		<form method="post">

				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="namaadmin" value="<?php echo $dataadmin['admin_nama'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $dataadmin['admin_nama'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" value="<?php echo $dataadmin['admin_nama'] ?>" class="form-control">
				</div>

					<button type="submit" name="edit" class="btn btn-success">edit</button>
			</form>
			<?php 
					if (isset($_POST['edit'])) {
					   $nama         =  $_POST['namaadmin']; 
					   $username	 =  $_POST['username'];
					   $pass		 =	$_POST['password'];

					   $koneksi->query("UPDATE tb_admin SET admin_user = '$username', admin_pass = '$pass', admin_nama = '$nama' WHERE admin_id = '$id'  ");

					 echo  "<script>
					   			alert('Data Berhasil Di edit');
					   			window.location='?page=pages/admin/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>





</div>