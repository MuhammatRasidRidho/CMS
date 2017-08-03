<script language="javascript">
function validasi(form){
	if (form.nama_komentar.value == ""){
		alert("Anda belum mengisikan Nama.");
		form.nama_komentar.focus();
		return (false);
	}
 
	if (form.isi_komentar.value == ""){
		alert("Anda belum mengisikan komentar.");
		form.isi_komentar.focus();
		return (false);
	}
	return (true);
}
</script>


<?php
include "fungsi/fungsi_indotgl.php";
include "fungsi/class_paging.php";
include "fungsi/fungsi_combobox.php";
include "fungsi/fungsi_rupiah.php";
include "fungsi/library.php";
include "koneksi/koneksi.php";

// Halaman utama (Home)
if ($_GET[module]=='home'){
?>

	<div id="content_top_jquery">
		<div id="featured" >
			<ul class="ui-tabs-nav">
				<?php
				$i = 1;
				$sql = mysql_query("SELECT * FROM tartikel ORDER BY id_artikel DESC LIMIT 4");
				while ($data = mysql_fetch_array($sql)){
					echo "<li class='ui-tabs-nav-item ui-tabs-selected' id='nav-fragment-1'><a href='#artikel-$i'><img src='gambar/articles/thumbs/thumb_$data[gambar]' height='50' width='50'><span>$data[judul]</span></a></li>";
					$i++;
				}
				
				?>
				
			</ul>

			<?php
			$i = 1;
			$sql = mysql_query("SELECT * FROM tartikel ORDER BY id_artikel DESC LIMIT 4");
			while ($data = mysql_fetch_array($sql)){
				$isi = $data[isi];
				$isi = substr($isi,0,100);
				echo "<div id='artikel-$i' class='ui-tabs-panel' style=''>
						<img src='gambar/articles/$data[gambar]' width='465' height='250'>
						<div class='info'>
							<h2><b><a href='artikel-$data[id_artikel]-$data[judul_seo].html' >$data[judul]</a></b></h2>
							<p align='justify'><font color=#fff> $isi .... <a href='artikel-$data[id_artikel]-$data[judul_seo].html'>read more</a></font></p>
						</div>
					  </div>";
				$i++;
			}
			?>

		</div>
	</div>
	<div id="kotak">
	<div id="content_left">
		<div id="content_img" valign="top"></div>
		<table>
		<?php
		$i = 1;
		$sebelumnya = mysql_query("SELECT COUNT(k.id_komentar) AS jml, a.judul, a.judul_seo, a.jam, u.nama_asfa, a.id_artikel, a.hari, a.tanggal, a.gambar, a.isi 
									FROM tartikel a LEFT JOIN tkomentar k
									ON a.id_artikel = k.id_artikel LEFT JOIN tuser u ON a.id_user = u.id_user
									AND a.aktif='Y' 
									GROUP BY a.id_artikel DESC LIMIT 4");
		$ada_ga = mysql_num_rows($sebelumnya);
		while ($lama = mysql_fetch_array($sebelumnya)){
			$isiArtikel = $lama[isi];
			$isi = substr($isiArtikel,0,200);
			$tanggal = tgl_indo($lama[tanggal]);
			echo "<tr>
					<td colspan='2'><a href=artikel-$lama[id_artikel]-$lama[judul_seo].html><b>$lama[judul]</b></a></td>
				  </tr>
				  <tr>
					<td colspan='2'><font size='1'>$lama[hari], $tanggal $lama[jam], Diposting: $lama[nama_asfa]</font></td>
				  </tr>
				  <tr>
					<td align='justify'>";
			if ($lama[gambar] != ''){
				echo "<span class=image><img src='gambar/articles/thumbs/thumb_$lama[gambar]' width=110 border=0></span>";
			}
			$isiArtikel = htmlentities(strip_tags($lama[isi]));
			$isi = substr($isiArtikel,0,220);
			$isi = substr($isiArtikel,0,strrpos($isi," "));

			echo "$isi ... <a href=artikel-$lama[id_artikel]-$lama[judul_seo].html>Selengkapnya</a> (<b>$lama[jml] komentar</b>)<br>
				</td></tr>
				<tr>
					<td colspan='2'><hr color=#e0cb91 noshade=noshade /></td>
				</tr>";
			$i++;
		}
		?>
		</table>
	</div>



	<div id="content_center">
		<div id="content_img_pop" valign="top"></div>
		<table>
		<?php
		$pop = mysql_query("SELECT * FROM tartikel ORDER BY hits DESC LIMIT 8");
		$i = 1;
		while($populer = mysql_fetch_array($pop)){
			echo "<tr valign='top'>
					<td> &bull;</td><td> <a href='artikel-$populer[id_artikel]-$populer[judul_seo].html'>$populer[judul]</a> ($populer[hits])</td>
				  </tr>
				  <tr><td colspan='2'><hr color='#ccc999'></td></tr>";
			$i++;
		}
		?>
		</table>
	</div>
	
	<div id="content_right">
		<div id="content_img_komentar" valign="top"></div>
		<table>
		<?php
		$i = 1;
		$komentar = mysql_query("SELECT a.url, a.nama, b.id_artikel, b.judul, b.judul_seo FROM tkomentar a, tartikel b WHERE a.id_artikel = b.id_artikel ORDER BY a.id_komentar DESC LIMIT 10");
		while ($komen = mysql_fetch_array($komentar)){
			if ($komen[url] == ''){
				$nama = "$komen[nama]";
			}
			else{
				$nama = "<a href='http://$komen[url]' target='_blank'>$komen[nama]</a>";
			}
			echo "<tr valign='top'>
					<td> &bull;</td><td> $nama Pada <a href='artikel-$komen[id_artikel]-$komen[judul_seo].html'>$komen[judul]</a> </td>
				  </tr>
				  <tr><td colspan='2'><hr color='#ccc999'></td></tr>";
			$i++;
		}
		?>
		</table>
	</div>
	
	<div id="content_top_right">
		
		<table>
		<?php
		$komentar = mysql_query("SELECT * FROM tiklan where jenis_layanan = 'B' AND aktif = 'Y' ORDER BY id_iklan DESC LIMIT 1");
		while ($komen = mysql_fetch_array($komentar)){
			echo "<tr><td colspan='2'><hr color='#ccc999'></td></tr>
				  <tr valign='top'>
					<td> <a href='http://$komen[url]' target='_blank'><img src='gambar/advertising/$komen[gambar]' width='410' title='$komen[judul]'></a> <br><center>$komen[judul] - <a href='http://$komen[url]' target='_blank'>http://$komen[url]</a><center> </td>
				  </tr>
				  <tr><td colspan='2' align='center'>pasang iklan? langsung saja klik <a href='pasang-iklan.html'>disini</a><hr color='#ccc999'></td></tr>";
		}
		?>
		</table>
		
		<table>
		<?php
		$komentar = mysql_query("SELECT * FROM tiklan where jenis_layanan = 'S' AND aktif = 'Y' ORDER BY id_iklan DESC LIMIT 2");
		$ketemu	  = mysql_num_rows($komentar);
		if ($ketemu == 1){
			while ($komen = mysql_fetch_array($komentar)){
				echo "<tr><td colspan='3'><hr color='#ccc999'></td></tr>
					  <tr valign='top'>
						<td width='200'> <a href='http://$komen[url]' target='_blank'><img src='gambar/advertising/$komen[gambar]' width='200' height='100' title='$komen[judul]'></a></td>
						<td width='7'></td>
						<td width='200'> <a href='pasang-iklan.html'><img src='images/banner.jpg'></a></td>
					  </tr>
					  <tr><td colspan='3' align='center'>pasang iklan? langsung saja klik <a href='pasang-iklan.html'>disini</a><hr color='#ccc999'></td></tr>";
			}
		}
		else if ($ketemu == 2){
			echo "<tr><td colspan='3'><hr color='#ccc999'></td></tr><tr valign='top'>";
			while ($komen = mysql_fetch_array($komentar)){
				echo "	<td width='200'> <a href='http://$komen[url]' target='_blank'><img src='gambar/advertising/$komen[gambar]' width='200' height='100' title='$komen[judul]'></a></td>";
			}
			echo "</tr>
					<tr><td colspan='3' align='center'>pasang iklan? langsung saja klik <a href='pasang-iklan.html'>disini</a><hr color='#ccc999'></td></tr>";
		}
		else {
			echo "<tr><td><hr color='#ccc999'><img src='images/banner.jpg'> &nbsp;&nbsp;<img src='images/banner.jpg'></td></tr>
				  <tr><td colspan='2' align='center'>pasang iklan? langsung saja klik <a href='pasang-iklan.html'>disini</a><hr color='#ccc999'></td></tr>";
		}
		?>
		</table>
	</div>
	
	</div>
<?php
}


// Bagian untuk Profil
elseif ($_GET[module]=='profil'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Profil Kami</strong></p></div>";
	$profil = mysql_fetch_array(mysql_query("SELECT * FROM tprofile WHERE IdProfile = '1'"));
	if ($profil[Image] != ''){
		echo "<span class=image><img src='gambar/profiles/$profil[Image]' width='170'></span>";
	}
	$isi = $profil[Content];
	echo "$isi ";
	echo "</div>";
}

// Bagian untuk Kontak
elseif ($_GET[module]=='kontak'){
?>
	<script type="text/javascript" src="js/jquery-1.2.6.min.js" ></script>
	<script type="text/javascript">
            $(document).ready(function(){

                $("#contactLink").click(function(){
                    if ($("#contactForm").is(":hidden")){
                        $("#contactForm").slideDown("slow");
                    }
                    else{
                        $("#contactForm").slideUp("slow");
                    }
                });
                
            });
            
            function closeForm(){
                $("#messageSent").show("slow");
                setTimeout('$("#messageSent").hide();$("#contactForm").slideUp("slow")', 2000);
           }
        </script>
            
	<?php
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Hubungi Kami</strong></p></div>";
	echo "
		<table>
			<tr>
				<td colspan='3'> <b>Asfamedia Books Store</b> </td>
			</tr>
			<tr>
				<td width='50'> Alamat </td><td width='10'>:</td> <td> Jl. Perintis No. 18 RT/RW 03/05 Mega Kuningan - Jakarta Selatan</td>
			</tr>
			<tr>
				<td> Ph. </td><td>:</td><td> (+62) 8562121141</td>
			</tr>	
			<tr>
				<td> Email </td><td>:</td><td> <a href='mailto:takehikoboyz@gmail.com'>takehikoboyz@gmail.com</a></td>
			</tr>
			<tr>
				<td> Website </td><td>:</td><td> <a href='http://www.agussaputra.com'>http://www.agussaputra.com</a></td>
			</tr>
			</table><p>&nbsp;</p>
		</table>
	
	";
	?>
	<div id="contactFormContainer">
		<div id="contactForm">
			<fieldset>
				<form method="POST" action="aksi_kontak.php">
				<label for="Name">Nama Anda *)</label><input type="text" name="nama">
				<label for="Email">Email *)</label><input type="text" name="email">
				<label for="Email">Judul *)</label><input type="text" name="judul">
				<label for="Message">Pesan *)</label><textarea name="pesan" rows="5" cols="20"></textarea>
				<input id="sendMail" type="submit" name="submit" value="Kirim Pesan" onclick="closeForm()" />
				</form>
			</fieldset>
		</div>
		Send Mail<div id="contactLink"><img src='images/mail.png'></div>
	</div>
	<?php
	echo "</div>";
}

