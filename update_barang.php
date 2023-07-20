<?php
// koneksi database
include "connection/connection.php";

// menangkap data yang di kirim dari form
$id         = $_POST['id_barang'];
$table      = "barang";

$kode_barang       = $_POST['kode_barang'];
$nama_barang       = $_POST['nama_barang'];
$harga_beli        = $_POST['harga_beli'];
$harga_jual        = $_POST['harga_jual'];
$keuntungan        = $_POST['keuntungan'];


$foto       = @$_POST[foto];
$ekstensi_diperbolehkan  = array('png', 'jpg');
$foto      = $_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 3044070) {
        move_uploaded_file($file_tmp, 'assets/images/gambar_produk/' . $foto);
        $update  = mysqli_query($connect, "UPDATE $table SET kode_barang='$kode_barang',nama_barang='$nama_barang',harga_beli='$harga_beli',harga_jual='$harga_jual',keuntungan='$keuntungan',foto='$foto', foto='$foto' WHERE id_barang='$id'");
        if ($update) {
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

// mengalihkan halaman kembali ke index.php
echo "<script language='javascript'>document.location.href='barang.php'</script>";
