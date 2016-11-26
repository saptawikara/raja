<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>

<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#example').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>


<script src="multipleselect/jquery.multiple.select.js"></script>
<link rel="stylesheet" href="multipleselect/multiple-select.css"/>
<script>
	$(document).ready(function(){
		$('#demo3').multipleSelect({
			placeholder: "Pilih Nama Tempat Wisata",
			filter:true
		});
	});
</script>
<style>.ui-widget-header{background:none;border:none;}</style>


		
		<?php
		$aksi="modul/mod_subfeature/aksi_subfeature.php";
		switch($_GET['act']){
			default:
		?>
		<?php
			$id_wisata = $_GET['id_wisata'];
			$id_house	  = $_GET['id'];
			if(!empty($id_wisata)){
				$fea =mysql_query("SELECT * from fasilitas where id_wisata='$id_wisata'");
				$fee=mysql_fetch_array($fea);
			}
			elseif(!empty($id_house)){ 
				$fea =mysql_query("SELECT * from house_nama where id_house='$id_house'");
				$fee=mysql_fetch_array($fea);
			} 
		?>
		<article class="module width_full">
			 <header><h3>Wisata berdasarkan kota</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_subfeature/aksi_subfeature.php?module=subfeature&act=insertnew'>
				<div class="module_content">
						<fieldset>
							<label>Nama Kota</label>
							<input name="nama_feature" type="text">
						</fieldset>
						<br />
						<fieldset><label>Tempat Wisata</label><br />
							<select id="demo3" name="demo3[]" style="width:70%;  float:left;" multiple="multiple" onchange="typ()">
								<?php
									$tampil=mysql_query("SELECT * FROM promo");
									while($w=mysql_fetch_array($tampil)){
									echo "<option value=$w[id_promo]>$w[nama_promo_ina]</option>";
									}
								?>
							</select>
						</fieldset>
						<input type="hidden" name="id_wisata" value="<?php echo"$id_wisata"; ?>" />
						<input type="hidden" name="id_house" value="<?php echo"$id_house"; ?>" />
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		<article class="module width_full">
			<header>
			<h3 class="tabs_involved">Daftar wisata berdasarkan kota 
				<?php 
				if($id_wisata==true){
					echo $fee['nama_fasilitas_ina'] ;
				}
				else{
					echo $fee['nama'] ;
				}
				?> 
			</h3>
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Nama Kota wisata</th> 
    				<th style="text-align:center">Actions</th> 
				</tr> 
			</thead> 
			
			<tbody> 
				<?php 
				if($id_wisata==true){
				$no=1;
				$slide = mysql_query("SELECT * FROM house_feature WHERE id_wisata='$id_wisata' ORDER BY id_wisata DESC");
				while($s=mysql_fetch_array($slide)){
				?>
					<tr>  
						<th><?php echo "$no" ;?></th>
						<td><?php echo "$s[nama_feature]" ?></td> 
						<td style="text-align:center">
						<a href="<?php echo"?module=subfeature&act=edit&id_feature=$s[id_feature]&id_wisata=$s[id_wisata]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; 
						<a href="<?php echo"$aksi?module=subfeature&act=hapus_fasilitas&id_feature=$s[id_feature]&id_wisata=$s[id_wisata]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					</tr> 
				<?php $no++; } } else { 
				$noo=1;
				$slide = mysql_query("SELECT * FROM house_feature WHERE id_house='$id_house' ORDER BY id_feature DESC");
				while($s=mysql_fetch_array($slide)){
				?>
					<tr>  
						<th><?php echo "$no" ;?></th>
						<td><?php echo "$s[nama_feature]" ?></td> 
						<td style="text-align:center">
						<a href="<?php echo"$aksi?module=subfeature&act=hapus&id=$s[id_feature]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					</tr> 
				<?php $noo++; } }	?> 
					
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		
		
		
		<?php break; 
		case"edit":
			$id_feature = $_GET['id_feature'];
			$id_wisata 	= $_GET['id_wisata'];
			$slideshow = mysql_query("SELECT * FROM house_feature WHERE id_feature='$id_feature'");
				$g=mysql_fetch_array($slideshow);
		
		?>
		
		<article class="module width_full">
			 <header><h3 class="tabs_involved">Edit Wisata berdasarkan kota</h3>
				
				<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_subfeature/aksi_subfeature.php?module=subfeature&act=update'>
				<input type='hidden' name='id_feature' value='<?php echo"$id_feature" ?>'>
				<input type='hidden' name='id_wisata' value='<?php echo"$id_wisata" ?>'>
				<div class="module_content">
						<fieldset>
							<label>Nama Kota</label>
							<input name="nama_feature" type="text" value="<?php echo"$g[nama_feature]" ?>">
						</fieldset>
						<br />
						<fieldset><label>Tempat Wisata</label><br />
						<select id="demo3" name="demo3[]" style="width:70%;  float:left;" multiple="multiple" onchange="typ()">
							<?php
							$demo3 = mysql_query("SELECT * FROM promo");
							while($rs=mysql_fetch_array($demo3)){																					
							
								$demo=mysql_query("SELECT * FROM wisata_kategori WHERE id_wisata='$id_feature' AND id_promo='$rs[id_promo]'");
								$w=mysql_fetch_array($demo);
								$selected = isset($w['id_wisata_kategori'])? "selected" : "" ;
								echo "<option value=$rs[id_promo] $selected>$rs[nama_promo_ina]</option>";
							}
							?>
						</select>
					</fieldset>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		<br />
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>