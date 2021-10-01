<?php
include "../../administrator/koneksi/koneksi.php";
$KodeSeminar = $_POST['KodeSeminar'];

if($KodeSeminar!=""){
	$sql = "SELECT * 
			FROM seminar 
			WHERE KodeSeminar='$KodeSeminar'";
	$data = mysql_query($sql);
	if($d = mysql_fetch_object($data)){
		$arr = array(
				"BIAYA"=>$d->Biaya,
				"KAPASITAS"=>$d->Kapasitas
				);
	}else{
		$arr = array(
				"BIAYA"=>"",
				"KAPASITAS"=>""
				);
	}
	$arr = json_encode($arr);
	exit($arr);
}
?>
