<?php
include "../../koneksi/koneksi.php";
//include "../../fungsi.php";
$a 			= $_GET["KodeRegistrasi"];
$nama 		= $_GET["NamaLengkap"];
$institusi	= $_GET["Institusi"];
$foto 		= $_GET["Foto"];
$tema 		= $_GET["TemaSeminar"];
$panitia 	= $_GET["Penyelenggara"];
$tanggal 	= $_GET["TanggalPelaksanaan"];
$tempat 	= $_GET["Tempat"];
?>
<link rel="stylesheet" type="text/css" href="../../../assets/css/cetak.css" />

<div class="layout">
	<div class="header">
		<div class="logo">
			<img src="../../../assets/img/chrome.png" width="84" height="80">
		</div>
		<div class="judul">
			<p>
				<b>KARTU PESERTA</b><br>
				<small>nomor registrasi : <?php echo $a;?></small>
			</p>
		</div>
	</div>
	
	<div class="isi">
		<div class="isikiri">
			<img src="../../../foto/<?php echo $foto;?>" width="10%" height="20%" class="border">
		</div>
		<div class="isikanan">
			<h1><?php echo $nama;?></h1>
			<h3><?php echo $institusi;?></h3>
			<p>Sebagai Peserta Seminar <?php echo $tema;?></p>
			<p>Di <?php echo $tempat;?></p>
			<p>Pada <?php echo $tanggal;?></p>
		</div>
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
