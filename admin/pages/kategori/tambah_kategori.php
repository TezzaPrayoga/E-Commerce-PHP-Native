<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
		<li class="breadcrumb-item">
	Tambah Kategori
	</li>
</ol>

<div class="card">
	<div class="card-header bg-primary">
		<h2>Tambah Data Kategori</h2>
	</div>
	<div class="card-body">
		<form method="post">

			<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" name="namakategori" class="form-control">
				</div>

				<div class="form-group">
					<label>Nama Satuan</label>
					<input type="text" name="namasatuan" class="form-control">
				</div>

			<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>
				<?php 
					if (isset($_POST['simpan'])) {
					   $kategori_nama =  $_POST['namakategori']; 
					   $Kategori_satuan	  =  $_POST['namasatuan'];
					    $koneksi->query("INSERT INTO tb_kategori (kategori_nama,kategori_satuan) VALUES ('$kategori_nama','$kategori_satuan') ");

					 echo  "<script>
					   			alert('Data Berhasil Disimpan');
					   			window.location='?page=pages/kategori/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>





</div>
					


















</div>