<?php

include('../config.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$sql = mysqli_query($db,"UPDATE kategori SET kategori_nama='$nama' WHERE kategori_id = $id ");
if ($sql){
    //jika berhasil tampil
    header('Location: index.php');
}else{
    echo "gagal bos";
}
