<?php
session_start();
error_reporting(0);

if (empty($_SESSION[Username]) AND empty($_SESSION[Password])){
	echo "<link href='../css/login.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
<head>
	<title> Penerbit Asfamedia </title>
	<link rel="stylesheet" href="../css/adminstyle.css" type="text/css">
	<link type="text/css" href="../js/development-bundle/themes/base/ui.all.css" rel="stylesheet" />   

    <script type="text/javascript" src="../js/development-bundle/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/ui.core.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/ui.datepicker.js"></script>   
    <script type="text/javascript" src="../js/development-bundle/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript" src="../js/development-bundle/ui/effects.core.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/effects.drop.js"></script>
	<script language="javascript" type="text/javascript" src="../tinymcpuk/tiny_mce_src.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
</head>
<body>
<table border="0" width="850" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center"><img src="../images/admin.jpg" width="850" height="200"></td>
	</tr>
</table>

<table align="center" width="850" cellpadding="0" cellspacing="0">
	<tr>
		<td width="170" bgcolor="#FFFFFF" valign="top">
		
			<div id="menu">
				<ul>
					<li> <a href=?module=home>&#187; Home </a> </li>
					<?php include "menu.php"; ?>
					<li> <a href=?module=user&act=password>&#187; Ubah Password </a> </li>
					<li> <a href=logout.php>&#187; Logout </a> </li>
				</ul>
			</div>

			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		</td>
		<td width="20" bgcolor="#FFFFFF"></td>
		<td width="640" bgcolor="#FFFFFF" valign="top">
			<p>&nbsp;</p>
			<?php include "konten.php"; ?>
			<p>&nbsp;</p>
		</td>
		<td width="30" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" align="center" bgcolor="#C0C0C0" height=50><font color="#333333" face=tahoma size=2>
			<font color="#333333" face=tahoma size=2> Copyright &copy; 2011 Penerbit Asfamedia </font>
		</td>
	</tr>
</table>
</body>
</html>
<?php
}
?>