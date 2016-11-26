<!--===| breadcrumb Banner Start|===-->
<?php include "jonang/breadcrumb.php"; ?>
<!--===| breadcrumb Banner End|===-->

<!--==| Events Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$artikel=mysql_fetch_array(mysql_query("SELECT * FROM artikel where id_artikel='$_GET[id]'"));
					$nama_artikel  = $_SESSION['bahasa'] == "en" ? "nama_artikel_".$_SESSION['bahasa'] : "nama_artikel_ina";
					$isi_artikel   = $_SESSION['bahasa'] == "en" ? "isi_artikel_".$_SESSION['bahasa'] : "isi_artikel_ina";
					$tgl = date('d', strtotime($artikel['tanggal']));
					$bln = date('M', strtotime($artikel['tanggal']));
				?>
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/artikel/<?php echo $artikel['gambar']; ?>" alt="artikel cengkir">
					<div class="date-image">
						<div class="date-text">
							<p><?php echo $bln; ?></p>
							<span><?php echo $tgl; ?></span>
						</div>
						
					</div>
				</div>
				<div class="event-heading">
					<h1><a href="#"><?php echo $artikel[$nama_artikel]; ?></a></h1>
					<?php echo $artikel[$isi_artikel]; ?>
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