<!--==| Kegiatan Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$kegiatan=mysql_query("SELECT * FROM produk where id_katmenu='$_GET[id]' ORDER BY id_produk");
					while($kg=mysql_fetch_array($kegiatan)){
					$nama_k  = $_SESSION['bahasa'] == "en" ? "nama_produk_".$_SESSION['bahasa'] : "nama_produk_ina";
					$isi_k   = $_SESSION['bahasa'] == "en" ? "isi_produk_".$_SESSION['bahasa'] : "isi_produk_ina";
					$seo_k  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
					$tgl = date('d', strtotime($kg['tanggal']));
					$bln = date('M', strtotime($kg['tanggal']));
					
					$isi_a = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$kg[$isi_k])));			
					$isi_a = substr($isi_a,0,strrpos(substr($isi_a,0,300)," "));
					
					$harga 		= format_rupiah($kg['harga']); 
				?>
				
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/produk/<?php echo $kg['gambar']; ?>" alt="<?php echo $kg['seo_ina']; ?>">
					<!--<div class="date-image-paket">
						<div class="date-text-paket">
							<p>Harga Mulai</p>
							<span><?php //echo $harga; ?>
							<!--</span>
						</div>
					</div> -->
				</div>
				<div class="event-heading">
					<h1><a href="detail-paket-tour-<?php echo $kg[$seo_k].'-'.$kg['id_produk']; ?>"><?php echo $kg[$nama_k]; ?></a></h1>
					<div class="kat-sub-paket">Kondisi Wisata : <?php echo $kg['kondisi']; ?> </div>
					<?php echo $isi_a; ?><br />
					<a class="btn btn-imfo btn-read-more" href="detail-paket-tour-<?php echo $kg[$seo_k].'-'.$kg['id_produk']; ?>" >Read more</a>
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