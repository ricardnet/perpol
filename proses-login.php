<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username = '$username'" ;
$hasil = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($hasil);

if ($data_user !=null){
    if ($password == $data_user['password']){
        $_SESSION['user'] = $data_user;
        header('Location: dashboard.php');
    } else {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}