// Bagian untuk Menjadi Penulis
elseif ($_GET[module]=='menjadi-penulis'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Menjadi Penulis</strong></p></div>";
	$beWriter = mysql_fetch_array(mysql_query("SELECT * FROM tmenjadi_penulis WHERE id_penulis = '1'"));
	echo "$beWriter[isi]";
	echo "</div>";
}

// Bagian untuk Isi artikel
elseif ($_GET[module]=='isi-artikel'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Menjadi Penulis</strong></p></div>";
	echo "</div>";
}

// Bagian untuk Download
elseif ($_GET[module]=='download'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Download</strong></p></div>";
	$p = new PagingUser;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$sql = mysql_query("SELECT * FROM tdownload WHERE aktif = 'Y' ORDER BY id_download DESC LIMIT $posisi,$batas");		 
	$i = 1;
	echo "<table>";   
	while($data = mysql_fetch_array($sql)){
		echo "<tr><td>$i. </td><td width='5'></td><td><a href='download.php?file=$data[namafile]'>$data[judul]</a></td></tr>";
		$i++;
	}
	echo "</table><hr color=#e0cb91 noshade=noshade>";
	$jmldata 	= mysql_num_rows(mysql_query("SELECT * FROM tdownload"));
	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "Hal: $linkHalaman";
	echo "</div>";
}

