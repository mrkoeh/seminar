<?php 
	include "administrator/koneksi/koneksi.php";
	include "fungsi.php";
	
	if(isset($_GET['status'])){
		$status=$_GET['status'];
	}

	if(empty($status)){
?>
<br>
<div class="container min-hight">
	<div class="row">
		<div class="col-md-9 col-sm-9">
			<h2>Kontak Kami</h2>
			<p>Jika ada pertanyaan mengenai info seminar, Anda bisa mengirimii kami pesan melalui formulir ini. </p>
			<div class="space20"></div>
			<!-- BEGIN FORM-->
			<form  method="POST" action="modul/kontak/proses.php" class="horizontal-form margin-bottom-40" role="form">
				<div class="form-group">
					  <input type="hidden" name="KodeKontak" value="<?php echo nomer(date('Ymd').'C','KodeKontak','kontak');?>" class="form-control">
				   </div>
				<div class="form-group">
					<label class="control-label">Nama</label>
					<div class="col-lg-12">
						<input type="text" name="Nama" class="form-control" required="required" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Email <span class="color-red">*</span></label>
					<div class="col-lg-12">
						<input type="text" name="Email" class="form-control" required="required" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Pesan</label>
					<div class="col-lg-12">
						<textarea name="Pesan" class="form-control" rows="8" required="required"></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
				</div>
				<button type="submit" class="btn btn-default theme-btn"><i class="icon-ok"></i> Kirim</button>
				<button type="reset" class="btn btn-default">Batal</button>
			</form>
			<!-- END FORM-->                  
		</div>

		<div class="col-md-3 col-sm-3">
			<h2>Kontak kami</h2>
			<address>
				<strong>SISO</strong><br>
				Pasteur - Bandung<br>
				<abbr title="Phone">P:</abbr> 08-888-932-535 
			</address>
			<address>
				<strong>Email</strong><br>
				<a href="mailto:#">info@siso.com</a><br>
				<a href="mailto:#">sanynurulfadila@gmail.com</a>
			</address>
			<ul class="social-icons margin-bottom-10">
				<li><a href="#" data-original-title="facebook" class="facebook"></a></li>
				<li><a href="#" data-original-title="github" class="github"></a></li>
				<li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
				<li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
				<li><a href="#" data-original-title="rss" class="rss"></a></li>
			</ul>

			<div class="clearfix margin-bottom-30"></div>

			<h2>About Us</h2>
			<p>Sediam nonummy nibh euismod tation ullamcorper suscipit</p>
			<ul class="list-unstyled">
				<li><i class="fa fa-check"></i> Officia deserunt molliti</li>
				<li><i class="fa fa-check"></i> Consectetur adipiscing </li>
				<li><i class="fa fa-check"></i> Deserunt fpicia</li>
			</ul>                                
		</div>            
	</div>
</div>

<?php
}elseif($status=="ok"){
?>

<div class="container min-hight">
	<div class="row">
		<div class="col-md-9 col-sm-9">
			<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-cog"></i>
				</button>

				<i class="fa fa-exclamation"></i>
				Pesan Berhasil Dikirim!! <br>
				Periksa email anda untuk balasan dari pihak kami. . .
			</div>
			
			<h2>Contact Form</h2>
			<p>Lorem ipsum dolor sit amet, Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat consectetuer adipiscing elit, sed diam nonummy nibh euismod tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
			<div class="space20"></div>
			<!-- BEGIN FORM-->
			<form  method="POST" action="modul/kontak/proses.php" class="horizontal-form margin-bottom-40" role="form">
				<div class="form-group">
					  <input type="hidden" name="KodeKontak" value="<?php echo nomer(date('Ymd').'C','KodeKontak','kontak');?>" class="form-control">
				   </div>
				<div class="form-group">
					<label class="control-label">Nama</label>
					<div class="col-lg-12">
						<input type="text" name="Nama" class="form-control" required="required" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Email <span class="color-red">*</span></label>
					<div class="col-lg-12">
						<input type="text" name="Email" class="form-control" required="required" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Pesan</label>
					<div class="col-lg-12">
						<textarea name="Pesan" class="form-control" rows="8" required="required"></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" name="CreateDate" value="<?php echo date('Y-m-d h:m:s');?>">
				</div>
				<button type="submit" class="btn btn-default theme-btn"><i class="icon-ok"></i> Kirim</button>
				<button type="reset" class="btn btn-default">Batal</button>
			</form>
			<!-- END FORM-->                  
		</div>

		<div class="col-md-3 col-sm-3">
			<h2>Our Contacts</h2>
			<address>
				<strong>Loop, Inc.</strong><br>
				795 Park Ave, Suite sdfg<br>
				San Francisco, CA sdfh<br>
				<abbr title="Phone">P:</abbr> (234) 145-1810
			</address>
			<address>
				<strong>Email</strong><br>
				<a href="mailto:#">info@email.com</a><br>
				<a href="mailto:#">support@example.com</a>
			</address>
			<ul class="social-icons margin-bottom-10">
				<li><a href="#" data-original-title="facebook" class="facebook"></a></li>
				<li><a href="#" data-original-title="github" class="github"></a></li>
				<li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
				<li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
				<li><a href="#" data-original-title="rss" class="rss"></a></li>
			</ul>

			<div class="clearfix margin-bottom-30"></div>

			<h2>About Us</h2>
			<p>Sediam nonummy nibh euismod tation ullamcorper suscipit</p>
			<ul class="list-unstyled">
				<li><i class="fa fa-check"></i> Officia deserunt molliti</li>
				<li><i class="fa fa-check"></i> Consectetur adipiscing </li>
				<li><i class="fa fa-check"></i> Deserunt fpicia</li>
			</ul>                                
		</div>            
	</div>
</div>

<?php
}
?>