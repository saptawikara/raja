	<div id="custom-search-input">
	<form action="pencarian" method="GET">
	     <input name="mod" value="pencarian" type="hidden">
		<div class="input-group col-md-12">
		  <input name="search" class="search-query form-control" type="text" placeholder="Enter Your Search">
		  <span class="input-group-btn">
			<button class="btn btn-danger btn-search" type="submit">
			  <span class="flaticon-search74"></span>
			</button>
		  </span><!-- /.input-group-btn -->
		</div><!-- /.input-group -->
	</form>
	</div>
	<div class="right-side-image">
		<?php 
		/*	$sidebar_a=mysql_query("SELECT * FROM artikel ORDER by id_artikel DESC");
			while($sa=mysql_fetch_array($sidebar_a)){
			$nama_ka  = $_SESSION['bahasa'] == "en" ? "nama_artikel_".$_SESSION['bahasa'] : "nama_artikel_ina";
			$isi_ka   = $_SESSION['bahasa'] == "en" ? "isi_artikel_".$_SESSION['bahasa'] : "isi_artikel_ina";
			$tgl_a = date('d', strtotime($sa['tanggal']));
			$bln_a = date('M', strtotime($sa['tanggal']));
			$thn_a = date('Y', strtotime($sa['tanggal']));
			
			$isi_sa = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$sa[$isi_ka])));			
			$isi_sa = substr($isi_a,0,strrpos(substr($isi_sa,0,500)," "));*/
		?>
<!-- 		<div class="media event-media">
			<div class="media-left media-top">
			  <a href="events-details.html">
				<img src="joimg/artikel/<?php echo $sa['gambar']; ?>" alt="<?php echo $sa['seo_ina']; ?>">
			  </a>
			</div>
			<div class="media-body">
			  <h3><a href="detail-artikel-<?php echo $sa['id_artikel'].'-'.$sa['seo_ina']; ?>"><?php echo $sa[$nama_ka]; ?></a></h3> 
			  <p class="date-of-event"><?php echo $tgl_a; ?></p> 
			  <p class="month-of-event"><?php echo $bln_a.' '.$thn_a ; ?><br><span>TUESDAY</span></p>
			</div>
		</div> -->

		<!-- event-media -->
		<?php //} ?>

		
		<div class="categories archive">
		  <h3 class="h3" style="margin-top: -50px;"><?php echo $_SESSION['bahasa'] == "en" ? "Destination Tour" : "Tujuan Wisata" ; ?></h3>
		  <ul class="list-unstyled">
			<?php 
				$sidebar_a=mysql_query("SELECT * FROM promo ORDER by id_promo DESC LIMIT 10");
				while($qq=mysql_fetch_array($sidebar_a)){
				$nama_sd  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
				$seo_sd   = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
			?>
			<li><a href="destination-tours-<?php echo $qq[$seo_sd]."-".$qq['id_promo']; ?>"><?php echo $qq[$nama_sd]; ?></a></li>
				<?php } ?>
		  </ul>
		</div>
	</div><!-- /.right-side-image -->