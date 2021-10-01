<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	
	$KodeGaleri		= $_POST['KodeGaleri'];
	$KodeKategori	= $_POST['KodeKategori'];
	$Keterangan		= $_POST['Keterangan'];
	$Foto			= $_POST['Foto'];
	$Status			= $_POST['Status'];
	$CreateDate		= $_POST['CreateDate'];
	
	$lokasi = "../../foto/galeri/";
	$Foto = trim($_FILES['Foto']['name']);
	move_uploaded_file($_FILES['Foto']['tmp_name'],$lokasi.$Foto);
	
	if($proses=="tambah"){
	//echo "INSERT INTO galeri values('$KodeGaleri','$KodeKategori','$Keterangan','$Foto','$Status')"; exit;
		$query=mysql_query("INSERT INTO galeri values('$KodeGaleri','$KodeKategori','$Keterangan','$Foto','1','$CreateDate')");
		header("location:../../index.php?modul=galeri");
	}elseif($proses=="ubah"){
		$query=mysql_query("UPDATE galeri SET KodeKategori='$KodeKategori',Keterangan='$Keterangan',Foto='$Foto',Status='$Status' WHERE KodeGaleri='$KodeGaleri'");	
		header("location:../../index.php?modul=galeri");
	}elseif($proses=="hapus"){
		$query=mysql_query("DELETE FROM galeri WHERE KodeGaleri='$KodeGaleri'");
		header("location:../../index.php?modul=galeri");
	}
?>
	

