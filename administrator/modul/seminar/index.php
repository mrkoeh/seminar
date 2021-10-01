<?php
include "koneksi/koneksi.php";
include "fungsi.php";
if(isset($_GET['aksi'])){
	$aksi=$_GET['aksi'];
}

if(empty($aksi)){
?>

<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Kategori Seminar</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group">
							<a href="index.php?modul=seminar&aksi=tambah"><button id="sample_editable_1_new" class="btn green">
							Tambah Data <i class="fa fa-plus"></i>
							</button></a>
						</div>
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Aksi <i class="fa fa-angle-down"></i></button>
							<ul class="dropdown-menu pull-right">
								<li><a href="modul/seminar/cetak.php" target="_blank">Cetak</a></li>
							</ul>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Tema</th>
								<th>Penyelenggara</th>
								<th>Pengisi</th>
								<th>Tanggal & Waktu</th>
								<th>Tempat</th>
								<th>Biaya</th>
								<th>Kapasitas</th>
								<th>Aksi</th>
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
								<td><?php echo $data['Pengisi'];?></td>
								<td><?php echo Tgl($data['TanggalPelaksanaan']);?></td>
								<td><?php echo $data['Tempat'];?></td>
								<td><?php echo Rp($data['Biaya']);?></td>
								<td><?php echo Rp($data['Kapasitas']);?></td>
								<td>
									<a href="index.php?modul=seminar&aksi=ubah&KodeSeminar=<?php echo $data['KodeSeminar'];?>"><button class="btn green">Ubah</button></a>
									<a href="index.php?modul=seminar&aksi=hapus&KodeSeminar=<?php echo $data['KodeSeminar'];?>"><button class="btn red">Hapus</button></a>
								</td>
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

<?php
}elseif($aksi=="tambah"){
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Tambah Kategori Seminar</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/seminar/proses.php?proses=tambah">
						<div class="form-body">
							<div class="form-group">
								<label>Kode Seminar</label>
								<input type="text" name="KodeSeminar" value="<?php echo nomer('SM','KodeSeminar','seminar');?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Tema Seminar</label>
								<input type="text" name="TemaSeminar" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Penyelenggara</label>
								<input type="text" name="Penyelenggara" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Tanggal & Waktu Pelaksanaan</label>
								<div class="input-group">
									<input type="text" name="TanggalPelaksanaan" required="required" id="waktu" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Tempat Pelaksanaan</label>
								<input type="text" name="Tempat" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Biaya</label>
								<input type="text" name="Biaya" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Kapasitas</label>
								<input type="text" name="Kapasitas" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Pengisi</label>
								<input type="text" name="Pengisi" required="required" class="form-control">
							</div>
							<div class="form-group">
								<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn blue">Tambah</button>
							<button type="reset" class="btn default" onClick="history.back();">Batal</button>                              
						</div>                        
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}elseif($aksi=="ubah"){
$kode = $_GET['KodeSeminar'];
$query = "SELECT * FROM seminar WHERE KodeSeminar = '$kode'";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql)


?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Ubah Kategori Seminar</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/seminar/proses.php?proses=ubah">
						<div class="form-body">
							<div class="form-group">
								<label>Kode Seminar</label>
								<input type="text" name="KodeSeminar" value="<?php echo $data['KodeSeminar'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Tema Seminar</label>
								<input type="text" name="TemaSeminar" required="required" value="<?php echo $data['TemaSeminar'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Penyelenggara</label>
								<input type="text" name="Penyelenggara" required="required" value="<?php echo $data['Penyelenggara'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Tanggal & Waktu Pelaksanaan</label>
								<div class="input-group">
									<input type="text" name="TanggalPelaksanaan" required="required" value="<?php echo $data['TanggalPelaksanaan'];?>" id="waktu" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Tempat Pelaksanaan</label>
								<input type="text" name="Tempat" required="required" value="<?php echo $data['Tempat'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Biaya</label>
								<input type="text" name="Biaya" required="required" value="<?php echo $data['Biaya'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Kapasitas</label>
								<input type="text" name="Kapasitas" required="required" value="<?php echo $data['Kapasitas'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Pengisi</label>
								<input type="text" name="Pengisi" required="required" value="<?php echo $data['Pengisi'];?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn blue">Ubah</button>
							<button type="reset" class="btn default" onClick="history.back();">Batal</button>                          
						</div>                        
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}elseif($aksi=="hapus"){
$kode = $_GET['KodeSeminar'];
$query = "SELECT * FROM seminar WHERE KodeSeminar = '$kode'";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql)


?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Hapus Kategori Seminar</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/seminar/proses.php?proses=hapus">
						<div class="form-body">
							<div class="form-group">
								<label>Kode Seminar</label>
								<input type="text" name="KodeSeminar" value="<?php echo $data['KodeSeminar'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Tema Seminar</label>
								<input type="text" name="TemaSeminar" readonly="readonly" value="<?php echo $data['TemaSeminar'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Penyelenggara</label>
								<input type="text" name="Penyelenggara" readonly="readonly" value="<?php echo $data['Penyelenggara'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Tanggal & Waktu Pelaksanaan</label>
								<div class="input-group">
									<input type="text" name="TanggalPelaksanaan" readonly="readonly" value="<?php echo $data['TanggalPelaksanaan'];?>" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Tempat Pelaksanaan</label>
								<input type="text" name="Tempat" readonly="readonly" value="<?php echo $data['Tempat'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Biaya</label>
								<input type="text" name="Biaya" readonly="readonly" value="<?php echo $data['Biaya'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Kapasitas</label>
								<input type="text" name="Kapasitas" readonly="readonly" value="<?php echo $data['Kapasitas'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Pengisi</label>
								<input type="text" name="Pengisi" readonly="readonly" value="<?php echo $data['Pengisi'];?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn blue">Hapus</button>
							<button type="reset" class="btn default" onClick="history.back();">Batal</button>                          
						</div>                        
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>

