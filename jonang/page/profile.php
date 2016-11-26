
<!--==| Events Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$sejarah=mysql_fetch_array(mysql_query("SELECT * FROM profile where id_profile='9'"));
					$nama_sejarah  = $_SESSION['bahasa'] == "en" ? "nama_profile_".$_SESSION['bahasa'] : "nama_profile_ina";
					$isi_sejarah   = $_SESSION['bahasa'] == "en" ? "isi_profile_".$_SESSION['bahasa'] : "isi_profile_ina";
					$tgl = date('d', strtotime($sejarah['tanggal']));
					$bln = date('M', strtotime($sejarah['tanggal']));
				?>
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/profile/<?php echo $sejarah['gambar']; ?>" alt="Sejarah cengkir">
					<div class="date-image">
						<!-- <div class="date-text">
							<p><?php // echo $bln; ?></p>
							<span><?php // echo $tgl; ?></span>
						</div> -->
						
					</div>
				</div>
				<div class="event-heading">
					<h1><a href="#"><?php echo $sejarah[$nama_sejarah]; ?></a></h1>
					<?php echo $sejarah[$isi_sejarah]; ?>
				</div>
				</div>
				
			</div>

			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php include "jonang/sidebar_right.php"; ?>
			</div><!-- /.col-md-4 -->
		</div>
	</div>
</section>
<!--==| Events Content End|==-->