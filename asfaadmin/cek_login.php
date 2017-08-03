<?php
error_reporting(0);
include "../koneksi/koneksi.php";
function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));

$login = mysql_query("SELECT * FROM tuser WHERE Username='$username' AND Password='$pass'");
$ketemu= mysql_num_rows($login);
$r = mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
	session_start();
	session_register("Username");
	session_register("namaAsfa");
	session_register("Password");
	session_register("Level");
	
	$_SESSION[idUser]		= $r[id_user];
	$_SESSION[Username]     = $r[Username];
	$_SESSION[namaAsfa]  	= $r[nama_asfa];
	$_SESSION[Password]     = $r[Password];
	$_SESSION[Level]    	= $r[level];
  
	header('location: master.php?module=home');
}
else{
	echo "$pass";
	echo "<link href=../css/login.css rel=stylesheet type=text/css>";
	echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>";
	echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>