<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');
$id_kategori = $_GET['id_kategori'];
$query = "DELETE FROM kategori WHERE kategori_id=$id_kategori";
$hasil = mysqli_query($db,$query);
if($hasil==true){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Hapus data sukses!</strong></div>';
    header('Location: list-kategori.php');
}else{
    $_SESSION['messages'] = '<div class="alert alert-danger"><strong>Hapus data gagal!</strong></div>';
    header('Location: list-kategori.php');
}