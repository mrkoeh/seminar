<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	
	$Id			= $_POST['Id'];
	$KodeMenu	= $_POST['KodeMenu'];
	$Judul		= $_POST['Judul'];
	$Deskripsi	= $_POST['Deskripsi'];
	$Status		= $_POST['Status'];
	$CreateDate	= $_POST['CreateDate'];
	
	if($proses=="tambah"){
	//echo "INSERT INTO web values('$Id','$KodeMenu','$Judul','$Deskripsi','$Status')"; exit;
		$query=mysql_query("INSERT INTO web values('$Id','$KodeMenu','$Judul','$Deskripsi','1','$CreateDate')");
		header("location:../../index.php?modul=web");
	}elseif($proses=="ubah"){
		$query=mysql_query("UPDATE web SET KodeMenu='$KodeMenu',Judul='$Judul',Deskripsi='$Deskripsi',Status='$Status' WHERE Id='$Id'");	
		header("location:../../index.php?modul=web");
	}elseif($proses=="hapus"){
		$query=mysql_query("DELETE FROM web WHERE Id='$Id'");
		header("location:../../index.php?modul=web");
	}
?>
	

