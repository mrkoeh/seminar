<?php
	function nomer($initial,$field,$table){
		$sql=mysql_query("SELECT $field FROM $table ORDER BY $field DESC LIMIT 1 ") or die (mysql_error());
		$d=mysql_num_rows($sql);
		
		if($d>0){
			$r=mysql_fetch_array($sql);
			$d=$r[$field];
			$str=substr($d,2,5);
			$No_Urut =(int)$str;
		}else{
			$No_Urut = 0;
		}
		
		$No_Urut++;
		$Nol="";
		$nilai=4-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
			$Nol= $Nol."0";
		}
		
		$Kode = $initial.$Nol.$No_Urut;
		return $Kode;
	}
	
	function Tgl($date){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
		$jam   = substr($date, 11, 2);
		$menit = substr($date, 14, 2);
		$detik = '00';

		$result = $tgl ." ". $BulanIndo[((int)$bulan - 1)] ." ". $tahun ." Pukul ". $jam .":". $menit .":". $detik ;		
		return($result);
	}
	
	function Rp($str)
	{
		$jum = strlen($str);
		$jumtitik = ceil($jum/3);
		$balik = strrev($str);
		
		$awal = 0;
		$akhir = 3;
		for($x=0;$x<$jumtitik;$x++){
			$a[$x] = substr($balik,$awal,$akhir).".";	
			$awal+=3;
		}
		$hasil = implode($a);
		$hasilakhir = strrev($hasil);
		$hasilakhir = substr($hasilakhir,1,$jum+$jumtitik);
					
		return $hasilakhir."";
	}

	class angkaTerbilang {
		function baca($n) {
			$this->dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam','tujuh', 'delapan', 'sembilan');
			$this->angka = array(1000000000, 1000000, 1000, 100, 10, 1);
			$this->satuan = array('milyar', 'juta', 'ribu', 'ratus', 'puluh', '');
			
			$i = 0;
			if($n==0){
				$str = "nol";
			}else{
				while ($n != 0) {
					$count = (int)($n/$this->angka[$i]);
					if ($count >= 10) {
						$str .= $this->baca($count). " ".$this->satuan[$i]." ";
					}else if($count > 0 && $count < 10){
						$str .= $this->dasar[$count] . " ".$this->satuan[$i]." ";
					}
				$n -= $this->angka[$i] * $count;
				$i++;
				}
			$str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
			$str = preg_replace("/satu (ribu|ratus|puluh|belas)/i", "se\\1", $str);
			}
		return $str;
		}
	}
	// outputnya adalah seratus dua puluh tiga juta empat ratus lima puluh enam ribu tujuh ratus delapan puluh sembilan
	
?>