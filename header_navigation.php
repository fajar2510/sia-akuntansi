<?php
include "connection/connection.php";


@session_start();
$nama_user = $_SESSION['Nama'];
$level = $_SESSION['level'];
$foto = $_SESSION['foto'];
$status = $_SESSION['status'];

if ($status != "login") {
  header("location:index.php");
}


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <link rel="icon" type="image/png" href="assets/images/icon/sia.png">
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sistem Informasi Akuntansi DHONO JOYO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/metisMenu.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css">
  <!-- amchart css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- Start datatable css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
  <!-- others css -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--kalian bisa download file jquery dan masukkan ke dalam folder assets/js/-->
  <script src="assets/js/jquery.js"></script>
  <!--atau bisa juga masukkan script berikut ini bila anda terhubung ke dalam internet tanpa harus mendownloadnya-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="assets/css/typography.css">
  <link rel="stylesheet" href="assets/css/default-css.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <!-- modernizr css -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- preloader area start -->
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- page container area start -->
  <div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
      <div class="sidebar-header">
        <div class="logo">
          <!-- <a href="home.php"><img src="assets/images/icon/chevron22.png" alt="logo"></a> -->
          <br>
          <p href style="font-weight:bold;font-size:14px;font-family:Roboto Thin;color:white "> Sistem Informasi Akuntansi </p>
          <a href="home.php">
            <p href style="font-weight:bold;font-size:19px;font-family:Roboto Black;color:white"> DHONO JOYO</p>
          </a>
        </div>
      </div>
      <div class="main-menu">

        <div class="menu-inner">
          <nav>

            <?php
            if ($level == 1) {
              ?>
              <ul class="metismenu" id="menu">

                <li class="active"><a href="home.php"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                <!--<p>Isi Sidebar dibawah ini</p> -->
                </li>
                <li>
                  <!--<p>Jarak Sidebar Menu</p> -->
                  <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-grid4"></i><span>Data Master</span></a>
                  <ul class="collapse">
                    <!--<p>Isi Sidebar dibawah ini</p> -->
                    <li class="active"><a href="user.php">User</a></li>
                    <li class="active"><a href="akun.php">Akun</a></li>
                    <li class="active"><a href="barang.php">Barang</a></li>
                    <li class="active"><a href="supplier.php">Supplier</a></li>
                  </ul>

                </li>
                <!--<p>Jarak Sidebar Menu</p> -->
                <li>
                  <a href="javascript:void(0)" aria-expanded="true"><i class="ti-money"></i><span>Transaksi</span></a>
                  <ul class="collapse">

                    <li class="active"><a href="pembelian.php">Pembelian</a></li>
                    <li class="active"><a href="penjualan.php">Penjualan</a></li>
                  </ul>
                </li>
                <li>
                  <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bag"></i><span>Data Akuntansi </span></a>
                  <ul class="collapse">

                    <li class="active"><a href="modal.php">Modal</a></li>
                    <li class="active"><a href="perlengkapan.php">Perlengkapan</a></li>
                    <li class="active"><a href="beban.php">Beban</a></li>
                    <li class="active"><a href="prive.php">Prive</a></li>
                    <li class="active"><a href="hutang_dagang.php">Hutang dagang</a></li>
                    <li class="active"><a href="piutang.php">Piutang</a></li>

                  </ul>
                </li>

                <li class=""><a href="jurnal_umum.php"><i class="ti-bookmark-alt"></i> <span>Jurnal Umum</span></a></li>
                <li class=""><a href="bukubesar.php"><i class="ti-book"></i> <span>Buku Besar</span></a></li>
                <li class=""><a href="laporan_laporan.php"><i class="ti-agenda"></i> <span>Laporan Akuntansi</span></a></li>
              <?php
            } elseif ($level == 2) {
              ?>
                <ul class="metismenu" id="menu">

                  <li class="active"><a href="home.php"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                  <!--<p>Isi Sidebar dibawah ini</p> -->
                  </li>
                  <!--<p>Jarak Sidebar Menu</p> -->
                  <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-money"></i><span>Transaksi</span></a>
                    <ul class="collapse">
                      <!--<p>Isi Sidebar dibawah ini</p> -->
                      <li class="active"><a href="pembelian.php">Pembelian</a></li>
                      <li class="active"><a href="penjualan.php">Penjualan</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bag"></i><span>Data Akuntansi</span></a>
                    <ul class="collapse">
                      <!--<p>Isi Sidebar dibawah ini</p> -->
                      <li class="active"><a href="modal.php">Modal</a></li>
                      <li class="active"><a href="perlengkapan.php">Perlengkapan</a></li>
                      <li class="active"><a href="beban.php">Beban</a></li>
                      <li class="active"><a href="prive.php">Prive</a></li>
                      <li class="active"><a href="hutang_dagang.php">Hutang dagang</a></li>
                      <li class="active"><a href="piutang.php">Piutang</a></li>

                    </ul>
                  <li class=""><a href="jurnal_umum.php"><i class="ti-bookmark-alt"></i> <span>Jurnal Umum</span></a></li>
                  <li class=""><a href="bukubesar.php"><i class="ti-book"></i> <span>Buku Besar</span></a></li>
                  <li class=""><a href="laporan_laporan.php"><i class="ti-agenda"></i> <span>Laporan Akuntansi</span></a></li>

                  </li>
                </ul>

                </li>
              <?php
            } else {
              ?>
                <ul class="metismenu" id="menu">

                  <li class="active"><a href="home.php"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                  <!--<p>Isi Sidebar dibawah ini</p> -->
                  </li>
                  <!--<p>Jarak Sidebar Menu</p> -->
                  <li class=""><a href="laporan_laporan.php"><i class="ti-agenda"></i> <span>Laporan Akuntansi</span></a></li>

                <?php
              }
              ?>
          </nav>
        </div>
      </div>
    </div>