// Bagian untuk Hasil Polling
elseif ($_GET[module]=='hasil-polling'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Hasil Polling</strong></p></div>";
	$u = mysql_query("UPDATE tpolling SET rating=rating+1 WHERE id_polling = '$_POST[pilihan]'");
	echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />Hasil poling saat ini: </p><br />";
	
	$pertanyaan = mysql_fetch_array(mysql_query("SELECT * FROM tpolling WHERE aktif = 'Y' AND status = '1'"));
	echo "<p style='margin-bottom: 10px;'><b>$pertanyaan[pilihan]</b> </p>";
	echo "<table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>";
	
	$jml = mysql_query("SELECT SUM(rating) as jumlah_voter FROM tpolling WHERE aktif='Y'");
	$j = mysql_fetch_array($jml);
	$jumlah_voter = $j[jumlah_voter];
	$sql = mysql_query("SELECT * FROM tpolling WHERE aktif='Y' AND status='2'");
	while ($data = mysql_fetch_array($sql)){
		$prosentase = sprintf("%2.1f",(($data[rating]/$jumlah_voter)*100));
		$gbr_vote   = $prosentase * 3;
		echo "<tr><td width=120>$data[pilihan] ($data[rating]) </td><td> <img src='images/footer_bg.gif' width='$gbr_vote' height='18' border='0'> $prosentase % </td></tr>";  
	}
	echo "</table><p style='margin-top: 10px;'>Jumlah Voter: <b>$jumlah_voter</b></p>";
	echo "</div>";
}

