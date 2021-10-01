<?php 
	include "administrator/koneksi/koneksi.php";
	include "fungsi.php";
?>
<br>
<div class="container">
       
        <div class="container min-hight gallery-page margin-bottom-40">
          <div class="row">
			<?php
			$sql = "SELECT * FROM galeri WHERE Status = '1' ORDER BY CreateDate DESC";
			$query = mysql_query($sql);
			while($data=mysql_fetch_array($query)){
			?>
            <div class="col-md-3 col-sm-4 gallery-item">
              <a data-rel="fancybox-button" title="Project Name" href="foto/galeri/<?php echo $data['Foto'];?>" class="fancybox-button">
                <img alt="" src="foto/galeri/<?php echo $data['Foto'];?>" class="img-responsive">
                <div class="zoomix"><i class="fa fa-search"></i></div>
              </a> 
            </div>
            <?php
			}
			?>
          </div>

          <!-- BEGIN PAGINATION -->
            <div class="margin-top-20">
              <ul class="pagination">
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li class="active"><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Next</a></li>
              </ul>
            </div>
            <!-- END PAGINATION -->
        </div>
        </div>