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
                    <h4 class="page-title pull-left">Laporan-laporan</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="laporan_laporan.php">Data Laporan</a></li>
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
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Pilih Bulan</h4>
                        <form action="" method="post">
                            <div class="form-row align-items-center">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Pilih Jurnal per Bulan</label>
                                        <select class="form-control" name="bulan">
                                            <option value="">Pilih Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto my-1">
                                    <button type="submit" name='filter' class="btn btn-primary"><i class="ti-filter"></i> Filter</button>
                                </div>
                                <div class="col-auto my-2">
                                    <a href="cetak_lp.php?bulan=<?= @$_POST['bulan'] ?>" target="_blank">
                                        <button type="button" name='Cetak' class="btn btn-primary"><i class="ti-printer"></i> Cetak</button>
                                    </a>
                                </div>
                                <div class="col-auto my-2">
                                    <a href="unduhexcellp.php?bulan=<?= @$_POST['bulan'] ?>" target="_blank">
                                        <button type="button" name='unduhexcellp' class="btn btn-primary"><i class="ti-download"></i> Unduh Excel</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Laba Rugi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Perubahan Modal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Neraca Saldo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">Neraca Aktiva Pasiva</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="col-8 mt-5">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="data-tables ">
                                            <table id="dataTable" class="text-left table table-hover table-sm" width="100%">
                                                <thead>
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
                                                    <tr align="center">
                                                        <td colspan="4" align="center">
                                                            <center><b> </b>
                                                                <center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="left" width="5%">Pendapatan Penjualan :</th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                $sqlT = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE akun.laba_rugi='T' AND akun.laba_rugi !='N'
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
                                                    @$no++;
                                                    @$total_debitT += $rowsT['jml_debit'];
                                                    @$total_kreditT += $rowsT['jml_kredit'];
                                                    @$totalT = $total_debitT + $total_kreditT;
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
                                                <thead>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                </thead>
                                                <!-- /batas -->
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" class="left" width="5%">Beban Dagang :</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $sqlB = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE akun.laba_rugi='B' AND akun.laba_rugi !='N'
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
                                                    @$total_debitB += $rowsB['jml_debit'];
                                                    @$total_kreditB += $rowsB['jml_kredit'];
                                                    @$totalB = $total_debitB + $total_kreditB;
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
                                                <thead>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                </thead>
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="col-9 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="data-tables ">
                                            <table id="dataTable" class="text-left table  table-hover table-sm" width="100%">
                                                <thead>
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
                                                    <tr align="center">
                                                        <td colspan="4" align="center">
                                                            <center><b> </b>
                                                                <center>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <?php


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
                                            		WHERE akun.laba_rugi ='T'
                                            	");
                                                        $lbK = mysqli_fetch_array($labaK);

                                                        $labaD = mysqli_query($connect, "SELECT SUM(jurnal_umum.debit) AS labaD,
                                            		jurnal_umum.tanggal
                                            		FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
                                            		WHERE akun.laba_rugi ='B'
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
                                                        $prive = mysqli_fetch_array(mysqli_query($connect, "SELECT SUM(nominal) AS total_prive FROM prive "));
                                                        echo "- Rp.  "    . number_format($prive['total_prive'], 2, ',', '.')    . "";
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $total = ($modal['nominal'] + $total_laba) - $prive['total_prive'];

                                                ?>
                                                <thead>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                </thead>
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="col-9 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="data-tables ">
                                            <table id="dataTable" class="text-left table table-hover table-sm" width="100%">
                                                <thead>

                                                    <tr align="center">

                                                        <td colspan="4" align="center">
                                                            <center><b>
                                                                    <h5>Neraca Saldo</h5>
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
                                                    <tr align="center">
                                                        <td colspan="4" align="center">
                                                            <center><b>Neraca Saldo</b>
                                                                <center>
                                                        </td>
                                                    </tr>
                                                    <tr align="center">
                                                        <th rowspan="2" align="center" class="center" width="20%">
                                                            <center>Kode Akun</center>
                                                        </th>
                                                        <th rowspan="2" align="center" class="center" width="40%">
                                                            <center>Nama Akun</center>
                                                        </th>
                                                        <th colspan="2" align="center" class="center" width="40%">
                                                            <center>Saldo</center>
                                                        </th>
                                                    </tr>
                                                    <tr align="center">
                                                        <th>
                                                            <center>Debit</center>
                                                        </th>
                                                        <th>
                                                            <center>Kredit</center>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php


                                                    $saldo_debit = 0;
                                                    $saldo_kredit = 0;
                                                    $sql = mysqli_query($connect, "SELECT * FROM akun ORDER BY id_akun");


                                                    while ($query = mysqli_fetch_array($sql)) {
                                                        $id_akun = $query['id_akun'];

                                                        ?>
                                                        <tr>
                                                            <td class="center" align="center"><?= $query['kode_akun'] ?></td>
                                                            <td class="center"><?= $query['nama_akun'] ?></td>
                                                            <?php
                                                            $sal = mysqli_query($connect, "SELECT SUM(Debit) as Debit FROM jurnal_umum WHERE id_akun='$id_akun'");
                                                            $debit = mysqli_fetch_array($sal);

                                                            $sal2 = mysqli_query($connect, "SELECT SUM(Kredit) as Kredit FROM jurnal_umum WHERE id_akun=$id_akun");
                                                            $kredit = mysqli_fetch_array($sal2);

                                                            if ($query['status'] == "Debit") {
                                                                $salD = $debit['Debit'] - $kredit['Kredit'];
                                                                $saldo_debit += $salD;
                                                                $salK = 0;
                                                            } else {
                                                                $salD = 0;
                                                                $salK = $kredit['Kredit'];
                                                                $saldo_kredit += $salK;
                                                            }
                                                            ?>
                                                            <td>Rp.<?= number_format($salD) ?></td>
                                                            <td>Rp.<?= number_format($salK) ?></td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" align="right"><b>Total :</b></td>
                                                        <td><b>Rp.<?= number_format($saldo_debit) ?></b></td>
                                                        <td><b>Rp.<?= number_format($saldo_kredit) ?></b></td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane  fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                            <div class="col-8 mt-5">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="data-tables ">
                                            <table id="dataTable" class="text-left table table-hover table-sm" width="100%">
                                                <thead>
                                                    <tr align="center">

                                                        <td colspan="4" align="center">
                                                            <center><b>
                                                                    <h5> Laporan Neraca </h5>
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
                                                    <tr align="center">
                                                        <td colspan="4" align="center">
                                                            <center><b></b>
                                                                <center>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="2" class="left" width="50%">Aktiva</th>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="2" class="left" width="50%">Aktiva Lancar</th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                $sqlL = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE akun.posisi='Aktiva' AND akun.posisi !='-'
															GROUP BY jurnal_umum.id_akun
															ORDER BY jurnal_umum.id_akun ASC";
                                                $queryL    = mysqli_query($connect, $sqlL);
                                                while ($rowsL = mysqli_fetch_array($queryL)) {
                                                    ?>
                                                    <tr>
                                                        <td class="left"> &nbsp&nbsp&nbsp <em> <?php echo $rowsL['nama_akun']; ?></em></td>
                                                        <?php
                                                        if ($rowsL['status'] == 'Debit') {
                                                            $jml_debitL = $rowsL['jml_debit'] - $rowsL['jml_kredit'];
                                                            ?>
                                                            <td align="right">
                                                                <?php echo "Rp. " . number_format($jml_debitL, 2, ',', '.') . ""; ?>
                                                            </td>
                                                        <?php
                                                    } else {
                                                        $jml_kreditL = $rowsL['jml_kredit'] - $rowsL['jml_debit'];
                                                        ?>
                                                            <td align="right">
                                                                <?php echo "Rp. " . number_format($jml_kreditL, 2, ',', '.') . ""; ?>
                                                            </td>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tr>
                                                    <?php
                                                    $total_debitL += $jml_debitL;
                                                    $total_kreditL += $jml_kreditL;
                                                    $totalL = $total_debitL + $total_kreditL;
                                                }
                                                ?>
                                                <tr>
                                                    <td><b>
                                                            <div align="left">TOTAL AKTIVA</div>
                                                        </b></td>

                                                    <td align="right"><b><?php echo "Rp. " . number_format($totalL, 2, ',', '.') . ""; ?></b></td>
                                                </tr>
                                                <!-- batas -->
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" class="center" width="50%">&nbsp;</th>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="2" class="left" width="50%">Pasiva</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="left" width="50%">Modal dan Ekuitas</th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                $labaK = mysqli_query($connect, "
																SELECT SUM(jurnal_umum.kredit) AS labaK,
																jurnal_umum.tanggal
																FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
																WHERE akun.laba_rugi ='T'
															");
                                                $lbK = mysqli_fetch_array($labaK);

                                                $labaD = mysqli_query($connect, "
															SELECT SUM(jurnal_umum.debit) AS labaD,
															jurnal_umum.tanggal
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE akun.laba_rugi ='B'
														");
                                                $lbD = mysqli_fetch_array($labaD);

                                                $total_laba = $lbK['labaK'] - $lbD['labaD'];

                                                $prive = mysqli_fetch_array(mysqli_query($connect, "SELECT SUM(nominal) AS total_prive FROM prive"));

                                                $sqlR = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE akun.posisi='Pasiva' AND akun.posisi !='-'
															GROUP BY jurnal_umum.id_akun
															ORDER BY jurnal_umum.id_akun ASC";
                                                $queryR    = mysqli_query($connect, $sqlR);

                                                while ($rowsR = mysqli_fetch_array($queryR)) {
                                                    $cekM = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM akun WHERE posisi='Pasiva' AND laba_rugi='N' AND pm='1'"));
                                                    $dataM = $cekM['nama_akun'];
                                                    ?>
                                                    <tr>
                                                        <td class="left"> &nbsp&nbsp&nbsp <em><?php echo $rowsR['nama_akun']; ?> </em></td>
                                                        <?php
                                                        if ($rowsR['nama_akun'] == $dataM) {
                                                            $jml_kredit = ($rowsR['jml_kredit'] - $rowsR['jml_debit']) + $total_laba;
                                                            $jml_kreditR = $jml_kredit - $prive['total_prive'];
                                                            ?>
                                                            <td align="right">
                                                                <?php echo "Rp. " . number_format($jml_kreditR, 2, ',', '.') . ""; ?>
                                                            </td>
                                                        <?php
                                                    } else {
                                                        $jml_kreditR = $rowsR['jml_kredit'] - $rowsR['jml_debit'];
                                                        ?>
                                                            <td align="right">
                                                                <?php echo "Rp. " . number_format($jml_kreditR, 2, ',', '.') . ""; ?>
                                                            </td>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tr>
                                                    <?php
                                                    $total_debitR += $jml_debitR;
                                                    $total_kreditR += $jml_kreditR;
                                                    $totalR = $total_debitR + $total_kreditR;
                                                }
                                                ?>
                                                <tr>
                                                    <td><b>
                                                            <div align="left">TOTAL PASIVA</div>
                                                        </b></td>

                                                    <td align="right"><b><?php echo "Rp. " . number_format($totalR, 2, ',', '.') . ""; ?></b></td>

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
    </div>
</div>
<?php include "footer.php"; ?>