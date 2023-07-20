<?php
  include "connection/connection.php";

    $tahun      = date("Y");
    $table      = "akun";

    $id          =$_POST['bookId'];
    $kode_akun   =$_POST['kode_akun'];
    $nama_akun   =$_POST['nama_akun'];
    $status      =$_POST['status'];
    $posisi        =$_POST['posisi'];

    $hapus      = "DELETE FROM $table WHERE id_akun='$id'";
mysqli_query($connect,$hapus);
echo "<script language='javascript'>document.location.href='akun.php'</script>";
