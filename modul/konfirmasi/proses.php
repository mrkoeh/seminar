<?php
	include "../../administrator/koneksi/koneksi.php";
	
	$KodeKonfirmasi		= $_POST['KodeKonfirmasi'];
	$KodeRegistrasi		= $_POST['KodeRegistrasi'];
	$KodeSeminar		= $_POST['KodeSeminar'];
	$TanggalPembayaran	= $_POST['TanggalPembayaran'];
	$BankPengirim		= $_POST['BankPengirim'];
	$NamaPemilikRekening= $_POST['NamaPemilikRekening'];
	$BuktiPembayaran	= $_POST['BuktiPembayaran'];
	$CreateDate			= $_POST['CreateDate'];
	
	$lokasi = "../../Foto/BuktiPembayaran/";
	$BuktiPembayaran = trim($_FILES['BuktiPembayaran']['name']);
	move_uploaded_file($_FILES['BuktiPembayaran']['tmp_name'],$lokasi.$BuktiPembayaran);
	
	//echo "INSERT INTO konfirmasi values('$KodeKonfirmasi','$KodeRegistrasi','$KodeSeminar','$TanggalPembayaran','$BankPengirim','$NamaPemilikRekening','$JumlahTransfer','$BuktiPembayaran','$CreateDate')"; exit;
	$query = mysql_query("INSERT INTO konfirmasi values('$KodeKonfirmasi','$KodeRegistrasi','$KodeSeminar','$TanggalPembayaran','$BankPengirim','$NamaPemilikRekening','$BuktiPembayaran','$CreateDate')");
	$register = mysql_query("UPDATE registrasi SET Status = '2' WHERE KodeRegistrasi = '$KodeRegistrasi'");
	header("location:../../index.php?modul=konfirmasi&status=ok");
	
?>
	

