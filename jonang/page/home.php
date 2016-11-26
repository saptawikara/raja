

<!--===| Welcome Area Start===|-->
<section class="welcome-area">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-5">
        <div class="welcome-note text-center">
		  <?php
			$welcome=mysql_fetch_array(mysql_query("SELECT * FROM modul where id_modul='94'"));
		    $nama_w  = $_SESSION['bahasa'] == "en" ? "nama_modul_".$_SESSION['bahasa'] : "nama_modul_ina";
			$isi_w  = $_SESSION['bahasa'] == "en" ? "static_content_".$_SESSION['bahasa'] : "static_content_ina";
			?>
			<!-- <h1 style="text-transform: uppercase;"><?php echo $welcome[$nama_w]; ?></h1>  -->
			
<h2 style="margin-top: -29px; font-family: &quot;Times New Roman&quot;;">Raja Tours Indonesia</h2>
<p style="margin-top: 11px;font-family: &quot;Times New Roman&quot;;">
"Travelling more and getting the best serve of Indonesia"
</p>
<p style="margin-top: 12px;font-family: &quot;Times New Roman&quot;;margin-bottom: -24px;">
Raja Tours Indonesia has a concept for the people. We would like to serve the people of the world to have CHANCE. It’s Country, Heritage, Adventure, Nature, Culture, and Education. Let’s explore the world!
 </p>  
      <?php
		//	echo $welcome[$isi_w];
		  ?>
         
        </div>
      </div>
      <div class="col-xs-12 col-md-7">
        
        <div class="row">
          <?php 
			$activity=mysql_query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 2");
			while($ac=mysql_fetch_array($activity)){
			$nama_a  		= $_SESSION['bahasa'] == "en" ? "nama_artikel_".$_SESSION['bahasa'] : "nama_artikel_ina";
			$isi_artikel 	= $_SESSION['bahasa'] == "en" ? "isi_artikel_".$_SESSION['bahasa'] : "isi_artikel_ina"; 
			$isi_a 			= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$ac[$isi_artikel])));			
		    $isi_a			= substr($isi_a,0,strrpos(substr($isi_a,0,50)," "));
		  ?>
		  <div class="col-xs-12 col-sm-6  col-md-6 column-margin">
            <div class="grid">
			  <a href="detail-artikel-<?php echo $ac['id_artikel'].'-'.$ac['seo_ina']; ?>">
              <figure class="effect-cheff">
                <img src="joimg/artikel/<?php echo $ac['gambar']; ?>" alt="<?php echo $ac['seo_ina']; ?>"/>
                <figcaption>
                  <h2><?php echo $ac[$nama_a]; ?></h2>
                  <p><?php echo $isi_a; ?></p> 
                </figcaption>     
              </figure>
			  </a>
            </div>
          </div>
		  
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===| Welcome Area End===|-->



<!--===| Food Menu Start ===|-->
<section class="paket-ovelay food-menu-wrapper">
<div class="tours-ovelay">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
		<?php 
		$tour_pakage  = $_SESSION['bahasa'] == "en" ? "Tour Package" : "Paket Wisata"; 
		$kondisi	  = $_SESSION['bahasa'] == "en" ? "Condition Tour" : "Kondisi Wisata"; 
		
		?>
        <h1><?php echo  $tour_pakage; ?></h1>
      </div>
    </div>
    <div class="row" style="margin-top: 30px;">
	   <?php 
		$kategori_makanan=mysql_query("SELECT * FROM kategori_menu ORDER BY judul_ina ASC");
		while($km=mysql_fetch_array($kategori_makanan)){
			
			
	  ?>
		<div class="col-xs-12 col-md-6" style="margin-bottom: 30px;">
		<h2 class="item-name"><?php echo $km['judul_ina']; ?></h2>
        
			<?php 
				$menu_makanan=mysql_query("SELECT * FROM produk where id_katmenu='$km[id]'");
				while($mm=mysql_fetch_array($menu_makanan)){ 
				$nama_prod 	= $_SESSION['bahasa'] == "en" ? "nama_produk_".$_SESSION['bahasa'] : "nama_produk_ina";
				$seo_prod  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
				$harga 		= format_rupiah($mm['harga']); 
			?>
				  <div class="media menu-media">
					<div class="media-left media-top">
					  <a href="detail-paket-tour-<?php echo $mm[$seo_prod].'-'.$mm['id_produk']; ?>">
						<img src="joimg/produk/<?php echo $mm['gambar']; ?>" alt="<?php echo $mm['seo_ina']; ?>">
					  </a>
					</div><!-- media left-->
					

				  </div>
			<?php } ?>
        </div><!-- /.col-md-6 -->
		<?php } ?>
    </div> <!-- /.row -->
   
  </div>
</div>
 
</section>  
<!--==| Food Menu Start |==-->

