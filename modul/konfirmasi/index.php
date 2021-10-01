<?php 
	include "administrator/koneksi/koneksi.php";
	include "fungsi.php";
	if(isset($_GET['status'])){
		$status=$_GET['status'];
	}

	if(empty($status)){
?>
<script language="JavaScript">
	function showData(KodeRegistrasi){
        $.ajax({
            type : "POST",
            data : "KodeRegistrasi="+KodeRegistrasi,
            url  : "modul/konfirmasi/refRegistrasi.php",
			dataType : 'json',
            success : function(msg){
                if(msg.KodeRegistrasi!=""){
					console.log(msg);
                    $('#NamaLengkap').val(msg.NAMALENGKAP);				
                    $('#Telp').val(msg.TELP);				
                    $('#Email').val(msg.EMAIL);				
                    $('#KodeSeminar').val(msg.KODESEMINAR);				
                    $('#TemaSeminar').val(msg.TEMASEMINAR);				
                    $('#Biaya').val(msg.BIAYA);				
                }else{
                    $('#NamaLengkap').val("");				
                    $('#Telp').val("");		
                    $('#Email').val("");		
                    $('#KodeSeminar').val("");		
                    $('#TemaSeminar').val("");		
                    $('#Biaya').val("");		
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
				<div class="panel-heading"><h3 class="panel-title">Form Konfirmasi Pembayaran</h3></div>
				<div class="panel-body">
				 <form role="form" method="POST" action="modul/konfirmasi/proses.php" enctype="multipart/form-data">
					<div class="form-body">
					   <div class="form-group">
						  <input type="hidden" name="KodeKonfirmasi" value="<?php echo nomer(date('Ymd').'K','KodeKonfirmasi','konfirmasi');?>" class="form-control">
					   </div>
					   <div class="form-group">
						  <label>No Registrasi</label>
						  <input type="text" name="KodeRegistrasi" onChange="showData(this.value)" class="form-control" required="required">
					   </div>
					   <div class="form-group">
						  <label>Nama Lengkap</label>
						  <input type="text" name="NamaLengkap" class="form-control" id="NamaLengkap" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Telepon / HP</label>
						  <input type="text" name="Telp" class="form-control" id="Telp" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label >Email Address</label>
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
							<input type="text" name="Email" class="form-control" id="Email" readonly="readonly">
						  </div>
					   </div>
					   <div class="form-group">
						  <input type="hidden" name="KodeSeminar" id="KodeSeminar" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Tema Seminar</label>
						  <input type="text" name="TemaSeminar" id="TemaSeminar" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Biaya</label>
						  <input type="text" name="Biaya" id="Biaya" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Tanggal Pembayaran</label>
						  <div class="input-group">
							 <input type="text" name="TanggalPembayaran" class="form-control" required="required" id="tanggal">
							 <span class="input-group-addon"><i class="fa fa-table"></i></span>
						  </div>
					   </div>
					   <div class="form-group">
						  <label>Bank Pengirim</label>
						  <input type="text" name="BankPengirim" class="form-control" required="required">
					   </div>
					   <div class="form-group">
						  <label>Nama Pemilik Rekening</label>
						  <input type="text" name="NamaPemilikRekening" class="form-control" required="required">
					   </div>
					   <div class="form-group">
						  <label>Bukti (Scanned) Transfer ATM atau Bank</label>
						  <input type="file" name="BuktiPembayaran" class="form-control" required="required">
					   </div>
					   <div class="form-group">
							<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
						</div>
					</div>
					<div class="form-actions">
					   <button type="submit" class="btn blue">Kirim</button>
					   <button type="reset" class="btn default" onClick="history.back();">Batal</button>                          
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
				Proses Konfimasi Pendaftaran Berhasil!! <br>
			</div>
			<div class="panel panel-default">   
				<div class="panel-heading"><h3 class="panel-title">Form Konfirmasi Pembayaran</h3></div>
				<div class="panel-body">
				 <form role="form" method="POST" action="modul/konfirmasi/proses.php" enctype="multipart/form-data">
					<div class="form-body">
					   <div class="form-group">
						  <input type="hidden" name="KodeKonfirmasi" value="<?php echo nomer(date('Ymd').'K','KodeKonfirmasi','konfirmasi');?>" class="form-control">
					   </div>
					   <div class="form-group">
						  <label>No Registrasi</label>
						  <input type="text" name="KodeRegistrasi" onChange="showData(this.value)" class="form-control" required="required">
					   </div>
					   <div class="form-group">
						  <label>Nama Lengkap</label>
						  <input type="text" name="NamaLengkap" class="form-control" id="NamaLengkap" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Telepon / HP</label>
						  <input type="text" name="Telp" class="form-control" id="Telp" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label >Email Address</label>
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
							<input type="text" name="Email" class="form-control" id="Email" readonly="readonly">
						  </div>
					   </div>
					   <div class="form-group">
						  <input type="hidden" name="KodeSeminar" id="KodeSeminar" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Tema Seminar</label>
						  <input type="text" name="TemaSeminar" id="TemaSeminar" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Biaya</label>
						  <input type="text" name="Biaya" id="Biaya" class="form-control" readonly="readonly">
					   </div>
					   <div class="form-group">
						  <label>Tanggal Pembayaran</label>
						  <div class="input-group">
							 <input type="text" name="TanggalPembayaran" class="form-control" required="required" id="tanggal">
							 <span class="input-group-addon"><i class="fa fa-table"></i></span>
						  </div>
					   </div>
					   <div class="form-group">
						  <label>Bank Pengirim</label>
						  <input type="text" name="BankPengirim" class="form-control" required="required">
					   </div>
					   <div class="form-group">
						  <label>Nama Pemilik Rekening</label>
						  <input type="text" name="NamaPemilikRekening" class="form-control" required="required">
					   </div>
					   <div class="form-group">
						  <label>Bukti (Scanned) Transfer ATM atau Bank</label>
						  <input type="file" name="BuktiPembayaran" class="form-control" required="required">
					   </div>
					   <div class="form-group">
							<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
						</div>
					</div>
					<div class="form-actions">
					   <button type="submit" class="btn blue">Kirim</button>
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