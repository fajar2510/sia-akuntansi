<?php
include "connection/connection.php";

$bulan = @$_GET['bulan'];
// sesuai kan root file mPDF anda
$nama_dokumen = 'Laporan Akuntansi'; //Beri nama file PDF hasil.
define('_MPDF_PATH', 'mpdf60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf = new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
//Tuliskan file HTML di bawah sini , sesuai File anda .

function tampil_bulan($x)
{
    if ($x == 1) {
        $bulan = "Januari";
    } elseif ($x == 2) {
        $bulan = "Februari";
    } elseif ($x == 3) {
        $bulan = "Maret";
    } elseif ($x == 4) {
        $bulan = "April";
    } elseif ($x == 5) {
        $bulan = "Mei";
    } elseif ($x == 6) {
        $bulan = "Juni";
    } elseif ($x == 7) {
        $bulan = "Juli";
    } elseif ($x == 8) {
        $bulan = "Agustus";
    } elseif ($x == 9) {
        $bulan = "September";
    } elseif ($x == 10) {
        $bulan = "Oktober";
    } elseif ($x == 11) {
        $bulan = "November";
    } elseif ($x == 12) {
        $bulan = "Desember";
    }
    return $bulan;
}
?>

<html>

<head>
    <link rel="icon" type="image/png" href="assets/images/icon/sia.png">
    <title>Cetak Laporan Akuntansi</title>
    <style>
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        .table1,
        th,
        td {
            border: 1px solid #999;
            padding: 8px 20px;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="center">
        <h3>
            <center>LAPORAN - LAPORAN AKUNTANSI</center>
        </h3>
        <h3>
            <center>
                Toko Dhono Joyo
            </center>
        </h3>

        <h3>
            <center>Laporan Laba Rugi</center>
        </h3>
        <h5>
            <center>per Bulan <?php echo tampil_bulan($_GET['bulan']); ?></center>
        </h5>
    </div>

    <table border="1" width="100%" class="table1">

        <tr>
            <th colspan="3" align="left" width="5%">Pendapatan Penjualan :</th>
        </tr>
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
                <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em><?php echo $rowsT['nama_akun']; ?></em></td>
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

        <tr>
            <td colspan="3"></td>
        </tr>

        <!-- /batas -->

        <tr>
            <th colspan="3" align="left" width="5%">Beban Dagang :</th>
        </tr>

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
                <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em><?php echo $rowsB['nama_akun']; ?></em></td>
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
            <td colspan="3"></td>
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
    <!-- end -->
    <br>

    <div class="center">
        <h3>
            <center>
                Toko Dhono Joyo
            </center>
        </h3>
        <h3>
            <center>Laporan Perubahan Modal</center>
        </h3>
        <h5>
            <center>per Bulan <?php echo tampil_bulan($_GET['bulan']); ?></center>
        </h5>
    </div>
    <table border="1" width="100%" class="table1">

        <?php


        ?>
        <tr>
            <th align="left">Modal awal Toko DHONO JOYO
            </th>
            <th class="right">
                <?php

                $modal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM modal"));
                echo "Rp.  "    . number_format($modal['nominal'], 2, ',', '.')    . "";
                ?>
            </th>
        </tr>
        <tr>
            <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>Laba Bersih</em> </td>

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
            <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>Prive Toko Bangunan DHONO JOYO</em></td>
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

        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <th align="left">
                Modal akhir Toko DHONO JOYO
            </th>
            <th class="right">
                <?php
                echo "Rp.  "    . number_format($total, 2, ',', '.')    . "";
                ?>
            </th>
        </tr>
    </table>
    <!-- end -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="center">
        <h3>
            <center>
                Toko Dhono Joyo
            </center>
        </h3>
        <h3>
            <center>Laporan Neraca Saldo</center>
        </h3>
        <h5>
            <center>per Bulan <?php echo tampil_bulan($_GET['bulan']); ?></center>
        </h5>
    </div>

    <table border="1" width="100%" class="table1">
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
                <td colspan="2" align="center"><b>Total </b></td>
                <td><b>Rp.<?= number_format($saldo_debit) ?></b></td>
                <td><b>Rp.<?= number_format($saldo_kredit) ?></b></td>
            </tr>
        </tfoot>
    </table>
    <!-- end -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="center">
        <h3>
            <center>
                Toko Dhono Joyo
            </center>
        </h3>
        <h3>
            <center>Laporan Neraca Aktiva Pasiva</center>
        </h3>
        <h5>
            <center>per Bulan <?php echo tampil_bulan($_GET['bulan']); ?></center>
        </h5>
    </div>

    <div class="data-tables ">
        <table border="1" width="100%" class="table1">
            <tr>
                <th colspan="2" align="left" width="50%">Aktiva</th>
            </tr>

            <tr>
                <th colspan="2" align="left" width="50%">Aktiva Lancar</th>
            </tr>
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
                    <td class="left"> &nbsp;&nbsp;&nbsp; <em> <?php echo $rowsL['nama_akun']; ?></em></td>
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
            <tr>
                <th colspan="2" class="center" width="50%">&nbsp;</th>
            </tr>

            <tr>
                <th colspan="2" align="left" width="50%">Pasiva</th>
            </tr>
            <tr>
                <th colspan="2" align="left" width="50%">Modal dan Ekuitas</th>
            </tr>
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
                    <td class="left"> &nbsp;&nbsp;&nbsp; <em><?php echo $rowsR['nama_akun']; ?> </em></td>
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
</body>




</html>
<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
// $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
// $mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>