<?php

class FUNC{
    
    protected static $namabulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	protected static $namahari = array('Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu');

    public static function ribuan($number){
        return number_format($number, 0, ',', '.');
    }

    public static function tanggal($tgl, $opt){
		$D = date('D', strtotime($tgl));
        $d = date('d', strtotime($tgl));
        $m = date('m', strtotime($tgl));
		$M = date('M', strtotime($tgl));
        $y = date('Y', strtotime($tgl));
		$w = date('H:i:s', strtotime($tgl));
		$t = date('H:i a', strtotime($tgl));
		switch($opt){
			case 'time' : return $t; break;
			case 'day' : return self::$namahari[$D]; break;
			case 'short_date' : return date('d/m/Y', strtotime($tgl)); break;
			case 'long_date' : return intval($d).' '.self::$namabulan[$m-1].' '.$y; break;
			case 'short_date_time' : return date('d/m/Y H:i:s', strtotime($tgl)); break;
			case 'long_date_time' : return intval($d).' '.self::$namabulan[$m-1].' '.$y.' ['.$w.']'; break;
			case 'date_month' : return intval($d).' '.$M; break;
		}
        
    }
	
	public static function moments($session_time){ 
		$session_time = strtotime($session_time);
		$time_difference = time() - $session_time ; 
		$seconds = $time_difference ; 
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 ); 
		$days = round($time_difference / 86400 ); 
		$weeks = round($time_difference / 604800 ); 
		$months = round($time_difference / 2419200 ); 
		$years = round($time_difference / 29030400 ); 
	
		if($seconds <= 60){
			return 'Baru saja'; 
		}
		else if($minutes <= 60){
			if($minutes == 1)
				return 'Satu menit yang lalu'; 
			else
				return $minutes.' menit yang lalu'; 
		}
		else if($hours <= 24){
			if($hours == 1)
				return 'Satu jam yang lalu';
			else
				return $hours.' jam yang lalu';
		}
		else if($days <= 7){
			if($days == 1)
				return 'Satu hari yang lalu';
			else
				return $days.' hari yang lalu';
		}
		else if($weeks <= 4){
			if($weeks == 1)
				return 'Satu minggu yang lalu';
			else
				return $weeks.' minggu yang lalu';
		}
		else if($months <= 12){
			if($months == 1)
				return 'Satu bulan yang lalu';
			else
				return $months.' bulan yang lalu';
		}
		else{
			if($years == 1)
				return 'Satu tahun yang lalu';
			else
				return $years.' tahun yang lalu';
		}
	}

	public static function resizeImage($dw, $source, $stype, $dest){
		$size = getimagesize($source); // ukuran gambar
		$sw = $size[0];
		$sh = $size[1];
		switch($stype) { // format gambar
			case 'gif':
				$simg = imagecreatefromgif($source);
				$create = "imagegif";
			break;
			case 'jpg':
				$simg = imagecreatefromjpeg($source);
				$create = "imagejpeg";
			break;
			case 'jpeg':
				$simg = imagecreatefromjpeg($source);
				$create = "imagejpeg";
			break;
			case 'png':
				$simg = imagecreatefrompng($source);
				$create = "imagepng";
			break;
		}
		
		// $dw = 800;
		$dh = ($dw / $sw) * $sh;
		$dimg = imagecreatetruecolor($dw,$dh);
		imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $dw, $dh, $sw, $sh);
		
		$create($dimg, $dest);
		imagedestroy($simg);
		imagedestroy($dimg);
		unlink($source);
	}

	public static function cropImage($dw, $source, $stype, $dest, $delfile = true){
		$size = getimagesize($source); // ukuran gambar
		$sw = $size[0];
		$sh = $size[1];
		$quality = 80;
		switch(strtolower($stype)) { // format gambar
			case 'gif':
				$simg = imagecreatefromgif($source);
				$create = "imagegif";
			break;
			case 'jpg':
				$simg = imagecreatefromjpeg($source);
				$create = "imagejpeg";
			break;
			case 'jpeg':
				$simg = imagecreatefromjpeg($source);
				$create = "imagejpeg";
			break;
			case 'png':
				$simg = imagecreatefrompng($source);
				$create = "imagepng";
			break;
		}
		$dh = $dw;
		$dimg = imagecreatetruecolor($dw, $dh);
	    $dw_new = $sh * $dw / $dh;
	    $dh_new = $sw * $dh / $dw;
	    if($dw_new > $sw){
	        $h_point = (($sh - $dh_new) / 2);
	        imagecopyresampled($dimg, $simg, 0, 0, 0, $h_point, $dw, $dh, $sw, $dh_new);
	    }else{
	        $w_point = (($sw - $dw_new) / 2);
	        imagecopyresampled($dimg, $simg, 0, 0, $w_point, 0, $dw, $dh, $dw_new, $sh);
	    }
	     
		// $create($dimg, $dest, $quality);
		$create($dimg, $dest);
		imagedestroy($simg);
		imagedestroy($dimg);
		if($delfile) unlink($source);
	}
	
	public static function encodeImage($img_file, $mimeType){
		$img_bin = base64_encode(fread(fopen($img_file, 'r'), filesize($img_file)));
		return 'data:'.$mimeType.';base64,'.$img_bin;
	}
	
	public static function slug($s){
		$c = array (' ');
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$s = str_replace($d, '', $s);
		$s = strtolower(str_replace($c, '-', $s));
		return $s;
	}
	
	public static function getContent($s){
		preg_match('/<p.*>(.*)<\/p>/', $s, $match);
		return $match[1];
	}

	public static function encryptor($string){
		$output = false;
		$encrypt_method = 'AES-256-CBC';
		$secret_key1 = 'jendralhans@gmail.com';
		$secret_key2 = 'anggoro.triantoko@gmail.com';
		$key1 = hash('sha256', $secret_key1);
		$key2 = substr(hash('sha256', $secret_key2), 0, 16);
		$output = base64_encode(openssl_encrypt(($string), $encrypt_method, $key1, 0, $key2));
		return $output;
	}
	
	public static function decryptor($string){
		$output = false;
		$encrypt_method = 'AES-256-CBC';
		$secret_key1 = 'jendralhans@gmail.com';
		$secret_key2 = 'anggoro.triantoko@gmail.com';
		$key1 = hash('sha256', $secret_key1);
		$key2 = substr(hash('sha256', $secret_key2), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key1, 0, $key2);
		return $output;
	}
	
}

?>
