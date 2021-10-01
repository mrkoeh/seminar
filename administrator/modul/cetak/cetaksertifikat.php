<?php
include "../../koneksi/koneksi.php";
//include "../../fungsi.php";
$a 			= $_GET["KodeRegistrasi"];
$nama 		= $_GET["NamaLengkap"];
$tema 		= $_GET["TemaSeminar"];
$panitia 	= $_GET["Penyelenggara"];
$tanggal 	= $_GET["TanggalPelaksanaan"];
$tempat 	= $_GET["Tempat"];
$pengisi 	= $_GET["Pengisi"];
?>
<link rel="stylesheet" type="text/css" href="../../../assets/css/cetak.css" />

<div class="layout">
	<div class="header">
		<div class="logo">
			<img src="../../../assets/img/chrome.png" width="84" height="80">
		</div>
		<div class="judul">
			<p>
				<b>SERTIFIKAT</b><br>
				<small>nomor : 0991/78182/2014/siso</small>
			</p>
		</div>
	</div>
	
	<div class="isi">
		<h1>Diberikan Kepada</h1>
		<h3><?php echo $nama;?></h3>
		<p>Sebagai Peserta Seminar <?php echo $tema;?></p>
		<p>Di <?php echo $tempat;?></p>
		<p>Pada <?php echo $tanggal;?></p>
	</div>
	
	<div class="footer">
		<div class="kiri">
			&nbsp;
		</div>
		<div class="kanan">
			<p>
				<b>Penyelenggara</b><br>
				<small><?php echo $panitia;?></small>
			</p>
		</div>
	</div>
</div>
