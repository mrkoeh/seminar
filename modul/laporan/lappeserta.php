<?php
include "koneksi/koneksi.php";
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Laporan Registrasi Peserta</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Aksi <i class="fa fa-angle-down"></i></button>
							<ul class="dropdown-menu pull-right">
								<li><a href="modul/laporan/cetaklappeserta.php" target="_blank">Cetak Laporan</a></li>
							</ul>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomer Registrasi</th>
								<th>Nama Lengkap</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT * FROM registrasi ORDER BY CreateDate DESC";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['KodeRegistrasi'];?></td>
								<td><?php echo $data['NamaLengkap'];?></td>
								<td><?php echo $data['AlamatLengkap'];?></td>
								<td><?php echo $data['Telp'];?></td>
								<td><?php echo $data['Email'];?></td>
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