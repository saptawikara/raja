  <!--===| Our Team Start|===-->
  <section class="section-padding our-team-section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
        <h2><?php echo $_SESSION['bahasa'] == "en" ? "Video" : "Vidio" ; ?></h2>
		<p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "List Video Raja Tours Indonesia" : "Daftar Vidio Raja Tours Indonesia"; ?></p>
        </div>
      </div>
      <div class="row">
        
		<?php 
			$vivud=mysql_query("SELECT * FROM video ORDER by id DESC");
			while($vv=mysql_fetch_array($vivud)){
		?>
		<div class="col-xs-12 col-sm-4">
          <div class="team-wrapper">
           <iframe style="width:100%; height:400px;" src="<?php echo $vv['video']; ?>" frameborder="0" allowfullscreen></iframe>
            
            <div class="contents">
              <p><?php echo $vv['judul']; ?></p>
            </div>
          </div>
        </div>
		<?php } ?>
		
      </div>
    </div>
  </section>