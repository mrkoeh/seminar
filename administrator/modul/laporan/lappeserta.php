<?php
include "koneksi/koneksi.php";
?>
<br>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-title">Laporan Registrasi Peserta</h2>
	</div>

	<div class="row">
		<div class="col-md-12">
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group pull-right">
							<button class="btn dropdown-toggle" data-toggle="dropdown">Aksi <i class="fa fa-angle-down"></i></button>
							<ul class="dropdown-menu pull-right">
								<li><a href="modul/laporan/cetaklappeserta.php" target="_blank">Cetak Laporan</a></li>
							</ul>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomer Registrasi</th>
								<th>Nama Lengkap</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Email</th>
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
						
						$a = "SELECT * FROM registrasi LIMIT $posisi, $batas";
						$query = mysql_query($a);
						
						$no = $posisi + 1;
						while($data=mysql_fetch_array($query)){
						?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $data['KodeRegistrasi'];?></td>
								<td><?php echo $data['NamaLengkap'];?></td>
								<td><?php echo $data['AlamatLengkap'];?></td>
								<td><?php echo $data['Telp'];?></td>
								<td><?php echo $data['Email'];?></td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
					<div class="margin-top-20">
						<?php
                        // PAGING
						$a = "SELECT * FROM registrasi";
						$query = mysql_query($a);

                        $jmldata = mysql_num_rows($query);
                        $jmlhalaman = ceil($jmldata / $batas);

                        // previous link
                        if ($halaman == 1) {
                            echo '<span class="prn">&lt; Previous</span>&nbsp;';
                        } else {
                            $i = $halaman - 1;
                            echo '<a href="?modul=lappeserta&halaman=' . $i . '" class="prn" rel="nofollow" title="go to page ' . $i . '">&lt; Previous</a>&nbsp;';
                            echo '<span class="prn">...</span>&nbsp;';
                        }
                        for ($i = 1; $i <= $jmlhalaman && $i <= $jmlhalaman; $i++) {
                            if (($halaman) == $i) {
                                echo '<span>' . $i . '</span>&nbsp;';
                            } else {
                                echo '<a href=?modul=lappeserta&halaman=' . $i . '>' . $i . '</a>';
                            }
                        }

                        // next link 
                        if ($halaman < $jmlhalaman) {
                            $next = ($halaman + 1);
                            echo '<span class="prn">...</span>&nbsp;';
                            echo '<a href=?modul=lappeserta&halaman=' . $next . ' class="prn" rel="nofollow" title="go to page ' . $next . '">Next &gt;</a>&nbsp;';
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