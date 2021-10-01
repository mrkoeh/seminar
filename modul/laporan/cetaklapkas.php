<?php
header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");
header("Last-Modified:". gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-word; name='word'");
header("Content-disposition: attachment; filename=LapKas.doc");

include "../../koneksi/koneksi.php";
include "../../fungsi.php";
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Laporan Penerimaan Kas</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="portlet-body">
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
	</div><br>
