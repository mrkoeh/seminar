<?php
session_start();

if (empty($_SESSION['tampilnama'])) {
    header("location:login/index.php");
} else {
	if(isset($_GET['modul'])){
		$modul = $_GET['modul'];

		switch($modul){
			case "home"			: $tampil = "../content/isi.php"; break;
			case "registrasi"	: $tampil = "modul/registrasi/index.php"; break;
			case "absensi"		: $tampil = "modul/absensi/index.php"; break;
			case "csertifikat"	: $tampil = "modul/cetak/sertifikat.php"; break;
			case "cetak"		: $tampil = "modul/cetak/index.php"; break;
			case "seminar"		: $tampil = "modul/seminar/index.php"; break;
			case "reminder"		: $tampil = "modul/reminder/index.php"; break;
			case "lappeserta"	: $tampil = "modul/laporan/lappeserta.php"; break;
			case "lapkas"		: $tampil = "modul/laporan/lapkas.php"; break;
			case "galeri"		: $tampil = "modul/galeri/index.php"; break;
			case "katgaleri"	: $tampil = "modul/katgaleri/index.php"; break;
			case "web"			: $tampil = "modul/web/index.php"; break;
			case "kontak"		: $tampil = "modul/kontak/index.php"; break;
			case "user"			: $tampil = "modul/user/index.php"; break;
		} // tutup switch
	} // tutup if
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../assets/vendors/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/siso.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style-responsive.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/pages/prices.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/datetime/ui.all.css"  />
	<title>Admin | Sistem Informasi Seminar Organizer</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
</head>

<body>

<!-- INI HEADER -->
<?php include "content/header.php";?>

<!-- INI CONTAINER -->
<div class="page-container">
	<div class="container">
	   
		<?php
			if(empty($modul)){
				include "content/isi.php";
			}else{
				include $tampil;
			}		
		?>
		
	</div>
</div>

<!-- INI FOOTER -->
<?php include "content/footer.php";?>

<script type="text/javascript" src="../assets/js/jquery.js"></script> <!-- ini nih -->
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script> <!-- dropdown menu -->
<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script> 
<script type="text/javascript" src="../assets/js/app.js"></script> <!-- ini scrollable -->
<script type="text/javascript" src="../assets/js/index.js"></script>
<script type="text/javascript" src="../assets/plugins/datetime/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../assets/plugins/datetime/ui.datepicker.js"></script>
<script type="text/javascript" src="../assets/plugins/datetime/DateTimePicker.js"></script>
<script type="text/javascript"> 
  $(function () { 
    $("#waktu").datetimepicker({
                    dateFormat:'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true
                }); 
 });
</script>

</body>
<?php
} // tutup else session
?>
</html>