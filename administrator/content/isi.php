<?php
include "koneksi/koneksi.php";
include "fungsi.php";
?>

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () { 
var chart1; // globally available
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Peserta Berdasar Jenis Kelamin '
         },
         xAxis: {
            categories: ['jenis kelamin']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
         series:             
         [
            <?php 
			$sql   = "SELECT JenisKelamin, COUNT(KodeRegistrasi) AS jml FROM registrasi GROUP BY JenisKelamin";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $data = mysql_fetch_array( $query ) ){          
			  ?>
			  {
				  name: '<?php echo $data['JenisKelamin']; ?>',
				  data: [<?php echo $data['jml']; ?>]
			  },
			  <?php } ?>
         ]
      });
   });	
</script>

<div id='container'></div>

<br>

<script type="text/javascript">
$(function () { 
var chart1; // globally available
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container2',
            type: 'column'
         },   
         title: {
            text: 'Grafik Peserta Berdasar Seminar '
         },
         xAxis: {
            categories: ['seminar']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
         series:             
         [
            <?php 
			$sql   = "SELECT R.KodeSeminar, S.TemaSeminar, COUNT(R.KodeRegistrasi) AS jml
					FROM registrasi R, seminar S
					WHERE R.KodeSeminar = S.KodeSeminar
					GROUP BY KodeSeminar";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $data = mysql_fetch_array( $query ) ){          
			  ?>
			  {
				  name: '<?php echo $data['TemaSeminar']; ?>',
				  data: [<?php echo $data['jml']; ?>]
			  },
			  <?php } ?>
         ]
      });
   });	
</script>

<div id='container2'></div>
