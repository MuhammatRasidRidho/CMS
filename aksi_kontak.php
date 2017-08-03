<?php
error_reporting(0);
include "koneksi/koneksi.php";
include "fungsi/library.php";

function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}

$nama 	= antiinjection($_POST[nama]);
$email	= antiinjection($_POST[email]);
$judul	= antiinjection($_POST[judul]);
$pesan	= antiinjection($_POST[pesan]);
$tujuan = "redaksi@asfamedia.com, takehikoboyz@gmail.com";

$teks_no_spasi = explode(" ",$pesan);
$teks_count = count($teks_no_spasi);
$max = 60;

for($i = 0; $i <= $teks_count; $i++){
	if(strlen($teks_no_spasi[$i]) >= $max){
		for($j = 0; $j <= strlen($teks_no_spasi[$i]); $j++){
			$char[$j] = substr($teks_no_spasi[$i],$j,1);
			if(($j % $max == 0) && ($j != 0)){
				$v_text .= $char[$j] . ' ';
			}
			else{
				$v_text .= $char[$j];
			}
		}
	}
	else{
		$v_text .= " " . $teks_no_spasi[$i] . " ";
	}
}

if (empty($nama) || empty($email) || empty($judul) || empty($email)){
	echo "<script language='JavaScript'>alert('Mohon Isikan Lengkap Semua Data..');</script>";
	echo "<meta http-equiv='refresh' content='0; url=contact.html'>";
}
else {
	mysql_query("INSERT INTO tkontak (nama,email,judul,pesan,hari,tanggal,jam) VALUES('$nama','$email','$judul','$v_text','$hari_ini','$tgl_sekarang','$jam_sekarang')");
	mail($tujuan,$judul,$v_text,$email);
	echo "<script language='JavaScript'>alert('Terima kasih telah Menghubungi kami, Pesan Anda telah tersimpan dalam database manajemen kami.');</script>";
	echo "<meta http-equiv='refresh' content='0; url=contact.html'>";
}
?>