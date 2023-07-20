<?php
// koneksi database
include "connection/connection.php";

// menangkap data yang di kirim dari form
$id         = $_POST['id_supplier'];
$table      = "supplier";

$nama_supplier     =$_POST['nama_supplier']; 
$kontak            =$_POST['kontak'];
$alamat            =$_POST['alamat'];

$update      = mysqli_query($connect, "UPDATE $table SET nama_supplier='$nama_supplier',kontak='$kontak',alamat='$alamat' WHERE id_supplier='$id'");

// mengalihkan halaman kembali ke index.php
echo "<script language='javascript'>document.location.href='supplier.php'</script>";
