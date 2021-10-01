<?php
include "koneksi/koneksi.php";
include "fungsi.php";
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Reminder Seminar</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Tema</th>
								<th>Tanggal & Waktu</th>
								<th>Tempat</th>
								<th>Kode Registrasi</th>
								<th>Nama Lengkap</th>
								<th>Reminder</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT S.KodeSeminar, S.TemaSeminar, S.TanggalPelaksanaan, S.Tempat, R.KodeRegistrasi, R.NamaLengkap
								FROM registrasi R, seminar S
								WHERE R.KodeSeminar = S.KodeSeminar
								AND R.`Status` = '2'
								AND R.Absensi = '1'";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['TemaSeminar'];?></td>
								<td><?php echo Tgl($data['TanggalPelaksanaan']);?></td>
								<td><?php echo $data['Tempat'];?></td>
								<td><?php echo Rp($data['KodeRegistrasi']);?></td>
								<td><?php echo $data['NamaLengkap'];?></td>
								<td><a href="modul/reminder/proses.php?proses=reminder&KodeSeminar=<?php echo $data['KodeSeminar'];?>">Ingatkan!!</a></td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>