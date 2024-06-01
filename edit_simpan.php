<?php
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $gambar_lama = $_POST['gambar_lama'];
        $simpan = "EDIT";
    } else{
        $simpan = "BARU";
    }
    
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar'] ['name'];
    $tmpName = $_FILES['gambar'] ['tmp_name'];
    $size = $_FILES['gambar'] ['size'];
    $type = $_FILES['gambar'] ['type'];

    $maxsize = 1500000;
    $typeYgBoleh = array("image/jpeg", "image/png", "image/pjpeg");

    $dirgambar = "foto";
    if(!is_dir($dirgambar)){
        mkdir($dirgambar);
    }
    $fileTujuangambar = "$dirgambar/".$gambar;
    $dataValid = "YA";

    if ($size > 0){
        if ($size > $maxsize){
            echo "ukuran File Terlalu Besar <br/>";
            $dataValid = "TIDAK";
        }
        if (!in_array($type, $typeYgBoleh)){
            echo "Type File Tidak Dikenal <br/>";
            $dataValid = "TIDAK";
        }
    }

    if (strlen(trim($deskripsi)) == 0){
        echo "deskripsi Barang Harus Diisi! <br/>";
        $dataValid = "TIDAK";
    }
    if ($dataValid == "TIDAK"){
        echo "Masih Ada Kesalahan, silahkan perbaiki! <br/>";
        echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
        exit;
    }   

    include "kon.php";

    if ($simpan == "EDIT"){
        if ($size == 0)
            $gambar = $gambar_lama;
        
        $sql = "UPDATE foto SET
                deskripsi = '$deskripsi',
                gambar = '$gambar'
                WHERE id = $id ";
    }else{
        $sql = "INSERT into foto
        (deskripsi, gambar)
        values
        ('$deskripsi', '$gambar')";
    }
   
    $hasil = mysqli_query($kon, $sql);

    if (!$hasil){
        echo "Gagal Simpan, Silahkan diulangi! <br/>";
        echo mysqli_error($kon);
        echo "<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
        exit;
    }else{
        echo "Simpan Data berhasil";
    }
    
    if ($size > 0){
        if (!move_uploaded_file($tmpName,$fileTujuangambar)){
            echo "Gagal Upload Gambar <br/>";
            echo "<a href='barang_tampil.php'> Daftar Barang</a>";
            exit;
        }else{
            $fileTujuanThumb = $dirgambar . "foto/" . $gambar;
            buat_thumbnail($fileTujuangambar, $fileTujuanThumb);
        }
    }

    echo "<br/> File Sudah di upload. <br/>";
    echo "<input type='button' value='isi lagi' onCLick='self.history.back()'>";

    function buat_thumbnail($file_src, $file_dst){
        list ($w_src, $h_src, $type) = getimagesize($file_src);

        switch ($type){
            case 1 :
                $img_src = imagecreatefromgif($file_src);
                break;
            case 2 :
                $img_src = imagecreatefromjpeg($file_src);
                break;
            case 3 :
                $img_src = imagecreatefrompng($file_src);
                break;
        }

        $thumb = 100;
        if ($w_src > $h_src){
            $w_dst = $thumb;
            $h_dst = round($thumb / $w_src * $h_src);
        }else{
            $w_dst = round($thumb / $h_src * $w_src);
            $h_dst = $thumb;
        }

        $img_dst = imagecreatetruecolor($w_dst, $h_dst);

        imagecopyresampled($img_dst,$img_src, 0,0,0,0,
                            $w_dst, $h_dst, $w_src, $h_src);
        imagejpeg($img_dst, $file_dst);

        imagedestroy($img_src);
        imagedestroy($img_dst);
    }
    header("location:album.php");

?>
<hr/>