<?php
include "koneksi/koneksi.php";
include "fungsi.php";
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Kontak</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Pesan</th>
								<th>Tanggal</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT * FROM kontak ORDER BY CreateDate DESC";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['Nama'];?></td>
								<td><?php echo $data['Email'];?></td>
								<td><?php echo $data['Pesan'];?></td>
								<td><?php echo Tgl($data['CreateDate']);?></td>
								<td ><span class="label label-sm label-success">Approved</span></td>
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