<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	
	$KodeUser		= $_POST['KodeUser'];
	$Username		= $_POST['Username'];
	$Password		= $_POST['Password'];
	$Level			= $_POST['Level'];
	$NamaLengkap	= $_POST['NamaLengkap'];
	$Email			= $_POST['Email'];
	$Status			= $_POST['Status'];
	$CreateDate		= $_POST['CreateDate'];
	
	if($proses=="tambah"){
	//echo "INSERT INTO user values('$KodeUser','$Username','$Password','$Level','$NamaLengkap','$Waktu','$Email','$Status')"; exit;
		$query=mysql_query("INSERT INTO user values('$KodeUser','$Username','$Password','$Level','$NamaLengkap','$Email','$Status','$CreateDate')");
		header("location:../../index.php?modul=user");
	}elseif($proses=="ubah"){
		//echo "UPDATE user SET Username='$Username',Password='$Password',Level='$Level',NamaLengkap='$NamaLengkap',Email='$Email',Status='$Status' WHERE KodeUser='$KodeUser'"; exit;
		$query=mysql_query("UPDATE user SET Username='$Username',Password='$Password',Level='$Level',NamaLengkap='$NamaLengkap',Email='$Email',Status='$Status' WHERE KodeUser='$KodeUser'");	
		header("location:../../index.php?modul=user");
	}elseif($proses=="hapus"){
		$query=mysql_query("DELETE FROM user WHERE KodeUser='$KodeUser'");
		header("location:../../index.php?modul=user");
	}
?>
	

