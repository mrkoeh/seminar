<?php
include "administrator/koneksi/koneksi.php";
include "administrator/fungsi.php";
?>
<div class="row service-box">
	<div class="col-md-4 col-sm-4">
		<?php
		$query = mysql_query("SELECT * FROM web WHERE Id = 1 AND Status = 1");
		$data = mysql_fetch_array($query);
		?>
		<div class="service-box-heading">
			<em><i class="fa fa-location-arrow blue"></i></em>
			<span><?php echo $data['Judul'];?></span>
		</div>
		<p><?php echo $data['Deskripsi'];?></p>
	</div>
	<div class="col-md-4 col-sm-4">
		<?php
		$query1 = mysql_query("SELECT * FROM web WHERE Id = 2 AND Status = 1");
		$data1 = mysql_fetch_array($query1);
		?>
		<div class="service-box-heading">
			<em><i class="fa fa-check red"></i></em>
			<span><?php echo $data1['Judul'];?></span>
		</div>
		<p><?php echo $data1['Deskripsi'];?></p>
	</div>
	<div class="col-md-4 col-sm-4">
		<?php
		$query2 = mysql_query("SELECT * FROM web WHERE Id = 3 AND Status = 1");
		$data2 = mysql_fetch_array($query2);
		?>
		<div class="service-box-heading">
			<em><i class="fa fa-resize-small green"></i></em>
			<span><?php echo $data2['Judul'];?></span>
		</div>
		<p><?php echo $data1['Deskripsi'];?></p>
	</div>
</div>

<div class="clearfix"></div>

