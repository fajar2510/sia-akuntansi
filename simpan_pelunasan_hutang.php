<?php
include "connection/connection.php";

$tahun      = date("Y");
$tableJ      = "jurnal_umum";


$keterangan     = "Pelunasan Hutang kepada Supplier  ";

$simpanJ      = "INSERT INTO $tableJ (no_jurnal,tanggal,keterangan,id_akun,debit,kredit)
                VALUES (kode_hutang_dagang,tanggal,keterangan,'31',total,'0')";
$simpanK      = "INSERT INTO $tableJ (no_jurnal,tanggal,keterangan,id_akun,debit,kredit)
                VALUES (kode_hutang_dagang,tanggal,keterangan,'24','0',total)";

$queryJ = mysqli_query($connect, $simpanJ);
$queryK = mysqli_query($connect, $simpanK);
if ($queryJ == TRUE && $queryK == TRUE) {
    echo '<script language="javascript">document.location.href="hapus_hutang_dagang.php"</script>';
} else {
    echo '<script language="javascript">document.location.href="hapus_hutang_dagang.php"</script>';
}
