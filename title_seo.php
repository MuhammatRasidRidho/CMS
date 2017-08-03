<?php
include_once "koneksi/koneksi.php";
$sql = mysql_query("SELECT judul FROM tartikel WHERE id_artikel='$_GET[id]'");
$title = mysql_fetch_array($sql);

if (ISSET($_GET[id])){
	echo "$title[judul]";
}
else{
	echo "asfamedia.com - Penerbit Asfamedia Jakarta, Penerbit Buku Komputer Berkualitas";
}
?>
