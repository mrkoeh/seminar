<?php
include "../../administrator/koneksi/koneksi.php";
$KodeRegistrasi = $_POST['KodeRegistrasi'];

if($KodeRegistrasi!=""){
	$sql = "SELECT R.*, S.KodeSeminar, S.TemaSeminar, S.Biaya 
			FROM registrasi R, seminar S
			WHERE R.KodeSeminar = S.KodeSeminar
			AND KodeRegistrasi='$KodeRegistrasi'";
	$data = mysql_query($sql);
	if($d = mysql_fetch_object($data)){
		$arr = array(
				"NAMALENGKAP"=>$d->NamaLengkap,
				"TELP"=>$d->Telp,
				"EMAIL"=>$d->Email,
				"KODESEMINAR"=>$d->KodeSeminar,
				"TEMASEMINAR"=>$d->TemaSeminar,
				"BIAYA"=>$d->Biaya
				);
	}else{
		$arr = array(
				"NAMALENGKAP"=>"",
				"TELP"=>"",
				"EMAIL"=>"",
				"KODESEMINAR"=>"",
				"TEMASEMINAR"=>"",
				"BIAYA"=>""
				);
	}
	$arr = json_encode($arr);
	exit($arr);
}
?>
