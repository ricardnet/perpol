<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit;
}
include('../config.php');
$kategori = $_POST['kategori'];
$query = "INSERT INTO kategori (kategori_nama) VALUES ('$kategori')";
$hasil = mysqli_query($db,$query);
if($hasil==true){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Data berhasil di tambah!</strong></div>';
    header('Location: list-kategori.php');
}else{
    header('Location: list-kategori.php');
}