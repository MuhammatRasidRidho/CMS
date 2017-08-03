<?php
$sql = mysql_query("SELECT judul FROM tartikel where id_artikel='$_GET[id]'");
$title = mysql_fetch_array($sql);

if (ISSET($_GET[id])){
	echo "$title[judul]";
}
else{
	echo "Asfamedia adalah Penerbit buku-buku Komputer berkualitas dalam bidang Web Programming dan Internet.";
}
?>
