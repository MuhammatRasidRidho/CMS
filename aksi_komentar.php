<?php
error_reporting(0);
session_start();
include "koneksi/koneksi.php";
include "fungsi/library.php";

$nama = trim($_POST['nama']);
$komentar = trim($_POST['isi']);

if (empty($nama)){
	echo "Anda belum mengisikan NAMA<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($komentar)){
	echo "Anda belum mengisikan KOMENTAR<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (strlen($_POST['isi']) > 1000) {
	echo "KOMENTAR Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian.<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
	function antiinjection($data){
		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter_sql;
	}

	$nama_komentar = antiinjection($_POST['nama']);
	$url = antiinjection($_POST['url']);
	$isi_komentar = antiinjection($_POST['isi']);

	if(!empty($_POST['kode'])){
		if($_POST['kode'] == $_SESSION['captcha_session']){

		// Mengatasi input komentar tanpa spasi
			$split_text = explode(" ",$isi_komentar);
			$split_count = count($split_text);
			$max = 60;

			for($i = 0; $i <= $split_count; $i++){
				if(strlen($split_text[$i]) >= $max){
					for($j = 0; $j <= strlen($split_text[$i]); $j++){
						$char[$j] = substr($split_text[$i],$j,1);
						if(($j % $max == 0) && ($j != 0)){
							$v_text .= $char[$j] . ' ';
						}
						else{
							$v_text .= $char[$j];
						}
					}
				}
				else{
					$v_text .= " " . $split_text[$i] . " ";
				}
			}

			$sql = mysql_query("INSERT INTO tkomentar(nama,url,komentar,tanggal,jam,id_artikel) 
			VALUES('$nama_komentar','$url','$v_text','$tgl_sekarang','$jam_sekarang','$_POST[id]')");
			
			$data = mysql_fetch_array(mysql_query("SELECT judul_seo FROM tartikel WHERE id_artikel = '$_POST[id]'"));

			echo "<meta http-equiv='refresh' content='0; url=artikel-$_POST[id]-$data[judul_seo].html'>";
		}
		else{
			echo "Kode yang Anda masukkan tidak cocok<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}
	else{
		echo "Anda belum memasukkan kode<br><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}
?>