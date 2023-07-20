<?php
include "connection/connection.php";

$tahun          = date("Y");
$tableL         = "beban";
$tableJ         = "jurnal_umum";

$kode_beban             = $_POST['kode_beban'];
$tanggal                = $_POST['tanggal'];
$akun                   = $_POST['akun'];
$keterangan_beban       = $_POST['keterangan_beban'];
$nominal                = $_POST['harga'];
$jumlah                 = $_POST['jumlah'];
$total                  = $_POST['total'];




// mulai tabel jurnal umum
$simpanL      = "INSERT INTO $tableL (kode_beban,tanggal,id_akun, keterangan,nominal,jumlah,total)
                    VALUES('$kode_beban','$tanggal','$akun','$keterangan_beban','$nominal','$jumlah','$total')";
$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,keterangan,id_akun,debit,kredit) VALUES ('$kode_beban','$tanggal','$keterangan_beban','$akun','$total','0')";

$simpanK       = "INSERT INTO $tableJ(no_jurnal,tanggal,keterangan,id_akun,debit,kredit)VALUES('$kode_beban','$tanggal','$keterangan_beban','24','0','$total')";


$queryL = mysqli_query($connect, $simpanL);
$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);

if ($queryL == TRUE && $queryJ == TRUE && $queryK == TRUE) {
    echo '<script language="javascript">document.location.href="beban.php"</script>';
} else {
    echo '<script language="javascript">document.location.href="beban.php"</script>';
}

// mysqli_query($connect, $simpanP);
// echo "<script language='javascript'>document.location.href='beban.php'</script>";
