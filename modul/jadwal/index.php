<?php 
	include "administrator/koneksi/koneksi.php";
	include "fungsi.php";
?>
<br>
<div class="container min-hight">
	<div class="row margin-bottom-40">
		<?php
		$sql = "SELECT * FROM seminar ORDER BY TanggalPelaksanaan DESC";
		$query = mysql_query($sql);
		while($data=mysql_fetch_array($query)){
			$Kode = $data['KodeSeminar'];
			$sql2 = mysql_query("SELECT COUNT(*) AS terdaftar FROM registrasi WHERE KodeSeminar = '$Kode'");
			$data2 = mysql_fetch_array($sql2);
			$terdaftar = $data2['terdaftar'];
			
			$sql3 = mysql_query("SELECT COUNT(*) AS konfirmasi FROM registrasi WHERE KodeSeminar = '$Kode' AND Status = '2'");
			$data3 = mysql_fetch_array($sql3);
			$konfirmasi = $data3['konfirmasi'];
			
		?>
		<div class="col-md-3">
			<div class="pricing">
				<div class="pricing-head">
					<h3><?php echo $data['TemaSeminar'];?> <span><?php echo $data['Penyelenggara'];?></span></h3>
					<h4><i>Rp </i><?php echo Rp($data['Biaya']);?></h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li><i class="icon-tags"></i> <?php echo $data['Tempat'];?></li>
					<li><i class="icon-asterisk"></i> <?php echo Tgl($data['TanggalPelaksanaan']);?></li>
					<li><i class="icon-heart"></i> Kuota <b><?php echo $data['Kapasitas'];?></b> Orang</li>
					<li><i class="icon-heart"></i> Terdaftar <b><?php echo $terdaftar;?></b> Orang</li>
					<li><i class="icon-heart"></i> Konfirmasi <b><?php echo $konfirmasi;?></b> Orang</li>
					<li><i class="icon-heart"></i> Sisa Kuota <b><?php echo ($data['Kapasitas'] - $konfirmasi) ;?></b> Orang</li>
				</ul>
				<div class="pricing-footer">
					<p>Ayo segera daftar!!! Tiket terbatas!!! .</p>
					<a href="index.php?modul=registrasi" class="btn theme-btn">Daftar</a>  
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</div>