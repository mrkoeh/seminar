<?php
	session_start();
	
	include "../koneksi/koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	//echo "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'"; exit;
	$query = mysql_query("SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
	$jumlah = mysql_num_rows($query);
	$a = mysql_fetch_array($query);
	
	if($jumlah > 0){
		$_SESSION['tampilnama'] = $a['NamaLengkap'];
		$_SESSION['kode'] = $a['KodeUser'];
		$_SESSION['level'] = $a['Level'];
		header("location:../index.php");			// berhasil LOGIN
	}else{
		header("location:index.php");				// gagal LOGIN
	}
?>