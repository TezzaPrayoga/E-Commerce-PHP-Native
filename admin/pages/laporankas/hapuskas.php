<?php 	
					$id		=	$_GET['idhapus'];

					$koneksi->query("DELETE FROM tb_keuangan WHERE id_keuangan = '$id'");

						 echo  "<script>
					   			alert('Data Berhasil Di hapus');
					   			window.location='?page=pages/laporankas/index'
					   </script>";



 ?>