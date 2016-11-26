<!--====| Shuffle Gallery Style Sta rt|====--> 
  <section class="galleri-wrapper section-padding">
    <div class="container"> 
      <div class="row"> 
        <div class="col-xs-12"> 
          <h1><?php echo $_SESSION['bahasa'] == "en" ? "Category Tour " : "Kategori Wisata" ; ?></h1>

       
		  <p class="slogan"><?php //echo $_SESSION['bahasa'] == "en" ? "This is a Category Tour Raja Tours Indonesia " : "Ini adalah beberapa Kategori Wisata Raja Tours Travel"; ?></p>
         
        </div>
      </div>

      <div class="row"> 
      <div id="grid">
      <!-- portfolio-item -->
		  <?php
			$wisataa=mysql_query("SELECT * FROM wisata ORDER BY id_wisata DESC");
			while($pr=mysql_fetch_array($wisataa)){
			$nama_k  = $_SESSION['bahasa'] == "en" ? "nama_wisata_".$_SESSION['bahasa'] : "nama_wisata_ina";
			$seo_k  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
		  ?>
          <div class="portfolio-item col-xs-12 col-sm-6 col-md-4">
            <div class="portfolio grid">
            <figure class="effect-cheff gallary-image">
              <img style="height:200px;" src="joimg/wisata/<?php echo $pr['gambar']; ?>" alt="<?php echo $pr['seo_ina']; ?>"/>
              <figcaption>
				<?php $ab_kota=mysql_fetch_array(mysql_query("SELECT * FROM kategori_furniture where id='$pr[id_katfurniture]'")); ?>
                <div class="gallary-hover-text">
                  <a class="yellow-bar fancybox" href="joimg/wisata/<?php echo $pr['gambar']; ?>" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
                  <p><?php echo $pr[$nama_k]; ?></p>
                </div>
              </figcaption>     
            </figure>
          </div> 
		  <div class="box-gng">
		 	<a href="detail-kategori-wisata-<?php echo $pr[$seo_k].'-'.$pr['id_wisata']; ?>"><?php echo $pr[$nama_k]; ?></a>

			<a href="detail-kategori-wisata-<?php echo $pr[$seo_k].'-'.$pr['id_wisata']; ?>"> <i title="Read more" style="float : right;" class="fa fa-arrow-circle-right"></i></a>
		  </div>
        </div><!-- col-xs-12 -->
		
		<?php } ?>
    
      </div> <!-- grid -->
    </div><!-- row -->
  </div><!-- container -->
</section> 
<!--====| Shuffle Gallery Style End |====-->