<!--==| Kegiatan Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$agenda=mysql_fetch_array(mysql_query("SELECT * FROM agenda where id_agenda='$_GET[id]'"));
					$nama_agenda  = $_SESSION['bahasa'] == "en" ? "nama_agenda_".$_SESSION['bahasa'] : "nama_agenda_ina";
					$isi_agenda   = $_SESSION['bahasa'] == "en" ? "isi_agenda_".$_SESSION['bahasa'] : "isi_agenda_ina";
					$tgl = date('d', strtotime($agenda['tanggal']));
					$bln = date('M', strtotime($agenda['tanggal']));
				?>
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/agenda/<?php echo $agenda['gambar']; ?>" alt="agenda cengkir">
					<!-- <div class="date-image">
						<div class="date-text">
							<p><?php //echo $bln; ?></p>
							<span><?php //echo $tgl; ?></span>
						</div>	
					</div> -->
				</div>
				<div class="event-heading">
					<h1><a href="#"><?php echo $agenda[$nama_agenda]; ?></a></h1>
					<?php echo $agenda[$isi_agenda]; ?>
				</div>
				</div>
					
				<section class="galleri-wrapper">
				  <div class="row">
					<div class="col-xs-12">
					  <p class="slogan"><?php echo $_SESSION['bahasa'] == "en" ? "Don't miss it" : "Jangan sampai ketinggalan"; ?></p>
					</div>
				  </div>
				  <div class="row">
					<div class="gallery-all-item">
						<?php 
							$album_agenda=mysql_query("SELECT * FROM subagenda where id_agenda='$_GET[id]' ORDER by id DESC");
							while($ag=mysql_fetch_array($album_agenda)){
						?>
						<div class="col-xs-12 col-sm-6 col-md-4">
						  <div class="grid">
							<figure class="effect-cheff gallary-image">
							 <img style="height:170px;" src="joimg/subagenda/<?php echo $ag['gambar']; ?>" alt="subagenda Raja tours indonesia">
							 <figcaption>
							   <div class="gallary-hover-text">
								<a class="yellow-bar fancybox" href="joimg/subagenda/<?php echo $ag['gambar']; ?>" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
								<a href="<?php echo $ag['link']; ?>"><p><?php echo $ag['judul']; ?></p></a>
							  </div>
							</figcaption>     
							</figure>
						  </div>              
						</div>
						<?php } ?>
					</div>
				</div>
				</section>


			
			</div>
			
			
			
			
			
			
			
			
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php include "jonang/sidebar_right.php"; ?>
			</div><!-- /.col-md-4 -->
		</div>
	</div>
</section>
<!--==| Kegiatan Content End|==-->

