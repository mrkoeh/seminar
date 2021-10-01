<?php
include "../../koneksi/koneksi.php";

$proses = $_GET['proses'];

if($proses == 'cetaksemua'){
	$sql = "SELECT R.*, S.* 
			FROM registrasi R, seminar S
			WHERE R.Absensi = '1'
			AND R.KodeSeminar = S.KodeSeminar 
			ORDER BY R.CreateDate DESC";
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)){
        $_GET["KodeRegistrasi"] = $data['KodeRegistrasi'];
        $_GET["NamaLengkap"] = $data['NamaLengkap'];
        $_GET["TemaSeminar"] = $data['TemaSeminar'];
        $_GET["Penyelenggara"] = $data['Penyelenggara'];
        $_GET["TanggalPelaksanaan"] = $data['TanggalPelaksanaan'];
        $_GET["Tempat"] = $data['Tempat'];
        $_GET["Pengisi"] = $data['Pengisi'];
        require("cetaksertifikat.php");
    }
}

?>
