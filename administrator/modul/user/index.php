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
		<h2 class="page-title">Data User</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group">
							<a href="index.php?modul=user&aksi=tambah"><button id="sample_editable_1_new" class="btn green">
							Tambah Data <i class="fa fa-plus"></i>
							</button></a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						$sql = "SELECT * FROM user ORDER BY CreateDate ASC";
						$query = mysql_query($sql);
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['Username'];?></td>
								<td>
									<?php 
										if($data['Level'] == '1'){ echo "Administrator"; }
										elseif($data['Level'] == '2'){ echo "User"; }
										?>
								</td>
								<td><?php echo $data['NamaLengkap'];?></td>
								<td><?php echo $data['Email'];?></td>
								<td>
									<?php 
										if($data['Status'] == '1'){ echo "Aktif"; }
										elseif($data['Status'] == '2'){ echo "Tidak Aktif"; }
										?>
								</td>
								<td>
									<a href="index.php?modul=user&aksi=ubah&KodeUser=<?php echo $data['KodeUser'];?>">Ubah</a>
									<a href="index.php?modul=user&aksi=hapus&KodeUser=<?php echo $data['KodeUser'];?>">Hapus</a>
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
				<div class="panel-heading"><h3 class="panel-title">Form Tambah User</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/user/proses.php?proses=tambah">
						<div class="form-body">
							<div class="form-group">
								<label>Kode User</label>
								<input type="text" name="KodeUser" value="<?php echo nomer('US','KodeUser','user');?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="Username" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="Password" required="required" class="form-control">
							</div>
							<div class="form-group">
							  <label>Level</label>
							  <select name="Level" class="form-control" required="required">
								 <option value="1">Administrator</option>
								 <option value="2">User</option>
							  </select>
						    </div>
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="NamaLengkap" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="Email" required="required" class="form-control">
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
$kode = $_GET['KodeUser'];
$query = "SELECT * FROM user WHERE KodeUser = '$kode'";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Ubah User</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/user/proses.php?proses=ubah">
						<div class="form-body">
							<div class="form-group">
								<label>Kode User</label>
								<input type="text" name="KodeUser" value="<?php echo $data['KodeUser'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="Username" value="<?php echo $data['Username'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="Password" value="<?php echo $data['Password'];?>" class="form-control">
							</div>
							<div class="form-group">
							  <label>Level</label>
							  <select name="Level" class="form-control" required="required">
								 <option value="1">Administrator</option>
								 <option value="2">User</option>
							  </select>
						    </div>
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="NamaLengkap" value="<?php echo $data['NamaLengkap'];?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="Email" value="<?php echo $data['Email'];?>" class="form-control">
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
$kode = $_GET['KodeUser'];
$query = "SELECT * FROM user WHERE KodeUser = '$kode'";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Hapus User</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/user/proses.php?proses=hapus">
						<div class="form-body">
							<div class="form-group">
								<label>Kode User</label>
								<input type="text" name="KodeUser" value="<?php echo $data['KodeUser'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="Username" value="<?php echo $data['Username'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="Password" value="<?php echo $data['Password'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Level</label>
								<input type="text" name="Level" value="<?php echo $data['Level'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="NamaLengkap" value="<?php echo $data['NamaLengkap'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="Email" value="<?php echo $data['Email'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Status</label>
								<input type="text" name="Status" value="<?php echo $data['Status'];?>" class="form-control" readonly="readonly">
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

