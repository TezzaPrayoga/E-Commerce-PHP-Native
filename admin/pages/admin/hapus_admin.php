<?php 	
					$id		=	$_GET['idhapus'];

					$koneksi->query("DELETE FROM tb_admin WHERE admin_id = '$id'");

						 echo  "<script>
					   			alert('Data Berhasil Di hapus');
					   			window.location='?page=pages/admin/index'
					   </script>";



 ?>