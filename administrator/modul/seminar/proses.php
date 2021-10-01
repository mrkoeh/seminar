<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	
	$KodeSeminar		= $_POST['KodeSeminar'];
	$TemaSeminar		= $_POST['TemaSeminar'];
	$Penyelenggara		= $_POST['Penyelenggara'];
	$TanggalPelaksanaan	= $_POST['TanggalPelaksanaan'];
	$Tempat				= $_POST['Tempat'];
	$Biaya				= $_POST['Biaya'];
	$Kapasitas			= $_POST['Kapasitas'];
	$Pengisi			= $_POST['Pengisi'];
	$CreateDate			= $_POST['CreateDate'];
	
	if($proses=="tambah"){
	//echo "INSERT INTO seminar values('$KodeSeminar','$TemaSeminar','$Penyelenggara','$TanggalPelaksanaan','$Tempat','$Waktu','$Biaya','$Kapasitas')"; exit;
		$query=mysql_query("INSERT INTO seminar values('$KodeSeminar','$TemaSeminar','$Penyelenggara','$TanggalPelaksanaan','$Tempat','$Biaya','$Kapasitas','$Pengisi','$CreateDate')");
		header("location:../../index.php?modul=seminar");
	}elseif($proses=="ubah"){
		//echo "UPDATE seminar SET TemaSeminar='$TemaSeminar',Penyelenggara='$Penyelenggara',TanggalPelaksanaan='$TanggalPelaksanaan',Tempat='$Tempat',Biaya='$Biaya',Kapasitas='$Kapasitas',Pengisi='$Pengisi' WHERE KodeSeminar='$KodeSeminar'"; exit;
		$query=mysql_query("UPDATE seminar SET TemaSeminar='$TemaSeminar',Penyelenggara='$Penyelenggara',TanggalPelaksanaan='$TanggalPelaksanaan',Tempat='$Tempat',Biaya='$Biaya',Kapasitas='$Kapasitas',Pengisi='$Pengisi' WHERE KodeSeminar='$KodeSeminar'");	
		header("location:../../index.php?modul=seminar");
	}elseif($proses=="hapus"){
		$query=mysql_query("DELETE FROM seminar WHERE KodeSeminar='$KodeSeminar'");
		header("location:../../index.php?modul=seminar");
	}
?>
	

