<?php
include "connection/connection.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Buku Besar.xls");

$bulan = @$_GET['bulan'];

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
    <title>Cetak Jurnal Umum</title>
    <style>
        .table1 {
            font-family: Arial;
            color: #232323;
            border-collapse: collapse;
        }

        .table1,
        th,
        td {
            font-family: Arial;
            border: 1px solid #999;
            padding: 5px 15px;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>


    <table border="1" width="100%" class="table1">
        <thead>
            <tr align="center">

                <td colspan="6" align="center">
                    <center><b>
                            <h5>Buku Besar</h5>
                        </b>
                        <center>
                </td>
            </tr>
            <tr align="center">
                <td colspan="6" align="center">
                    <center><b>Toko Bangunan DHONO JOYO</b>
                        <center>
                </td>
            </tr>
            <?php
            if (isset($_POST['filter'])) {
                $bulan = $_POST['bulan'];

                $sql = "SELECT * FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
                                                    
                                                            WHERE MONTH(tanggal)='$bulan'
															GROUP BY jurnal_umum.id_akun
                                                            ORDER BY jurnal_umum.tanggal ,jurnal_umum.id_akun ASC";
            } else {
                $sql = "SELECT * FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
															GROUP BY jurnal_umum.id_akun
                                                            ORDER BY jurnal_umum.tanggal ,jurnal_umum.id_akun ASC";
            }
            $query    = mysqli_query($connect, $sql);

            while ($rows = mysqli_fetch_array($query)) {
                ?>
                <thead>

                    <tr>
                        <th colspan="4"><b>Nama Akun : <?= $rows['nama_akun'] ?></b></th>
                        <th colspan="2">
                            <div align="right"><b>Kode Akun : <?= $rows['kode_akun'] ?></b></div>
                        </th>
                    </tr>


                    <tr>
                        <td rowspan="2" class="center" width="12%"><b>Tanggal</b></td>
                        <td rowspan="2" class="center" width="24%"><b>Keterangan</b></td>
                        <td rowspan="2" class="center" width="15%"><b>Debit</b></td>
                        <td rowspan="2" class="center" width="15%"><b>Kredit</b></td>
                        <td colspan="2" class="center" align="center"><b>Saldo</b></td>
                    </tr>
                    <tr>
                        <td class="center" width="16%"><b>Debit</b></td>
                        <td class="center" width="16%"><b>Kredit</b></td>
                    </tr>
                </thead>
            <tbody>


                <?php
                $id_akun = $rows['id_akun'];
                $query_jurnal = mysqli_query($connect, "SELECT * FROM jurnal_umum WHERE id_akun='$id_akun' ORDER BY tanggal, no_jurnal ASC");
                $jurnal_data = mysqli_fetch_array($query_jurnal);

                $saldo = 0;
                $posisi = "";

                if ($jurnal_data['debit'] == 0) {
                    $saldo = $jurnal_data['kredit'];
                    $posisi = "kanan";
                } else {
                    $saldo = $jurnal_data['debit'];
                    $posisi = "kiri";
                }

                $sqlU = "SELECT jurnal_umum.*, akun.id_akun, akun.nama_akun, akun.status
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
															WHERE jurnal_umum.id_akun='$rows[id_akun]'
															ORDER BY  jurnal_umum.tanggal, jurnal_umum.no_jurnal, jurnal_umum.id_akun ASC";
                $queryU    = mysqli_query($connect, $sqlU);
                $no = 0;
                while ($rowsU = mysqli_fetch_array($queryU)) {
                    $no++;
                    ?>
                    <tr>
                        <td class="center"><?php echo $rowsU['tanggal']; ?></td>
                        <td class="center"><?php echo $rowsU['keterangan']; ?></td>
                        <td class="right">
                            <?php echo "Rp. " . number_format($rowsU['debit'], 2, ',', '.') . ""; ?>
                        </td>
                        <td class="right">
                            <?php echo "Rp. " . number_format($rowsU['kredit'], 2, ',', '.') . ""; ?>
                        </td>
                        <?php
                        if ($posisi == "kiri") {
                            if ($rowsU['debit'] == 0) {
                                $saldo = $saldo - $rowsU['kredit'];
                                $salD = $saldo;
                                $salK = 0;
                            } else {
                                if ($no == 1) {
                                    $salD = $saldo;
                                    $salK = 0;
                                } else {
                                    $saldo =  $saldo + $rowsU['debit'];
                                    $salD = $saldo;
                                    $salK = 0;
                                }
                            }
                        } else {
                            if ($rowsU['kredit'] == 0) {
                                $saldo = $saldo - $rowsU['debit'];
                                $salD = 0;
                                $salK = $saldo;
                            } else {
                                if ($no == 1) {
                                    $salD = 0;
                                    $salK = $saldo;
                                } else {
                                    $saldo = $saldo + $rowsU['kredit'];
                                    $salD = 0;
                                    $salK = $saldo;
                                }
                            }
                        }
                        ?>
                        <td class="right">
                            <?php echo "Rp. " . number_format($salD, 2, ',', '.') . ""; ?>
                        </td>
                        <td class="right">
                            <?php echo "Rp. " . number_format($salK, 2, ',', '.') . ""; ?>
                        </td>
                    </tr>

                <?php
            }
        }
        ?>
        </tbody>
    </table>
</body>




</html>