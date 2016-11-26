<!--====| Gallery Start |====-->
<section class="galleri-wrapper section-padding">
<div class="container">
  <div class="row">
	<div class="col-xs-12">
	  <?php $gl = mysql_fetch_array(mysql_query("SELECT * FROM album where id_album = '$_GET[id]'")); ?>
	  <h1><?php echo $_SESSION['bahasa'] == "en" ? "Gallery ".$gl['nama'] : "Galeri ".$gl['nama'] ; ?></h1>
	  <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "Welcome to gallery website Cengkir" : "Selamat datang di galeri website Cengkir"; ?></p>
	</div>
  </div>
  <div class="row">
	<div class="gallery-all-item">
		<?php 
			$gg=mysql_query("SELECT * FROM galeri where id_album = '$_GET[id]'");
			while($as=mysql_fetch_array($gg)){
		?>
		<div class="col-xs-12 col-sm-6 col-md-3">
		  <div class="grid">
			<figure class="effect-cheff gallary-image">
			 <img style="height:170px;" src="joimg/galeri/<?php echo $as['gambar']; ?>" alt="galeri Cengkir">
			 <figcaption>
			   <div class="gallary-hover-text">
				<a class="yellow-bar fancybox" href="joimg/galeri/<?php echo $as['gambar']; ?>" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
				<a href="#"><p><?php echo $as['nama']; ?></p></a>
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