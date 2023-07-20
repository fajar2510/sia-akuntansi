<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "hutang_dagang";


$id             = $_POST['bookId'];

$no_jurnal = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM $table WHERE id_hutang_dagang='$id'"));

$hapus      = "DELETE FROM $table WHERE id_hutang_dagang='$id'";

mysqli_query($connect, $hapus);

echo "<script language='javascript'>document.location.href='hutang_dagang.php'</script>";
