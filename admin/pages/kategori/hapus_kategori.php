<?php 	
					$id		=	$_GET['idhapus'];

					$koneksi->query("DELETE FROM tb_kategori WHERE kategori_id = '$id'");

						 echo  "<script>
					   			alert('Data Berhasil Di hapus');
					   			window.location='?page=pages/kategori/index'
					   </script>";



 ?>