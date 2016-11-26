<!--====| Shuffle Gallery Style Sta rt|====--> 
  <section class="galleri-wrapper section-padding">
    <div class="container"> 
      <div class="row"> 
        <div class="col-xs-12"> 
          <h1><?php echo $_SESSION['bahasa'] == "en" ? "Destination Tour " : "Tujuan Wisata" ; ?></h1>
		  <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "This is a Destination Raja Tours Indonesia " : "Ini adalah beberapa tujuan wisata Raja Tours Travel"; ?></p>
        </div>
      </div>

      <div class="row"> 
      <div class="gallery-trigger">
          <ul id="filter">
             <li><a class="active" href="#" data-group="total">all</a></li>
			 <?php 
			  $kota=mysql_query("SELECT * FROM kategori_furniture ORDER BY id DESC");
			  while($kg=mysql_fetch_array($kota)){
			 ?>
				<li><a href="#" data-group="<?php echo $kg['judul_ina']; ?>"><?php echo $kg['judul_ina']; ?></a></li> 
			 <?php } ?>
          </ul> 
      </div>

      <div id="grid">
      <!-- portfolio-item -->
		  <?php
			$prod=mysql_query("SELECT * FROM promo ORDER BY id_promo");
			while($pr=mysql_fetch_array($prod)){
			$nama_k  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
			$seo_k  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
		  ?>
          <div class="portfolio-item col-xs-12 col-sm-6 col-md-4" 
			
			data-groups='[ <?php 
			  $kota1=mysql_query("SELECT * FROM kategori_furniture where id='$pr[id_katfurniture]'");
			  while($kg1=mysql_fetch_array($kota1)){
			  echo '"'.$kg1['judul_ina'].'",';
			  }
			  echo '"total"';
			?>]'>
			 
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
  </div><!-- container -->
</section> 
<!--====| Shuffle Gallery Style End |====-->