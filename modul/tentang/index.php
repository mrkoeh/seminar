<?php
include "administrator/koneksi/koneksi.php";
?>
<div class="row service-box">
	<div class="col-md-12">
		<?php
		$query = mysql_query("SELECT * FROM web WHERE Id = 7");
		$data = mysql_fetch_array($query);
		?>
		<h2><?php echo $data['Judul'];?></h2>
		<p><?php echo $data['Deskripsi'];?></p>
		<br>
	</div>
</div>

