<?php
function resizeImage($source, $destination, $newWidth, $newHeight) {
    list($width, $height) = getimagesize($source);
    $aspectRatio = $width / $height;

    if ($newWidth / $newHeight > $aspectRatio) {
        $newWidth = $newHeight * $aspectRatio;
    } else {
        $newHeight = $newWidth / $aspectRatio;
    }

    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    $image = imagecreatefromjpeg($source);

    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    imagejpeg($newImage, $destination, 90);

    imagedestroy($image);
    imagedestroy($newImage);
}
?>

<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=home">Home</a>
        </li>
        <li class="breadcrumb-item">
            Admin
        </li>
        <li class="breadcrumb-item">
            Produk
        </li>
    </ol>
    <div class="card">
        <div class="card-header bg-primary">
            <h2>Tambah Data Produk</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <?php
                        $ambilKategori = $koneksi->query("SELECT * FROM tb_kategori");
                        while ($pecahKategori = $ambilKategori->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $pecahKategori['kategori_id'] ?>"><?php echo $pecahKategori['kategori_nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Produk Nama</label>
                    <input type="text" name="produknama" class="form-control">
                </div>

                <div class="form-group">
                    <label>Produk Harga</label>
                    <input type="number" name="produkharga" class="form-control">
                </div>
                <div class="form-group">
                    <label>Produk Stok</label>
                    <input type="number" name="produkstok" class="form-control">
                </div>
                <div class="form-group">
                    <label>Produk deskripsi</label>
                    <input type="text" name="produkdeskripsi" class="form-control">
                </div>
                <div class="form-group">
                    <label>Produk Foto</label>
                    <input type="file" name="produkfoto" class="form-control">
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $nama_foto = $_FILES['produkfoto']['name'];
                $lokasi = $_FILES['produkfoto']['tmp_name'];
                $produk_harga = $_POST['produkharga'];
                $kategori_id = $_POST['kategori'];
                $produk_stok = $_POST['produkstok'];
                $produk_deskripsi = $_POST['produkdeskripsi'];
                $produk_nama = $_POST['produknama'];

                // Path asli untuk upload
                $original_path = 'images/produk/' . $nama_foto;
                
                // Path untuk gambar yang sudah di-resize
                $resized_path = 'images/produk/resized_' . $nama_foto;

                // Pindahkan file yang diupload ke server
                move_uploaded_file($lokasi, $original_path);

                // Resize gambar
                resizeImage($original_path, $resized_path, 800, 600);

                // Simpan informasi produk dengan path gambar yang di-resize
                $koneksi->query("INSERT INTO `tb_produk` (
                    `kategori_id`, 
                    `produk_nama`, 
                    `produk_harga`, 
                    `produk_stok`, 
                    `produk_deskripsi`, 
                    `produk_foto`
                ) VALUES (
                    '$kategori_id',
                    '$produk_nama',
                    '$produk_harga',
                    '$produk_stok',
                    '$produk_deskripsi',
                    'resized_$nama_foto'
                )");

                echo "<script>
                    alert('Data Berhasil Disimpan');
                    window.location='?page=pages/produk/index';
                </script>";
            }
            ?>
        </div>
    </div>
</div>






================================================

<!-- Pure Code tambah Produk -->

