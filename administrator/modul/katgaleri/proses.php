<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	
	$KodeKategori	= $_POST['KodeKategori'];
	$Kategori		= $_POST['Kategori'];
	$Keterangan		= $_POST['Keterangan'];
	
	if($proses=="tambah"){
	//echo "INSERT INTO katgaleri values('$KodeKategori','$Kategori','$Keterangan')"; exit;
		$query=mysql_query("INSERT INTO katgaleri values('$KodeKategori','$Kategori','$Keterangan')");
		header("location:../../index.php?modul=katgaleri");
	}elseif($proses=="ubah"){
		$query=mysql_query("UPDATE katgaleri SET Kategori='$Kategori',Keterangan='$Keterangan' WHERE KodeKategori='$KodeKategori'");	
		header("location:../../index.php?modul=katgaleri");
	}elseif($proses=="hapus"){
		$query=mysql_query("DELETE FROM katgaleri WHERE KodeKategori='$KodeKategori'");
		header("location:../../index.php?modul=katgaleri");
	}
?>
	

