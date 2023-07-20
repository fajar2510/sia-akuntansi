<?php
  include "connection/connection.php";

    $tahun      = date("Y");
    $table      = "barang";

    $id                =$_POST['bookId'];

    $hapus      = "DELETE FROM $table WHERE id_barang='$id'";
mysqli_query($connect,$hapus);
echo "<script language='javascript'>document.location.href='barang.php'</script>";
