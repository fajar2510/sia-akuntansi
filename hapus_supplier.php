<?php
  include "connection/connection.php";

    $tahun      = date("Y");
    $table      = "supplier";

    $id              =$_POST['bookId'];
    $nama_supplier   =$_POST['nama_supplier'];
    $kontak          =$_POST['kontak'];
    $alamat          =$_POST['alamat'];

    $hapus      = "DELETE FROM $table WHERE id_supplier='$id'";
mysqli_query($connect,$hapus);
echo "<script language='javascript'>document.location.href='supplier.php'</script>";

?>
