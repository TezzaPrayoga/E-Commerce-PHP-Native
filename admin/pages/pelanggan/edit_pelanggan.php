<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
		<li class="breadcrumb-item">
	Edit Pelanggan
	</li>
</ol>

<?php 	
		$id	=	$_GET['idedit'];
	$datapelanggan  =	$koneksi->query("SELECT * FROM tb_pelanggan WHERE pelanggan_id = '$id'")->fetch_assoc();

	// var_dump($dataadmin);
 ?>
<div class="card">
	<div class="card-header bg-primary">
		<h2>Edit Data Pelanggan</h2>
	</div>
	<div class="card-body">
		<form method="post">

    	<div class="form-group">
					<label>Pelanggan User</label>
					<input type="text" name="pelanggan_user" value="<?php echo $datapelanggan['pelanggan_user'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Pass</label>
					<input type="text" name="pelanggan_pass" value="<?php echo $datapelanggan['pelanggan_pass'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Nama</label>
					<input type="text" name="pelanggan_nama" value="<?php echo $datapelanggan['pelanggan_nama'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan NIK</label>
					<input type="text" name="pelanggan_nik" value="<?php echo $datapelanggan['pelanggan_nik'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Jk</label>
					<input type="text" name="pelanggan_jk" value="<?php echo $datapelanggan['pelanggan_jk'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Tgl Lahir</label>
					<input type="text" name="pelanggan_tgl_lahir" value="<?php echo $datapelanggan['pelanggan_tgl_lahir'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Pekerjaan</label>
					<input type="text" name="pelanggan_pekerjaan"  value="<?php echo $datapelanggan['pelanggan_pekerjaan'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Alamat</label>
					<input type="text" name="pelanggan_alamat" value="<?php echo $datapelanggan['pelanggan_alamat'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Nohp</label>
					<input type="text" name="pelanggan_nohp" value="<?php echo $datapelanggan['pelanggan_nohp'] ?>" class="form-control">
				</div>

    	<button type="submit" name="edit" class="btn btn-success">edit</button>
			</form>
		<?php 
					if (isset($_POST['edit'])) {
					   $pelanggan_user      =  $_POST['pelanggan_user']; 
					   $pelanggan_pass	    =  $_POST['pelanggan_pass'];
					   $pelanggan_nama      =  $_POST['pelanggan_nama']; 
					   $pelanggan_nik       =  $_POST['pelanggan_nik'];
					   $pelanggan_jk        =  $_POST['pelanggan_jk']; 
					   $pelanggan_tgl_lahir =  $_POST['pelanggan_tgl_lahir'];
					   $pelanggan_pekerjaan =  $_POST['pelanggan_pekerjaan'];
					   $pelanggan_alamat    =  $_POST['pelanggan_alamat']; 
				       $pelanggan_nohp      =  $_POST['pelanggan_nohp']; 

					   $koneksi->query("UPDATE tb_pelanggan SET pelanggan_user = '$pelanggan_user', pelanggan_pass = '$pelanggan_pass', pelanggan_nama = '$pelanggan_nama',pelanggan_nik = '$pelanggan_nik', pelanggan_jk = '$pelanggan_jk', pelanggan_tgl_lahir = '$pelanggan_tgl_lahir',pelanggan_pekerjaan = '$pelanggan_pekerjaan', pelanggan_alamat = '$pelanggan_alamat', pelanggan_nohp = '$pelanggan_nohp' WHERE pelanggan_id = '$id' ");

					 echo  "<script>
					   			alert('Data Berhasil Di edit');
					   			window.location='?page=pages/pelanggan/index'
					   </script>";
	
				} ?>
				
		</div>
	</div>
</div>
</div>