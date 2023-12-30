<?php

session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');
include('../function.php');

$pinjam_id = $_POST['pinjam_id'];
$buku       = $_POST['buku'];
$nama       = $_POST['nama'];
$nim        = $_POST['nim'];
$tgl_pinjam = date('Y-m-d',strtotime($_POST['tgl_pinjam']));
$tgl_jatuh_tempo = date('Y-m-d',strtotime($_POST['tgl_jatuh_tempo']));

$stok = cek_stok($db, $buku);
if($stok < 1){
    $_SESSION['message'] = '<div class="alert alert-success"><strong>Stok buku sudah habis, proses peminjaman gagal!</strong></div>';
    header('Location: list-peminjaman.php?id_pinjam'.$pinjam_id);
    exit();
}

$query = "UPDATE pinjam 
            SET buku_id     = '$buku',
                pinjam_nama = '$nama',
                pinjam_nim  = '$nim',
                tgl_pinjam  = '$tgl_pinjam',
                tgl_jatuh_tempo = '$tgl_jatuh_tempo'
            WHERE pinjam_id = $pinjam_id"; 
$hasil = mysqli_query($db,$query);
if($hasil==true){
    kurangi_stok($db,$buku);
    $_SESSION['messages'] = '<div class="alert alert-success"><strong>Edit data sukses!</strong></div>';
    header('Location: list-peminjaman.php');
    exit();
}