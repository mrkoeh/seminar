<?php
include "koneksi/koneksi.php";

if(isset($_POST['Status'])){
	$Status = ($Status = $_POST['Status']) ? $Status : $_GET['Status'];
}

?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Daftar Peserta Registrasi</h2>
	</div>
	
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<select name="kategori">
			<option value="" selected="selected" disabled="disabled">Pilihan Kategori</option>
			<option value="KodeRegistrasi">Kode Registrasi</option>
			<option value="NamaLengkap">Nama Lengkap</option>
		</select>
		<input type='text' value='' name='qcari'>
		<input type='submit' value='cari'>
		<a href='index.php?modul=registrasi'>All</a>
	</form>
	
	<div class="table-toolbar">
		<div class="btn-group pull-right">
			<?php
			$query = mysql_query("SELECT COUNT(KodeRegistrasi) AS jml, `Status` FROM registrasi GROUP BY `Status`");
			while($data=mysql_fetch_array($query)){
			?>
			<?php if($data['Status'] == '1'){?>
				<button class="btn dropdown-toggle" data-toggle="dropdown">Peserta Terdaftar : <?php echo $data['jml'];?></button>
			<?php }else{?>
				<button class="btn dropdown-toggle" data-toggle="dropdown">Peserta Registrasi : <?php echo $data['jml'];?></button>
			<?php 
				}
			}
			?>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomer Registrasi</th>
								<th>Nama Lengkap</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Email</th>
								<th>Status</th>
								<th>Foto</th>
								<th>&nbsp;</th>
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
						
						if(isset($_POST['kategori'], $_POST['qcari'])){
							$kategori = $_POST['kategori'];
							$qcari = $_POST['qcari'];
							$a = "SELECT R.*, S.* 
								FROM registrasi R, seminar S
								WHERE $kategori LIKE '%$qcari%'
								AND R.KodeSeminar = S.KodeSeminar 
								LIMIT $posisi, $batas";
							$query = mysql_query($a);
						}else{
							$a = "SELECT R.*, S.* 
								FROM registrasi R, seminar S
								WHERE R.KodeSeminar = S.KodeSeminar 
								LIMIT $posisi, $batas";
							$query = mysql_query($a);
						}
						
						$no = $posisi + 1;
						while ($data = mysql_fetch_array($query)) {
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['KodeRegistrasi'];?></td>
								<td><?php echo $data['NamaLengkap'];?></td>
								<td><?php echo $data['AlamatLengkap'];?></td>
								<td><?php echo $data['Telp'];?></td>
								<td><?php echo $data['Email'];?></td>
								<td>
									<?php 
										if($data['Status'] == '1'){ echo "<span class=\"label label-sm label-info\">Registered</span>"; }
										elseif($data['Status'] == '2'){ echo "<span class=\"label label-sm label-success\">Approved</span>"; }
										elseif($data['Status'] == '3'){ echo "<span class=\"label label-sm label-warning\">Pending</span>"; }
										elseif($data['Status'] == '4'){ echo "<span class=\"label label-sm label-danger\">Block</span>"; }
										?>
								</td>
								<td><img src="../foto/<?php echo $data['Foto'];?>" width="50px" height="50px"></td>
								<td>
									<a onClick="window.open('modul/registrasi/kartuPeserta.php?KodeRegistrasi=<?php echo $data['KodeRegistrasi'];?>&NamaLengkap=<?php echo $data['NamaLengkap'];?>&Institusi=<?php echo $data['Institusi'];?>&Foto=<?php echo $data['Foto'];?>&TemaSeminar=<?php echo $data['TemaSeminar'];?>&Penyelenggara=<?php echo $data['Penyelenggara'];?>&TanggalPelaksanaan=<?php echo $data['TanggalPelaksanaan'];?>&Tempat=<?php echo $data['Tempat'];?>','popuppage','width=850,toolbar=1,resizable=1,scrollbars=yes,height=450,top=100,left=100');"><button class="btn red" ><b>Cetak Kartu</b></button></a>
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
						if(isset($_POST['kategori'], $_POST['qcari'])){
							$kategori = $_POST['kategori'];
							$qcari = $_POST['qcari'];
							$a = "SELECT * FROM registrasi	WHERE $kategori LIKE '%$qcari%'";
							$query = mysql_query($a);
						}else{
							$a = "SELECT * FROM registrasi";
							$query = mysql_query($a);
						}
                        $jmldata = mysql_num_rows($query);
                        $jmlhalaman = ceil($jmldata / $batas);

                        // previous link
                        if ($halaman == 1) {
                            echo '<span class="prn">&lt; Previous</span>&nbsp;';
                        } else {
                            $i = $halaman - 1;
                            echo '<a href="?modul=registrasi&halaman=' . $i . '" class="prn" rel="nofollow" title="go to page ' . $i . '">&lt; Previous</a>&nbsp;';
                            echo '<span class="prn">...</span>&nbsp;';
                        }
                        for ($i = 1; $i <= $jmlhalaman && $i <= $jmlhalaman; $i++) {
                            if (($halaman) == $i) {
                                echo '<span>' . $i . '</span>&nbsp;';
                            } else {
                                echo '<a href=?modul=registrasi&halaman=' . $i . '>' . $i . '</a>';
                            }
                        }

                        // next link 
                        if ($halaman < $jmlhalaman) {
                            $next = ($halaman + 1);
                            echo '<span class="prn">...</span>&nbsp;';
                            echo '<a href=?modul=registrasi&halaman=' . $next . ' class="prn" rel="nofollow" title="go to page ' . $next . '">Next &gt;</a>&nbsp;';
                        } else {
                            echo '<span class="prn">Next &gt;</span>&nbsp;';
                        }

                        if ($jmldata != 0) {
                            echo '<p id="total_count">(total ' . $jmldata . ' data)</p></div>';
                        }
                        ?>
					</div>
					
					<div class="table-toolbar">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Aksi <i class="fa fa-angle-down"></i></button>
							<ul class="dropdown-menu pull-right">
								<li><a href="modul/registrasi/proses.php?proses=cetaksemua" target="_blank">Cetak Kartu Semua Peserta</a></li>
							</ul>
						</div>
					</div>
				</div>
		</div>
	</div>
</div><br>