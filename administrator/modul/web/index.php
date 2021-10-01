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
		<h2 class="page-title">Konten Web</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group">
							<a href="index.php?modul=web&aksi=tambah"><button id="sample_editable_1_new" class="btn green">
							Tambah Data <i class="fa fa-plus"></i>
							</button></a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Menu</th>
								<th>Judul</th>
								<th>Deskripsi</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT * FROM web";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td>
									<?php 
										if($data['KodeMenu'] == '1'){ echo "Beranda"; }
										elseif($data['KodeMenu'] == '2'){ echo "Tentang Kami"; }
										elseif($data['KodeMenu'] == '3'){ echo "Faq"; }

										?>
								</td>
								<td><?php echo $data['Judul'];?></td>
								<td><?php echo $data['Deskripsi'];?></td>
								<td>
									<?php 
										if($data['Status'] == '1'){ echo "<span class=\"label label-sm label-info\">Aktif</span>"; }
										elseif($data['Status'] == '2'){ echo "<span class=\"label label-sm label-warning\">Tidak Aktif</span>"; }

										?>
								</td>
								<td>
									<a href="index.php?modul=web&aksi=ubah&Id=<?php echo $data['Id'];?>">Ubah</a>
									<a href="index.php?modul=web&aksi=hapus&Id=<?php echo $data['Id'];?>">Hapus</a>
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
				<div class="panel-heading"><h3 class="panel-title">Form Tambah Konten</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/web/proses.php?proses=tambah" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group">
							  <label>Nama Menu</label>
							  <select name="KodeMenu" class="form-control" required="required">
								 <option value="1">Beranda</option>
								 <option value="2">Tentang Kami</option>
								 <option value="3">Faq</option>
							  </select>
						   </div>
							<div class="form-group">
								<label>Judul</label>
								<input type="text" name="Judul" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="Deskripsi" required="required" class="form-control"></textarea>
							</div>
							<div class="form-group">
							  <label>Status</label>
							  <select name="Status" class="form-control" required="required">
								 <option value="1">Aktif</option>
								 <option value="2">Tidak Aktif</option>
							  </select>
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
$kode = $_GET['Id'];
$query = mysql_query("SELECT * FROM web WHERE Id = '$kode'");
$data = mysql_fetch_array($query);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Ubah Konten</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/web/proses.php?proses=ubah" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group">
								<label>Id</label>
								<input type="text" name="Id" value="<?php echo $data['Id'];?>" readonly="readonly" class="form-control">
							</div>
							<div class="form-group">
							  <label>Nama Menu</label>
							  <select name="KodeMenu" class="form-control" required="required">
								 <option value="1">Beranda</option>
								 <option value="2">Tentang Kami</option>
								 <option value="3">Faq</option>
							  </select>
						   </div>
							<div class="form-group">
								<label>Judul</label>
								<input type="text" name="Judul" value="<?php echo $data['Judul'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="Deskripsi" class="form-control"><?php echo $data['Deskripsi'];?></textarea>
							</div>
							<div class="form-group">
							  <label>Status</label>
							  <select name="Status" class="form-control" required="required">
								 <option value="1">Aktif</option>
								 <option value="2">Tidak Aktif</option>
							  </select>
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
$kode = $_GET['Id'];
$query = mysql_query("SELECT * FROM web WHERE Id = '$kode'");
$data = mysql_fetch_array($query);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Hapus Konten</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/web/proses.php?proses=hapus" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group">
								<label>Id</label>
								<input type="text" name="Id" value="<?php echo $data['Id'];?>" readonly="readonly" class="form-control">
							</div>
							<div class="form-group">
							  <label>Nama Menu</label>
							  <select name="KodeMenu" class="form-control" required="required">
								 <option value="1">Beranda</option>
								 <option value="2">Tentang Kami</option>
								 <option value="3">Faq</option>
							  </select>
						   </div>
							<div class="form-group">
								<label>Judul</label>
								<input type="text" name="Judul" value="<?php echo $data['Judul'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="Deskripsi" class="form-control" readonly="readonly"><?php echo $data['Deskripsi'];?></textarea>
							</div>
							<div class="form-group">
							  <label>Status</label>
							  <select name="Status" class="form-control" required="required">
								 <option value="1">Aktif</option>
								 <option value="2">Tidak Aktif</option>
							  </select>
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

