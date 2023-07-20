<?php
include "connection/connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM user INNER JOIN role ON user.id_role=role.id_role WHERE Username='$username' and Password='$password'");
$cek = mysqli_num_rows($login);


$row = mysqli_fetch_array($login);
$id_user = $row['id_user'];
$nama_user = $row['Nama'];
$level = $row['id_role'];
$foto = $row['foto'];


if ($cek > 0) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['Nama'] = $nama_user;
	$_SESSION['level'] = $level;
	$_SESSION['foto'] = $foto;
	$_SESSION['status'] = "login";

	header("location:home.php");
} else {
	header("location:index.php");
}
