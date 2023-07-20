<?php
include "connection/connection.php";

$tahun      = date("Y");
$tableP      = "penjualan";
$tableJ      = "jurnal_umum";
$tableHD      = "hutang_dagang";

$kode_penjualan = $_POST['kode_transaksi_penjualan'];
$tanggal        = $_POST['tanggal'];
$nama_barang    = $_POST['barang'];
$akun           = $_POST['akun'];
$harga_jual     = $_POST['harga'];
$jumlah         = $_POST['jumlah'];
$total          = $_POST['total'];
$pembeli        = $_POST['pembeli'];

// mulai tabel jurnal umum
$status_jual    = $_POST['status_jual'];
$keterangan     = "Penjualan Barang DHONO JOYO  ";



$simpanP      = "INSERT INTO $tableP (kode_transaksi_penjualan,tanggal,id_barang,id_akun,harga_jual,jumlah,total,pembeli,status_jual)
                    VALUES('$kode_penjualan','$tanggal','$nama_barang','$akun','$harga_jual','$jumlah','$total','$pembeli','$status_jual')";
$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,id_barang,keterangan,id_akun,debit,kredit)
                VALUES ('$kode_penjualan','$tanggal','$nama_barang','$keterangan','$akun','0','$total')";

if ($status_jual == 'Tunai') {
  $simpanK = "INSERT INTO jurnal_umum(no_jurnal,tanggal,id_barang,keterangan,id_akun,debit,kredit)VALUES('$kode_penjualan','$tanggal','$nama_barang','$keterangan','24','$total','0')";
} elseif ($status_jual == 'Kredit') {
  $simpanK = "INSERT INTO jurnal_umum(no_jurnal,tanggal,id_barang,keterangan,id_akun,debit,kredit)VALUES('$kode_penjualan','$tanggal','$nama_barang','$keterangan','32','$total','0')";
  $simpanPU = "INSERT INTO piutang(tanggal,kode_piutang,keterangan,id_barang,harga,jumlah,total)VALUES('$tanggal','$kode_penjualan','$keterangan','$nama_barang','$harga_jual','$jumlah','$total')";
}

$queryP = mysqli_query($connect, $simpanP);
$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);
$queryPU = mysqli_query($connect, $simpanPU);

if (
  $queryP == TRUE && $queryJ == TRUE && $queryK == TRUE && $queryPU == TRUE
) {
  echo '<script language="javascript">document.location.href="penjualan.php"</script>';
} else {
  echo '<script language="javascript">document.location.href="penjualan.php"</script>';
}

// mysqli_query($connect, $simpanP);
// echo "<script language='javascript'>document.location.href='penjualan.php'</script>";
