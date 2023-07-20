<?php
  include "connection/connection.php";

    $tahun      = date("Y");
    $table      = "supplier";

    $nama_supplier       =$_POST['nama_supplier'];
    $kontak              =$_POST['kontak'];
    $alamat              =$_POST['alamat'];

    $simpan      = "INSERT INTO $table (nama_supplier,kontak,alamat)
                    VALUES('$nama_supplier','$kontak', '$alamat')";
mysqli_query($connect,$simpan);
echo "<script language='javascript'>document.location.href='supplier.php'</script>";

?>
