<!--====| Gallery Start |====-->
<section class="galleri-wrapper section-padding">
<div class="container">
  <div class="row">
	<div class="col-xs-12">
	  <h1><?php echo $_SESSION['bahasa'] == "en" ? "Album Gallery" : "Album Galeri"; ?></h1>
	  <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "Welcome to album gallery website Raja Tours Indonesia" : "Selamat datang di album website Raja Tours Indonesia"; ?></p>
	</div>
  </div>
  <div class="row">
	<div class="gallery-all-item">
		<?php 
			$album_galeri=mysql_query("SELECT * FROM album ORDER by id_album");
			while($ag=mysql_fetch_array($album_galeri)){
		?>
		<div class="col-xs-12 col-sm-6 col-md-3">
		  <div class="grid">
			<figure class="effect-cheff gallary-image">
			 <img style="height:170px;" src="joimg/album/<?php echo $ag['gambar']; ?>" alt="album galeri Cengkir">
			 <figcaption>
			   <div class="gallary-hover-text">
				<a class="yellow-bar fancybox" href="joimg/album/<?php echo $ag['gambar']; ?>" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
				<a href="galeri-<?php echo $ag['id_album']."-".$ag['seo']; ?>"><p><?php echo $ag['nama']; ?></p></a>
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