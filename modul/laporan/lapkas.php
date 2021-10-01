<?php
include "koneksi/koneksi.php";
include "fungsi.php";

if(isset($_GET['aksi'])){
	$aksi=$_GET['aksi'];
}

if(empty($aksi)){
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Laporan Penerimaan Kas</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Aksi <i class="fa fa-angle-down"></i></button>
							<ul class="dropdown-menu pull-right">
								<li><a href="modul/laporan/cetaklapkas.php" target="_blank">Cetak Laporan</a></li>
							</ul>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Tema Seminar</th>
								<th>Biaya</th>
								<th>Kapasitas</th>
								<th>Peserta</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$total=0;
						$sql = "SELECT S.KodeSeminar, S.TemaSeminar, S.Biaya, S.Kapasitas, COUNT(R.KodeRegistrasi) AS peserta, (S.Biaya * COUNT(R.KodeRegistrasi)) AS jml
								FROM seminar S, registrasi R
								WHERE S.KodeSeminar = R.KodeSeminar
								GROUP BY S.KodeSeminar";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						$total = $total+$data['jml'];
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><a href="index.php?modul=lapkas&aksi=detail&KodeSeminar=<?php echo $data['KodeSeminar'];?>"><?php echo $data['TemaSeminar'];?></a></td>
								<td><?php echo Rp($data['Biaya']);?></td>
								<td><?php echo $data['Kapasitas'];?></td>
								<td><?php echo $data['peserta'];?></td>
								<td><?php echo Rp($data['jml']);?></td>
							</tr>
						<?php
						}
						?>
							<tr>
								<th colspan="5" align="center">Total</th>
								<th align="right"><?php echo Rp($total);?></th>
							</tr>    
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div><br>

<?php
}elseif($aksi == 'detail'){
$kode = $_GET['KodeSeminar'];
$sql = "SELECT S.TemaSeminar, R.KodeRegistrasi, R.NamaLengkap, R.AlamatLengkap, R.Pekerjaan, R.Telp, R.Email, R.Foto
		FROM seminar S, registrasi R
		WHERE S.KodeSeminar = R.KodeSeminar
		AND S.KodeSeminar = '$kode'
		GROUP BY S.KodeSeminar";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
?>

<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Daftar Peserta Registrasi</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>Tema Seminar</th>
								<th>Nomer Registrasi</th>
								<th>Nama Lengkap</th>
								<th>Alamat</th>
								<th>Pekerjaan</th>
								<th>Telepon</th>
								<th>Email</th>
								<th>Foto</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td><?php echo $data['TemaSeminar'];?></td>
								<td><?php echo $data['KodeRegistrasi'];?></td>
								<td><?php echo $data['NamaLengkap'];?></td>
								<td><?php echo $data['AlamatLengkap'];?></td>
								<td><?php echo $data['Pekerjaan'];?></td>
								<td><?php echo $data['Telp'];?></td>
								<td><?php echo $data['Email'];?></td>
								<td><img src="../foto/<?php echo $data['Foto'];?>" width="50px" height="50px"></td>
							</tr>
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div><br>

<?php } ?>