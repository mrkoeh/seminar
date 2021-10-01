<?php
include "koneksi/koneksi.php";
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Daftar Peserta Seminar</h2>
	</div>
	
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<select name="kategori">
			<option value="" selected="selected" disabled="disabled">Pilihan Kategori</option>
			<option value="KodeRegistrasi">Kode Registrasi</option>
			<option value="NamaLengkap">Nama Lengkap</option>
		</select>
		<input type='text' value='' name='qcari'>
		<input type='submit' value='cari'>
		<a href='index.php?modul=absensi'>All</a>
	</form>

	<div class="table-toolbar">
		<div class="btn-group pull-right">
			<?php
			$query = mysql_query("SELECT COUNT(KodeRegistrasi) AS jml, `Absensi` FROM registrasi WHERE Status = '2' GROUP BY `Absensi`");
			while($data=mysql_fetch_array($query)){
			?>
			<?php if($data['Absensi'] == '0'){?>
				<button class="btn dropdown-toggle" data-toggle="dropdown">Peserta Terdaftar : <?php echo $data['jml'];?></button>
			<?php }elseif($data['Absensi'] == '1'){?>
				<button class="btn dropdown-toggle" data-toggle="dropdown">Peserta Hadir : <?php echo $data['jml'];?></button>
			<?php }elseif($data['Absensi'] == '2'){ ?>
				<button class="btn dropdown-toggle" data-toggle="dropdown">Peserta Tidak Hadir : <?php echo $data['jml'];?></button>
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
								<th>Absensi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						// PAGING
						 $batas = 10;
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
							$a = "SELECT * FROM registrasi	WHERE $kategori LIKE '%$qcari%' LIMIT $posisi, $batas";
							$query = mysql_query($a);
						}else{
							$a = "SELECT * FROM registrasi LIMIT $posisi, $batas";
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
										if($data['Absensi'] == '0'){ echo "<span class=\"label label-sm label-info\">Terdaftar</span>"; }
										elseif($data['Absensi'] == '1'){ echo "<span class=\"label label-sm label-success\">Hadir</span>"; }
										elseif($data['Absensi'] == '2'){ echo "<span class=\"label label-sm label-danger\">Tidak Hadir</span>"; }
										?>
								</td>
								<td>
									<a href="modul/absensi/proses.php?proses=hadir&KodeRegistrasi=<?php echo $data['KodeRegistrasi'];?>" class="btn green btn-xs"><button class="btn green"><b>Hadir</b></button></a>
									<a href="modul/absensi/proses.php?proses=tidakhadir&KodeRegistrasi=<?php echo $data['KodeRegistrasi'];?>" class="btn red btn-xs"><button class="btn red"><b>Tidak Hadir</b></button></a>
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
                            echo '<a href="?modul=absensi&halaman=' . $i . '" class="prn" rel="nofollow" title="go to page ' . $i . '">&lt; Previous</a>&nbsp;';
                            echo '<span class="prn">...</span>&nbsp;';
                        }
                        for ($i = 1; $i <= $jmlhalaman && $i <= $jmlhalaman; $i++) {
                            if (($halaman) == $i) {
                                echo '<span>' . $i . '</span>&nbsp;';
                            } else {
                                echo '<a href=?modul=absensi&halaman=' . $i . '>' . $i . '</a>';
                            }
                        }

                        // next link 
                        if ($halaman < $jmlhalaman) {
                            $next = ($halaman + 1);
                            echo '<span class="prn">...</span>&nbsp;';
                            echo '<a href=?modul=absensi&halaman=' . $next . ' class="prn" rel="nofollow" title="go to page ' . $next . '">Next &gt;</a>&nbsp;';
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