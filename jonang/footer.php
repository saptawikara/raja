<!--====| Footer section Start|====-->
<footer>
	<div class="footer-top">
	  <div class="container">
		<div class="row">
<?php /*
		<div class="col-xs-12 col-sm-6 col-md-4">
		   <?php
			$pf=mysql_fetch_array(mysql_query("SELECT * FROM profile_footer where id_profile_footer='10'"));
			$nama_pf  = $_SESSION['bahasa'] == "en" ? "nama_profile_footer_".$_SESSION['bahasa'] : "nama_profile_footer_ina";
			$isi_pf  = $_SESSION['bahasa'] == "en" ? "isi_profile_footer_".$_SESSION['bahasa'] : "isi_profile_footer_ina";
		  ?>
		  <h3 class="footer-title"><?php echo $pf[$nama_pf]; ?></h3>
		  <div>
			<?php echo $pf[$isi_pf]; ?>
		  </div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-3">
		  <?php
			$oh=mysql_fetch_array(mysql_query("SELECT * FROM modul where id_modul='3'"));
			$nama_oh  = $_SESSION['bahasa'] == "en" ? "nama_modul_".$_SESSION['bahasa'] : "nama_modul_ina";
			$isi_oh  = $_SESSION['bahasa'] == "en" ? "static_content_".$_SESSION['bahasa'] : "static_content_ina";
		  ?>
		  <h3 class="footer-title"><?php echo $oh[$nama_oh]; ?></h3>
		  <div class="open-time opening-time">
			<?php echo $oh[$isi_oh]; ?>
		  </div>
		</div>
		*/ ?>
		<div class="col-xs-12 col-sm-6 col-md-6">
		  <?php
			$cf=mysql_fetch_array(mysql_query("SELECT * FROM modul where id_modul='4'"));
			$nama_cf  = $_SESSION['bahasa'] == "en" ? "nama_modul_".$_SESSION['bahasa'] : "nama_modul_ina";
			$isi_cf   = $_SESSION['bahasa'] == "en" ? "static_content_".$_SESSION['bahasa'] : "static_content_ina";
		  ?>
		  <h3 class="footer-title"><?php echo $cf[$nama_cf]; ?></h3>
		  <div class="address">



			<?php echo $cf[$isi_cf]; ?>
		  </div>
				<ul style="display:flex;">
				<?php 
					$sosmed=mysql_query("SELECT * FROM sosial ORDER by id DESC");
					while($so=mysql_fetch_array($sosmed)){
				?>
					<li style="margin-right: -3px;"><a href="<?php echo $so['link']; ?>"><img src="joimg/sosial/<?php echo $so['gambar']; ?>" style="padding:5px;"></a></li>
				  <?php } ?> 
				</ul>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6" style="margin-top: -80px;">
		  <!-- <h3 class="footer-title">Gallery</h3> -->
		  <div class="images-gellary">
			<ul>
			   <?php 
				$menu_galeri=mysql_query("SELECT * FROM modul where id_modul = '7'");
				//while(
					$mg=mysql_fetch_array($menu_galeri);//){
			  ?>
			  <iframe src="<?php echo $mg['extra'];?>" width="100%" height="300px"></iframe>
				<!-- <li><a href="#"><img src="joimg/galeri/<?php //echo $mg['gambar']; ?>" alt="Gallery raja tours indonesia"></a></li> -->
			  <?php //} ?> 
			</ul>
		  </div>
		</div>
	  </div>
	  </div>
	</div>
	<div class="footer-bottom">
	  <div class="container">
		<div class="row">
		  <div class="col-xs-12">
			<div class="copy-right pull-left">
			  <p>Copyright-2016 All Rights Reserved.Developed by <a href="http://jogjasite.com">Jogjasite.com</a></p>
			  <?php //include "jonang/statistik.php"; ?>
			  <!-- start counter -->
				<a href="http://s11.flagcounter.com/more/eA">
					<img src="http://s11.flagcounter.com/count2/eA/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0" style="width:28%;" ></a>
						  <!-- start counter end -->
						</div>


			  <div class="back-top pull-right">
				<i class="fa fa-angle-up "></i>
			  </div>
		  </div>
		</div>
	  </div>
	</div>
</footer>