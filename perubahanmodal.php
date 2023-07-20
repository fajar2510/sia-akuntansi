<?php include "header_navigation.php"; ?>
<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
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
                    <h4 class="page-title pull-left">Daftar Lap. Perubahan Modal</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="neraca.php">Laporan</a></li>
                        <li><span>per-tanggal</span></li>
                    </ul>
                </div>
            </div>
            <?php include "author.php"; ?>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">pilih per-tanggal</h4>

                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3 my-1">
                                            <label class="sr-only" for="inlineFormInputName">Name</label>
                                            <input class="form-control" type="date" value="2018-03-05" id="example-date-input">
                                        </div>
                                        <div class="col-sm-3 my-1">
                                            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" value="2018-03-05" id="example-date-input">
                                            </div>
                                        </div>
                                        <div class="col-auto my-1">
                                            <button type="button" class="btn btn-primary"><i class="ti-printer"></i> Cetak</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Perubahan Modal</h4>

                            <div class="data-tables datatable-dark">
                                <table id="dataTable" class="text-justify table  table-hover " width="100%">
                                    <tr align="center">

                                        <td colspan="4" align="center">
                                            <center><b>
                                                    <h5>Laporan Perubahan Modal</h5>
                                                </b>
                                                <center>
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td colspan="4" align="center">
                                            <center><b>Toko Bangunan DHONO JOYO</b>
                                                <center>
                                        </td>
                                    </tr>
                                    <?php
                                    $tglA = $_GET['tglA'];
                                    $tglB = $_GET['tglB'];

                                    ?>
                                    <tr>
                                        <th class="left">Modal awal Toko DHONO JOYO
                                        </th>
                                        <th class="right">
                                            <?php
                                            $modal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM modal"));
                                            echo "Rp.  "    . number_format($modal['nominal'], 2, ',', '.')    . "";
                                            ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em>Laba Bersih</em> </td>

                                        <td class="right">
                                            <?php
                                            $labaK = mysqli_query($connect, "SELECT SUM(jurnal_umum.kredit) AS labaK,
                                            		jurnal_umum.tanggal
                                            		FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
                                            		WHERE jurnal_umum.tanggal  AND jurnal_umum.tanggal  AND akun.laba_rugi ='T'
                                            	");
                                            $lbK = mysqli_fetch_array($labaK);

                                            $labaD = mysqli_query($connect, "SELECT SUM(jurnal_umum.debit) AS labaD,
                                            		jurnal_umum.tanggal
                                            		FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
                                            		WHERE jurnal_umum.tanggal  AND jurnal_umum.tanggal  AND akun.laba_rugi ='B'
                                            	");
                                            $lbD = mysqli_fetch_array($labaD);

                                            $total_laba = $lbK['labaK']    - $lbD['labaD'];



                                            echo "Rp.  "    . number_format($total_laba, 2, ',', '.')    . "";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em>Prive Toko Bangunan DHONO JOYO</em></td>
                                        <td class="right">
                                            <?php
                                            $prive = mysqli_fetch_array(mysqli_query($connect, "SELECT SUM(nominal) AS total_prive FROM prive WHERE tanggal  AND tanggal "));
                                            echo "- Rp.  "    . number_format($prive['total_prive'], 2, ',', '.')    . "";
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $total = ($modal['nominal'] + $total_laba) - $prive['total_prive'];

                                    ?>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th class="left">
                                            Modal akhir Toko DHONO JOYO
                                        </th>
                                        <th class="right">
                                            <?php
                                            echo "Rp.  "    . number_format($total, 2, ',', '.')    . "";
                                            ?>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- main content area end -->
<?php include "footer.php"; ?>