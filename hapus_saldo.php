<?php
  include "connection/connection.php";

    $tahun      = date("Y");
    $table      = "saldo";

    $id            =$_POST['bookId'];
    $saldo_awal    =$_POST['saldo_awal'];
    $saldo         =$_POST['saldo'];
    

    $hapus      = "DELETE FROM $table WHERE id_saldo='$id'";
mysqli_query($connect,$hapus);
echo "<script language='javascript'>document.location.href='saldo_awal.php'</script>";

?>
