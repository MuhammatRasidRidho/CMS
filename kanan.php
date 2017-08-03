<link rel="stylesheet" href="css/ticker.css" type="text/css">
<script src="js/jquery.ticker.js" type="text/javascript"></script>
<script type="text/javascript">
	  $(function() {
	  
		//cache the ticker
		var ticker = $("#ticker");
		  
		//wrap dt:dd pairs in divs
		ticker.children().filter("dt").each(function() {
		  
		  var dt = $(this),
		    container = $("<div>");
		  
		  dt.next().appendTo(container);
		  dt.prependTo(container);
		  
		  container.appendTo(ticker);
		});
				
		//hide the scrollbar
		ticker.css("overflow", "hidden");
		
		//animator function
		function animator(currentItem) {
		    
		  //work out new anim duration
		  var distance = currentItem.height();
			duration = (distance + parseInt(currentItem.css("marginTop"))) / 0.025;

		  //animate the first child of the ticker
		  currentItem.animate({ marginTop: -distance }, duration, "linear", function() {
		    
			//move current item to the bottom
			currentItem.appendTo(currentItem.parent()).css("marginTop", 0);

			//recurse
			animator(currentItem.parent().children(":first"));
		  }); 
		};
		
		//start the ticker
		animator(ticker.children(":first"));
				
		//set mouseenter
		ticker.mouseenter(function() {
		  
		  //stop current animation
		  ticker.children().stop();
		  
		});
		
		//set mouseleave
		ticker.mouseleave(function() {
		          
          //resume animation
		  animator(ticker.children(":first"));
		  
		});
	  });
    </script>
<div class="box-head">
	<h2>Buku Baru</h2>
</div>
<!-- End Box Head-->
<div class="sidebar"> 
	<div id="tickerContainer">
		<dl id="ticker">
			<?php
			$sql = mysql_query("SELECT * FROM tartikel ORDER BY id_artikel DESC LIMIT 3");
			while ($data = mysql_fetch_array($sql)){
				$isi = substr($data[isi],0,100);
				echo "<div align='center'><dt class='heading'><img src='gambar/articles/thumbs/thumb_$data[gambar]' width='80'><br><a href='artikel-$data[id_artikel]-$data[judul_seo].html'>$data[judul]</a></dt></div><div align='justify'><dd class='text'>$isi ...</dd></div>";
			}
			?>
		</dl>
	</div>
</div>
<p>&nbsp;</p>

<div class="box-head">
	<h2>Polling</h2>
</div>
<!-- End Box Head-->
<div class="sidebar"> 
	<div id="tickerContainer">
		<dl id="tickerPolling">
			<?php
			$sql = mysql_fetch_array(mysql_query("SELECT * FROM tpolling WHERE aktif = 'Y' AND status='1'"));
			echo "<b>$sql[pilihan]</b><br>";
			
			$query = mysql_query("SELECT * FROM tpolling WHERE aktif = 'Y' AND status='2'");
			echo "<form method='POST' action='vote-polling.html'>";
			while ($data = mysql_fetch_array($query)){
				echo "<input type='radio' name='pilihan' value='$data[id_polling]'> $data[pilihan] <br>";
			}
			echo "<input type='submit' name='submit' value='Vote'><a href='hasil-polling.html'><input type='button' value='Lihat Hasil'></a></form>";
			?>
		</dl>
	</div>
</div>
<p>&nbsp;</p>
<div class="box-head">
	<h2>Statistika Pengunjung</h2>
</div>
<!-- End Box Head-->
<div class="sidebar"> 
	<div id="tickerContainer">
		<dl id="tickerPolling">
			<?php
			$ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
			$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
			$waktu   = time(); // 

			// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
			$s = mysql_query("SELECT * FROM tstatistik WHERE ip='$ip' AND tanggal='$tanggal'");
			// Kalau belum ada, simpan data user tersebut ke database
			if(mysql_num_rows($s) == 0){
				mysql_query("INSERT INTO tstatistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
			} 
			else{
				mysql_query("UPDATE tstatistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
			}

			$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM tstatistik WHERE tanggal='$tanggal' GROUP BY ip"));
			$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM tstatistik"), 0); 
			$tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM tstatistik"), 0); 
			$bataswaktu       = time() - 300;
			$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM tstatistik WHERE online > '$bataswaktu'"));

			echo "<img src=images/counter/hariini.png> Pengunjung hari ini : $pengunjung <br>
				<img src=images/counter/total.png> Total pengunjung    : $totalpengunjung <br>
				<img src=images/counter/online.png> Pengunjung Online: $pengunjungonline<br>";
			?>
		</dl>
	</div>
</div>

<p>&nbsp;</p>
<div class="box-head">
	<h2>Partner Link</h2>
</div>
<!-- End Box Head-->
<div class="sidebar"> 
	<div id="tickerContainer">
		<dl id="tickerPolling">
			<?php
			$sql = mysql_query("SELECT * FROM tlink WHERE aktif = 'Y' ORDER BY id_link ASC");
			while ($data = mysql_fetch_array($sql)){
				echo "<div align='center'><dt class='heading'><a href='http://$data[url]' target='_blank'><img src='gambar/links/$data[gambar]' width='150'><br><b>$data[nama]</b></a></dt></div><div align='justify'><hr color='#ccc999' style='margin: 5px;'></div>";
			}
			?>
		</dl>
	</div>
</div>





































<!--
<div class="box-head">
	<h2>Buku Baru</h2>
</div>
<!-- End Box Head--
<div class="box-content"> <a href="#" class="add-button"><span>Add new Article</span></a>
	<div class="cl">&nbsp;</div>
		<p class="select-all">
			<input type="checkbox" class="checkbox" />
			<label>select all</label>
		</p>
		<p><a href="#">Delete Selected</a></p>
		<!-- Sort --
		<div class="sort">
			<label>Sort by</label>
			<select class="field">
				<option value="">Title</option>
			</select>
			<select class="field">
				<option value="">Date</option>
			</select>
			<select class="field">
				<option value="">Author</option>
			</select>
		</div>
		<!-- End Sort --
	</div>
</div>
-->