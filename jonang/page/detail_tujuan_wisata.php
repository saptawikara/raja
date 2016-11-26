<!--==| Kegiatan Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$tujuan=mysql_fetch_array(mysql_query("SELECT * FROM promo where id_promo='$_GET[id]'"));
					$nama_tujuan  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
					$isi_tujuan   = $_SESSION['bahasa'] == "en" ? "isi_promo_".$_SESSION['bahasa'] : "isi_promo_ina";
					$tgl = date('d', strtotime($tujuan['tanggal']));
					$bln = date('M', strtotime($tujuan['tanggal']));
				?>
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/promo/<?php echo $tujuan['gambar']; ?>" alt="tujuan cengkir">
					<!--<div class="date-image">
						<div class="date-text">
							<p><?php echo $bln; ?></p>
							<span><?php echo $tgl; ?></span>
						</div>
						
					</div> -->
				</div>
				<div class="event-heading">
					<h1><a href="#"><?php echo $tujuan[$nama_tujuan]; ?></a></h1>
					<?php echo $tujuan[$isi_tujuan]; ?>
				</div>
				</div>
				
				<section class="galleri-wrapper">
				  <div class="row"> 
					  <div id="grid">
					  <!-- portfolio-item -->
						  <?php
							$prod=mysql_query("SELECT * FROM promo where id_katfurniture='$tujuan[id_katfurniture]' ORDER BY id_promo LIMIT 9");
							while($pr=mysql_fetch_array($prod)){
							$nama_k  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
							$seo_k  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
						  ?>
						  <div class="portfolio-item col-xs-12 col-sm-6 col-md-6" >
							<div class="portfolio grid">
							<figure class="effect-cheff gallary-image">
							  <img style="height:200px;" src="joimg/promo/<?php echo $pr['gambar']; ?>" alt="<?php echo $pr['seo_ina']; ?>"/>
							  <figcaption>
								<?php $ab_kota=mysql_fetch_array(mysql_query("SELECT * FROM kategori_furniture where id='$pr[id_katfurniture]'")); ?>
								<div class="gallary-hover-text">
								  <a class="yellow-bar fancybox" href="joimg/promo/<?php echo $pr['gambar']; ?>" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
								  <p><?php echo $pr[$nama_k]; ?></p>
								</div>
							  </figcaption>     
							</figure>
						  </div> 
						  <div class="box-gng">
							<a href="destination-tours-<?php echo $pr[$seo_k].'-'.$pr['id_promo']; ?>"><?php echo $pr[$nama_k]; ?></a>

							<a href="destination-tours-<?php echo $pr[$seo_k].'-'.$pr['id_promo']; ?>"> <i title="Read more" style="float : right;" class="fa fa-arrow-circle-right"></i></a>
						  </div>
						</div><!-- col-xs-12 -->
						
						<?php } ?>

					  </div> <!-- grid -->
				  </div><!-- row -->
				</section>
			
			
			</div>
			
			
			
			
			
			
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php include "jonang/sidebar_right.php"; ?>
			</div><!-- /.col-md-4 -->
		</div>
	</div>
</section>
<!--==| Kegiatan Content End|==-->