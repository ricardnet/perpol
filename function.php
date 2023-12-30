<?php

function cek_stok($db,$buku_id){
    $q = "SELECT jumlah FROM buku WHERE buku_id = $buku_id";
    $hasil = mysqli_query($db,$q);
    $hasil = mysqli_fetch_assoc($hasil);
    $stok = $hasil['jumlah'];

    return $stok;
}

function kurangi_stok($db,$buku_id){
    $q = "UPDATE buku SET jumlah = jumlah - 1 WHERE buku_id = $buku_id";
    $hasil = mysqli_query($db,$q);
}

function tambah_stok($db,$buku_id){
    $q = "UPDATE buku SET jumlah = jumlah + 1 WHERE buku_id = $buku_id";
    $hasil = mysqli_query($db,$q);
}