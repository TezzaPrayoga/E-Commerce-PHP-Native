<?php 	
					$id		=	$_GET['idhapus'];

					$koneksi->query("DELETE FROM tb_produk WHERE produk_id = '$id'");

						 echo  "<script>
					   			alert('Data Berhasil Di hapus');
					   			window.location='?page=pages/produk/index'
					   </script>";



 ?>