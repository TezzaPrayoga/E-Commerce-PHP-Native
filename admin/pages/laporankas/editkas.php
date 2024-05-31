<div class="container-fluid"> 
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="?page=home">home</a>
	</li>
	<li class="breadcrumb-item">
	Laporan keuangan
	</li>
		<li class="breadcrumb-item">
	edit Data
	</li>
</ol>

<?php 	
		$id	=	$_GET['idedit'];
	$datalaporan  =	$koneksi->query("SELECT * FROM tb_keuangan WHERE id_keuangan = '$id'")->fetch_assoc();

	// var_dump($dataadmin);
 ?>

<div class="card">
	<div class="card-header bg-primary">
		<h2>Edit laporan Keuangan</h2>
	</div>
	<div class="card-body">
		<form method="post">

				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" name="keterangan" value="<?php echo $datalaporan['keterangan'] ?>" class="form-control">
				</div>

                <div class="form-group">
					<label>Tanggal Transaksi</label>   
					<input type="date" name="tgl_transaksi" value="<?php echo $datalaporan['tgl_transaksi'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Debit</label>
					<input type="number" name="debit" value="<?php echo $datalaporan['debit'] ?>" class="form-control">
				</div>

                <div class="form-group">
					<label>Kredit</label>   
					<input type="number" name="kredit" value="<?php echo $datalaporan['kredit'] ?>" class="form-control">
				</div>

					<button type="submit" name="edit" class="btn btn-success">edit</button>
			</form>
			<?php 
					if (isset($_POST['edit'])) {
					   $keterangan =  $_POST['keterangan']; 
					   $tgl_transaksi	  =  $_POST['tgl_transaksi'];
                       $debit	  =  $_POST['debit'];
                       $kredit	  =  $_POST['kredit'];
					    $koneksi->query("UPDATE tb_keuangan SET keterangan = '$keterangan', tgl_transaksi = '$tgl_transaksi', debit = '$debit', kredit = '$kredit' WHERE id_keuangan = '$id'  ");

					 echo  "<script>
					   			alert('Data Berhasil Di edit');
					   			window.location='?page=pages/laporankas/index'
					   </script>";
	
				} ?>


		</div>
	</div>
</div>





</div>