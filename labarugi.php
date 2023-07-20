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
                    <h4 class="page-title pull-left">Daftar Laporan Laba Rugi</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="labarugi.php">Laporan</a></li>
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
                                <h4 class="header-title">Pilih per-tanggal</h4>

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
                            <h4 class="header-title">Laba Rugi</h4>

                            <div class="data-tables datatable-dark">
                                <table id="dataTable" class="text-justify table  table-hover table-responsive" width="100%">
                                    <tr align="center">

                                        <td colspan="4" align="center">
                                            <center><b>
                                                    <h5>Laporan Laba Rugi</h5>
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
                                    <tr>
                                        <th colspan="3" class="left" width="5%">Pendapatan Penjualan :</th>
                                    </tr>
                                    <?php
                                    $tglA = $_GET['tglA'];
                                    $tglB = $_GET['tglB'];

                                    $sqlT = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE jurnal_umum.tanggal  AND jurnal_umum.tanggal  AND akun.laba_rugi='T' AND akun.laba_rugi !='N'
															GROUP BY jurnal_umum.id_akun
															ORDER BY jurnal_umum.id_jurnal ASC";
                                    $queryT    = mysqli_query($connect, $sqlT);
                                    while ($rowsT = mysqli_fetch_array($queryT)) {
                                        ?>
                                        <tr>
                                            <td class="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em><?php echo $rowsT['nama_akun']; ?></em></td>
                                            <td class="right"></td>
                                            <td class="right">
                                                <?php echo "Rp. " . number_format($rowsT['jml_kredit'], 2, ',', '.') . ""; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                        $total_debitT += $rowsT['jml_debit'];
                                        $total_kreditT += $rowsT['jml_kredit'];
                                        $totalT = $total_debitT + $total_kreditT;
                                    }
                                    ?>
                                    <tr>
                                        <td><b>
                                                <div align="left">Laba Kotor</div>
                                            </b></td>
                                        <td class="right"></td>
                                        <td class="right"><b><?php echo "Rp. " . number_format($total_kreditT, 2, ',', '.') . ""; ?></b></td>
                                    </tr>
                                    <!-- batas -->
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="left" width="5%">Beban Dagang :</th>
                                    </tr>
                                    <?php
                                    $sqlB = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE jurnal_umum.tanggal  AND jurnal_umum.tanggal  AND akun.laba_rugi='B' AND akun.laba_rugi !='N'
															GROUP BY jurnal_umum.id_akun
															ORDER BY jurnal_umum.id_jurnal ASC";
                                    $queryB    = mysqli_query($connect, $sqlB);
                                    while ($rowsB = mysqli_fetch_array($queryB)) {
                                        ?>
                                        <tr>
                                            <td class="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <em><?php echo $rowsB['nama_akun']; ?></em></td>
                                            <td class="right"><?php echo "Rp. " . number_format($rowsB['jml_debit'], 2, ',', '.') . ""; ?></td>
                                            <td class="right"></td>
                                        </tr>
                                        <?php
                                        $total_debitB += $rowsB['jml_debit'];
                                        $total_kreditB += $rowsB['jml_kredit'];
                                        $totalB = $total_debitB + $total_kreditB;
                                    }
                                    ?>
                                    <tr>
                                        <td><b>
                                                <div align="left">Total Beban Dagang</div>
                                            </b></td>
                                        <td class="right"></td>
                                        <td class="right"><b><?php echo "Rp. " . number_format($total_debitB, 2, ',', '.') . ""; ?></b></td>
                                    </tr>
                                    <!-- batas -->
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <!-- /batas -->
                                    <tr>
                                        <td><b>
                                                <div align="left">Laba Bersih</div>
                                            </b></td>
                                        <td class="right"></td>
                                        <td class="right"><b><?php echo "Rp. " . number_format($total_kreditT - $total_debitB, 2, ',', '.') . ""; ?></b></td>
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