<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "penjualan";
$tableJ      = "jurnal_umum";
$tablePU      = "piutang";


$id          = $_POST['bookId'];

$no_jurnal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM $table WHERE id_penjualan='$id'"));

$hapus      = "DELETE FROM $table WHERE id_penjualan='$id'";
$hapusJ      = "DELETE FROM $tableJ WHERE no_jurnal='$no_jurnal[kode_transaksi_penjualan]'";
$hapusPU      = "DELETE FROM $tablePU WHERE kode_piutang='$no_jurnal[kode_transaksi_penjualan]'";
mysqli_query($connect, $hapus);
mysqli_query($connect, $hapusJ);
mysqli_query($connect, $hapusPU);
echo "<script language='javascript'>document.location.href='penjualan.php'</script>";
