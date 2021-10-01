<?php
	include "../../administrator/koneksi/koneksi.php";
	
	$KodeRegistrasi		= $_POST['KodeRegistrasi'];
	$KodeSeminar		= $_POST['KodeSeminar'];
	$NoIdentitas		= $_POST['NoIdentitas'];
	$NamaLengkap		= $_POST['NamaLengkap'];
	$Institusi			= $_POST['Institusi'];
	$AlamatInstitusi	= $_POST['AlamatInstitusi'];
	$TempatLahir		= $_POST['TempatLahir'];
	$TanggalLahir		= $_POST['TanggalLahir'];
	$JenisKelamin		= $_POST['JenisKelamin'];
	$Pekerjaan			= $_POST['Pekerjaan'];
	$Agama				= $_POST['Agama'];
	$AlamatLengkap		= $_POST['AlamatLengkap'];
	$Telp				= $_POST['Telp'];
	$Email				= $_POST['Email'];
	$Foto				= $_POST['Foto'];
	$Status				= 1;
	$Absensi			= 0;
	$CreateDate			= $_POST['CreateDate'];
	
	$lokasi = "../../foto/";
	$Foto = trim($_FILES['Foto']['name']);
	move_uploaded_file($_FILES['Foto']['tmp_name'],$lokasi.$Foto);
	
	//echo "INSERT INTO registrasi VALUES('$KodeRegistrasi','$KodeSeminar','$NoIdentitas','$NamaLengkap','$Institusi','$AlamatInstitusi','$TempatLahir','$TanggalLahir','$JenisKelamin','$Pekerjaan','$Agama','$AlamatLengkap','$Telp','$Email','$Foto','$Status','$Absensi','$CreateDate')"; exit;
	$query = mysql_query("INSERT INTO registrasi VALUES('$KodeRegistrasi','$KodeSeminar','$NoIdentitas','$NamaLengkap','$Institusi','$AlamatInstitusi','$TempatLahir','$TanggalLahir','$JenisKelamin','$Pekerjaan','$Agama','$AlamatLengkap','$Telp','$Email','$Foto','$Status','$Absensi','$CreateDate')");
	
	// untuk verifikasi pendaftaran
	$Kode	= md5(uniqid(rand()));
	$verifikasi = mysql_query("INSERT INTO verifikasi_pendaftaran VALUES('','$NoIdentitas','$KodeSeminar','$KodeRegistrasi','$Email','$Kode','$CreateDate')");
	
	require("PHPMailer/class.phpmailer.php"); // path to the PHPMailer class
	$mail = new PHPMailer();
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Mailer = "smtp";
	$mail->SMTPSecure = 'tsl';
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "sanynurulfadila@gmail.com"; // SMTP username
	$mail->Password = "fadila27"; // SMTP password
	$mail->From = "sanynurulfadila@gmail.com";
	$mail->AddAddress($Email);
	$mail->IsHTML(true);
	$mail->Subject = "Verifikasi Pendaftaran Seminar";
	$mail->Body = "Terimakasih <b>".$NamaLengkap."</b> Anda telah melakukan pendaftaran seminar,
					<br> Berikut Nomer Registrasi milik anda untuk keperluan Konfirmasi Pembayaran. 
					<br> Nomer Registrasi = <b>".$KodeRegistrasi."</b>
					<br> Konfirmasi Pembayaran paling lambat 2 hari sebelum acara seminar dilaksanakan. 
					<br> Terimakasih
					<br><br> Salam
					<br> Panitia";
	$mail->Send();	
	
	
	header("location:../../index.php?modul=registrasi&status=ok");
	
?>
	

