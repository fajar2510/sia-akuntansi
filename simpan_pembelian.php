<?php
include "connection/connection.php";

$tahun      = date("Y");
$tableP      = "pembelian";
$tableJ      = "jurnal_umum";

$kode_pembelian = $_POST['kode_transaksi_pembelian'];
$tanggal        = $_POST['tanggal'];
$nama_barang    = $_POST['barang'];
$akun           = $_POST['akun'];
$harga_beli     = $_POST['harga'];
$jumlah         = $_POST['jumlah'];
$total          = $_POST['total'];
$nama_supplier  = $_POST['supplier'];

// mulai tabel jurnal umum


$status_beli    = $_POST['status_beli'];
$keterangan     = "Pembelian Barang DHONO JOYO  ";





$simpanP      = "INSERT INTO $tableP (kode_transaksi_pembelian,tanggal,keterangan,id_barang,id_akun,harga_beli,jumlah,total,id_supplier,status_beli)
                    VALUES('$kode_pembelian','$tanggal','$keterangan','$nama_barang','$akun','$harga_beli','$jumlah','$total','$nama_supplier','$status_beli')";
$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,id_barang,keterangan,id_akun,debit,kredit)
                VALUES ('$kode_pembelian','$tanggal',$nama_barang,'$keterangan','$akun','$total','0')";

if ($status_beli == 'Tunai') {
    $simpanK = "INSERT INTO jurnal_umum(no_jurnal,tanggal,id_barang,keterangan,id_akun,debit,kredit)VALUES('$kode_pembelian','$tanggal','$nama_barang','$keterangan','24','0','$total')";
} elseif ($status_beli == 'Kredit') {
    $simpanK = "INSERT INTO jurnal_umum(no_jurnal,tanggal,id_barang,keterangan,id_akun,debit,kredit)VALUES('$kode_pembelian','$tanggal','$nama_barang','$keterangan','31','0','$total')";
    $simpanHD = "INSERT INTO hutang_dagang(tanggal,kode_hutang_dagang,id_barang,keterangan,harga,jumlah,total)VALUES('$tanggal','$kode_pembelian','$nama_barang','$keterangan','$harga_beli','$jumlah','$total')";
}


$queryP = mysqli_query($connect, $simpanP);
$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);
$queryHD = mysqli_query($connect, $simpanHD);


if ($queryP == TRUE && $queryJ == TRUE && $queryK == TRUE  && $queryHD == TRUE) {
    echo '<script language="javascript">document.location.href="pembelian.php"</script>';
} else {
    echo '<script language="javascript">document.location.href="pembelian.php"</script>';
}

// mysqli_query($connect, $simpanP);
// echo "<script language='javascript'>document.location.href='pembelian.php'</script>";