<div class="row mix-block">
	<div class="col-md-7 tab-style-1 margin-bottom-20">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-1" data-toggle="tab">Minggu Ini</a></li>
			<li><a href="#tab-2" data-toggle="tab">Bulan Ini</a></li>
			<li><a href="#tab-3" data-toggle="tab">Tahun Ini</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane row fade in active" id="tab-1">
				<?php
				$no=1;
				$nom=1;
				$query = mysql_query("SELECT * FROM seminar WHERE WEEKOFYEAR(TanggalPelaksanaan)= WEEKOFYEAR(NOW()) ORDER BY TanggalPelaksanaan ASC");
				$jmldata = mysql_num_rows($query);
				if($jmldata > 0){
					while($data = mysql_fetch_array($query)){
				?>
						<div id="accordion1" class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_<?php echo $no++;?>">
										<?php echo $data['TemaSeminar'];?>
										</a>
									</h4>
								</div>
								<div id="accordion1_<?php echo $nom++;?>" class="panel-collapse collapse">
									<div class="panel-body">
										<p class="lead">Seminar <?php echo $data['TemaSeminar'];?></p>

										<h4>Ketentuan</h4>
										<ul>
											<li>Waktu Pelaksaan : <?php echo Tgl($data['TanggalPelaksanaan']);?></li>
											<li>Tempat Pelaksaan : <?php echo $data['Tempat'];?></li>
											<li>Biaya Seminar : Rp. <?php echo Rp($data['Biaya']);?></li>
											<li>Pengisi : <?php echo $data['Pengisi'];?></li>
										</ul>
										<hr>
										<p>Segera lakukan pendaftaran, tempat terbatas!!!</p>
									</div>
								</div>
							</div>         
						</div>  
				<?php
					}
				}else{
					echo "Tidak Ada Seminar untuk Minggu ini";
				}
				?>
			</div>
			<div class="tab-pane row fade" id="tab-2">
				<?php
				$no=1;
				$nom=1;
				$query = mysql_query("SELECT * FROM seminar WHERE MONTH(NOW()) = MONTH(TanggalPelaksanaan) AND YEAR(TanggalPelaksanaan) = YEAR(NOW()) ORDER BY TanggalPelaksanaan ASC");
				$jmldata = mysql_num_rows($query);
				if($jmldata > 0){
					while($data = mysql_fetch_array($query)){
				?>
						<div id="accordion2" class="panel-group">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion2_<?php echo $no++;?>">
										<?php echo $data['TemaSeminar'];?>
										</a>
									</h4>
								</div>
								<div id="accordion2_<?php echo $nom++;?>" class="panel-collapse collapse">
									<div class="panel-body">
										<p class="lead">Seminar <?php echo $data['TemaSeminar'];?></p>

										<h4>Ketentuan</h4>
										<ul>
											<li>Waktu Pelaksaan : <?php echo Tgl($data['TanggalPelaksanaan']);?></li>
											<li>Tempat Pelaksaan : <?php echo $data['Tempat'];?></li>
											<li>Biaya Seminar : Rp. <?php echo Rp($data['Biaya']);?></li>
											<li>Pengisi : <?php echo $data['Pengisi'];?></li>
										</ul>
										<hr>
										<p>Segera lakukan pendaftaran, tempat terbatas!!!</p>
									</div>
								</div>
							</div>         
						</div>
				<?php
					}
				}else{
					echo "Tidak Ada Seminar untuk Bulan ini";
				}
				?>
			</div>
			<div class="tab-pane fade" id="tab-3">
				<?php
				$no=1;
				$nom=1;
				$query = mysql_query("SELECT * FROM seminar WHERE YEAR(TanggalPelaksanaan) = YEAR(NOW()) ORDER BY TanggalPelaksanaan ASC");
				$jmldata = mysql_num_rows($query);
				if($jmldata > 0){
					while($data = mysql_fetch_array($query)){
				?>
						<div id="accordion3" class="panel-group">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion3_<?php echo $no++;?>">
										<?php echo $data['TemaSeminar'];?>
										</a>
									</h4>
								</div>
								<div id="accordion3_<?php echo $nom++;?>" class="panel-collapse collapse">
									<div class="panel-body">
										<p class="lead">Seminar <?php echo $data['TemaSeminar'];?></p>

										<h4>Ketentuan</h4>
										<ul>
											<li>Waktu Pelaksaan : <?php echo Tgl($data['TanggalPelaksanaan']);?></li>
											<li>Tempat Pelaksaan : <?php echo $data['Tempat'];?></li>
											<li>Biaya Seminar : Rp. <?php echo Rp($data['Biaya']);?></li>
											<li>Pengisi : <?php echo $data['Pengisi'];?></li>
										</ul>
										<hr>
										<p>Segera lakukan pendaftaran, tempat terbatas!!!</p>
									</div>
								</div>
							</div>         
						</div>
				<?php
					}
				}else{
					echo "Tidak Ada Seminar untuk Tahun ini";
				}
				?>
			</div>
		</div>
	</div>
</div>


<div class="row quote-v1">
	<div class="col-md-9 quote-v1-inner">
		<span>Tata Cara Mengikuti Seminar</span>
	</div>
</div>

<div class="row no-space-steps margin-bottom-40">
	<div class="col-md-4 col-sm-4">
		<?php
		$query3 = mysql_query("SELECT * FROM web WHERE Id = 4 AND Status = 1");
		$data3 = mysql_fetch_array($query3);
		?>
		<div class="front-steps front-step-one">
			<h2><?php echo $data3['Judul'];?></h2>
			<p><?php echo $data3['Deskripsi'];?></p>
		</div>
	</div>
	<div class="col-md-4 col-sm-4">
		<?php
		$query4 = mysql_query("SELECT * FROM web WHERE Id = 5 AND Status = 1");
		$data4 = mysql_fetch_array($query4);
		?>
		<div class="front-steps front-step-two">
			<h2><?php echo $data4['Judul'];?></h2>
			<p><?php echo $data4['Deskripsi'];?></p>
		</div>
	</div>
	<div class="col-md-4 col-sm-4">
		<?php
		$query5 = mysql_query("SELECT * FROM web WHERE Id = 6 AND Status = 1");
		$data5 = mysql_fetch_array($query5);
		?>
		<div class="front-steps front-step-three">
			<h2><?php echo $data5['Judul'];?></h2>
			<p><?php echo $data5['Deskripsi'];?></p>
		</div>
	</div>
</div>