<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');
$id = $_POST['id_kategori'];
$kategori = $_POST['nama_kategori'];
$sql = mysqli_query($db,"UPDATE kategori SET kategori_nama='$kategori' WHERE kategori_id = $id ");
if ($sql){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Data berhasil di edit!</strong></div>';
    header('Location: list-kategori.php');
    exit();
}

