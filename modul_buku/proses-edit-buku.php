<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}

include('../config.php');

$id_buku    = $_POST['id_buku'];
$kode       = $_POST['kode'];
$judul      = $_POST['judul'];
$kategori   = $_POST['kategori'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$tahun      = $_POST['tahun'];
$jumlah     = $_POST['jumlah'];

$query = "UPDATE buku 
        SET buku_kode       = '$kode',
            buku_judul      = '$judul',
            kategori_id     = '$kategori',
            buku_pengarang  = '$pengarang',
            buku_penerbit   = '$penerbit',
            buku_tahun      = '$tahun',
            jumlah          = '$jumlah'
        WHERE buku_id = $id_buku";
$hasil = mysqli_query($db,$query);
if($hasil==true){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Edit data sukses!</strong></div>';
    header('Location: list-buku.php');
    exit();
}