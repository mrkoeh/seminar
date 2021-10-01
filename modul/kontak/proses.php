<?php
	include "../../administrator/koneksi/koneksi.php";
	
	$KodeKontak	= $_POST['KodeKontak'];
	$Nama		= $_POST['Nama'];
	$Email		= $_POST['Email'];
	$Pesan		= $_POST['Pesan'];
	$CreateDate	= $_POST['CreateDate'];
	
	//echo "INSERT INTO kontak values('$KodeKontak','$Nama','$Email','$Pesan','$CreateDate')"; exit;
	$query = mysql_query("INSERT INTO kontak values('$KodeKontak','$Nama','$Email','$Pesan','$CreateDate')");
	header("location:../../index.php?modul=kontak&status=ok");
	
?>
	

