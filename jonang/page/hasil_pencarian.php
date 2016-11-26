<!--==| Kegiatan Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<section class="galleri-wrapper">
			 <?php $search = $_GET['search']; ?>
			 <h2 class="text-left">Hasil Pencarian "<?php echo $search; ?>"</h2>
			  <div class="row"> 
				  <div id="grid">
				  <!-- portfolio-item -->
					  <?php
						
						$nama  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
						$prod=mysql_query("SELECT * FROM promo where $nama LIKE '%$search%' ORDER BY id_promo");
						$nums= mysql_num_rows($prod);
						if($nums == 0){ 
						
						echo"Not Found !";
						
						}else{
						while($pr=mysql_fetch_array($prod)){
						$nama_k  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
						$seo_k  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
					  ?>
					  <div class="portfolio-item col-xs-12 col-sm-6 col-md-4" >
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
					
					<?php } }?>

				  </div> <!-- grid -->
			  </div><!-- row -->
			</section>
			
			
			
		</div>
	</div>
</section>
<!--==| Kegiatan Content End|==-->