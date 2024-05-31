<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
		<li class="breadcrumb-item">
	Pelanggan
	</li>
</ol>
<div class="card">
	<div class="card-header bg-primary">
		<h2>Tambah Data Pelanggan</h2>
	</div>
	<div class="card-body">
		<form method="post">

	<div class="form-group">
					<label>Pelanggan User</label>
					<input type="text" name="pelangganuser" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Pass</label>
					<input type="password" name="pelangganpass" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Nama</label>
					<input type="text" name="pelanggannama" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan NIK</label>
					<input type="text" name="pelanggannik" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Jk</label>
					<input type="text" name="pelangganjk" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Tgl Lahir</label>
					<input type="date" name="pelanggantgllahir" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Pekerjaan</label>
					<input type="text" name="pelangganpekerjaan" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Alamat</label>
					<input type="text" name="pelangganalamat" class="form-control">
				</div>

				<div class="form-group">
					<label>Pelanggan Nohp</label>
					<input type="text" name="pelanggannohp" class="form-control">
				</div>


			<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>
				<?php 
					if (isset($_POST['simpan'])) {
					   $pelanggan_user      =  $_POST['pelangganuser']; 
					   $pelanggan_pass	    =  $_POST['pelangganpass'];
					   $pelanggan_nama      =  $_POST['pelanggannama']; 
					   $pelanggan_nik       =  $_POST['pelanggannik'];
					   $pelanggan_jk        =  $_POST['pelangganjk']; 
					   $pelanggan_tgl_lahir =  $_POST['pelanggantgllahir']; 
					   $pelanggan_pekerjaan =  $_POST['pelangganpekerjaan'];
					   $pelanggan_alamat    =  $_POST['pelangganalamat']; 
				       $pelanggan_nohp      =  $_POST['pelanggannohp']; 

					    $koneksi->query("INSERT INTO tb_pelanggan (pelanggan_user,pelanggan_pass,pelanggan_nama,pelanggan_nik,pelanggan_jk,pelanggan_tgl_lahir,pelanggan_pekerjaan,pelanggan_alamat,pelanggan_nohp) VALUES ('$pelanggan_user','$pelanggan_pass','$pelanggan_nama','$pelanggan_nik','$pelanggan_jk','$pelanggan_tgl_lahir','$pelanggan_pekerjaan','$pelanggan_alamat','$pelanggan_nohp') ");
	         echo  "<script>
					   			alert('Data Berhasil Disimpan');
					   			window.location='?page=pages/pelanggan/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>





</div>
					





		