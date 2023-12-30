<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Perpol SMK NU MA'ARIF KUDUS</title>

  <!-- Favicons -->
  <link href="../asset/img/favicon.png" rel="icon">
  <!-- Bootstrap core CSS -->
  <link href="../asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../asset/css/style.css" rel="stylesheet">
  <link href="../asset/css/style-responsive.css" rel="stylesheet">
  <!--Date Css-->
  <link rel="stylesheet" href="../asset/lib/bootstrap-datepicker/css/datepicker.css">
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>PERPOL<span>SMKNUMA'ARIFKUDUS</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php"> <i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="../asset/img/userphoto.png" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION['user']['nama_user'] ;?></h5>
          <li class="mt">
            <a href="../dashboard.php">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="../modul_kategori/list-kategori.php">
              <i class="fa fa-tags"></i>
              <span>Data Kategori</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="../modul_buku/list-buku.php">
              <i class="fa fa-book"></i>
              <span>Data Buku</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="../modul_peminjaman/list-peminjaman.php">
              <i class="fa fa-group"></i>
              <span>Peminjaman</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="../about">
              <i class="fa fa-info-circle"></i>
              <span>About</span>
            </a>
          </li>
        </ul>
        
        <!-- sidebar menu end-->
      </div>
    </aside>