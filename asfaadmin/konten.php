<?php
include "../koneksi/koneksi.php";
include "../fungsi/library.php";
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/fungsi_combobox.php";
include "../fungsi/class_paging.php";

// Bagian Home
if ($_GET[module]=='home'){
  echo "<h2>Selamat Datang</h2>
          <p><div id=tahoma>Hai <b>$_SESSION[namaAsfa]</b>, Selamat datang di halaman Administrator website Asfamedia Books Store.<br> Silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website. </p>
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</font></p>";
}

// Bagian User
elseif ($_GET[module]=='profil'){
	include "modul/mod_profil/profil.php";
}

// Bagian User
elseif ($_GET[module]=='user'){
	include "modul/mod_users/users.php";
}

// Bagian Modul
elseif ($_GET[module]=='modul'){
	include "modul/mod_modul/modul.php";
}

// Bagian Kategori
elseif ($_GET[module]=='kategori'){
	include "modul/mod_kategori/kategori.php";
}

// Bagian Berita
elseif ($_GET[module]=='artikel'){
	include "modul/mod_artikel/artikel.php";
}

// Bagian Komentar Berita
elseif ($_GET[module]=='komentar'){
	include "modul/mod_komentar/komentar.php";
}

// Bagian Tag
elseif ($_GET[module]=='tag'){
	include "modul/mod_tag/tag.php";
}

// Bagian Agenda
elseif ($_GET[module]=='agenda'){
	include "modul/mod_agenda/agenda.php";
}

// Bagian Banner
elseif ($_GET[module]=='banner'){
	include "modul/mod_banner/banner.php";
}

// Bagian Download
elseif ($_GET[module]=='download'){
	include "modul/mod_download/download.php";
}

// Bagian Hubungi Kami
elseif ($_GET[module]=='hubungi'){
	include "modul/mod_hubungi/hubungi.php";
}

// Bagian Kategori
elseif ($_GET[module]=='kategori'){
	include "modul/mod_kategori/kategori.php";
}

// Bagian Group
elseif ($_GET[module]=='group'){
	include "modul/mod_group/group.php";
}

// Bagian Download
elseif ($_GET[module]=='download'){
	include "modul/mod_download/download.php";
}

// Bagian Buku 
elseif ($_GET[module]=='buku'){
	include "modul/mod_buku/buku.php";
}

// Bagian Polling
elseif ($_GET[module]=='polling'){
	include "modul/mod_polling/polling.php";
}

// Bagian Menjadi penulis
elseif ($_GET[module]=='menjadi-penulis'){
	include "modul/mod_penulis/menjadi_penulis.php";
}

// Bagian Iklan
elseif ($_GET[module]=='iklan'){
	include "modul/mod_iklan/iklan.php";
}

// Bagian Link
elseif ($_GET[module]=='link'){
	include "modul/mod_link/link.php";
}

// Apabila modul tidak ditemukan
else{
	echo "<p><b>Modul Tidak Ditemukan</b></p>";
}
?>