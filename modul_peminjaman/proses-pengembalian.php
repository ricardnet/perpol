<?php

session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit();
}
include('../config.php');
include('../function.php');

$tgl_kembali = $_POST