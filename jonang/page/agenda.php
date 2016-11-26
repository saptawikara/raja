<!--===| Event Start|===-->
<section class="event-wrapper section-padding">
  <div class="container">
    <div class="row">
        <div class="col-xs-12">
          <h1><?php $tujuan_wisata	  = $_SESSION['bahasa'] == "en" ? "Event Tour" : "Agenda Wisata"; echo $tujuan_wisata; ?></h1>
         <!--  <p class="slogan"><?php //echo $_SESSION['bahasa'] == "en" ? "Event Tour Raja Tours Indonesia" : "Agenda Wisata Raja Tours Indonesia"; ?></p> -->
        </div>
      </div>
      <div class="row">
    <?php 
		$destinasi_wisata=mysql_query("SELECT * FROM agenda order by id_agenda DESC"); 
		while($dw=mysql_fetch_array($destinasi_wisata)){
		$nama_p  		= $_SESSION['bahasa'] == "en" ? "nama_agenda_".$_SESSION['bahasa'] : "nama_agenda_ina";
		?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="single-event">
			
            <a href="detail-agenda-<?php echo $dw['seo_ina'].''.$dw['id_agenda']; ?>"><img style="height:200px;" src="joimg/agenda/<?php echo $dw['gambar']; ?>" alt="<?php echo $dw['nama_agenda_ina']; ?>"></a>
            <div class="content-holder">
            <h2><a href="#-"><?php echo $dw[$nama_p]; ?></a></h2>
                <address>
                  <strong>Tgl Acara: </strong>
                  <?php echo $dw['tanggal_acara']; ?>
                  <br>
                  <strong>Waktu Acara : </strong>
                   <?php echo $dw['waktu_acara']; ?>
                </address>
                <a class="btn btn-imfo btn-read-more" href="detail-agenda-<?php echo $dw['seo_ina'].'-'.$dw['id_agenda']; ?>">Read more</a>
                </div>
          </div>
        </div>
		<?php } ?> 
      </div>
  </div>
</section>
<!--===| Event End|===-->