<!--===| Event Start|===-->
<section class="event-wrapper section-padding">
  <div class="container">
    <div class="row">
        <div class="col-xs-12">
          <h1><?php $tujuan_wisata	  = $_SESSION['bahasa'] == "en" ? "Destination Tour" : "Tujuan Wisata"; echo $tujuan_wisata; ?></h1>
          <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "Destination Tour Raja Tours Indonesia" : "Tujuan Wisata Raja Tours Indonesia"; ?></p>
        </div>
      </div>
      <div class="row">
        <?php 
		
		$destinasi_wisata=mysql_query("SELECT * FROM promo where status='Y' order by id_promo DESC LIMIT 6"); 
		while($dw=mysql_fetch_array($destinasi_wisata)){
		$nama_p  		= $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
		$seo_p  = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
		
		//kategori kota
		$kk=mysql_fetch_array(mysql_query("SELECT * FROM kategori_furniture where id='$dw[id_katfurniture]'"));
		
		?>
		
		
		
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="single-event">
			<div class="top-btn-gng">
				<a href="tujuan-wisata" class="top-btn-oval"><?php echo $kk['judul_ina']; ?></a>
			</div>
            <a href="destination-tours-<?php echo $dw[$seo_p].'-'.$dw['id_promo']; ?>"><img style="height:200px;" src="joimg/promo/<?php echo $dw['gambar']; ?>" alt="<?php echo $dw['nama_promo_ina']; ?>"></a>
            <div class="content-holder">
            <h2><a href="destination-tours-<?php echo $dw[$seo_p].'-'.$dw['id_promo']; ?>"><?php echo $dw[$nama_p]; ?></a></h2>
                <address>
                  <strong>Place: </strong>
                  <?php echo $dw['tempat']; ?>
                  <br>
                  <strong>Kategori : </strong>
                   <?php echo $dw['kondisi']; ?>
                </address>
                <a class="btn btn-imfo btn-read-more" href="destination-tours-<?php echo $dw[$seo_p].'-'.$dw['id_promo']; ?>">Read more</a>
                </div>
          </div>
        </div>
		
		<?php } ?> 
        
      </div>
  </div>
</section>
<!--===| Event End|===-->
<!--===| Event End|===-->


<!--===|Signature Dishes Start|===-->
  <section class="signature-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1><?php $kat_tours	  = $_SESSION['bahasa'] == "en" ? "Category Tour" : "Kategori wisata"; echo $kat_tours; ?></h1>
          <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "Welcome to Category Tour Website Raja Tours Indonesia" : "Selamat datang di Kategori Wisata Website Raja Tours Indonesia"; ?></p>
        </div>
      </div>
      <div class="row">
         <div class="col-xs-12">
           <div class="owl-wrap">
            <div id="owl-dishes" class="owl-carousel">
              <?php 
				$kategori_wisata=mysql_query("SELECT * FROM wisata order by id_wisata DESC LIMIT 6"); 
				while($ws=mysql_fetch_array($kategori_wisata)){
				$nama_w  		= $_SESSION['bahasa'] == "en" ? "nama_wisata_".$_SESSION['bahasa'] : "nama_wisata_ina";
				$isi_wisata 	= $_SESSION['bahasa'] == "en" ? "isi_wisata_".$_SESSION['bahasa'] : "isi_wisata_ina"; 
				$isi_w 			= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$ws[$isi_wisata])));			
				$isi_w			= substr($isi_w,0,strrpos(substr($isi_w,0,100)," "));
			    $seo_w  		= $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
			  ?>
			  <div class="feature-image">
                    <a href="detail-kategori-wisata-<?php echo $ws[$seo_w].'-'.$ws['id_wisata']; ?>"><img style="height:200px;" src="joimg/wisata/<?php echo $ws['gambar']; ?>" alt="<?php echo $ws[$nama_w]; ?>"></a>
                    <h2> <a href="detail-kategori-wisata-<?php echo $ws[$seo_w].'-'.$ws['id_wisata']; ?>"><?php echo $ws[$nama_w]; ?> </a></h2>
                    <p><?php echo $isi_w; ?></p>
              </div>
              
			<?php } ?>
             
           </div><!-- /.owl-carousel -->
            <div class="owl-controls">
             <a class="next"><i class="flaticon-arrow427"></i></a>
              <a class="prev"><i class="flaticon-arrow413"></i></a>
            </div>
          </div><!-- /.owl-wrap -->
         </div>
      </div>
    </div>
  </section>
  <!--====|Signature Dishes End|====-->

<!--====| Gallery Start |====-->
<section class="galleri-wrapper section-padding">
<div class="container">
  <div class="row">
	<div class="col-xs-12">
	  <h1><?php echo $album; ?></h1>
	  <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "Welcome to Album gallery website Raja tours Indonesia" : "Selamat datang di Album galeri website Raja tours Indonesia"; ?></p>
	</div>
  </div>
  <div class="row">
	<div class="gallery-all-item">
		<?php 
			$album_home=mysql_query("SELECT * FROM album ORDER by id_album DESC LIMIT 12");
			while($gh=mysql_fetch_array($album_home)){
		?>
		<div class="col-xs-12 col-sm-6 col-md-3">
		  <div class="grid">
			<figure class="effect-cheff gallary-image">
			 <img style="height:170px;" src="joimg/album/<?php echo $gh['gambar']; ?>" alt="album galeri raja tours indonesia">
			 <figcaption>
			   <div class="gallary-hover-text">
				<a class="yellow-bar fancybox" href="joimg/album/<?php echo $gh['gambar']; ?>" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
				<a href="galeri-<?php echo $gh['id_album']."-".$gh['seo']; ?>"><p><?php echo $gh['nama']; ?></p></a>
			  </div>
			</figcaption>     
			</figure>
		  </div>              
		</div>
		<?php } ?>
	</div>
</div>
</div>
</section>
<!--====| Gallery End |====-->