<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "pembelian";
$tableJ      = "jurnal_umum";
$tableHD      = "hutang_dagang";

$id          = $_POST['bookId'];

$no_jurnal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM $table WHERE id_pembelian='$id'"));

$hapus      = "DELETE FROM $table WHERE id_pembelian='$id'";
$hapusJ      = "DELETE FROM $tableJ WHERE no_jurnal='$no_jurnal[kode_transaksi_pembelian]'";
$hapusHD      = "DELETE FROM $tableHD WHERE kode_hutang_dagang='$no_jurnal[kode_transaksi_pembelian]'";
mysqli_query($connect, $hapus);
mysqli_query($connect, $hapusJ);
mysqli_query($connect, $hapusHD);
echo "<script language='javascript'>document.location.href='pembelian.php'</script>";
