<?php
include "connection/connection.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jurnal Umum.xls");

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
        <tr>
            <th width="14%" rowspan="2">Tanggal</th>
            <th width="12%" rowspan="2">Nomor<br>Bukti</th>
            <th width="22%" rowspan="2">Keterangan</th>
            <th width="10%" rowspan="2">Ref</th>
            <th colspan="2">
                <center>Saldo</center>
            </th>
        </tr>
        <tr>
            <th width="21%">Debit</th>
            <th width="21%">Kredit</th>
        </tr>
        <?php
        // jalankan query
        if ($bulan == "") {
            $result = mysqli_query($connect, "SELECT * FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
                                                        INNER JOIN barang ON jurnal_umum.id_barang=barang.id_barang
                                                        ORDER BY jurnal_umum.tanggal, jurnal_umum.no_jurnal, jurnal_umum.id_jurnal ASC");
        } else {
            $result = mysqli_query($connect, "SELECT * FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
                                                        
                                                        INNER JOIN barang ON jurnal_umum.id_barang=barang.id_barang
                                                        WHERE MONTH(jurnal_umum.tanggal)='$bulan'
                                                        ORDER BY jurnal_umum.tanggal, jurnal_umum.no_jurnal, jurnal_umum.id_jurnal ASC");
        }

        // tampilkan query
        $no = 1;
        while ($rows = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td align="center" style="font-family:Arial"><small><?php echo $rows['tanggal']; ?></small></td>
                <td align="center" style="font-family:Arial"><small><?php echo $rows['no_jurnal']; ?></small></td>
                <td align="left" style="font-family:Arial"><small><?php echo $rows['nama_akun']; ?> <br>&nbsp;&nbsp;&nbsp; <em><?php echo $rows['keterangan']; ?><?php echo $rows['nama_barang']; ?></small></td></em>
                <td align="center" style="font-family:Arial"><small><?php echo $rows['kode_akun']; ?></small></td>
                <td align="left" style="font-family:Arial">
                    <small><?php echo "Rp. " . number_format($rows['debit'], 2, ',', '.') . ""; ?></small>
                </td>
                <td align="left" style="font-family:Arial">
                    <small><?php echo "Rp. " . number_format($rows['kredit'], 2, ',', '.') . ""; ?></small>
                </td>

            </tr>
            <?php
            $no++;
            @$totalD += $rows['debit'];
            @$totalK += $rows['kredit'];
        }
        ?>
        <tr>
            <td colspan="4" align="center" style="font-family:Arial">
                <strong> TOTAL</strong>
            </td>
            <td style="font-family:Arial"><strong> <?php echo "Rp. " . number_format($totalD, 2, ',', '.') . ""; ?></strong></td>
            <td style="font-family:Arial"><strong><?php echo "Rp. " . number_format($totalK, 2, ',', '.') . ""; ?></strong></td>
        </tr>
    </table>
</body>




</html>