// Modul hasil poling
elseif ($_GET[module]=='vote-polling'){
	if (isset($_COOKIE["poling"])) {
		echo "Sorry, Anda sudah pernah melakukan voting terhadap poling ini.";
	}
	else{
		echo "<div id='content_content'>";
		echo "<div class='subjudul'><p><strong>&#187; Hasil Polling</strong></p></div>";
		setcookie("poling", "sudah poling", time() + 3600 * 24);
		
		$u = mysql_query("UPDATE tpolling SET rating=rating+1 WHERE id_polling='$_POST[pilihan]'");

		echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br><br>Hasil poling saat ini: </p><br>";
		$pertanyaan = mysql_fetch_array(mysql_query("SELECT * FROM tpolling WHERE aktif = 'Y' AND status = '1'"));
		echo "<p style='margin-bottom: 10px;'><b>$pertanyaan[pilihan]</b> </p>";
		echo "<table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>";
		$jml = mysql_query("SELECT SUM(rating) as jml_vote FROM tpolling WHERE aktif='Y' and status='2'");
		$j = mysql_fetch_array($jml);
		$jml_vote = $j['jml_vote'];
		$sql = mysql_query("SELECT * FROM tpolling WHERE aktif='Y' and status='2'");
		while ($s=mysql_fetch_array($sql)){
			$prosentase = sprintf("%2.1f",(($s['rating']/$jml_vote)*100));
			$gbr_vote   = $prosentase * 3;
			echo "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> <img src='images/footer_bg.gif' width='$gbr_vote' height='18' border='0'> $prosentase % </td></tr>";  
		}
		echo "</table><p style='margin-top: 10px;'>Jumlah Voting: <b>$jml_vote</b></p>";
		echo "</div>";
	}
}

