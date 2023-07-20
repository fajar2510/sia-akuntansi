<?php
@session_start();
include "connection/connection.php";

$nama_user = $_SESSION['Nama'];

if (@$_SESSION['status'] != "login") {
  header("location:index.php");
}

$sql = "SELECT max(kode_transaksi_penjualan) FROM penjualan";
$query = mysqli_query($connect, $sql);

$kode_transaksi_penjualan = mysqli_fetch_array($query);

if ($kode_transaksi_penjualan) {
  $nilai = substr($kode_transaksi_penjualan[0], 1);
  $kode = (int)$nilai;

  //tambahkan sebanyak + 1
  $kode = $kode + 1;
  $auto_kode = "J" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "J0001";
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
          <h4 class="page-title pull-left">Add Penjualan</h4>
          <ul class="breadcrumbs pull-left">
            <li><a href="penjualan.php">Transaksi</a></li>
            <li><span>Penjualan</span></li>
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

      <div class="col-lg-12 col-ml-12">
        <div class="row">
          <!-- Textual inputs start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">

                <div class="card-body">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Lihat Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <h4 class="header-title">Data Penjualan</h4>
                      <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-justify table table-hover table-sm" width="100%">
                          <thead class="text-capitalize">
                            <tr>
                              <th width="7%">Kode Penjualan</th>
                              <th width="15%">Tanggal</th>
                              <th width="33%">Nama Barang</th>
                              <th width="15%">Pembeli</th>
                              <th width="10%">Jumlah</th>
                              <th width="15%">Total Harga</th>
                              <th width="5%">action</th>
                            </tr>
                          </thead>
                          <?php
                          include "connection/connection.php";
                          // jalankan query
                          $result = mysqli_query($connect, "SELECT * FROM penjualan INNER JOIN barang ON penjualan.id_barang=barang.id_barang 
                                                        INNER JOIN akun ON penjualan.id_akun=akun.id_akun");

                          // tampilkan query
                          while ($row = mysqli_fetch_object($result)) {

                            ?>
                            <tbody>
                              <tr>
                                <td><?= $row->kode_transaksi_penjualan ?></td>
                                <td><?= $row->tanggal ?></td>
                                <td><?= $row->nama_barang ?> [ Rp. <?= number_format($row->harga_jual, 2, ',', '.') ?> ]</td>
                                <td><?= $row->pembeli ?></td>
                                <td><?= $row->jumlah ?></td>
                                <td><?= $row->total ?></td>

                                <td>
                                  <button type="submit" data-id="<?php echo $row->id_penjualan; ?>" class="btn btn-danger btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#exampleModalLong"><i class="ti-trash"></i> </button>
                                </td>
                              </tr>
                            </tbody>
                          <?php
                        }
                        ?>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div class="col-lg-6 col-ml-6">
                        <div class="row">
                          <!-- Textual inputs start -->
                          <div class="col-12 mt-5">
                            <div class="card">
                              <form role="form" action="simpan_penjualan.php" method="post">
                                <div class="card-body">
                                  <h4 class="header-title">Input data Penjualan</h4>
                                  <p class="text-muted font-14 mb-4">Isikan data Penjualan barang toko kepada pembeli anda</p>

                                  <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Kode Penjualan</label>
                                    <input class="form-control" type="text" value="<?php echo $auto_kode; ?>" readonly id="kode_transaksi_penjualan" name="kode_transaksi_penjualan">
                                  </div>
                                  <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Tanggal</label>
                                    <input class="form-control" required type="date" value="" id="tanggal" name="tanggal">
                                  </div>
                                  <div class="form-group">
                                    <label class="col-form-label">Barang</label>
                                    <select class="custom-select" required onchange="changeValue(this.value)" name="barang">
                                      <option value="">Pilih Barang</option>
                                      <?php
                                      include "connection/connection.php";
                                      $result = mysqli_query($connect, "SELECT * FROM barang ORDER BY nama_barang ASC");
                                      $a  = "var harga = new Array();\n;";
                                      while ($row = mysqli_fetch_array($result)) {
                                        echo '<option name="barang" value="' . $row['id_barang'] . '">' . $row['nama_barang'] . '</option>';
                                        $a .= "harga['" . $row['id_barang'] . "'] = {harga:'" . addslashes($row['harga_jual']) . "'};\n";
                                      }

                                      ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-form-label">Akun</label>
                                    <select class="custom-select" required name="akun">
                                      <option value="">Pilih Akun</option>
                                      <?php
                                      include "connection/connection.php";
                                      $Q = mysqli_query($connect, "SELECT * FROM akun ORDER BY id_akun ASC");
                                      while ($r = mysqli_fetch_array($Q)) {
                                        echo "<option value='$r[id_akun]'>$r[nama_akun]</option>";
                                      }

                                      ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="example-number-input" class="col-form-label">Harga Jual </label>
                                    <input class="form-control" readonly onkeyup="total();" type="number" min="0" value="" id="harga" name="harga">
                                  </div>
                                  <div class="form-group">
                                    <label for="example-number-input" class="col-form-label">Jumlah</label>
                                    <input class="form-control" required onkeyup="total();" min="1" type="number" value="" id="jumlah" name="jumlah">
                                  </div>
                                  <div class="form-group">
                                    <label for="example-number-input" class="col-form-label">Total</label>
                                    <input class="form-control" readonly type="number" min="0" value="" id="total" name="total">
                                  </div>
                                  <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Pembeli</label>
                                    <input class="form-control" required type="text" value="" placeholder="nama pembeli" id="pembeli" name="pembeli">
                                  </div>
                                  <div class="form-group">
                                    <label class="col-form-label">Status Penjualan</label>
                                    <select class="custom-select" required name="status_jual">
                                      <option value="">Pilih status</option>
                                      <option value="Tunai">Tunai</option>
                                      <option value="Kredit">Kredit</option>
                                    </select>
                                  </div>
                                  <!-- tombol  -->
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                    <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                  </div>

                                </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <form action="hapus_penjualan.php" method="post">
            <div class="modal fade" id="exampleModalLong">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <div class="modal-body">
                      <input type="hidden" name="bookId" id="bookId" />
                    </div>

                  </div>
                  <div class="modal-body">
                    <p>Peringatan ! Jika anda menghapus data ini , data pada jurnal umum, buku besar ,serta laporan juga akan terhapus . Yakin menghapus ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </form>

        <!-- main content area end -->

        <?php include "footer.php"; ?>