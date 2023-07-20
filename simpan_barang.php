<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "barang";

$kode_barang       = $_POST['kode_barang'];
$nama_barang       = $_POST['nama_barang'];
$harga_beli        = $_POST['harga_beli'];
$harga_jual        = $_POST['harga_jual'];
$keuntungan        = $_POST['keuntungan'];

$ekstensi_diperbolehkan  = array('png', 'jpg');
$foto      = $_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
  if ($ukuran < 3044070) {
    move_uploaded_file($file_tmp, 'assets/images/gambar_produk/' . $foto);
    $query = mysqli_query($connect, "INSERT INTO $table (kode_barang,nama_barang,harga_beli,harga_jual,keuntungan,foto)
                    VALUES('$kode_barang','$nama_barang', '$harga_beli','$harga_jual','$keuntungan','$foto')");
    if ($query) {
      echo "<script language='javascript'>document.location.href='barang.php'</script>";
    } else {
      echo "<script language='javascript'>document.location.href='barang.php?pesan=GAGAL UPLOAD'</script>";
    }
  } else {
    echo "<script language='javascript'>document.location.href='barang.php?pesan=UKURAN FILE TERLALU BESAR'</script>";
  }
} else {
  echo "<script language='javascript'>document.location.href='barang.php?pesan=EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'</script>";
}
