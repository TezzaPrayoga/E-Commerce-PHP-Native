<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Admin
	</li>
		<li class="breadcrumb-item">
	Edit Kategori
	</li>
</ol>
<?php 	
		$id	=	$_GET['idedit'];
		$datakategori  =	$koneksi->query("SELECT * FROM tb_kategori WHERE kategori_id = '$id'")->fetch_assoc();

	// var_dump($dataadmin);
 ?>

<div class="card">
	<div class="card-header bg-primary">
		<h2>Edit Data Kategori</h2>
	</div>
	<div class="card-body">
		<form method="post">

				<div class="form-group">
				<label>Nama Kategori</label>
					<input type="text" name="namakategori" value="<?php echo $datakategori['kategori_nama'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Nama Satuan</label>
					<input type="text" name="namasatuan" value="<?php echo $datakategori['kategori_satuan'] ?>" class="form-control">
				</div>

					<button type="submit" name="edit" class="btn btn-success">edit</button>
			</form>
<?php 
					if (isset($_POST['edit'])) {
					   $kategori_nama =  $_POST['namakategori']; 
					   $kategori_satuan	  =  $_POST['namasatuan'];
					  
					   $koneksi->query("UPDATE tb_kategori SET kategori_nama = '$kategori_nama', kategori_satuan = '$kategori_satuan' WHERE kategori_id = '$id'  ");

					 echo  "<script>
					   			alert('Data Berhasil Di edit');
					   			window.location='?page=pages/kategori/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>





</div>