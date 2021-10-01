<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	$KodeRegistrasi		= $_GET['KodeRegistrasi'];
	
	if($proses=="hadir"){
		//echo "UPDATE registrasi SET Absensi = '1' KodeRegistrasi='$KodeRegistrasi'"; exit;
		$query=mysql_query("UPDATE registrasi SET Absensi = '1' WHERE KodeRegistrasi='$KodeRegistrasi'");
		header("location:../../index.php?modul=absensi");
	}elseif($proses=="tidakhadir"){
		$query=mysql_query("UPDATE registrasi SET Absensi = '2' WHERE KodeRegistrasi='$KodeRegistrasi'");
		header("location:../../index.php?modul=absensi");
	}
?>
	

