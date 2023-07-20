<?php
  include "connection/connection.php";

    $tahun      = date("Y");
    $table      = "user";

    $id       =$_POST['bookId'];


    $hapus      = "DELETE FROM $table WHERE id_user='$id'";
mysqli_query($connect,$hapus);
echo "<script language='javascript'>document.location.href='user.php'</script>";
