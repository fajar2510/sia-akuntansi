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
                    <h4 class="page-title pull-left">Neraca Saldo</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="neraca_saldo.php">Laporan</a></li>
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
                                <h4 class="header-title">pilih per-tangal</h4>

                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3 my-1">
                                            <label class="sr-only" for="inlineFormInputName">Name</label>
                                            <input class="form-control" type="date" value="2018-03-05" id="example-date-input" name="tglA">
                                        </div>
                                        <div class="col-sm-3 my-1">
                                            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                            <div class="input-group">
                                                <input class="form-control" type="date" value="2018-03-05" id="example-date-input" name="tglB">
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
                            <h4 class="header-title">Laporan Neraca Saldo</h4>
                            <div class="data-tables datatable-dark">
                                <table id="dataTable3" class="text-left table table-hover " width="100%">

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
        </div>
    </div>
</div>
</div>
<!-- main content area end -->
<?php include "footer.php"; ?>