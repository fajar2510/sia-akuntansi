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
					<h4 class="page-title pull-left">Daftar Neraca</h4>
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
							<h4 class="header-title">Laporan Neraca</h4>
							<div class="data-tables datatable-dark">
								<table id="dataTable3" class="text-left table table-hover " width="100%">
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
									<tr>
										<th colspan="2" class="left" width="50%">Aktiva</th>
									</tr>

									<tr>
										<th colspan="2" class="left" width="50%">Aktiva Lancar</th>
									</tr>
									<?php
									$tglA = $_GET['tglA'];
									$tglB = $_GET['tglB'];
									$sqlL = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
															FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
															WHERE jurnal_umum.tanggal  AND akun.posisi='Aktiva' AND akun.posisi !='-'
															GROUP BY jurnal_umum.id_akun
															ORDER BY jurnal_umum.id_jurnal ASC";
									$queryL	= mysqli_query($connect, $sqlL);
									while ($rowsL = mysqli_fetch_array($queryL)) {
										if ($rowsL['status'] == 'Debit') {
											$jml_debitL = $rowsL['jml_debit'] - $rowsL['jml_kredit'];
											$jml_debit = $rows['jml_debit'];
											$jml_kredit = 0;
										} else {
											$jml_kreditL = $rowsL['jml_kredit'] - $rowsL['jml_debit'];
											$jml_kredit = $rows['jml_kredit'];
											$jml_debitL = 0;
										}
										?>
										<tr>
											<td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>
													<?php
													echo $rowsL['nama_akun'];
													?></td></em>
											<?php
											if ($rowsL['status'] == 'Debit') {
												$jml_debitL = $rowsL['jml_debit'] - $rowsL['jml_kredit'];
												?>
												<td class="right">
													<?php
													echo "Rp. " . number_format($jml_debitL, 2, ',', '.') . "";
													?>
												</td>
											<?php
										} else {
											$jml_kreditL = $rowsL['jml_kredit'] - $rowsL['jml_debit'];
											?>
												<td class="right">
													<?php
													echo "Rp. " . number_format($jml_kreditL, 2, ',', '.') . "";
													?>
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

										<td class="right"><b><?php
																echo "Rp. " . number_format($totalL, 2, ',', '.') . "";
																?></b></td>
									</tr>

									<!-- batas -->
									<tr>
										<th colspan="2" class="center" width="50%">&nbsp;</th>
									</tr>

									<tr>
										<th colspan="2" class="left" width="50%">Pasiva</th>
									</tr>
									<tr>
										<th colspan="2" class="left" width="50%"> Kewajiban dan Ekuitas</th>
									</tr>
									<?php
									$tglA = $_GET['tglA'];
									$tglB = $_GET['tglB'];
									$labaK = mysqli_query($connect, "SELECT SUM(jurnal_umum.kredit) AS labaK,
													jurnal_umum.tanggal
													FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
													WHERE akun.laba_rugi ='T'
												");
									$lbK = mysqli_fetch_array($labaK);

									$labaD = mysqli_query($connect, "SELECT SUM(jurnal_umum.debit) AS labaD, jurnal_umum.tanggal
												FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
												WHERE akun.laba_rugi ='B'
											");
									$lbD = mysqli_fetch_array($labaD);

									$total_laba = $lbK['labaK'] - $lbD['labaD'];

									$prive = mysqli_fetch_array(mysqli_query($connect, "SELECT SUM(nominal) AS nominal FROM prive"));

									$sqlR = "SELECT SUM(jurnal_umum.debit) AS jml_debit, SUM(jurnal_umum.kredit) AS jml_kredit, jurnal_umum.tanggal, jurnal_umum.id_akun, akun.*
												FROM jurnal_umum INNER JOIN akun ON jurnal_umum.id_akun=akun.id_akun 
												WHERE akun.posisi='Pasiva' AND akun.posisi !='-'
												GROUP BY jurnal_umum.id_akun
												ORDER BY jurnal_umum.id_jurnal ASC";
									$queryR	= mysqli_query($connect, $sqlR);
									while ($rowsR = mysqli_fetch_array($queryR)) {
										$cekM = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM akun WHERE posisi='Pasiva' AND laba_rugi='-' AND pm=1"));
										$dataM = $cekM['nama_akun'];
										?>
										<tr>
											<td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>
													<?php
													echo $rowsR['nama_akun'];
													?></td></em>
											<?php
											if ($rowsR['nama_akun'] == $dataM) {
												$jml_kredit = ($rowsR['jml_kredit'] - $rowsR['jml_debit']) + $total_laba;
												$jml_kreditR = $jml_kredit - $prive['nominal'];
												?>
												<td class="right">
													<?php
													echo "Rp. " . number_format($jml_kreditR, 2, ',', '.') . "";
													?>
												</td>
											<?php
										} else {
											$jml_kreditR = $rowsR['jml_kredit'] - $rowsR['jml_debit'];
											?>
												<td class="right">
													<?php
													echo "Rp. " . number_format($jml_kreditR, 2, ',', '.') . "";
													?>
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
												<div align="left">TOTAL PASIVA </div>
											</b></td>
										<td class="right"><b><?php echo "Rp. " . number_format($totalR, 2, ',', '.') . ""; ?></b></td>
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