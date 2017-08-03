-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2012 at 08:46 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `45f4m3d14`
--

-- --------------------------------------------------------

--
-- Table structure for table `tartikel`
--

CREATE TABLE IF NOT EXISTS `tartikel` (
  `id_artikel` int(11) NOT NULL auto_increment,
  `id_grup` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` char(1) NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastUpdate` int(11) NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_artikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tartikel`
--

INSERT INTO `tartikel` (`id_artikel`, `id_grup`, `id_kategori`, `judul`, `judul_seo`, `hari`, `tanggal`, `jam`, `aktif`, `isi`, `gambar`, `id_user`, `lastUpdate`, `hits`) VALUES
(1, 1, 1, 'Trik Dahsyat Web Master PHP Plus HTML5 & CSS3', 'trik-dahsyat-web-master-php-plus-html5--css3', 'Selasa', '2011-10-04', '21:47:34', 'Y', 'Web Master PHP, Mungkin itu suatu kalimat kehormatan yang diberikan untuk siapapun yang memang mahir dalam PHP, wuih keren juga.. Saat ini PHP telah menjadi pemrograman wajib bagi siapapun yang ingin terjun ke dalam dunia web programming. tidak hanya PHP, dalam buku ini pun Anda akan belajar mengenai HTML, CSS3, bahkan MySQL Database Server yang sedang gencar-gencarnya.<br />\r\n<br />\r\nPembahasan dalam buku dimulai dari Pengenalan dan Teknik Dasar Pemrograman Web, seperti HTML dan HTML5, CSS dan CSS3, MySQL dan MySQL Database Server, dan juga PHP. lalu ada contoh Aplikatif Trik-Trik Dahsyat PHP, HTML5, CSS3, dan MySQL, yang semuanya penulis susun dengan bahasa yang mudah dipahami. disamping itu ada juga bonus proyek Web Siap Pakai ber-nilai Juta-an Rupiah.\r\n', '20111004-112715Logo copyNewLogo.jpg', 1, 1, 7),
(2, 1, 5, 'Trik Kolaborasi Codeigniter & jQuery', 'trik-kolaborasi-codeigniter--jquery', 'Selasa', '2011-10-04', '22:00:36', 'Y', 'Codeigniter merupakan Framework PHP yang paling digemari saat ini, \r\nkhususnya di Indonesia. Begitu juga dengan jQuery yang merupakan library\r\nJavascript terpopuler. Bayangkan bagaimana seandainya keduanya \r\n(Codeigniter dan jQuery) dipadukan untuk membangun sebuah website. Tentu\r\nakan menghasilkan website yang handal, Menarik, dan interaktif.\r\n<br />\r\n<br />\r\nPembahasan dalam buku ini dimulai dengan Memahami Teknik Dasar \r\nCodeigniter dan jQuery secara Mudah, kemudian dilanjutkan dengan \r\nContoh-Contoh Aplikatif dalam Memadukan Codeigniter dan jQuery. Dan \r\nSebagai bonus, ada Proyek Web Blog Berbasis Codeigniter dan jQuery, \r\nserta Teknik Aplkatif Codeigniter, seperti Scaffolding, Validasi, \r\nPaging, Captcha, Membuat File PDF, Integrasi WYSIWYG Editor, Photo \r\nGallery, Authentikasi, Email, Upload, dan Download File.\r\n', '20111004-100036Agus Saputra - Trik Kolaborasi Codeigniter & jQuery.jpg', 1, 1, 2),
(3, 2, 2, 'Kaos PHP Inside', 'kaos-php-inside', 'Selasa', '2011-10-04', '22:35:34', 'Y', 'Kaos berbahan jam tangan, terbuat dari besi dan baja sangat pas untuk Anda\r\n', '20111004-103535321174_112556112185100_100002921352779_87662_877222751_n.jpg', 2, 2, 12),
(4, 3, 7, 'Software Development Asfa Solution', 'software-development-asfa-solution', 'Selasa', '2011-11-15', '14:32:53', 'Y', '<strong>ASFA SOLUTION</strong> menghadirkan sebuah solusi kepada Anda yang ingin mempunyai website pribadi (blog), company profile, toko online, sistem akademik, bahkan lainnya menggunakan bahasa pemrograman PHP. harga yang ditawarkan sangat beragam dan tentu sangat terjangkau.. semua bisa diatur oleh fitur dan tingkat kesulitan sistem. ada gratis konsultasi juga loh.. dan semua program yang dibuat, akan diberikan FREE User Guide dan juga alur DFD dan ERD..\r\n', '20111115-023253Untitled-1 cop1y.jpg', 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbuku`
--

CREATE TABLE IF NOT EXISTS `tbuku` (
  `id_buku` int(11) NOT NULL auto_increment,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `aktif` char(1) NOT NULL,
  `sinopsis` text NOT NULL,
  `status` char(1) NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` text NOT NULL,
  `hits` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastUpdate` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_buku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbuku`
--

INSERT INTO `tbuku` (`id_buku`, `judul`, `judul_seo`, `penulis`, `penerbit`, `ISBN`, `tgl_terbit`, `harga`, `stok`, `jumlah_halaman`, `aktif`, `sinopsis`, `status`, `tgl_posting`, `gambar`, `hits`, `id_kategori`, `id_user`, `lastUpdate`, `cover`) VALUES
(1, 'Teknik Cepat Membangun Aplikasi Web dengan Framework CakePHP', 'teknik-cepat-membangun-aplikasi-web-dengan-framework-cakephp', 'Agus Saputra', 'Lokomedia', '9789791758727', '2011-02-23', 42800, 3, 143, 'Y', '<div align="justify">\r\nCakePHP hadir sebagai alternatif bagi Anda yang masih kesulitan \r\nmempelajari framework. Sesuai dengan namanya, CakePHP&nbsp; menawarkan \r\nkemudahan dalam membuat aplikasi web dengan cepat (RAD: Rapid \r\nApplication Development), menjadikan belajar framework se-enak menikmati\r\nkue favorit. Contohnya, dengan fitur Scaffolding, Anda bisa membuat \r\noperasi CRUD (Create, Read, Update, Delete) hanya dengan 3 baris kode, \r\npadahal kalau Anda membuatnya secara manual membutuhkan bahkan ratusan \r\nbaris kode.<br />\r\n<br />\r\nCakePHP merupakan framework yang memiliki segudang \r\nfitur juga sudah support Ajax dan ORM (Object Relational Model), namun \r\nterbatasnya panduan dan tutorialnya menjadi kesulitan tersendiri untuk \r\nmempelajarinya. Dengan adanya buku ini, ternyata belajar CakePHP tidak \r\nsesulit yang dibayangkan. Buku dimulai dengan Dasar-Dasar Framework \r\nCakePHP yang membahas mulai dari Definisi, Instalasi, Konfigurasi, \r\nPenanganan HTML dan Database, Operasi CRUD, Teknik CakePHP (Scaffolding,\r\nPaging, Upload File, dll), Components (Authentication &amp; Session), \r\ndan terakhir ditutup dengan Proyek Lengkap Pembuatan Web Blog.\r\n</div>\r\n', 'F', '2011-10-08', '20111010-10523620111008-030847Agus Saputra - Teknik Cepat Membangun Aplikasi Web dengan Framework CakePHP.jpg', 1, 5, 1, 1, ''),
(2, 'Step by Step Membangun Aplikasi SMS dengan PHP & MySQL', 'step-by-step-membangun-aplikasi-sms-dengan-php--mysql', 'Agus Saputra', 'PT. Elex Media Komputindo', '9789792768428', '2011-04-14', 42800, 1, 184, 'Y', '<div align="justify">\r\nTeknologi  SMS saat ini sudah tak bisa lagi dilepaskan dari kehidupan \r\nsehari-hari.  Hampir semua orang, baik itu pekerja, pelajar, mahasiswa, \r\npebisnis,  ataupun orang biasa pasti pernah menggunakan layanan ini.<br />\r\n<br />\r\nSaat  ini SMS tidak hanya digunakan sebagai alat untuk berkirim pesan \r\nantar  teman semata. Namun, sudah mulai digunakan oleh beberapa \r\nperusahaan,  usaha dagang, toko, bahkan lembaga institut pendidikan \r\nsekalipun untuk  sarana berkirim promosi, iklan, atau sejenisnya. \r\nPenggunaan penyebaran  informasi SMS tersebut memang tidak salah, justru\r\nsangat tepat. Mengapa?  karena setiap pesan yang masuk ke dalam \r\nhandphone sesorang, dapat  dipastikan terbaca oleh si pemilik handphone \r\ntersebut. Disamping itu,  biaya tarif dan fleksibilitas kecepatan pun \r\nsangat terjangkau dan sangat  cepat. Coba Anda bandingkan jika melakukan\r\npromosi melalui selebaran  brosur dan sejenisnya.<br />\r\n<br />\r\nAnda akan \r\ndiajak untuk mengenal bahasa  pemrograman yang cukup populer dalam \r\nmembangun website, yaitu PHP  beserta databasenya MySQL, dan juga SMS \r\nsebagai aplikasi pendukung  website utama. Akan dibahas juga tentang \r\nbeberapa langkah bagaimana  menjadi PHP web master yang andal melalui \r\nstudi kasus latihan praktek  pilihan. Mengenal teknologi pembuatan \r\naplikasi SMS dalam web, serta  ditutup dengan terjun secara langsung \r\ndalam studi kasus proyek  &quot;Membangun Aplikasi Web Berbasis SMS&quot;.<br />\r\n<br />\r\n<span style="color: #ff0000"><strong>So.. tunggu apalagi? Buruan beli dan koleksi bukunya.. </strong></span><img src="../tinymcpuk/plugins/emotions/images/smiley-smile.gif" border="0" alt="Smile" title="Smile" />\r\n</div>\r\n', 'F', '2011-10-08', '20111008-032052Agus Saputra - Step by Step Membangun Aplikasi SMS dengan PHP dan MySQL.jpg', 30, 1, 1, 1, ''),
(4, 'Pemrograman CSS untuk Pemula', 'pemrograman-css-untuk-pemula', 'Agus Saputra & Feni Agustin', 'PT. Elex Media Komputindo', '9786020000886', '2011-05-25', 44800, 2, 208, 'Y', '<div align="justify">\r\nCSS (Cascading Style Sheet) merupakan bahasa pemrograman web yang digunakan untuk mengendalikan dan membangun komponen dalam web sehingga tampilan web akan lebih rapi, terstruktur, interaktif, dan seragam. Program ini wajib dikuasai oleh setiap pembuat web program (Web Programmer), terutama oleh Web Designer. <br />\r\n <br />\r\n Banyak keuntungan \r\nyang dapat Anda peroleh melalui CSS, di antaranya  mempermudah dan \r\nmempersingkat pembuatan dokumen web, mempercepat akses  web, fleksibel, \r\ninteraktif, tampilan lebih menarik, dan nyaman  dipandang, ringan pada \r\nfilesize, menghemat bandwidth hosting, dapat  digunakan pada semua web \r\nbrowser, dan masih banyak lagi keuntungan yang  bisa Anda dapatkan \r\ndengan CSS. <br />\r\n <br />\r\n Pembahasan dalam buku mencakup: <br />\r\n - Pengenalan Dasar HTML dan CSS. <br />\r\n - Metode Penulisan Dasar. <br />\r\n - Komponen CSS (Selektor, Id, dan Class). <br />\r\n - Shorthand Properties. <br />\r\n - Tipe-Tipe Properti dan Elements, Value, Tips dan Trik. <br />\r\n- Studi Kasus Pembuatan dengan CSS, di antaranya Layout, Berbagai Macam\r\nMenu Navigasi, Form, Link, Galeri Foto, Web dengan Beberapa Kolom. <br />\r\n- Konsep Desain, Arti Warna pada Website, Pemilihan Kombinasi Warna  \r\nTerbaik dan Terburuk, Trik CSS Cursor, dan Manipulasi Marquee. <br />\r\n So.. tungggu apalagi? .. <br />\r\n Segera beli dan koleksi bukunya, lalu terapkan kedahsyatan teknologi CSS ke dalam web Anda. :)\r\n</div>\r\n', 'F', '2011-10-08', '20111008-063336Agus Saputra & Feni Agustin - Pemrograman CSS untuk Pemula.jpg', 9, 1, 1, 1, ''),
(5, 'Trik dan Solusi Jitu Pemrograman PHP', 'trik-dan-solusi-jitu-pemrograman-php', 'Agus Saputra', 'PT. Elex Media Komputindo', '9786020005652', '2012-06-20', 49800, 10, 220, 'Y', '<div align="justify">\r\nPHP dan MySQL merupakan perpaduan pemrograman yang serasi. banyak web-web yang ada didunia maya dibangun menggunakan kemampuan andal PHP dan database-nya menggunakan MySQL. Alasannya sangat sederhana... selain memiliki kemampuan yang tinggi dalam menciptakan web kompleks, PHP ternyata sangat mudah dipelajari.<br />\r\n<br />\r\nPembahasan dalam buku mencakup:<br />\r\n<ul>\r\n	<li>Pengenalan Dasar PHP dan MySQL</li>\r\n	<li>Query Dasar MySQL dan PHP Basic</li>\r\n	<li>Teknik Dasar Upload (Single dan Dynamic Multiple)</li>\r\n	<li>Teknik dan Trik-Trik Paging agar Lebih Oke dan Yahud!</li>\r\n	<li>Teknik Pengiriman Email (Standar, Form, dan Attahcment File)</li>\r\n	<li>Hits Counter</li>\r\n	<li>Membuat Sendiri Dynamic Menu Tree dan Jam Analog</li>\r\n	<li>Mengetahui IP dan Jenis Browser Pengunjung</li>\r\n	<li>Solusi Jitu Menangani dan Menghindari Error PHP</li>\r\n	<li>dan Masih Banyak Lagi Trik-Trik PHP lainnya.<br />\r\n	</li>\r\n</ul>\r\nSemua dirangkum dalam satu buku, bahkan diakhir pembahasan akan diulas cara membuat halaman buku tamu sendiri, lengkap dengan emoticon.<br />\r\n<br />\r\nSo... Bagi Anda yang ingin mempelajari PHP dan MySQL, lengkap dengan studi kasus beserta trik-trik PHP dan Solusi dalam menangani dan menghindari error PHP... Buku ini dapat menjadi alternatif yang sangat jitu bagi Anda.<br />\r\n</div>\r\n', 'F', '2012-02-02', '20120202-080923Agus Saputra - Trik dan Solusi Jitu Pemrograman PHP.jpg', 3, 1, 1, 1, ''),
(6, 'Panduan Praktis Menguasai Database Server MySQL', 'panduan-praktis-menguasai-database-server-mysql', 'Agus Saputra', 'PT. Elex Media Komputindo', '9786020009537', '2011-09-13', 34800, 10, 124, 'Y', '<div align="justify">\r\nMySQL bukan hanya suatu tempat penyimpanan data belaka. Jika kita jeli, banyak sekali kemampuan MySQL yang sering kita abaikan yang justru itu merupakan sisi utama kelebihan database MySQL. kebanyakan kita ataupun para pengguna web bahkan para programmer sekalipun membangun aplikasi web dengan menaruh proses/aksi pada sisi file proses. Tahukah Anda? Bahwa setiap data memiliki memori (byte) yang dikirimkan dari database ke client dan dari client ke database. Jika data yang ada dalam database sedikit sih tak masalah, namun jika datanya banyak? Tentu itu akan memberatkan database dalam melakukan proses permintaan.<br />\r\n<br />\r\nAda fungsi-fungsi utama yang sering kita remehkan atau malah mungkin tidak kita ketahui, fungsi tersebut dinamakan fungsi Database Server. Database Server mencakup Store Procedure, Trigger yang akan membantu kita dalam membangun suatu aplikasi web dengan tidak membebankan dan meringankan kerja sisi database.<br />\r\n<br />\r\nDalam buku ini, Anda akan diajak untuk mengenal sisi lain dari database MySQL, mulai dari pengenalan dasar MySQL, Database Architecture, Mengenal Tipe-Tipe Data, Aneka Macam Join, Fungsi Waktu, Fungsi Aritmetika, Query Commands, Mengenal Database Server, Store Procedure, Trigger, serta pembahasan khusus Studi Kasus &quot;Kolaborasi PHP dengan databas server MySQL&quot; yang belum pernah ditemukan pada buku-buku lain.<br />\r\n</div>\r\n', 'F', '2012-02-02', '20120202-081924Agus Saputra - Panduan praktis menguasai database MySQL.jpg', 0, 1, 1, 1, ''),
(7, 'Trik Kolaborasi Codeigniter & jQuery', 'trik-kolaborasi-codeigniter--jquery', 'Agus Saputra', 'Lokomedia', '9789791758796', '2011-09-15', 49800, 10, 200, 'Y', '<div align="justify">\r\nCodeigniter merupakan Framework PHP yang paling digemari saat ini, khususnya di Indonesia. Begitu pula dengan jQuery yang merupakan library Javascript terpopuler. Bayangkan bagaimana seandainya keduanya (Codeigniter dan jQuery) dipadukan untuk membangun sebuah website. Tentu akan menghasilkan website yang handal, menarik, dan interaktif.<br />\r\n<br />\r\nPembahasan dalam buku ini dimulai dengan Memahami Teknik Dasar Codeigniter dan jQuery secara mudah, kemudian dilanjutkan dengan Contoh-Contoh Aplikatif dalam memadukan Codeingiter dan jQuery. Dan sebagai bonus, ada proyek web Blog Berbasis Codeigniter dan jQuery, serta Teknik Aplikatif Codeigniter, seperti Scaffolding, Validasi, Paging, Captcha, Membuat File PDF, Integrasi WYSIWYG Editor, Photo Gallery, Authentikasi, Email, Upload, dan Download File.<br />\r\n</div>\r\n', 'F', '2012-02-02', '20120202-082522Agus Saputra - Trik Kolaborasi Codeigniter & jQuery.jpg', 0, 5, 1, 1, ''),
(8, '62 Trik dan Plugin Terbaik jQuery', '62-trik-dan-plugin-terbaik-jquery', 'Agus Saputra, Feni Agustin, & Asfa Solution', 'PT. Elex Media Komputindo', '9786020019840', '2012-02-06', 42800, 10, 180, 'Y', '<div align="justify">\r\nSiapa sih yang tak mengenal jQuery? Library yang kaya akan animasi, tools wajib untuk para pengembang web. jQuery ibarat sebuah framework. jQuery merupakan Framework-nya Javascript yang tak lain merupakan kumpulan library javascript yang dikemas secara friendly. yang sangat membantu kita maupun Anda yang ingin mempercantik web sekaligus mempercepat akses (responsif). Itulah jQuery.<br />\r\n<br />\r\nBuku ini merupakan kompilasi trik-trik jQuery pilihan yang dikemas berdasarkan pengalaman para pengembang web (Asfa Solution), trik yang paling sering digunakan. Jumlahnya ada puluhan, dari mulai accordion, rotator, tab, grafik, menu, dan lain sebagainya.<br />\r\n<br />\r\nSecara keseluruhan, sangat praktis karena penggunaannya yang cukup drag &amp; drop tanpa kesulitan yang berarti. Buku ini bisa dijadikan panduan praktis bagi para developer, pengajar, maupun hobbies (pribadi) dalam berkreasi untuk memperindah tampilan web mereka.<br />\r\n<br />\r\nSegera lengkapi rak buku Anda dengan buku yang satu ini <img src="../tinymcpuk/plugins/emotions/images/smiley-smile.gif" border="0" alt="Smile" title="Smile" />\r\n</div>\r\n', 'F', '2012-02-02', '20120202-083301Agus Saputra, Feni Agustin, Asfa Solution - 62 Trik & Plugin jQuery.jpg', 1, 8, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tdownload`
--

CREATE TABLE IF NOT EXISTS `tdownload` (
  `id_download` int(11) NOT NULL auto_increment,
  `judul` varchar(100) NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` char(1) NOT NULL,
  `hits` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastUpdate` int(11) NOT NULL,
  PRIMARY KEY  (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tdownload`
--

INSERT INTO `tdownload` (`id_download`, `judul`, `namafile`, `type`, `size`, `tgl_posting`, `jam`, `aktif`, `hits`, `id_user`, `lastUpdate`) VALUES
(4, 'Asfa Solution Profile', 'Asfa Solution.pdf', 'application/pdf', 3612619, '2012-02-02', '20:41:24', 'Y', 1, 1, 1),
(3, 'Brosur Asfa Solution', 'Untitled-1 cop1y.jpg', 'image/jpeg', 2214891, '2011-11-02', '15:48:11', 'Y', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgrup`
--

CREATE TABLE IF NOT EXISTS `tgrup` (
  `id_grup` int(11) NOT NULL auto_increment,
  `grup` varchar(30) NOT NULL,
  `grup_seo` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastUpdate` int(11) NOT NULL,
  PRIMARY KEY  (`id_grup`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tgrup`
--

INSERT INTO `tgrup` (`id_grup`, `grup`, `grup_seo`, `id_user`, `lastUpdate`) VALUES
(1, 'Buku', 'buku', 1, 1),
(2, 'Kaos', 'kaos', 1, 1),
(3, 'Iklan', 'iklan', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiklan`
--

CREATE TABLE IF NOT EXISTS `tiklan` (
  `id_iklan` int(11) NOT NULL auto_increment,
  `judul` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `hits` int(11) NOT NULL,
  `tanggalAwal` date NOT NULL,
  `tanggalAkhir` date NOT NULL,
  `aktif` char(1) NOT NULL,
  `jenis_layanan` char(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY  (`id_iklan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tiklan`
--

INSERT INTO `tiklan` (`id_iklan`, `judul`, `url`, `gambar`, `hits`, `tanggalAwal`, `tanggalAkhir`, `aktif`, `jenis_layanan`, `id_user`) VALUES
(6, 'Laptop Murah, ya ke Lion Computer', 'www.lioncomputer.com', 'Lion Computer.jpg', 0, '2011-10-26', '2011-11-26', 'Y', 'B', 1),
(5, 'Tutorial PHP, Jasa Web Design and Programming, OOP, Framework - ASFA GROUP', 'www.agussaputra.com', 'Agus Saputra.jpg', 0, '2011-10-26', '2011-11-26', 'Y', 'S', 1),
(7, 'Software Development Asfa Solution', 'http://www.agussaputra.com', 'Asfa Solution.jpg', 0, '2011-11-30', '2011-12-30', 'Y', 'S', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tkategori`
--

CREATE TABLE IF NOT EXISTS `tkategori` (
  `id_kategori` int(11) NOT NULL auto_increment,
  `id_grup` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `kategori_seo` varchar(30) NOT NULL,
  `aktif` char(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastUpdate` int(11) NOT NULL,
  PRIMARY KEY  (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tkategori`
--

INSERT INTO `tkategori` (`id_kategori`, `id_grup`, `kategori`, `kategori_seo`, `aktif`, `id_user`, `lastUpdate`) VALUES
(1, 1, 'PHP, MySQL, CSS', 'php-mysql-css', 'Y', 1, 1),
(2, 2, 'PHP', 'php', 'Y', 1, 1),
(3, 2, 'Web Browser', 'web-browser', 'Y', 1, 1),
(5, 1, 'Framework', 'framework', 'Y', 1, 1),
(7, 3, 'Lain-lain', 'lainlain', 'Y', 1, 1),
(8, 1, 'jQuery', 'jquery', 'Y', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tkomentar`
--

CREATE TABLE IF NOT EXISTS `tkomentar` (
  `id_komentar` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_artikel` int(11) NOT NULL,
  PRIMARY KEY  (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tkomentar`
--

INSERT INTO `tkomentar` (`id_komentar`, `nama`, `url`, `komentar`, `tanggal`, `jam`, `id_artikel`) VALUES
(1, 'Agus Saputra', 'www.agussaputra.com', 'Halo', '2011-10-10', '08:00:00', 2),
(2, 'Feni Agustin', '', ' bagi  donk  buku  na..  =D   ', '2011-11-05', '23:08:07', 2),
(3, 'Hadi Setiawan', '', ' saya  juga  boleh  donk..   ', '2011-11-05', '23:10:48', 2),
(4, 'Daniel Put', '', ' Om,  saya  jadi  Designer  nya  dwonk..  =p   ', '2011-11-05', '23:12:03', 2),
(5, 'Penerbit Asfamedia', 'www.asfamedia.com', ' mantab  nih  bukunya..   ', '2011-11-05', '23:14:08', 1),
(6, 'Sutarno', 'www.velbak.com', ' bagus  nih  bajunya..   ', '2011-11-06', '00:06:14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tkontak`
--

CREATE TABLE IF NOT EXISTS `tkontak` (
  `id_kontak` int(11) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY  (`id_kontak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tkontak`
--

INSERT INTO `tkontak` (`id_kontak`, `nama`, `email`, `judul`, `pesan`, `hari`, `tanggal`, `jam`) VALUES
(4, 'Agus Saputra, S.Kom.', 'info@agussaputra.com', 'Prosedur Penulisan Naskah', ' Redaksi  Yth,\r\n\r\nBagaimana  cara  prosedur  penulisan  naskah  di  Penerbit  Asfamedia?..\r\nTerima  kasih..\r\n\r\nSalam,\r\nAgus  Saputra   ', 'Kamis', '2011-11-03', '08:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `tlink`
--

CREATE TABLE IF NOT EXISTS `tlink` (
  `id_link` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `aktif` char(1) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_user` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_link`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tlink`
--

INSERT INTO `tlink` (`id_link`, `nama`, `url`, `aktif`, `gambar`, `tanggal`, `jam`, `id_user`) VALUES
(3, 'Agus Saputra', 'www.agussaputra.com', 'Y', 'Agus_Saputra.jpg', '2011-11-01', '17:03:52', '1'),
(4, 'Penerbit Asfamedia', 'www.asfamedia.com', 'Y', 'Asfamedia.jpg', '2011-11-01', '17:16:14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tmember`
--

CREATE TABLE IF NOT EXISTS `tmember` (
  `id_member` int(11) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_propinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `ponsel` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  PRIMARY KEY  (`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tmember`
--


-- --------------------------------------------------------

--
-- Table structure for table `tmenjadi_penulis`
--

CREATE TABLE IF NOT EXISTS `tmenjadi_penulis` (
  `id_penulis` int(11) NOT NULL auto_increment,
  `isi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY  (`id_penulis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tmenjadi_penulis`
--

INSERT INTO `tmenjadi_penulis` (`id_penulis`, `isi`, `id_user`, `datetime`) VALUES
(1, '<div align="justify">\r\n<font size="2"><strong>Prosedur Penulisan Naskah di Penerbit Asfamedia</strong></font><br />\r\n<br />\r\n<table border="0">\r\n	<tbody>\r\n		<tr valign="top">\r\n			<td>1. <br />\r\n			</td>\r\n			<td>Naskah belum pernah diterbitkan oleh Penerbit lain. <br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2.</td>\r\n			<td>Saat ini, penerbit hanya menerima naskah yang bertemakan komputer dan internet.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3. <br />\r\n			</td>\r\n			<td>Buatlah proposal pengajuan naskah (proposal dapat didownload <a href="http://www.asfamedia.com/proposal.doc" title="disini"><strong>disini</strong></a>).</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign="top">4. <br />\r\n			</td>\r\n			<td>Sertakan pula rancangan daftar isi dan salah satu sampel bab yang \r\n			di-andalkan untuk memudahkan redaksi untuk menilai naskah Anda. <br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5.</td>\r\n			<td>Kirimkan proposal ke email: <font color="#FF0000"><u>redaksi@asfamedia.com</u></font>.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6.</td>\r\n			<td>Penerbit akan mempelajari proposal tersebut, biasanya memerlukan waktu 1 s/d 2 minggu.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7.</td>\r\n			<td>Apabila penerbit menyetujui proposal tersebut, maka penulis \r\n			dipersilahkan untuk mengirimkan seluruh naskahnya secara lengkap / \r\n			menulis naskah apabila naskah belum selesai (deadline sesuai dengan \r\n			kesepakatan).</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8.</td>\r\n			<td>Usahakan selalu menyertakan bonus CD (include) untuk buku, adanya bonus \r\n			Video Tutorial Interaktif akan menjadi nilai tambah dalam penilaian \r\n			naskah.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>9. <br />\r\n			</td>\r\n			<td>Kemudian naskah akan di-edit dan di-olah oleh Penerbit.</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign="top">10.</td>\r\n			<td>Apabila proses cetak selesai, Penerbit akan mengirimkan buku tersebut sebanyak 5 eksemplar sebagai bukti terbit.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11.</td>\r\n			<td>Beberapa hal yang perlu diperhatikan:</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>a. Sebelum buku diterbitkan, Penerbit akan mengirimkan surat perjanjian penerbitan kepada penulis.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>b. Hak Cipta berada ditangan penulis, Penerbit hanya memiliki hak edar buku tersebut.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>c. Besarnya royalti akan diberikan sebesar 10% dari harga jual bruto.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>d. Pada saat buku pertama diterbitkan, Royalti akan langsung dibayarkan 25% (DP) dari keseluruhan royalti.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<br />\r\n</div>\r\n', 1, '2011-10-25 14:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `tmodule`
--

CREATE TABLE IF NOT EXISTS `tmodule` (
  `IdModule` int(11) NOT NULL auto_increment,
  `ModuleName` varchar(50) collate latin1_general_ci NOT NULL,
  `Link` varchar(100) collate latin1_general_ci NOT NULL,
  `Publish` enum('Y','N') collate latin1_general_ci NOT NULL,
  `Status` enum('User','Administrator') collate latin1_general_ci NOT NULL,
  `Active` enum('Y','N') collate latin1_general_ci NOT NULL,
  `Sort` int(11) NOT NULL,
  `Seo_Link` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`IdModule`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tmodule`
--

INSERT INTO `tmodule` (`IdModule`, `ModuleName`, `Link`, `Publish`, `Status`, `Active`, `Sort`, `Seo_Link`) VALUES
(2, 'Manajemen User', '?module=user', 'N', 'Administrator', 'Y', 1, ''),
(18, 'Artikel', '?module=artikel', 'Y', 'User', 'Y', 6, 'semua-berita.html'),
(37, 'Profil', '?module=profil', 'Y', 'Administrator', 'Y', 3, 'profil-kami.html'),
(10, 'Manajemen Modul', '?module=modul', 'N', 'Administrator', 'Y', 2, ''),
(36, 'Download', '?module=download', 'Y', 'User', 'Y', 8, 'semua-download.html'),
(40, 'Hubungi Kami', '?module=hubungi', 'Y', 'Administrator', 'Y', 12, 'hubungi-kami.html'),
(41, 'Agenda', ' ?module=agenda', 'Y', 'User', 'Y', 4, 'semua-agenda.html'),
(43, 'Kategori', '?module=kategori', 'Y', 'Administrator', 'Y', 13, ''),
(44, 'Manajemen Group', '?module=group', 'Y', 'Administrator', 'Y', 14, ''),
(45, 'Manajemen Buku', '?module=buku', 'Y', 'Administrator', 'Y', 15, ''),
(46, 'Menjadi Penulis', '?module=menjadi-penulis', 'Y', 'Administrator', 'Y', 16, ''),
(47, 'Manajemen Polling', '?module=polling', 'Y', 'Administrator', 'Y', 17, ''),
(48, 'Manajemen Advertising', '?module=iklan', 'Y', 'Administrator', 'Y', 18, ''),
(49, 'Partner Link', '?module=link', 'Y', 'Administrator', 'Y', 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `tpolling`
--

CREATE TABLE IF NOT EXISTS `tpolling` (
  `id_polling` int(11) NOT NULL auto_increment,
  `pilihan` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `aktif` char(1) NOT NULL,
  `datetime` date NOT NULL,
  PRIMARY KEY  (`id_polling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tpolling`
--

INSERT INTO `tpolling` (`id_polling`, `pilihan`, `status`, `rating`, `aktif`, `datetime`) VALUES
(1, 'Bagaimana kualitas buku Penerbit Asfamedia?', '1', 0, 'Y', '2011-11-02'),
(2, 'Sangat Baik', '2', 9, 'Y', '2011-11-02'),
(3, 'Baik', '2', 5, 'Y', '2011-11-02'),
(4, 'Cukup', '2', 5, 'Y', '2011-11-02'),
(5, 'Kurang', '2', 1, 'Y', '2011-11-02'),
(6, 'Kurang Sekali', '2', 2, 'Y', '2011-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tprofile`
--

CREATE TABLE IF NOT EXISTS `tprofile` (
  `IdProfile` int(11) NOT NULL auto_increment,
  `Content` text NOT NULL,
  `Image` text NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY  (`IdProfile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tprofile`
--

INSERT INTO `tprofile` (`IdProfile`, `Content`, `Image`, `UserId`, `Time`) VALUES
(1, '<div align="justify">\r\n<strong>Asfamedia Books Store</strong> merupakan toko buku online yang menjual khusus buku-buku karya Agus Saputra.\r\n</div>\r\n<div align="justify">\r\n&nbsp;\r\n</div>\r\n<div align="justify">\r\n&nbsp;\r\n</div>\r\n<div align="justify">\r\n&nbsp;\r\n</div>\r\n<div align="justify">\r\n&nbsp;\r\n</div>\r\n<div align="justify">\r\n&nbsp;\r\n</div>\r\n', 'Logo copyNewLogo.jpg', 'Administrator', '2012-02-02 20:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `tregistrasi_kode`
--

CREATE TABLE IF NOT EXISTS `tregistrasi_kode` (
  `id_reg` int(11) NOT NULL auto_increment,
  `id_member` int(11) NOT NULL,
  `kode` varchar(32) NOT NULL,
  PRIMARY KEY  (`id_reg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tregistrasi_kode`
--


-- --------------------------------------------------------

--
-- Table structure for table `tstatistik`
--

CREATE TABLE IF NOT EXISTS `tstatistik` (
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tstatistik`
--

INSERT INTO `tstatistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2011-11-01', 67, 1320160243),
('::1', '2011-11-02', 242, 1320230827),
('::1', '2011-11-03', 41, 1320315902),
('::1', '2011-11-04', 1, 1320368621),
('::1', '2011-11-05', 208, 1320512244),
('::1', '2011-11-06', 123, 1320519100),
('::1', '2011-11-07', 79, 1320659725),
('::1', '2011-11-08', 1, 1320719885),
('::1', '2011-11-11', 11, 1321005569),
('::1', '2011-11-12', 6, 1321098728),
('::1', '2011-11-14', 24, 1321280422),
('::1', '2011-11-15', 11, 1321342384),
('::1', '2011-11-23', 2, 1322024038),
('::1', '2011-11-30', 10, 1322628952),
('::1', '2011-12-07', 1, 1323231090),
('::1', '2011-12-12', 22, 1323679738),
('127.0.0.1', '2011-12-21', 1, 1324438922),
('127.0.0.1', '2011-12-29', 1, 1325146087),
('127.0.0.1', '2012-01-06', 1, 1325824094),
('127.0.0.1', '2012-01-07', 1, 1325929572),
('127.0.0.1', '2012-01-08', 2, 1326016559),
('127.0.0.1', '2012-01-10', 1, 1326208148),
('127.0.0.1', '2012-01-12', 1, 1326356656),
('127.0.0.1', '2012-01-17', 9, 1326763607),
('127.0.0.1', '2012-01-26', 1, 1327552435),
('127.0.0.1', '2012-02-02', 49, 1328190244);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
  `id_user` int(11) NOT NULL auto_increment,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `nama_asfa` varchar(50) NOT NULL,
  `email_asfa` varchar(100) NOT NULL,
  `ponsel` varchar(12) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `Username`, `Password`, `nama_asfa`, `email_asfa`, `ponsel`, `jabatan`, `level`, `id_member`) VALUES
(1, '45f44dm1n', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'redaksi@asfamedia.com', '-', 'Administrator', 'administrator', 0),
(2, 'asfaagus', '21232f297a57a5a743894a0e4a801fc3', 'Agus Saputra', 'takehikoboyz@gmail.com', '08562121141', 'Pemimpin Redaksi', 'user', 0),
(3, 'asfafeni', '9249f383ed31fd766d1f3b3eb10fffaf', 'Feni Agustin', 'felicia.feni@gmail.com', '08987300657', 'Manajer Redaksi', 'user', 0),
(5, 'asfahadi', '76abec82deb4d31f045a50916802065d', 'Hadi Setiawan', 'hadi.setiawan.asfa@gmail.com', '082128222038', 'Operational Support', 'on', 0);
