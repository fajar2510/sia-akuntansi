<?php
include "connection/connection.php";

$tahun          = date("Y");
$tableM         = "modal";
$tableJ         = "jurnal_umum";

$kode_modal     = $_POST['kode_modal'];
$tanggal        = $_POST['tanggal'];
$akun           = $_POST['akun'];
$keterangan_kas = $_POST['keterangan_kas'];
$nominal        = $_POST['nominal'];




// mulai tabel jurnal umum
$simpanM      = "INSERT INTO $tableM (kode_modal,tanggal,id_akun, keterangan_kas,nominal)
                    VALUES('$kode_modal','$tanggal','$akun','$keterangan_kas','$nominal')";
$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,keterangan,id_akun,debit,kredit) VALUES ('$kode_modal','$tanggal','$keterangan_kas','$akun','0','$nominal')";

$simpanK = "INSERT INTO $tableJ(no_jurnal,tanggal,keterangan,id_akun,debit,kredit)VALUES('$kode_modal','$tanggal','$keterangan_kas','24','$nominal','0')";


$queryM = mysqli_query($connect, $simpanM);
$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);

if ($queryM == TRUE && $queryJ == TRUE && $queryK == TRUE) {
    echo '<script language="javascript">document.location.href="modal.php"</script>';
} else {
    echo '<script language="javascript">document.location.href="modal.php"</script>';
}

// mysqli_query($connect, $simpanP);
// echo "<script language='javascript'>document.location.href='modal.php'</script>";
