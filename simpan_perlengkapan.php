<?php
include "connection/connection.php";

$tahun          = date("Y");
$tablePK         = "perlengkapan";
$tableJ         = "jurnal_umum";

$kode_perlengkapan          = $_POST['kode_perlengkapan'];
$tanggal                    = $_POST['tanggal'];
$akun                       = $_POST['akun'];
$keterangan_perlengkapan    = $_POST['keterangan_perlengkapan'];
$harga                      = $_POST['harga'];
$jumlah                     = $_POST['jumlah'];
$total                      = $_POST['total'];




// mulai tabel jurnal umum
$simpanPK      = "INSERT INTO $tablePK (kode_perlengkapan,tanggal,id_akun, keterangan,total)
                    VALUES('$kode_perlengkapan','$tanggal','$akun','$keterangan_perlengkapan','$total')";
$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,keterangan,id_akun,debit,kredit) VALUES ('$kode_perlengkapan','$tanggal','$keterangan_perlengkapan','$akun','$total','0')";

$simpanK = "INSERT INTO $tableJ(no_jurnal,tanggal,keterangan,id_akun,debit,kredit)VALUES('$kode_perlengkapan','$tanggal','$keterangan_perlengkapan','24','0','$total')";


$queryPK = mysqli_query($connect, $simpanPK);
$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);

if ($queryPK == TRUE && $queryJ == TRUE && $queryK == TRUE) {
    echo '<script language="javascript">document.location.href="perlengkapan.php"</script>';
} else {
    echo '<script language="javascript">document.location.href="perlengkapan.php"</script>';
}

// mysqli_query($connect, $simpanP);
// echo "<script language='javascript'>document.location.href='perlengkapan.php'</script>";
