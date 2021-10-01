<?php
include "administrator/koneksi/koneksi.php";
?>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 space-mobile">
                <h2>Tentang</h2>
                <p class="margin-bottom-30">Kami (SISO) merupakan penyedia jasa penjualan tiket seminar yang sah .Mudah , cepat dan terpercaya.</p>
                <div class="clearfix"></div>

                <h2>Galeri</h2>
                <div class="blog-photo-stream margin-bottom-30">
                    <ul class="list-unstyled">
					 <?php
					$sql = "SELECT * FROM galeri ORDER BY KodeGaleri DESC LIMIT 0,10";
					$query = mysql_query($sql);
					while($data=mysql_fetch_array($query)){
					?>
                        <li><a><img src="foto/galeri/<?php echo $data['Foto'];?>" alt=""></a></li>
					<?php
					}
					?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 space-mobile">
                <h2>Kontak Kami</h2>
                <address class="margin-bottom-40">
                    SISO <br />
                    Pasteur - Bandung <br />
                    P: 08-888-932-535 <br />
                    Email: <a href="mailto:info@http://siso.com">info@http://siso.com</a>
                </address>
            </div>
            <div class="col-md-4 col-sm-4">

                <h2>Kiriman Terakhir</h2>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@http://siso.com</a>
                        Tips memilih tema seminar
                        <span>3 min yang lalu</span>
                    </dd>
                </dl>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@http://siso.com</a>
                        Tips mempercantik inner beauty
                        <span>3 min yang lalu</span>
                    </dd>
                </dl>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@http://siso.com</a>
                        Tips mengikuti ujian masuk kuliah
                        <span>3 min yang lalu</span>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <p>
                    <span class="margin-right-10">2013 &copy; SISO. ALL Rights Reserved.</span>
                    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <ul class="social-footer">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-dropbox"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
