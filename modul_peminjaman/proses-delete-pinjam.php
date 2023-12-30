<?php
session_start();
include('../config.php');
include('../function.php');
$id_pinjam  = $_GET['id_pinjam'];
$status     = $_GET['status'];
$buku_id    = $_GET['buku_id'];

//cek status, jika pinjam maka data buku jumlahkan 1
if ($status == 'pinjam'){
    tambah_stok($db,$buku_id);
}
$query = "DELETE FROM pinjam WHERE pinjam_id=$id_pinjam";
$hasil = mysqli_query($db,$query);

if($hasil==true){
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Pengembalian data sukses!</strong></div>';
    header('Location: list-peminjaman.php');
}else{
    $_SESSION['messages'] = '<div class="alert alert-danger"><strong>Pengembalian data gagal!</strong></div>';
    header('Location: list-peminjaman.php');
}