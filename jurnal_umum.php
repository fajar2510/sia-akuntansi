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
                    <h4 class="page-title pull-left">Data Jurnal Umum</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="jurnal_umum.php">Jurnal Umum</a></li>
                        <li><span>per-bulan</span></li>
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
            <div class="col-lg-8 col-ml-12">
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
                                            <a href="cetak.php?bulan=<?= @$_POST['bulan'] ?>" target="_blank">
                                                <button type="button" name='Cetak' class="btn btn-primary"><i class="ti-printer"></i> Cetak</button>
                                            </a>
                                        </div>
                                        <div class="col-auto my-2">
                                            <a href="unduhexcel.php?bulan=<?= @$_POST['bulan'] ?>" target="_blank">
                                                <button type="button" name='unduhexcel' class="btn btn-primary"><i class="ti-download"></i> Unduh Excel</button>
                                            </a>
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
                            <h4 class="header-title">Jurnal Umum</h4>
                            <div class="data-tables">
                                <table id="dataTable" class="text-left table table-hover table-sm" width="100%">
                                    <thead>
                                        <tr align="center">

                                            <td colspan="6" align="center">
                                                <center><b>
                                                        <h5>Jurnal Umum</h5>
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

                                        <tr>
                                            <th width="12%" rowspan="2">Tanggal</th>
                                            <th width="8%" rowspan="2">Nomor Bukti</th>
                                            <th width="35%" rowspan="2">Keterangan</th>
                                            <th width="5%" rowspan="2">Ref</th>

                                            <th width="40%" colspan="2">
                                                <center>Saldo
                                                </center>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th width="20%" rowspan="2">Debit</th>
                                            <th width="20%" rowspan="2">Kredit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        include "connection/connection.php";
                                        // jalankan query
                                        if (isset($_POST['filter'])) {
                                            $bulan = $_POST['bulan'];

                                            $result = mysqli_query($connect, "SELECT * FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
                                                        INNER JOIN barang ON jurnal_umum.id_barang=barang.id_barang  WHERE MONTH(tanggal)='$bulan'
                                                        ORDER BY jurnal_umum.tanggal, jurnal_umum.no_jurnal, jurnal_umum.id_jurnal ASC");
                                        } else {
                                            $result = mysqli_query($connect, "SELECT * FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun
                                                        INNER JOIN barang ON jurnal_umum.id_barang=barang.id_barang
                                                        ORDER BY jurnal_umum.tanggal, jurnal_umum.no_jurnal, jurnal_umum.id_jurnal ASC");
                                        }
                                        // tampilkan query
                                        $no = 1;
                                        while ($rows = mysqli_fetch_array($result)) {
                                            //     $resultA = mysqli_query($connect, "SELECT * FROM akun INNER JOIN status_akun ON akun.id_status=status_akun.id_status WHERE akun.id_akun='$rows[id_akun]'
                                            // ORDER BY akun.nama_akun ASC");
                                            //     $rowsA = mysqli_fetch_array($resultA);
                                            // if ($rowsA['id_status'] == 1) {
                                            //     $debit = $rows[debit];
                                            //     $kredit = 0;
                                            // } elseif ($rowsA['id_status'] == 2) {
                                            //     $kredit = $rows[kredit];
                                            //     $debit = 0;
                                            // }
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $rows['tanggal']; ?></td>
                                                <td class="center"><?php echo $rows['no_jurnal']; ?></td>
                                                <td class="center"><?php echo $rows['nama_akun']; ?> <br>&nbsp&nbsp&nbsp <em><?php echo $rows['keterangan']; ?><?php echo $rows['nama_barang']; ?></td></em>
                                                <td class="center"><?php echo $rows['kode_akun']; ?></td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rows['debit'], 2, ',', '.') . ""; ?>
                                                </td>
                                                <td class="right">
                                                    <?php echo "Rp. " . number_format($rows['kredit'], 2, ',', '.') . ""; ?>
                                                </td>
                                            </tr>
                                            <?php
                                            @$no++;
                                            @$totalD += $rows['debit'];
                                            @$totalK += $rows['kredit'];
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <strong> TOTAL</strong></td>

                                            <td><strong> <?php echo "Rp. " . number_format($totalD, 2, ',', '.') . ""; ?></strong></td>
                                            <td><strong><?php echo "Rp. " . number_format($totalK, 2, ',', '.') . ""; ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
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