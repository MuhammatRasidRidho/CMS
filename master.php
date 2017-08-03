<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php include "title_seo.php"; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="description" content="<?php include "title1.php"; ?>">
	<meta name="keywords" content="<?php include "title2.php"; ?>">
	<meta http-equiv="Copyright" content="Asfamedia - Asfa Solution">
	<meta name="Author" content="Agus Saputra">
	<link rel="shortcut icon" href="images/icon.png" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js" ></script>
	<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
		});
	</script>
	<script language="javascript">
		var XMLHttpRequestObject = false;
		if (window.XMLHttpRequest) {
			XMLHttpRequestObject = new XMLHttpRequest();
		} 
		else if (window.ActiveXObject) {
			XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		}
		function getJam(sumberdata, divID) {
			if(XMLHttpRequestObject) {
				var obj = document.getElementById(divID);
				XMLHttpRequestObject.open("GET",sumberdata);
				XMLHttpRequestObject.onreadystatechange = function() {
					if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
						obj.innerHTML = XMLHttpRequestObject.responseText;
						setTimeout("getJam('jam.php','divjam')",1000);
					}
				}
			XMLHttpRequestObject.send(null);
			}
		}
		window.onload=function(){
			setTimeout("getJam('jam.php','divjam')",1000);
		}
	</script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<div id="logo"><h1>Asfamedia Books Store</h1>
			<div class="subbanner">Jl. Perintis No. 18 RT. 03/RW. 05 Mega Kuningan, Jakarta Selatan <br> Ph. 08562121141, E-mail: redaksi@asfamedia.com, Kelompok ASFA GROUP</div></div>
			<div id="topRataKanan" align="right">
				<ul class="top">
					<li class="hover">home</li>
					<li><a href="http://www.facebook.com/" class="about"> Facebook </a></li>
					<li><a href="mailto:takehikoboyz@gmail.com" class="contact"> E-mail </a></li>
					<li><a href='rss.xml' target='_blank'><img src='images/rss.png'></a></li> 
				</ul>
				
			</div>
			
		</div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    
    <!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
	<div class="shell">
		<!-- Small Nav -->
		<div class="small-nav"> 
			<a href="home">Home</a>
			<a href="profil.html">Profil </a>
			<a href="contact.html">Hubungi Kami</a>
			<a href="menjadi-penulis.html">Menjadi Penulis</a>
			<a href="download.html">Download</a>
			<a href="agenda.html">Agenda</a>
			<a href="katalog-buku.html">Katalog Buku</a>
		</div>
		<!-- End Small Nav -->
		<!-- Message OK 
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a> 
		</div>
		<!-- End Message OK -->
		<!-- Message Error 
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a> 
		</div>
		<!-- End Message Error -->
		<br>
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			<!-- Content -->
			<div id="content">
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						
						<h2 class="left"><p>
						<div style="width: 250px;"><font size=1><div id="divjam"></div></font></div>
						</p></h2>
						<div class="right">
							<label>search articles</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->
					<!-- Table -->
					<?php include "tengah.php"; ?>
				<!-- Table -->
				</div>
				<!-- End Box -->
				<!-- Box -->
        
			</div>
			<!-- End Content -->
			<!-- Sidebar -->
			<div id="sidebar">
			<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<?php include "kanan.php"; ?>
				</div><p>&nbsp;</p>
			</div>
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->
<!-- Footer -->
<div id="footer">
	<div class="shell"> <span class="left">&nbsp;&nbsp; Copyright &copy; 2011 - Asfamedia Books Store, Support by <a href="http://www.agussaputra.com" target="_blank">ASFA SOLUTION </a></span> <span class="right"></span> </div>
</div>
<!-- End Footer -->
</body>
</html>