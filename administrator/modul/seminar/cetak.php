<?php
header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");
header("Last-Modified:". gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-word; name='word'");
header("Content-disposition: attachment; filename=Seminar.doc");

include "../../koneksi/koneksi.php";
include "../../fungsi.php";
?>

<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Kategori Seminar</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Tema</th>
								<th>Penyelenggara</th>
								<th>Tanggal & Waktu</th>
								<th>Tempat</th>
								<th>Biaya</th>
								<th>Kapasitas</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT * FROM seminar ORDER BY TanggalPelaksanaan ASC";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['TemaSeminar'];?></td>
								<td><?php echo $data['Penyelenggara'];?></td>
								<td><?php echo Tgl($data['TanggalPelaksanaan']);?></td>
								<td><?php echo $data['Tempat'];?></td>
								<td><?php echo Rp($data['Biaya']);?></td>
								<td><?php echo $data['Kapasitas'];?></td>
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