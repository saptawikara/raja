<?php 	
$r=mysql_fetch_array(mysql_query("SELECT * FROM kategori_slide where nama='$_GET[mod]'"));

if ($_GET['mod'] == $r['nama']){
?>
<div class="slider-one">
	<!--#################################
		- THEMEPUNCH BANNER -
	#################################-->
	  <div class="tp-banner-container">
		<div class="tp-banner" >
		  <ul>  <!-- SLIDE  -->
			<!-- SLIDE  -->
			<?php 
				$slider=mysql_query("SELECT * FROM slide where id_katslide='$r[id]' ORDER by id DESC");
				while($sd=mysql_fetch_array($slider)){
				$judul_slide  = $_SESSION['bahasa'] == "en" ? "judul_".$_SESSION['bahasa'] : "judul_ina";
				$isi_slide    = $_SESSION['bahasa'] == "en" ? "isi_".$_SESSION['bahasa'] : "isi_ina";
			?>
			<li data-transition="slotfade-horizontal" data-slotamount="1" data-masterspeed="500" data-title="Raja Tours Indonesia">
			<!-- MAIN IMAGE -->
			<img src="joimg/slide/<?php echo $sd['gambar']; ?>"  alt="slidebg1" data-lazyload="joimg/slide/<?php echo $sd['gambar']; ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
			<!-- LAYERS -->
			<!-- LAYER NR. 2 -->
				<div class="tp-resizeme sft">
					<div class="bg_slide">
						<div class="tp-caption tp-resizeme sft"
						  data-x="400"
						  data-y="300"
						  data-speed="1000"
						  data-start="2400"
						  data-easing="Power4.easeOut"
						  data-endspeed="300"
						  data-endeasing="Power1.easeIn"
						  data-captionhidden="off"
						  style="z-index: 7; max-height: auto; white-space: nowrap;font-family : 'Playball', sans-serif; font-size: 93px; letter-spacing: 2px; color: #fff;"><?php echo $sd[$judul_slide]; ?>
						</div>
					<!-- LAYER NR. 3 -->
						<div class="tp-caption tp-resizeme sft"
						  data-x="875"
						  data-y="369"
						  data-speed="1000"
						  data-start="2700"
						  data-easing="Power4.easeOut"
						  data-endspeed="300"
						  data-endeasing="Power1.easeIn"
						  data-captionhidden="off"
						  style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;  font-family: 'Roboto', sans-serif; text-transform: uppercase; font-size: 18px; font-weight: 400; letter-spacing: 3px; color: #fff;"><?php echo $sd[$isi_slide]; ?>
						</div>
					  
					<!-- LAYER NR. 4 -->
						<div class="tp-caption tp-resizeme sft"
						  data-x="910"
						  data-y="420"
						  data-speed="1000"
						  data-start="3000"
						  data-easing="Power3.easeInOut"
						  data-splitin="none"
						  data-splitout="none"
						  data-elementdelay="0.1"
						  data-endelementdelay="0.1"
						  data-linktoslide="next"
						  style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='tr-slider-btn'>READ MORE</a>
						</div>
					</div>
				</div>
			</li> 
			<?php } ?>				

			
		</ul>
		<div class="tp-bannertimer"></div>
		</div>
	  </div>
</div><!--slider One -->
<?php } else {?> 

<div class="tp-banner-container">
		<div class="tp-banner" >
		  <ul>  <!-- SLIDE  -->
			<!-- SLIDE  -->
			<li data-transition="slotfade-horizontal" data-slotamount="1" data-masterspeed="500" data-title="Raja Tours Indonesia">
			<!-- MAIN IMAGE -->
			<img src="joimg/slide/no_image_slide.jpg"  alt="slidebg1" data-lazyload="joimg/slide/no_image_slide.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
			
			</li>
		</ul>
		<div class="tp-bannertimer"></div>
		</div>
</div>


<?php } ?>