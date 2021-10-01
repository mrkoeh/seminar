<?php
	include "../../koneksi/koneksi.php";
	$proses = $_GET['proses'];
	$KodeSeminar = $_GET['KodeSeminar'];
	
	if($proses=="reminder"){
		require("PHPMailer/class.phpmailer.php"); // path to the PHPMailer class
		// cari peserta seminar
		$caripeserta = mysql_query("SELECT R.*, S.TemaSeminar, S.TanggalPelaksanaan, S.Tempat, S.Pengisi
									FROM registrasi R, seminar S 
									WHERE R.KodeSeminar = S.KodeSeminar
									AND R.Status = '2' 
									AND R.KodeSeminar = '$KodeSeminar'");
		while($data = mysql_fetch_array($caripeserta)){
		
		   // untuk reminder seminar
			$NoIdentitas = $data['NoIdentitas'];
			$KodeRegistrasi = $data['KodeRegistrasi'];
			$KodeSeminar = $data['KodeSeminar'];
			$Email = $data['Email'];
			$Kode	= md5(uniqid(rand()));
			$CreateDate = date("Y-m-d H:i:s");
			$verifikasi = mysql_query("INSERT INTO reminder_seminar VALUES('','$NoIdentitas','$KodeRegistrasi','$KodeSeminar','$Email','$Kode','$CreateDate')");
			
			$mail = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Mailer = "smtp";
			$mail->SMTPSecure = 'tsl';
			$mail->Host = "ssl://smtp.gmail.com";
			$mail->Port = 465;
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "sanynurulfadiila@gmail.com"; // SMTP username
			$mail->Password = "fadila27"; // SMTP password
			$mail->From = "sanynurulfadila@gmail.com";
			$mail->AddAddress($data['Email']);
			//$mail->AddAddress($Email);
			$mail->IsHTML(true);
			$mail->Subject = "Reminder Seminar";
			$mail->Body = "Diberitahukan bahwa anda <b>".$data['NamaLengkap']"</b> akan menghadiri acara,
							<br> Seminar = <b>".$data['TemaSeminar']."</b>
							<br> Yang Dilaksanakan Pada = <b>".$data['TanggalPelaksanaan']."</b>
							<br> Di = <b>".$data['Tempat']."</b>
							<br> Pengisi = <b>".$data['Pengisi']."</b>
							<br> Dimohon kehadirannya 1 jam sebelum acara seminar dilaksanakan 
							<br> Terimakasih
							<br><br> Salam
							<br> Panitia";
			$mail->Send();
		}
		header("location:../../index.php?modul=reminder");
   }
   
?>