// Modul Agenda
elseif ($_GET[module]=='agenda'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Daftar Agenda</strong></p></div>";
	$p = new PagingUser;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	$sql = mysql_query("SELECT * FROM tagenda,tuser WHERE aktif = 'Y' AND tuser.id_user=tagenda.id_user ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
	$i = 1;
	echo "<table>";   
	while($data = mysql_fetch_array($sql)){
		$tanggal = tgl_indo($data[tgl_posting]);
		$tglMulai = tgl_indo($data[tgl_mulai]);
		$tglSelesai = tgl_indo($data[tgl_selesai]);
		echo "<tr>
				<td colspan='3'><font size='1'>$tanggal, Oleh: $data[nama_asfa]</font></td>
			  </tr>
			  <tr>
				<td colspan='3'><b><font color='red'>$data[tema]</font></b></td>
			  </tr>
			  <tr>
				<td> <b>Topik</b></td><td>:</td><td> $data[isi_agenda]</td>
			  </tr>
			  <tr>
				<td> <b>Tanggal</b></td><td>:</td><td> $tglMulai s/d $tglSelesai</td>
			  </tr>
			  <tr>
				<td> <b>Pukul</b></td><td>:</td><td> $data[jam]</td>
			  </tr>
			  <tr>
				<td> <b>Tempat</b></td><td>:</td><td> $data[tempat]</td>
			  </tr>
			  <tr>
				<td width='100'> <b>Contact Person</b></td><td>:</td><td> $data[pengirim]</td>
			  </tr>
			  <tr><td colspan='3'><hr color='#e0cb91'></td></tr>
			  ";
		$i++;
	}
	echo "</table><br>";
	$jmldata 	= mysql_num_rows(mysql_query("SELECT * FROM tdownload"));
	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "$linkHalaman";
	echo "</div>";
}

// Modul Detail Artikel
elseif ($_GET[module]=='detail-artikel'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Detail Artikel</strong></p></div>";
	$sql = mysql_query("SELECT * FROM tartikel a,tuser u,tkategori k WHERE a.id_artikel='$_GET[id]' AND a.id_user=u.id_user AND k.id_kategori=a.id_kategori");
	$data = mysql_fetch_array($sql);
	$tanggal = tgl_indo($data[tanggal]);
	$baca = $data[hits] + 1;
		
	echo "$data[hari], $tanggal - $data[jam] WIB<br>";
	echo "<b>$data[judul]</b><br>";
	echo "Diposting oleh : <b>$data[nama_asfa]</b><br> 
		Kategori: <a href='kategori-$data[id_kategori]-$data[kategori_seo].html'><b>$data[kategori]</b></a>
		- Dibaca: <b>$data[hits]</b> kali<br><br>";
	if ($data[gambar]!=''){
		echo "<span class='image'><img src='gambar/articles/thumbs/thumb_$data[gambar]' border='0'></span>";
	}
	echo "$data[isi] <br><p>&nbsp;</p><p>&nbsp;</p>";
	

	mysql_query("UPDATE tartikel SET hits = $data[hits]+1 WHERE id_artikel='$_GET[id]'"); 

	// Hitung jumlah komentar
	$id = substr("$_GET[id]",0,2);
	$komentar = mysql_query("SELECT COUNT(tkomentar.id_komentar) as jml from tkomentar WHERE id_artikel = '$id'");
	$jumKomen = mysql_fetch_array($komentar);
	echo "<span class='judul'>Ada <b>$jumKomen[jml]</b> Komentar : </span><hr color='#e0cb91' noshade='noshade'><br>";

	// Komentar berita
	$sql = mysql_query("SELECT * FROM tkomentar WHERE id_artikel = '$id'");
	$jml = mysql_num_rows($sql);
	
	if ($jml > 0){
		while ($tampil = mysql_fetch_array($sql)){
			$tanggal = tgl_indo($tampil[tanggal]);
			// Jika ada link web
			if ($tampil[url]!=''){
				echo "<a href='http://$tampil[url]' target='_blank'><b>$tampil[nama]</b></a><br>";
			}
			else{
				echo "<b>$tampil[nama]</b><br>";
			}

			echo "<span class='date'>$tanggal - $tampil[jam] WIB</span><br>";
			$komentar = nl2br($tampil[komentar]);
			echo "$komentar <hr color='#e0cb91' noshade='noshade'><br>";
		}
	}
	
	// Form komentar
	echo "<b>Isi Komentar :</b>
			<table width='100%' style='border: 1pt dashed #0000CC;padding: 10px;'>
			<form action='aksi_komentar.php' method='POST' onSubmit=\"return validasi(this)\">
			<input type='hidden' name='id' value='$_GET[id]'>
			<tr><td>Nama</td><td> : </td><td><input type='text' name='nama' size='40'></td></tr>
			<tr><td>Website</td><td> : </td><td><input type='text' name='url' size=40></td></tr>
			<tr valign='top'><td>Komentar</td><td width='5'>:</td><td> <textarea name='isi' style='width: 315px; height: 100px;'></textarea></td></tr>
			<tr><td colspan='2'>&nbsp;</td><td><img src='captcha.php'></td></tr>
			<tr><td colspan='2'>&nbsp;</td><td>(Masukkan 6 kode diatas)<br><input type='text' name='kode' size='6'><br></td></tr>
			<tr><td colspan='2'>&nbsp;</td><td><input type='submit' name='submit' value='Kirim'></td></tr>
			</form></table><p>&nbsp;</p><p>&nbsp;</p>";
	echo "</div>";
}

// Modul Katalog Buku
elseif ($_GET[module]=='katalog-buku'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Katalog Buku</strong></p></div><table>";
	
	$i = 0;
	$kolom = 2;
	$sql = mysql_query("SELECT * FROM tbuku, tuser WHERE tbuku.aktif = 'Y' AND tbuku.id_user = tuser.id_user ORDER BY id_buku DESC");
	while ($data = mysql_fetch_array($sql)){
		$sinopsisBuku = $data[sinopsis];
		$sinopsis = substr($sinopsisBuku,0,200);
		$tanggal = tgl_indo($data[tanggal]);
		if ($i >= $kolom) {
			echo "<tr></tr>";
			$i = 0;
		}
		$i++;
		echo "<td align='justify' valign='top' style='padding: 5px; border:1px #ccc solid;'><a href=buku-$data[id_buku]-$data[judul_seo].html><b>$data[judul]</b></a> <font size='1'>| Diposting Oleh: $data[nama_asfa]</font><br>";
				if ($data[gambar] != ''){
					echo "<span class='image'><img src='gambar/books/thumbs/thumb_$data[gambar]' width='80' border='0'></span>";
				}
				$sinopsisBuku = htmlentities(strip_tags($data[sinopsis]));
				$isi = substr($sinopsisBuku,0,280);

				echo "$isi ... 
				<br><a href='buku-$data[id_buku]-$data[judul_seo].html'><img src='images/view.png' title='Baca Selengkapnya'></a>
				</td>
				
				<td colspan='2'><hr color=#e0cb91 noshade=noshade></td>
			  ";
		}
	echo "</table></div>";
}

// Modul Detail Buku
elseif ($_GET[module]=='detail-buku'){
	echo "<div id='content_content'>";
	echo "<div class='subjudul'><p><strong>&#187; Detail Buku</strong></p></div>";
	$sql = mysql_query("SELECT * FROM tbuku,tuser WHERE id_buku = '$_GET[id]' AND tbuku.id_user = tuser.id_user");
	$data = mysql_fetch_array($sql);
	$tanggal = tgl_indo($data[tgl_posting]);
	$baca = $data[hits] + 1;
		
	echo "$tanggal<br>";
	echo "Diposting oleh : <b>$data[nama_asfa]</b><br>
		 Dibaca: <b>$data[hits]</b> kali<br><br>";
	echo "<table><tr valign='top'>";
	if ($data[gambar]!=''){
		$gambar = "<img src='gambar/books/thumbs/thumb_$data[gambar]' border='0' width='110'>";
	}
	else{
		$gambar = "<img src='images/no_image.jpg' border='0'>";
	}
	if ($data[cover]!=''){
		$cover = "<a href='gambar/books/cover/$data[cover]'>Download</a>";
	}
	else {
		$cover = "Download Tidak Tersedia";
	}
	$tgl_terbit = tgl_indo($data[tgl_terbit]);
	$harga = rupiah($data[harga]);
	echo "<td>$gambar</td><td width='10'></td>
	<td>
		<table>
			<tr>
				<td colspan='3'><b>$data[judul]</b></td>
			</tr>
			<tr>
				<td width='90'>Penulis</td>
				<td>:</td>
				<td><b>$data[penulis]</b></td>
			</tr>
			<tr>
				<td>ISBN</td>
				<td>:</td>
				<td>$data[ISBN]</td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>:</td>
				<td>$data[penerbit]</td>
			</tr>
			<tr>
				<td>Tgl. Terbit</td>
				<td>:</td>
				<td>$tgl_terbit</td>
			</tr>
			<tr>
				<td>Jml. Halaman</td>
				<td>:</td>
				<td>$data[jumlah_halaman]</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><b><font color='red'>Rp. $harga</font></b></td>
			</tr>
			<tr>
				<td>Cover</td>
				<td>:</td>
				<td><b>$cover</b></td>
			</tr>
		</table>
	</td>
	</tr>
	</table>
	";
	echo "<br>$data[sinopsis] <br><p>&nbsp;</p><p>&nbsp;</p>";
	

	mysql_query("UPDATE tbuku SET hits = $data[hits]+1 WHERE id_buku='$_GET[id]'"); 

	echo "</div>";
}















































































// Modul detail berita
elseif ($_GET[module]=='detailberita'){
	$detail=mysql_query("SELECT * FROM berita,users,kategori    
                      WHERE users.username=berita.username 
                      AND kategori.id_kategori=berita.id_kategori 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;
	
}


// Modul berita per kategori
elseif ($_GET[module]=='detailkategori'){
  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  echo "<span class=judul_head>&#187; Kategori : <b>$n[nama_kategori]</b></span><br /><br />";
  
  $p      = new Paging;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan daftar berita sesuai dengan kategori yang dipilih
 	$sql   = "SELECT * FROM berita WHERE id_kategori='$_GET[id]' 
            ORDER BY id_berita DESC LIMIT $posisi,$batas";		 

	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);
	// Apabila ditemukan berita dalam kategori
	if ($jumlah > 0){
   while($r=mysql_fetch_array($hasil)){
		$tgl = tgl_indo($r[tanggal]);
		echo "<span class=date><img src=images/clock.gif> $r[hari], $tgl - $r[jam] WIB</span><br />";
		echo "<span class=judul><a href=berita-$r[id_berita]-$r[judul_seo].html>$r[judul]</a></span><br />";
 		// Apabila ada gambar dalam berita, tampilkan
    if ($r[gambar]!=''){
			echo "<span class=image><img src='foto_berita/small_$r[gambar]' width=110 border=0></span>";
		}
    // Tampilkan hanya sebagian isi berita
    $isi_berita = nl2br($r[isi_berita]); // membuat paragraf pada isi berita
    $isi = substr($isi_berita,0,220); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
    echo "$isi ... <a href=berita-$r[id_berita]-$r[judul_seo].html>Selengkapnya</a>
          <br /><hr color=#e0cb91 noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "Hal: $linkHalaman";
  }
  else{
    echo "Belum ada berita pada kategori <b>$_GET[nama_kat]</b>";
  }
}


// Modul detail agenda
elseif ($_GET[module]=='detailagenda'){
	$detail=mysql_query("SELECT * FROM agenda 
                      WHERE id_agenda='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
  $tgl_posting   = tgl_indo($d[tgl_posting]);
  $tgl_mulai   = tgl_indo($d[tgl_mulai]);
  $tgl_selesai = tgl_indo($d[tgl_selesai]);
  $isi_agenda=nl2br($d[isi_agenda]);
	
  echo "<span class=judul>$d[tema]</span><br />";
  echo "<span class=date>Diposting tanggal: $tgl_posting</span><br /><br />";
	echo "<b>Topik</b>  : $isi_agenda <br />";
 	echo "<b>Tanggal</b> : $tgl_mulai s/d $tgl_selesai <br /><br />";
 	echo "<b>Tempat</b> : $d[tempat] <br /><br />";
 	echo "<b>Pengirim (Contact Person)</b> : $d[pengirim] <br />";
}


// Modul hasil pencarian berita 
elseif ($_GET[module]=='hasilcari'){
  echo "<span class=judul_head>&#187; <b>Hasil Pencarian</b></span><br />";
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST[kata]);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM berita WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "isi_berita LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_berita DESC LIMIT 7";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  if ($ketemu > 0){
    echo "<p>Ditemukan <b>$ketemu</b> berita dengan kata <font style='background-color:#00FFFF'><b>$kata</b></font> : </p>"; 
    while($t=mysql_fetch_array($hasil)){
  		echo "<span class=judul><a href=berita-$t[id_berita]-$t[judul_seo].html>$t[judul]</a></span><br />";
      // Tampilkan hanya sebagian isi berita
      $isi_berita = nl2br($t[isi_berita]); // membuat paragraf pada isi berita
      $isi = substr($isi_berita,0,150); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href=berita-$t[id_berita]-$t[judul_seo].html>Selengkapnya</a>
            <br /><hr color=#e0cb91 noshade=noshade />";
    }      
  }
  else{
    echo "Tidak ditemukan berita dengan kata <b>$kata</b>";
  }
}


// Modul indeks berita
elseif ($_GET[module]=='indeksberita'){
   echo "<span class=judul_head>&#187; <b>Hasil Indeks Berita</b></span><br />";
   
   $format_mysql = $_POST[tahun].'-'.$_POST[bulan].'-'.$_POST[tanggal]; 
	 $format_indo = tgl_indo($_POST[tahun].'-'.$_POST[bulan].'-'.$_POST[tanggal]);

  // Hanya mengindeks berita, apabila diperlukan bisa ditambahkan utk menngindeks agenda, dll
	$cari   = mysql_query("SELECT * FROM berita WHERE tanggal='$format_mysql'");
	$jumlah = mysql_num_rows($cari);
  // Apabila berita ditemukan sesuai dengan tanggal yang diinginkan 
  if ($jumlah > 0){
    echo "<br />Ditemukan <b>$jumlah</b> berita pada tanggal <b>$format_indo</b> : <ul>";   
    while($r=mysql_fetch_array($cari)){
      echo "<p><li><a href=berita-$r[id_berita]-$r[judul_seo].html>$r[judul]</a></li></p>";
    }      
    echo "</ul>";
  }
  else{
    echo "<br />Tidak ada berita pada tanggal <b>$format_indo</b>";
  }
}


// Modul hasil poling
elseif ($_GET[module]=='hasilpoling'){
   echo "<span class=posting>&#187; <b>Hasil Poling</b></span><br /><br />";

  $u=mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");

  echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />
        Hasil poling saat ini: </p><br />";
  
  echo "<table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> 
          <img src=images/blue.png width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p>Jumlah Voting: <b>$jml_vote</b></p>";
}


// Menu utama di header

// Modul semua berita
elseif ($_GET[module]=='semuaberita'){
  echo "<span class=judul_head>&#187; <b>Berita</b></span><br /><br />"; 
  $p      = new Paging;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysql_query("select count(komentar.id_komentar) as jml, judul, judul_seo, jam, 
                       berita.id_berita, hari, tanggal, gambar, isi_berita    
                       from berita left join komentar 
                       on berita.id_berita=komentar.id_berita
                       and aktif='Y' 
                       group by berita.id_berita DESC LIMIT $posisi,$batas");


  while($r=mysql_fetch_array($sql)){
		$tgl = tgl_indo($r[tanggal]);
		echo "<span class=date>$r[hari], $tgl - $r[jam] WIB</span><br />";
 		echo "<span class=judul><a href=berita-$r[id_berita]-$r[judul_seo].html>$r[judul]</a></span><br />";
      // Tampilkan hanya sebagian isi berita
      $isi_berita = nl2br($r[isi_berita]); // membuat paragraf pada isi berita
      $isi = substr($isi_berita,0,150); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href=berita-$r[id_berita]-$r[judul_seo].html>Selengkapnya</a> (<b>$r[jml] komentar</b>)
            <br /><hr color=#e0cb91 noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
}


// Modul semua agenda
elseif ($_GET[module]=='semuaagenda'){
  echo "<span class=judul_head>&#187; <b>Agenda</b></span><br /><br />"; 
  $p      = new Paging;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas); 
  // Tampilkan semua agenda
 	$sql = mysql_query("SELECT * FROM agenda  
                      ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
  while($d=mysql_fetch_array($sql)){
    $tgl_posting = tgl_indo($d[tgl_posting]);
    $tgl_mulai   = tgl_indo($d[tgl_mulai]);
    $tgl_selesai = tgl_indo($d[tgl_selesai]);
    $isi_agenda  = nl2br($d[isi_agenda]);
	
    echo "<span class=date>$tgl_posting</span><br />";
    echo "<span class=judul>$d[tema]</span><br />";
	  echo "<b>Topik</b>  : $isi_agenda ";
 	  echo "<b>Tanggal</b> : $tgl_mulai s/d $tgl_selesai <br />";
 	  echo "<b>Tempat</b> : $d[tempat] <br />";
 	  echo "<b>Pengirim (Contact Person)</b> : $d[pengirim] 
          <br /><hr color=#e0cb91 noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
}


// Modul semua download
elseif ($_GET[module]=='semuadownload'){
  echo "<span class=judul_head>&#187; <b>Download</b></span><br />"; 
  $p      = new Paging;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua download
 	$sql = mysql_query("SELECT * FROM download  
                      ORDER BY id_download DESC LIMIT $posisi,$batas");		 

  echo "<ul>";   
   while($d=mysql_fetch_array($sql)){
      echo "<li><a href='downlot.php?file=files/$d[nama_file]'>$d[judul]</a></li>";
	 }
  echo "</ul><hr color=#e0cb91 noshade=noshade />";
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM download"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman2($_GET[halaman], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
}


// Modul profil
elseif ($_GET[module]=='profilkami'){
  echo "<span class=judul_head>&#187; <b>Profil</b></span><br /><br />"; 

	$profil = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
	$r      = mysql_fetch_array($profil);

  echo "<tr><td class=isi>";
  if ($r[gambar]!=''){
		echo "<span class=image><img src='foto_banner/$r[gambar]'></span>";
	}
	$isi_profil=nl2br($r[static_content]);
  echo "$isi_profil";  
}


// Modul hubungi kami
elseif ($_GET[module]=='hubungikami'){
  echo "<span class=judul_head>&#187; <b>Hubungi Kami</b></span><br /><br />"; 
  echo "<b>Hubungi kami secara online dengan mengisi form dibawah ini:</b>
        <table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>
        <form action=hubungi-aksi.html method=POST>
        <tr><td>Nama</td><td> : <input type=text name=nama size=40></td></tr>
        <tr><td>Email</td><td> : <input type=text name=email size=40></td></tr>
        <tr><td>Subjek</td><td> : <input type=text name=subjek size=55></td></tr>
        <tr><td valign=top>Pesan</td><td> <textarea name=pesan  style='width: 315px; height: 100px;'></textarea></td></tr>
        </td><td colspan=2><input type=submit name=submit value=Kirim></td></tr>
        </form></table><br />";
}


// Modul hubungi aksi
elseif ($_GET[module]=='hubungiaksi'){
  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<span class=posting>&#187; <b>Hubungi Kami</b></span><br /><br />"; 
  echo "<p align=center><b>Terimakasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
}
?>
