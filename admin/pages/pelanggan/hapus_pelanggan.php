<?php 	
					$id		=	$_GET['idhapus'];

					$koneksi->query("DELETE FROM tb_pelanggan WHERE pelanggan_id = '$id'");

						 echo  "<script>
					   			alert('Data Berhasil Di hapus');
					   			window.location='?page=pages/pelanggan/index'
					   </script>";



 ?>