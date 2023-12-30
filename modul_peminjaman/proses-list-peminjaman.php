<?php
session_start();
if(! isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');
$query = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id, buku.buku_kode, buku.buku_judul
           FROM pinjam
           JOIN buku ON buku.buku_id = pinjam.buku_id ";
$hasil = mysqli_query($db,$query);
mysqli_connect_error();
//menampung semua data kategori
$data_pinjam = array();
while ($row = mysqli_fetch_assoc($hasil)){
    $data_pinjam[]=$row;
}