<?php
session_start();
if(! isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit;
}

include('../config.php');
$kode       = $_POST['kode'];
$judul      = $_POST['judul'];
$kategori   = $_POST['kategori'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$tahun      = $_POST['tahun'];
$jumlah     = $_POST['jumlah'];

$query = "INSERT INTO buku (buku_kode,buku_judul,kategori_id,buku_pengarang,buku_penerbit,buku_tahun,jumlah) 
            VALUES ('$kode','$judul','$kategori','$pengarang','$penerbit','$tahun',$jumlah)";
$hasil = mysqli_query($db,$query);
if($hasil==true){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Tambah data sukses!</strong></div>';
    header('Location: list-buku.php');
}else{
    $_SESSION['messages'] = '<div class="alert alert-danger"><strong>Tambah data gagal!</strong></div>';
    header('Location: list-buku.php');
}