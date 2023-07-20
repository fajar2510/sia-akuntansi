<?php
@session_start();
include "connection/connection.php";

$nama_user = $_SESSION['Nama'];
$level = $_SESSION['level'];

if (@$_SESSION['status'] != "login") {
    header("location:index.php");
}
?>

<?php include "header_navigation.php"; ?>


<!-- sidebar menu area end -->
<!-- main content area start -->
<div class="main-content ">
    <!-- header area start -->
    <!-- navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav -->
    <div class="header-area    ">
        <div class="row align-items-center ">
            <!-- nav and search button -->
            <div class=" col-md-6 col-sm-8 clearfix ">
                <div class=" nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                </ul>
            </div>
        </div>
    </div>

    <!-- header area end -->
    <!-- page title area start -->

    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="home.php">Dashboard</a></li>
                        <li><span>Home Dashboard</span></li>
                    </ul>
                </div>
                <?php include "jam.php"; ?>
            </div>
            <?php include "author.php"; ?>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">

            <div class="col-lg-12 mt-3">

                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pengenalan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tentang Aplikasi</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                                <p>
                                    <h6> Selamat datang di Sistem Informasi Akuntansi Toko Bahan Bangunan Dhono Joyo</h6> <br> Perhitungan matematis akuntansial dalam pengelolaan keuangan Toko Anda <br>
                                    <marquee direction="left" scrollamount="2" align="center" behavior="alternate">
                                        <h1>
                                            <?php

                                            date_default_timezone_set("Asia/Jakarta");

                                            $b = time();
                                            $hour = date("G", $b);

                                            if ($hour >= 0 && $hour <= 11) {
                                                echo "Hello, Selamat Pagi :)";
                                            } elseif ($hour >= 12 && $hour <= 14) {
                                                echo "Hello, Selamat Siang :) ";
                                            } elseif ($hour >= 15 && $hour <= 17) {
                                                echo "Hello, Selamat Sore :) ";
                                            } elseif ($hour >= 17 && $hour <= 18) {
                                                echo "Hello, Selamat Petang :) ";
                                            } elseif ($hour >= 19 && $hour <= 23) {
                                                echo "Hello, Selamat Malam :) ";
                                            }

                                            ?>
                                        </h1>
                                    </marquee>
                                </p>
                                <center><a href="home.php"><img src="assets/images/icon/work.gif" alt="gambar" width="600px " height="800px"></a></center>
                                <center>
                                    <h5>Good day Good Work</h5>
                                </center>
                                <br>
                                <br>
                                <br>


                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                <!-- accordion style 2 start -->
                                <div class="col-lg-12 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Guide SIA</h4>
                                            <div id="accordion2" class="according accordion-s2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#accordion21">Pengenalan Sistem Informasi Akuntansi
                                                        </a>
                                                    </div>
                                                    <div id="accordion21" class="collapse show" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            Sistem Informasi Akuntansi (SIA) digunakan untuk pengelolaan keuangan usaha atau bisnis ,secara akuntansial flow.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion22">Role dan Level pengguna untuk Admin</a>
                                                    </div>
                                                    <div id="accordion22" class="collapse" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            Pada SIA terdapat tiga (3) jenis role atau level pertama SuperAdmin, kedua Admin, ketiga Owner. Mari kita ketahui lebih lanjut, pada superadmin akan diberikan hak akses pada pengelolan Data Master, percayakan hak ini pada seorang yang memahami IT dan termasuk orang kepercayaan anda.
                                                            Pada admin atau bisa dikatakan karyawan,kasir diberikan akses keseluruhan kecuali, pada Data Master hal ini untuk menanggulangi pengubahan atau menipulasi data primer.
                                                            Lalu terakhir owner, ini adalah hak untuk pemilik usaha ,diberikan akses kepada hal-hal yang menyangkut laporan yaitu Laporan Akuntansial saja agar diharapkan dapat cepat dalam mengambil keputusan bisnis.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion23">Menu untuk Multi Admin</a>
                                                    </div>
                                                    <div id="accordion23" class="collapse" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            Pembagian Menu Multi Admin : Super Admin (Data Master) ,Admin (Transaksi, Data Akuntansial, Jurnal Umum, Buku Besar, Laporan Akuntansi), Owner (Laporan Akuntansi)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion24">Flow Akuntansi</a>
                                                    </div>
                                                    <div id="accordion24" class="collapse" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            Transaksi ,setiap data pada transaksi pada pembelian tunai akan masuk langsung kedalam data pembelian,jurnal umum, buku besar ,serta laporan
                                                            <br> Transaksi ,setiap data pada transaksi pada pembelian kredit akan masuk ke daftar hutang dagang, dan juga data pembelian, jurnal umum, buku besar, serta laporan
                                                            <br> Transaksi ,setiap data pada transaksi pada penjualan tunai akan masuk ke data penjualan, jurnal umum, buku besar, serta laporan
                                                            <br> Transaksi ,setiap data pada transaksi pada penjualan kredit akan masuk ke daftar piutang, dan juga data penjualan, jurnal umum, buku besar, serta laporan
                                                            <br> Data Modal, perlengkapan, beban-beban, dan prive akan masuk data masing-masing tabel serta akan masuk langsung ke jurnal umum, buku besar ,dan laporan
                                                            <br> Pada setiap entry data disediakan aksi hapus , hal ini juga akan berpengaruh kedalam jurnal umum, buku besar, dan laporan, ini digunakan untuk mengatasi kesalahan entry data bagi pegawai, akuntan ,atau kasir
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion25">Laporan Akuntansi</a>
                                                    </div>
                                                    <div id="accordion25" class="collapse" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            Pada Laporan Akuntansi memuat segala data yang telah diperoleh dan di aplikasikan ke dalam laporan Akuntansial, seperti Laporan Laba Rugi, Lap. Perubahan Modal, Lap. Neraca Saldo dan Lap. Neraca Aktiva Pasiva
                                                            <br> Laporan Laba Rugi, ini didapat kan dari total pendapatan dikurangi beban-beban
                                                            <br> Laporan Perubahan Modal, ini didapatkan dari Modal Awal ditambah Laba bersih kemudian dikurangi total Prive
                                                            <br> Laporan Neraca ,ini digunakan untuk balancing antara Pengeluaran dan Pendapatan, Aktiva dan Pasiva
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion26">Lain-lain</a>
                                                    </div>
                                                    <div id="accordion26" class="collapse" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            Beberapa menu navigasi atau tab-tab dapat memudahkan pengguna saat bergulir ke halaman, atau hanya melihat tab-tab ,serta kemudahan entry data otomatis juga mempermudah pengisian dengan waktu yang lebih cepat
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- accordion style 2 end -->

                                <!-- <ul>
                                    <li><b> 1. Data Master</b></li>
                                    <ul>
                                        <li>&nbsp&nbsp <em>a. Data User</em> </li>
                                        <p> Data User digunakan untuk menambah pengguna siapa saja yang dapat mengakses aplikasi sistem informasi akuntansi ini, dengan beberapa role atau tugas, 1. super admin,2. admin, 3. owner
                                            didalamnya diinstruksikan mengisi data-data pengguna seperti nama lengkap ,username, password, dan role.
                                        </p>
                                        <li>&nbsp&nbsp <em>b. Data Akun</em></li>
                                        <p> Data Akun digunakan untuk menambah akun-akun dalam akuntansi sepeti akun kas,modal, pendapatan,pembelian, hutang dagang, piutang, prive ,dan beban-beban,
                                            didalamnya diistruksikan mengisi data-data seperti nama akun, kode, akun, jenis status akun, serta posisi dalam neraca. Direkomendasikan pengisian sesuai ketentuan akuntansi yang berlaku.
                                        </p>
                                        <li>&nbsp&nbsp <em>c. Data Barang</em></li>

                                        <p> Data Barang disini digunakan untuk memberikan data nama barang apa saja yang dibeli atau dijual pada toko, meliputi harga beli serta harga jualnya nantinya ,dan juga kemudahan penggunaan pada admin kasir</p>
                                        <li>&nbsp&nbsp <em>d. Data Supplier</em></li>
                                    </ul>
                                    <li><b>2. Transaksi</b></li>
                                    <ul>
                                        <li>&nbsp&nbsp <em>a. Pembelian</em> </li>
                                        <p>Pembelian ,didalamnya meliputi layaknya transaksi pada kasir disini pembelian melayanai transaksi pembelian kepada supplier toko , yang diajak kerjasama atau berpartner, didalamnya menginputkan beberapa data seperti nama barang , dan kuantitas barang</p>
                                        <li>&nbsp&nbsp <em>b. Penjualan</em></li>
                                        <p>Penjualan , didalamnya meliputi layaknya transaksi pada kasir pada bagian penjualan , melayani transaksi penjualan pada pembeli atau konsumen, inputan meliputi nama barang, kuantitas serta nama pembeli</p>
                                    </ul>
                                    <li><b>3. Data</b></li>
                                    <ul>
                                        <li>&nbsp&nbsp <em>a. Modal</em> </li>
                                        <p>Modal, disini modal berperan penting dalam menentukan saldo awal toko, atau perkiraan modal toko yang nantinya akan di putar dalam arus kas toko dalam pembukuan Akuntasi</p>
                                        <li>&nbsp&nbsp <em>b. Perlengkapan</em></li>
                                        <p>Perlengkapan, didalam perlengkapan hanya memasukkan data perlengkapan toko apa saja yang dibeli meliputi harga dan keterangan pembelian dan akan masuk ke akun perlengkapan</p>
                                        <li>&nbsp&nbsp <em>c. Beban-beban</em></li>
                                        <p>Beban-beban, sama halnya akun-akun dalam akuntansi ,namun beban memiliki sub akun yaitu beban gaji, beban LTA, beban sewa dll, didalamnya admin akan memasukkan data beban sesuai keadaan toko</p>
                                        <li>&nbsp&nbsp <em>d. Prive</em></li>
                                        <p>Prive, suatu keadaan dimana owner atau toko mengambil kas toko untuk keperluan diluar bisnis seperti keperluan rumah tangga atau pribadi</p>
                                        <li>&nbsp&nbsp <em>e. Hutang Dagang</em></li>
                                        <p>Hutang Dagang, disini hutang dagang dapat didapat melalui transaksi pembelian jika transaksi tersebut terbilang kredit, dalam page hutang dagang akan hanya menampilkan daftar hutang dagang dari transaksi pembelian yang kredit</p>
                                        <li>&nbsp&nbsp <em>f. Piutang</em></li>
                                        <p>Piutang, disini Piutang dapat didapat melalui transaksi penjualan jika transaksi tersebut terbilang kredit, dalam page Piutang akan hanya menampilkan daftar Piutang dari transaksi penjualan yang kredit</p>
                                    </ul>
                                    <li><b>4. Jurnal Umum</b></li>
                                    <p>Jurnal Umum,</p>
                                    <li><b>5. Buku Besar</b></li>
                                    <p>Buku Besar,</p>
                                    <li><b>6. Laporan</b></li>
                                    <ul>
                                        <li>&nbsp&nbsp <em>a. Neraca</em> </li>
                                        <li>&nbsp&nbsp <em>a. Neraca Saldo</em> </li>
                                        <li>&nbsp&nbsp <em>b. Perubahan Modal</em></li>
                                        <li>&nbsp&nbsp <em>c. Laba Rugi</em></li>
                                    </ul>
                                </ul> -->
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <h4 class="text-center"><br> Sistem Informasi Akuntansi versi 1.0 </h4>
                                <h6 class="text-center"> <br>created and developed by <br>
                                    Raniar Haristyarini 17051214041, Fajar Abdurrohman 17051214047, dan Eva Istianah 17051214053</h6>
                                <br>
                                <p class="text-center">Sistem ini dibuat guna memenuhi tugas kuliah Sistem Informasi Akuntansi prodi S1 Sistem Informasi Jurusan Teknik Informatika Universitas Negeri Surabaya
                                    Aplikasi berbasis Web ini dikembangkan menggunakan bahasa pemograman web html,php ,css, javascript/jquery ,dan sistem ini masih dalam tahap pengembangan . Harapan kami sistem ini terus dikembangkan agar memiliki kebermanfaatan pemilik usaha-usaha.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>