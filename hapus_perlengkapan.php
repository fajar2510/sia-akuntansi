<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "perlengkapan";
$tableJ      = "jurnal_umum";

$id                      = $_POST['bookId'];

$no_jurnal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM $table WHERE id_perlengkapan='$id'"));

$hapus      = "DELETE FROM $table WHERE id_perlengkapan='$id'";
$hapusJ      = "DELETE FROM $tableJ WHERE no_jurnal='$no_jurnal[kode_perlengkapan]'";

mysqli_query($connect, $hapus);
mysqli_query($connect, $hapusJ);
echo "<script language='javascript'>document.location.href='perlengkapan.php'</script>";
