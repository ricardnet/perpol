<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');

$id_buku = $_GET['id_buku'];
$query = "DELETE FROM buku WHERE buku_id = $id_buku";
$hasil = mysqli_query($db,$query);
if($hasil==true){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Hapus data sukses!</strong></div>';
    header('Location: list-buku.php');
}else{
    $_SESSION['messages'] = '<div class="alert alert-danger"><strong>Hapus data gagl!</strong></div>';
    header('Location: list-buku.php');
}