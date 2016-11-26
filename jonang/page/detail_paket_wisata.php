<!--==| Kegiatan Content Start|==-->
<section class="event-contents-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<?php 
					$paket=mysql_fetch_array(mysql_query("SELECT * FROM produk where id_produk='$_GET[id]'"));
					$nama_paket  = $_SESSION['bahasa'] == "en" ? "nama_produk_".$_SESSION['bahasa'] : "nama_produk_ina";
					$isi_paket   = $_SESSION['bahasa'] == "en" ? "isi_produk_".$_SESSION['bahasa'] : "isi_produk_ina";
					$tgl = date('d', strtotime($paket['tanggal']));
					$bln = date('M', strtotime($paket['tanggal']));
					$thn = date('Y', strtotime($paket['tanggal']));
					$harga 		= format_rupiah($paket['harga']);
				?>
				<div class="events-contents-wrap-one">
					<div class="event-content">
					<img src="joimg/produk/<?php echo $paket['gambar']; ?>" alt="paket cengkir">
					<!--<div class="date-image-paket">
						<div class="date-text-paket"> 
							<p>Harga Mulai</p>
							<span> --><?php //echo $harga; ?><!--</span>
						</div>
					</div> -->
				</div>
				<div class="event-heading">
					<h1><a href="#"><?php echo $paket[$nama_paket]; ?></a></h1>
					<div class="detail-paket">
						<i class="fa fa-calendar"> Tanggal : <?php echo $tgl.', '.$bln.' '.$thn ; ?></i>
						 <!-- Go to www.addthis.com/dashboard to customize your tools -->
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54bc99eb04210058" async="async"></script>
						<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_sharing_toolbox"></div>
					
					</div>
					<?php echo $paket[$isi_paket]; ?>
				</div>
				</div>
				<hr />
				<section class="contact-wrapper">
				  <div class="form-wrapper">
					<h1>Form Reservation</h1>
					<form id='contact_form' name="enqueryForm" method="post" action="proses-reservasi">
					  <input type="hidden" class="form-control" name="id_paket" value="<?php echo $_GET['id']; ?>">
					  <div class="row">
						<div class="col-xs-12 col-sm-12">
						  <input type="text" class="form-control" name="nama" placeholder="name">
						</div>
						<div class="col-xs-12 col-sm-12">
						  <input type="text" class="form-control" name="phone" placeholder="phone">
						</div>
						<div class="col-xs-12 col-sm-12">
						  <input id="email" type="email" class="form-control" name="email" placeholder="e-mail">
						</div>
						<div class="col-xs-12 col-sm-12">
						  <input type="text" class="form-control" name="subject" placeholder="subject">
						</div>
						<div class="col-xs-12 col-sm-12">
						  <textarea id="message" class="form-control" rows="4" name="message" placeholder="message"></textarea>
						</div>
					   <div class="col-xs-12 col-sm-12">
							<div class="col-md-6">
								<img src="captcha/captcha.php?rand=<?php echo rand();?>" id='captcha_img'>
							</div>
						
							<input id="captcha_code" name="captcha_code" type="text" class="form-control" placeholder="Enter Captcha" style="width: 100%;" required>
							Can't read the image? click <a href='javascript: refresh_Captcha();'>here</a> to refresh.<br>
						</div>
					   <button type="submit" class="btn btn-primary">Submit Reservation</button>
					  </div>
					</form>
				  </div>
				</section>
			</div>			
			<div class="col-xs-12 col-sm-4 col-md-4">
				<?php include "jonang/sidebar_right.php"; ?>
			</div><!-- /.col-md-4 -->
		</div>
	</div>
</section>
<!--==| Kegiatan Content End|==