<?php
include "connection/connection.php";

$tahun          = date("Y");
$tableM         = "prive";
$tableJ         = "jurnal_umum";

$kode_prive       = $_POST['kode_prive'];
$tanggal          = $_POST['tanggal'];
$akun             = $_POST['akun'];
$keterangan_prive = $_POST['keterangan_prive'];
$nominal          = $_POST['nominal'];




// mulai tabel jurnal umum
$simpanM      = "INSERT INTO $tableM (kode_prive,tanggal,id_akun, keterangan,nominal)
                    VALUES('$kode_prive','$tanggal','$akun','$keterangan_prive','$nominal')";
$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,keterangan,id_akun,debit,kredit) VALUES ('$kode_prive','$tanggal','$keterangan_prive','$akun','$nominal','0')";

$simpanK = "INSERT INTO $tableJ(no_jurnal,tanggal,keterangan,id_akun,debit,kredit)VALUES('$kode_prive','$tanggal','$keterangan_prive','24','0','$nominal')";


$queryM = mysqli_query($connect, $simpanM);
$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);

if ($queryM == TRUE && $queryJ == TRUE && $queryK == TRUE) {
    echo '<script language="javascript">document.location.href="prive.php"</script>';
} else {
    echo '<script language="javascript">document.location.href="prive.php"</script>';
}

// mysqli_query($connect, $simpanP);
// echo "<script language='javascript'>document.location.href='prive.php'</script>";
