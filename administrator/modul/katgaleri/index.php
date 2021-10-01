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
		<h2 class="page-title">Kategori Galeri</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group">
							<a href="index.php?modul=katgaleri&aksi=tambah"><button id="sample_editable_1_new" class="btn green">
							Tambah Data <i class="fa fa-plus"></i>
							</button></a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT * FROM katgaleri ORDER BY KodeKategori DESC";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['Kategori'];?></td>
								<td><?php echo $data['Keterangan'];?></td>
								<td>
									<a href="index.php?modul=katgaleri&aksi=ubah&KodeKategori=<?php echo $data['KodeKategori'];?>">Ubah</a>
									<a href="index.php?modul=katgaleri&aksi=hapus&KodeKategori=<?php echo $data['KodeKategori'];?>">Hapus</a>
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
				<div class="panel-heading"><h3 class="panel-title">Form Tambah Kategori Galeri</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/katgaleri/proses.php?proses=tambah">
						<div class="form-body">
							<div class="form-group">
								<label>Kategori</label>
								<input type="text" name="Kategori" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="Keterangan" required="required" class="form-control">
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
$kode = $_GET['KodeKategori'];
$query = mysql_query("SELECT * FROM katgaleri WHERE KodeKategori = '$kode'");
$data = mysql_fetch_array($query);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Ubah Kategori Galeri</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/katgaleri/proses.php?proses=ubah">
						<div class="form-body">
							<div class="form-group">
								<label>Kode Kategori</label>
								<input type="text" name="KodeKategori" value="<?php echo $data['KodeKategori'];?>" readonly="readonly" class="form-control">
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<input type="text" name="Kategori" value="<?php echo $data['Kategori'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="Keterangan" value="<?php echo $data['Keterangan'];?>" class="form-control">
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
$kode = $_GET['KodeKategori'];
$query = mysql_query("SELECT * FROM katgaleri WHERE KodeKategori = '$kode'");
$data = mysql_fetch_array($query);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Hapus Kategori Galeri</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/katgaleri/proses.php?proses=hapus">
						<div class="form-body">
							<div class="form-group">
								<label>Kode Kategori</label>
								<input type="text" name="KodeKategori" value="<?php echo $data['KodeKategori'];?>" readonly="readonly" class="form-control">
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<input type="text" name="Kategori" value="<?php echo $data['Kategori'];?>" readonly="readonly" class="form-control">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="Keterangan" value="<?php echo $data['Keterangan'];?>" readonly="readonly" class="form-control">
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

