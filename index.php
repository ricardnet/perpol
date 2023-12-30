<?php

$no=1;
include 'config.php';
$query = "SELECT buku.*,kategori.kategori_nama
    FROM buku
    JOIN kategori
    ON buku.kategori_id = kategori.kategori_id";
$hasil = mysqli_query($db, $query);
$data_buku = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $data_buku[] =  $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Perpol SMK NU MA'ARIF KUDUS</title>

  <!-- Favicons -->
  <link href="asset/img/favicon.png" rel="icon">
  <!-- Bootstrap core CSS -->
  <link href="asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="asset/css/style.css" rel="stylesheet">
  <link href="asset/css/style-responsive.css" rel="stylesheet">
  <!--Table-->
  <link rel="stylesheet" href="asset/lib/advanced-datatable/css/DT_bootstrap.css" />
  
  <link href="asset/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="asset/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <!--logo start-->
      <a href="index.php" class="logo"><b>PERPOL<span>SMKNUMA'ARIFKUDUS</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="dashboard.php"><i class="fa fa-sign-in"></i> Login</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!---Awal koding-->
    <section id="main-content" style="margin-left: 0px;">
        <section class="wrapper site-min-height">
            <div class="">
              <div class="row mb">
                <div class="content-panel">
                  <div class="adv-table">
                    <div class="dataTables_wrapper form-inline">
                      <div class="row-fluid">
                        <div class="span6">
                          <div class="dataTables_length">
                            <label> Search:</label>
                            <input type="text" class="dataTables-filter" id="myInput" onkeyup="myFunction()" placeholder="Judul Buku">
                          </div>
                        </div>
                      </div>
                      <br>
                      <br>
                      <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped" id="myTable">
                        <thead>     
                            <tr>
                                <th width="1%">No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data_buku AS $buku) :?>
                            <tr>
                                <td><?=$no++;?>.</td>
                                <td><?=$buku['buku_kode'];?></td>
                                <td><?=$buku['buku_judul']?></td>
                                <td><?=$buku['kategori_nama']?></td>
                                <td><?=$buku['buku_pengarang'];?></td>
                                <td><?=$buku['buku_penerbit']?></td>
                                <td><?=$buku['buku_tahun'];?></td>
                                <td><?=$buku['jumlah'];?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </section>
    <!--Akhir koding-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          <a href="index.php" style="color:white;"> PERPUSTAKAAN ONLINE </a> &copy; 2023 SMK NU MA'ARIF KUDUS
        </p>
        <a href="index.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="asset/lib/jquery/jquery.min.js"></script>
  <script src="asset/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="asset/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--common script for all pages-->
  <script src="asset/lib/common-scripts.js"></script>
  <!--script for this page-->

  <!--Serach -->
  <script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
  <!--Particles Js-->
  <script src="asset/lib/particles.js"></script>
  <script src="asset/lib/app.js"></script>
</body>
</html>