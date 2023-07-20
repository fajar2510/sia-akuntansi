<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "modal";
$tableJ      = "jurnal_umum";

$id          = $_POST['bookId'];

$no_jurnal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM $table WHERE id_modal='$id'"));

$hapus      = "DELETE FROM $table WHERE id_modal='$id'";
$hapusJ      = "DELETE FROM $tableJ WHERE no_jurnal='$no_jurnal[kode_modal]'";
mysqli_query($connect, $hapus);
mysqli_query($connect, $hapusJ);
echo "<script language='javascript'>document.location.href='modal.php'</script>";
