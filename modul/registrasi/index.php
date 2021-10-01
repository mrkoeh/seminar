<?php 
	include "administrator/koneksi/koneksi.php";
	include "fungsi.php";
	if(isset($_GET['status'])){
		$status=$_GET['status'];
	}

	if(empty($status)){
?>
<script language="JavaScript">
    // fungsi untuk get besar_simpanan
    function show(KodeSeminar){
        $.ajax({
            type : "POST",
            data : "KodeSeminar="+KodeSeminar,
            url  : "modul/registrasi/refSeminar.php",
			dataType : 'json',
            success : function(msg){
                if(msg.KodeSeminar!=""){
					console.log(msg);
                    $('#biaya').val(msg.BIAYA);				
                    $('#kapasitas').val(msg.KAPASITAS);				
                }else{
                    $('#biaya').val("");				
                    $('#kapasitas').val("");		
                }
            }
        })
    }
</script>
<br>
<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
		   <!-- BLOCK START-->
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Pendaftaran</h3></div>
				<div class="panel-body">
				 <form role="form" method="POST" action="modul/registrasi/proses.php" enctype="multipart/form-data">
					<div class="form-body">
					   <div class="form-group">
						  <input type="hidden" name="KodeRegistrasi" value="<?php echo nomer('RG','KodeRegistrasi','registrasi');?>" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>No Identitas (KTP / SIM / Kartu Pelajar)</label>
						  <input type="text" name="NoIdentitas" class="form-control" required="required" placeholder="masukkan no identitas anda">
					   </div>
					   <div class="form-group">
						  <label>Nama Lengkap</label>
						  <input type="text" name="NamaLengkap" class="form-control" required="required" placeholder="masukkan nama lengkap anda">
					   </div>
					   <div class="form-group">
						  <label>Institusi</label>
						  <input type="text" name="Institusi" class="form-control" required="required" placeholder="masukkan nama institusi anda">
					   </div>
					   <div class="form-group">
						  <label >Alamat Institusi</label>
						  <textarea name="AlamatInstitusi" class="form-control" required="required" rows="3"></textarea>
					   </div>
					   <div class="form-group">
						  <label>Tempat Lahir</label>
						  <input type="text" name="TempatLahir" class="form-control" required="required" placeholder="masukkan tempat lahir">
					   </div>
					   <div class="form-group">
						  <label>Tanggal Lahir</label>
						  <div class="input-group">
							 <input type="text" name="TanggalLahir" class="form-control" required="required" id="tanggal">
							 <span class="input-group-addon"><i class="fa fa-table"></i></span>
						  </div>
					   </div>
					   <div class="form-group">
						  <label>Jenis Kelamin</label>
						  <div class="radio-list">
							 <label>
							 <input type="radio" name="JenisKelamin" required="required"  value="Laki-laki" checked> Laki - laki
							 </label>
							 <label>
							 <input type="radio" name="JenisKelamin" required="required"  value="Perempuan" > Perempuan
							 </label>
						  </div>
					   </div>
					   <div class="form-group">
						  <label>Pekerjaan</label>
						  <input type="text" name="Pekerjaan" class="form-control" required="required" placeholder="masukkan pekerjaan anda">
					   </div>
					   <div class="form-group">
						  <label>Agama</label>
						  <select name="Agama" class="form-control" required="required">
							 <option>Islam</option>
							 <option>Khatolik</option>
							 <option>Hindu</option>
							 <option>Budha</option>
							 <option>Kristen Protenstan</option>
						  </select>
					   </div>
					   <div class="form-group">
						  <label >Alamat Lengkap</label>
						  <textarea name="AlamatLengkap" class="form-control" required="required" rows="3"></textarea>
					   </div>
					    <div class="form-group">
						  <label>Telepon / HP</label>
						  <input type="text" name="Telp" class="form-control" required="required" placeholder="masukkan no telepon anda">
					   </div>
					   <div class="form-group">
						  <label >Email Address</label>
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
							<input type="text" name="Email" class="form-control" required="required" placeholder="masukkan alamat email anda">
						  </div>
					   </div>
					   <div class="form-group">
						  <label  >Kategori Seminar</label>
						  <select class="form-control" name="KodeSeminar" required="required" id="KodeSeminar" onChange="show(this.value)">
							<option value="jenis_simpanan" selected="selected"> kategori seminar </option>
							<?php
							$q = mysql_query("SELECT * FROM seminar");
							while ($a = mysql_fetch_array($q)) {
								?>
								<option value="<?php echo $a['KodeSeminar']; ?>"><?php echo $a['TemaSeminar']; ?></option>
								<?php
							}
							?>
						</select>
					   </div>
					   <div class="form-group">
						  <label>Biaya</label>
						  <input type="text" name="Biaya" id="biaya" class="form-control" required="required" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Kapasitas</label>
						  <input type="text" name="Kapasitas" id="kapasitas" class="form-control" required="required" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Foto</label>
						  <input type="file" name="Foto" class="form-control" required="required">
						  <small>- Ukuran Foto 3 x 4  atau maximal 300x400px</small><br>
						  <small>- Besar file foto maksimal  25kb</small><br>
						  <small>- Jenis file foto harus memiliki format .jpeg  atau .gif</small>
					   </div>
					   <div class="form-group">
							<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
						</div>
					</div>
					<div class="form-actions">
					   <button type="submit" class="btn blue">Daftar</button>
					   <button type="reset" class="btn default">Batal</button>                              
					</div>                        
				 </form>
			   </div>
			</div>
		</div>
	</div>
</div>

<?php
}elseif($status=="ok"){
?>

<div class="container min-hight">
	<div class="row margin-bottom-40">
		<div class="col-md-8 ">
		   <!-- BLOCK START-->
		   <div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-cog"></i>
				</button>

				<i class="fa fa-exclamation"></i>
				Proses Pendaftaran Berhasil!! <br>
				Periksa email anda untuk kode registrasi yang digunakan saat konfirmasi pembayaran. . .
			</div>
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Pendaftaran</h3></div>
				<div class="panel-body">
				 <form role="form" method="POST" action="modul/registrasi/proses.php" enctype="multipart/form-data">
					<div class="form-body">
					   <div class="form-group">
						  <input type="hidden" name="KodeRegistrasi" value="<?php echo nomer('RG','KodeRegistrasi','registrasi');?>" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>No Identitas (KTP / SIM / Kartu Pelajar)</label>
						  <input type="text" name="NoIdentitas" class="form-control" required="required" placeholder="masukkan no identitas anda">
					   </div>
					   <div class="form-group">
						  <label>Nama Lengkap</label>
						  <input type="text" name="NamaLengkap" class="form-control" required="required" placeholder="masukkan nama lengkap anda">
					   </div>
					   <div class="form-group">
						  <label>Institusi</label>
						  <input type="text" name="Institusi" class="form-control" required="required" placeholder="masukkan nama institusi anda">
					   </div>
					   <div class="form-group">
						  <label >Alamat Institusi</label>
						  <textarea name="AlamatInstitusi" class="form-control" required="required" rows="3"></textarea>
					   </div>
					   <div class="form-group">
						  <label>Tempat Lahir</label>
						  <input type="text" name="TempatLahir" class="form-control" required="required" placeholder="masukkan tempat lahir">
					   </div>
					   <div class="form-group">
						  <label>Tanggal Lahir</label>
						  <div class="input-group">
							 <input type="text" name="TanggalLahir" class="form-control" required="required" id="tanggal">
							 <span class="input-group-addon"><i class="fa fa-table"></i></span>
						  </div>
					   </div>
					   <div class="form-group">
						  <label>Jenis Kelamin</label>
						  <div class="radio-list">
							 <label>
							 <input type="radio" name="JenisKelamin" required="required"  value="Laki-laki" checked> Laki - laki
							 </label>
							 <label>
							 <input type="radio" name="JenisKelamin" required="required"  value="Perempuan" > Perempuan
							 </label>
						  </div>
					   </div>
					   <div class="form-group">
						  <label>Pekerjaan</label>
						  <input type="text" name="Pekerjaan" class="form-control" required="required" placeholder="masukkan pekerjaan anda">
					   </div>
					   <div class="form-group">
						  <label>Agama</label>
						  <select name="Agama" class="form-control" required="required">
							 <option>Islam</option>
							 <option>Khatolik</option>
							 <option>Hindu</option>
							 <option>Budha</option>
							 <option>Kristen Protenstan</option>
						  </select>
					   </div>
					   <div class="form-group">
						  <label >Alamat Lengkap</label>
						  <textarea name="AlamatLengkap" class="form-control" required="required" rows="3"></textarea>
					   </div>
					    <div class="form-group">
						  <label>Telepon / HP</label>
						  <input type="text" name="Telp" class="form-control" required="required" placeholder="masukkan no telepon anda">
					   </div>
					   <div class="form-group">
						  <label >Email Address</label>
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
							<input type="text" name="Email" class="form-control" required="required" placeholder="masukkan alamat email anda">
						  </div>
					   </div>
					   <div class="form-group">
						  <label  >Kategori Seminar</label>
						  <select class="form-control" name="KodeSeminar" required="required" id="KodeSeminar" onChange="show(this.value)">
							<option value="jenis_simpanan" selected="selected"> kategori seminar </option>
							<?php
							$q = mysql_query("SELECT * FROM seminar");
							while ($a = mysql_fetch_array($q)) {
								?>
								<option value="<?php echo $a['KodeSeminar']; ?>"><?php echo $a['TemaSeminar']; ?></option>
								<?php
							}
							?>
						</select>
					   </div>
					   <div class="form-group">
						  <label>Biaya</label>
						  <input type="text" name="Biaya" id="biaya" class="form-control" required="required" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Kapasitas</label>
						  <input type="text" name="Kapasitas" id="kapasitas" class="form-control" required="required" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Foto</label>
						  <input type="file" name="Foto" class="form-control" required="required">
						  <small>- Ukuran Foto 3 x 4  atau maximal 300x400px</small><br>
						  <small>- Besar file foto maksimal  25kb</small><br>
						  <small>- Jenis file foto harus memiliki format .jpeg  atau .gif</small>
					   </div>
					   <div class="form-group">
							<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
						</div>
					</div>
					<div class="form-actions">
					   <button type="submit" class="btn blue">Daftar</button>
					   <button type="button" onclick="history.back()" class="btn default">Batal</button>                              
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