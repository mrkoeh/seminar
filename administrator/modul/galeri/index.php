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
		<h2 class="page-title">Galeri</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group">
							<a href="index.php?modul=galeri&aksi=tambah"><button id="sample_editable_1_new" class="btn green">
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
								<th>Foto</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						// PAGING
						 $batas = 5;
						 if( isset($_GET{'halaman'} ) ){
							$halaman = $_GET['halaman'];
						 }
						
						if (empty($halaman)) {
							$posisi = 0;
							$halaman = 1;
						} else {
							$posisi = ($halaman - 1) * $batas;
						}
						$a = "SELECT G.*, K.Kategori FROM galeri G, katgaleri K WHERE G.KodeKategori = K.KodeKategori AND G.Status = '1' LIMIT $posisi, $batas";
						$query = mysql_query($a);
						$no = $posisi + 1;
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['Kategori'];?></td>
								<td><?php echo $data['Keterangan'];?></td>
								<td><img src="../foto/galeri/<?php echo $data['Foto'];?>" width="50px" height="50px"></td>
								<td>
									<?php 
										if($data['Status'] == '1'){ echo "<span class=\"label label-sm label-info\">Aktif</span>"; }
										elseif($data['Status'] == '2'){ echo "<span class=\"label label-sm label-warning\">Tidak Aktif</span>"; }

										?>
								</td>
								<td>
									<a href="index.php?modul=galeri&aksi=ubah&KodeGaleri=<?php echo $data['KodeGaleri'];?>">Ubah</a>
									<a href="index.php?modul=galeri&aksi=hapus&KodeGaleri=<?php echo $data['KodeGaleri'];?>">Hapus</a>
								</td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
					
					<div class="margin-top-20">
						<?php
                        // PAGING
						$query = mysql_query("SELECT G.*, K.Kategori FROM galeri G, katgaleri K WHERE G.KodeKategori = K.KodeKategori AND G.Status = '1'");
                        $jmldata = mysql_num_rows($query);
                        $jmlhalaman = ceil($jmldata / $batas);

                        // previous link
                        if ($halaman == 1) {
                            echo '<span class="prn">&lt; Previous</span>&nbsp;';
                        } else {
                            $i = $halaman - 1;
                            echo '<a href="?modul=galeri&halaman=' . $i . '" class="prn" rel="nofollow" title="go to page ' . $i . '">&lt; Previous</a>&nbsp;';
                            echo '<span class="prn">...</span>&nbsp;';
                        }
                        for ($i = 1; $i <= $jmlhalaman && $i <= $jmlhalaman; $i++) {
                            if (($halaman) == $i) {
                                echo '<span>' . $i . '</span>&nbsp;';
                            } else {
                                echo '<a href=?modul=galeri&halaman=' . $i . '>' . $i . '</a>';
                            }
                        }

                        // next link 
                        if ($halaman < $jmlhalaman) {
                            $next = ($halaman + 1);
                            echo '<span class="prn">...</span>&nbsp;';
                            echo '<a href=?modul=galeri&halaman=' . $next . ' class="prn" rel="nofollow" title="go to page ' . $next . '">Next &gt;</a>&nbsp;';
                        } else {
                            echo '<span class="prn">Next &gt;</span>&nbsp;';
                        }

                        if ($jmldata != 0) {
                            echo '<p id="total_count">(total ' . $jmldata . ' data)</p></div>';
                        }
                        ?>
					</div>
					
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
				<div class="panel-heading"><h3 class="panel-title">Form Tambah Galeri</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/galeri/proses.php?proses=tambah" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group">
							  <label>Kategori Galeri</label>
							  <select class="form-control" name="KodeKategori" required="required" id="KodeKategori" onChange="show(this.value)">
								<option value="jenis_simpanan" selected="selected"> kategori galeri </option>
								<?php
								$q = mysql_query("SELECT * FROM katgaleri");
								while ($a = mysql_fetch_array($q)) {
									?>
									<option value="<?php echo $a['KodeKategori']; ?>"><?php echo $a['Kategori']; ?></option>
									<?php
								}
								?>
							</select>
						   </div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="Keterangan" required="required" class="form-control">
							</div>
							<div class="form-group">
							  <label>Foto</label>
							  <input type="file" name="Foto" class="form-control" required="required">
							  <small>- Ukuran Foto 3 x 4  atau maximal 300x400px</small><br>
							  <small>- Besar file foto maksimal  25kb</small><br>
							  <small>- Jenis file foto harus memiliki format .jpeg  atau .gif</small>
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
$kode = $_GET['KodeGaleri'];
$query = mysql_query("SELECT G.*, K.Kategori FROM galeri G, katgaleri K WHERE G.KodeKategori = K.KodeKategori AND G.KodeGaleri = '$kode'");
$data = mysql_fetch_array($query);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Ubah Galeri</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/galeri/proses.php?proses=ubah" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group">
							  <label>Kategori Galeri</label>
							  <select class="form-control" name="KodeKategori" required="required" id="KodeKategori" onChange="show(this.value)">
								<option value="jenis_simpanan" selected="selected"> kategori galeri </option>
								<?php
								$q = mysql_query("SELECT * FROM katgaleri");
								while ($a = mysql_fetch_array($q)) {
									?>
									<option value="<?php echo $a['KodeKategori']; ?>"><?php echo $a['Kategori']; ?></option>
									<?php
								}
								?>
							</select>
						   </div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="Keterangan" value="<?php echo $data['Keterangan'];?>" class="form-control">
							</div>
							<div class="form-group">
							  <input type="file" name="Foto" class="form-control" required="required">
							  <small>- Ukuran Foto 3 x 4  atau maximal 300x400px</small><br>
							  <small>- Besar file foto maksimal  25kb</small><br>
							  <small>- Jenis file foto harus memiliki format .jpeg  atau .gif</small>
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
}elseif($aksi=="hapus"){
$kode = $_GET['KodeGaleri'];
$query = mysql_query("SELECT G.*, K.Kategori FROM galeri G, katgaleri K WHERE G.KodeKategori = K.KodeKategori AND G.KodeGaleri = '$kode'");
$data = mysql_fetch_array($query);
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Hapus Galeri</h3></div>
				<div class="panel-body">
					<form role="form" method="POST" action="modul/galeri/proses.php?proses=hapus" enctype="multipart/form-data">
						<div class="form-body">
							<div class="form-group">
								<input type="hidden" name="KodeGaleri" value="<?php echo $data['KodeGaleri'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
							  <label>Kategori Galeri</label>
							  <input type="text" name="Keterangan" value="<?php echo $data['Kategori'];?>" class="form-control" readonly="readonly">
						   </div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="Keterangan" value="<?php echo $data['Keterangan'];?>" class="form-control" readonly="readonly">
							</div>
							<div class="form-group">
							  <label>Foto</label>
							  <td><img src="../foto/galeri/<?php echo $data['Foto'];?>" width="50px" height="50px"></td>
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