<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">Home</a>
		</li>
		<li class="breadcrumb-item">
			Admin
		</li>
		<li class="breadcrumb-item">
			Produk
		</li>
	</ol>
	<div class="card">
		<div class="card-header bg-primary">
			<h2>Tambah Data Produk</h2>
		</div>
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Kategori</label>
					<select name="kategori" class="form-control">
						<?php
						$ambilKategori = $koneksi->query("SELECT * FROM tb_kategori");
						while ($pecahKategori = $ambilKategori->fetch_assoc()) {
						?>
							<option value="<?php echo $pecahKategori['kategori_id'] ?>"><?php echo $pecahKategori['kategori_nama'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Produk Nama</label>
					<input type="text" name="produknama" class="form-control">
				</div>

				<div class="form-group">
					<label>Produk Harga</label>
					<input type="number" name="produkharga" class="form-control">
				</div>
				<div class="form-group">
					<label>Produk Stok</label>
					<input type="number" name="produkstok" class="form-control">
				</div>
				<div class="form-group">
					<label>Produk deskripsi</label>
					<input type="text" name="produkdeskripsi" class="form-control">
				</div>
				<div class="form-group">
					<label>Produk Foto</label>
					<input type="file" name="produkfoto" class="form-control">
				</div>

				<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
			</form>
			<?php
			if (isset($_POST['simpan'])) {
				$nama_foto         =  $_FILES['produkfoto']['name'];
				$lokasi         	 =  $_FILES['produkfoto']['tmp_name'];
				// var_dump($produk_nama);
				// var_dump($lokasi);
				// exit;
				$produk_harga        =  $_POST['produkharga'];
				$kategori_id         =  $_POST['kategori'];
				$produk_stok         =  $_POST['produkstok'];
				$produk_deskripsi       =  $_POST['produkdeskripsi'];
				$produk_nama         =  $_POST['produknama'];

				move_uploaded_file($lokasi, 'images/produk/' . $nama_foto);

				$koneksi->query("INSERT INTO `tb_produk` (	`kategori_id`, 
															`produk_nama`, 
															`produk_harga`, 
															`produk_stok`, 
															`produk_deskripsi`, 
															`produk_foto`) 
															VALUES 
															('$kategori_id',
															'$produk_nama',
															'$produk_harga',
															'$produk_stok',
															'$produk_deskripsi',
															'$nama_foto'
															)");
				echo  "<script>
					   			alert('Data Berhasil Disimpan');
					   			window.location='?page=pages/produk/index'
					   </script>";
			} ?>


		</div>
	</div>
</div>

</div>





================================================


<!-- Pure Code edit_produk -->

<div class="container-fluid">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="?page=home">Home</a>
		</li>
		<li class="breadcrumb-item">
			Admin
		</li>
		<li class="breadcrumb-item">
			Edit Produk
		</li>
	</ol>
	<?php
	$id	=	$_GET['idedit'];
	$dataproduk  =	$koneksi->query("SELECT * FROM tb_produk WHERE produk_id = '$id'")->fetch_assoc();

	?>
	<div class="card">
		<div class="card-header bg-primary">
			<h2>Edit Data Produk</h2>
		</div>
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Kategori</label>
					<select name="kategori" class="form-control">
						<?php
						$ambilKategori = $koneksi->query("SELECT * FROM tb_kategori");
						while ($pecahKategori = $ambilKategori->fetch_assoc()) {
						?>
							<option value="<?php echo $pecahKategori['kategori_id'] ?>"><?php echo $pecahKategori['kategori_nama'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Produk Nama</label>
					<input value="<?php echo $dataproduk['produk_id'] ?>" type="hidden" name="id" class="form-control">
					<input value="<?php echo $dataproduk['produk_nama'] ?>" type="text" name="produknama" class="form-control">
				</div>

				<div class="form-group">
					<label>Produk Harga</label>
					<input value="<?php echo $dataproduk['produk_harga'] ?>" type="number" name="produkharga" class="form-control">
				</div>
				<div class="form-group">
					<label>Produk Stok</label>
					<input value="<?php echo $dataproduk['produk_stok'] ?>" type="number" name="produkstok" class="form-control">
				</div>
				<div class="form-group">
					<label>Produk Diskon</label>
					<input value="<?php echo $dataproduk['produk_deskripsi'] ?>" type="text" name="produkdeskripsi" class="form-control">
				</div>
				<div class="form-group">
					<label>Produk Foto</label>
					<input type="file" name="produkfoto" class="form-control">
					<input type="hidden" value="<?php echo $dataproduk['produk_foto'] ?>" name="produkfotoLama" class="form-control">
				</div>


				<button type="submit" name="edit" class="btn btn-success">edit</button>
			</form>

			<?php
			if (isset($_POST['edit'])) {
				$id        =  $_POST['id'];
				$produk_harga        =  $_POST['produkharga'];
				$kategori_id         =  $_POST['kategori'];
				$produk_stok         =  $_POST['produkstok'];
				$produk_deskripsi       =  $_POST['produkdeskripsi'];
				$produk_nama         =  $_POST['produknama'];
				$produkfotoLama         =  $_POST['produkfotoLama'];


				if ($_FILES['produkfoto']['name'] == "") {

					$koneksi->query("UPDATE `tb_produk` SET `kategori_id` ='$kategori_id', 
															`produk_nama` ='$produk_nama',
															`produk_harga` ='$produk_harga',
															`produk_stok` ='$produk_stok',
															`produk_foto` ='$produkfotoLama',
															`produk_deskripsi` = '$produk_deskripsi'
															WHERE 
															`produk_id` = '$id'");
					echo  "<script>
									   alert('Data Berhasil Disimpan');
									   window.location='?page=pages/produk/index'
						   </script>";
				} else {
					$nama_foto           =  $_FILES['produkfoto']['name'];
					$lokasi         	 =  $_FILES['produkfoto']['tmp_name'];

					move_uploaded_file($lokasi, 'images/produk/' . $nama_foto);

					$koneksi->query("UPDATE `tb_produk` SET `kategori_id` ='$kategori_id', 
															`produk_nama` ='$produk_nama',
															`produk_harga` ='$produk_harga',
															`produk_stok` ='$produk_stok',
															`produk_foto` ='$nama_foto',
															`produk_deskripsi` = '$produk_deskripsi'
															WHERE 
															`produk_id` = '$id'");
					echo  "<script>
									   alert('Data Berhasil Disimpan');
									   window.location='?page=pages/produk/index'
						   </script>";
				}
			} ?>

		</div>
	</div>
</div>





</div>