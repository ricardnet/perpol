<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');
include('../function.php');

$buku           = $_POST['buku'];
$nama           = $_POST['nama'];
$nim            = $_POST['nim'];
$tgl_pinjam     = date('Y-m-d',strtotime($_POST['tgl_pinjam']));
$tgl_jatuh_tempo= date('Y-m-d',strtotime($_POST['tgl_jatuh_tempo']));

// cek stok buku
$stok_buku = cek_stok($db,$buku);

if($stok_buku < 1){
    $_SESSION['messages'] = '<div class="alert alert-warning"><strong>Stok buku sudah habis, proses peminjaman gagal!</strong></div>';
    header('Location: list-peminjaman.php');
    exit();
}

$query = "INSERT INTO pinjam (buku_id,pinjam_nama,pinjam_nim,tgl_pinjam,tgl_jatuh_tempo)
            VALUES ('$buku','$nama','$nim','$tgl_pinjam','$tgl_jatuh_tempo')";
$hasil = mysqli_query($db,$query);
if($hasil==true){
    kurangi_stok($db,$buku);
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Peminjaman data sukses!</strong></div>';
    header('Location: list-peminjaman.php');
}else{
    $_SESSION['messages'] = '<div class="alert alert-danger"><strong>Tambah data gagal!</strong></div>';
    header('Location: list-peminjaman.php');
}