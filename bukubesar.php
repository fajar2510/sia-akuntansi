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
                    <h4 class="page-title pull-left">Data Buku Besar</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="bukubesar.php">Buku Besar</a></li>
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
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Pilih Bulan</h4>
                                <form action="" method="post">
                                    <div class="form-row align-items-center">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Pilih Data per Bulan</label>
                                                <select class="form-control" name="bulan">
                                                    <option>Pilih Bulan</option>
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
                                            <a href="cetak_bb.php?bulan=<?= @$_POST['bulan'] ?>" target="_blank">
                                                <button type="button" name='Cetak' class="btn btn-primary"><i class="ti-printer"></i> Cetak</button>
                                            </a>
                                        </div>
                                        <div class="col-auto my-2">
                                            <a href="unduhexcelbb.php?bulan=<?= @$_POST['bulan'] ?>" target="_blank">
                                                <button type="button" name='unduhexcelbb' class="btn btn-primary"><i class="ti-download"></i> Unduh Excel</button>
                                            </a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Buku Besar</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-justify table  table-hover table-responsive table-sm  " width="100%">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- main content area end -->
<?php include "footer.php"; ?>