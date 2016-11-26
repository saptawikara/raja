<!--==| Kegiatan Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$kegiatan=mysql_query("SELECT * FROM artikel ORDER BY id_artikel");
					while($kg=mysql_fetch_array($kegiatan)){
					$nama_k  = $_SESSION['bahasa'] == "en" ? "nama_artikel_".$_SESSION['bahasa'] : "nama_artikel_ina";
					$isi_k   = $_SESSION['bahasa'] == "en" ? "isi_artikel_".$_SESSION['bahasa'] : "isi_artikel_ina";
					$tgl = date('d', strtotime($kg['tanggal']));
					$bln = date('M', strtotime($kg['tanggal']));
					
					$isi_a = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$kg[$isi_k])));			
					$isi_a = substr($isi_a,0,strrpos(substr($isi_a,0,500)," "));
				?>
				
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/artikel/<?php echo $kg['gambar']; ?>" alt="<?php echo $kg['seo_ina']; ?>">
					<div class="date-image">
						<div class="date-text">
							<p><?php echo $bln; ?></p>
							<span><?php echo $tgl; ?></span>
						</div>
					</div>
				</div>
				<div class="event-heading">
					<h1><a href="detail-artikel-<?php echo $kg['id_artikel'].'-'.$kg['seo_ina']; ?>"><?php echo $kg[$nama_k]; ?></a></h1>
					<?php echo $isi_a; ?><br />
					<a class="btn btn-imfo btn-read-more" href="detail-artikel-<?php echo $kg['id_artikel'].'-'.$kg['seo_ina']; ?>" >Read more</a>
				</div>
				</div>
				
				<?php } ?>
			
			</div>
			
			
			
			
			
			
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php include "jonang/sidebar_right.php"; ?>
			</div><!-- /.col-md-4 -->
		</div>
	</div>
</section>
<!--==| Kegiatan Content End|==-->