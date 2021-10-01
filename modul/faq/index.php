<?php
include "administrator/koneksi/koneksi.php";
?>
<br>
<div class="container min-hight margin-bottom-40">
	<div class="row">
		<div class="col-md-3">
			<ul class="ver-inline-menu tabbable margin-bottom-10">
			  <li class="active">
				 <a data-toggle="tab" href="#tab_1">
				 Pertanyaan Umum
				 </a> 
				 <span class="after"></span>                                    
			  </li>
			</ul>        
		</div>

		<div class="col-md-9">
			<div class="tab-content">

			  <div id="tab_1" class="tab-pane active">
				 <div id="accordion1" class="panel-group">
					<?php
					$no=1;
					$nom=1;
					$query = mysql_query("SELECT * FROM web WHERE Kodemenu = 3 AND Status = 1");
					while($data = mysql_fetch_array($query)){
					?>
						<div class="panel panel-success">
							<div class="panel-heading">
							  <h4 class="panel-title">
								 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_<?php echo $no++;?>">
								 <?php echo $data['Judul'];?>
								 </a>
							  </h4>
						   </div>
						   <div id="accordion1_<?php echo $nom++;?>" class="panel-collapse collapse">
							  <div class="panel-body"><?php echo $data['Deskripsi'];?></div>
						   </div>
						</div>
					<?php
					}
					?>
				 </div>
			  </div>
			  
			</div>
			<!-- END TAB CONTENT -->
		</div>            
	</div>
</div>