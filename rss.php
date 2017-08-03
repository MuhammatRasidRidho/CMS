<?php
error_reporting(0);
include "koneksi/koneksi.php";
$sql = mysql_query("SELECT * FROM tartikel ORDER BY id_artikel DESC LIMIT 5");
$file = fopen("rss.xml", "w");
fwrite($file, '<?xml version="1.0"?> 

<rss version="2.0"> 
<channel> 
	<title>Asfamedia Feed</title> 
	<link>http://www.asfamedia.com</link> 
	<description>Penerbit buku Komputer, khususnya dalam bidang Pemrograman Web dan Internet.</description> 
	<language>en-us</language>');
	while($data = mysql_fetch_array($sql)){
		$isiArtikel = htmlentities(strip_tags(nl2br($data[isi]))); // membuat paragraf pada isi berita dan mengabaikan tag html
		$isi   = substr($isiArtikel,0,220); // ambil sebanyak 220 karakter
		$isi   = substr($isiArtikel,0,strrpos($isi," ")); // potong per spasi kalimat

		fwrite($file, "<item>
				<title>$data[judul]</title>
                 <link>http://www.asfamedia.com/artikel-$data[id_artikel]-$data[judul_seo].html</link>
                 <description>$isi ...</description>
                 </item>");
	}

fwrite($file, "</channel></rss>");
fclose($file);
?>
