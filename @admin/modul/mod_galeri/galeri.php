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
<style>.ui-widget-header{background:none;border:none;}</style>
		<?php
		$aksi="modul/mod_galeri/aksi_galeri.php";
		switch($_GET[act]){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Daftar Galeri</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=galeri&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
       				<th>Nama album</th> 
					<th>Nama galeri</th> 
    				<th>Aksi</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$galeri = mysql_query("SELECT * FROM galeri ORDER BY id_galeri DESC");
				while($m=mysql_fetch_array($galeri)){
				
				$kat = mysql_query("SELECT * FROM album where id_album='$m[id_album]' ORDER BY nama DESC");
				$ms=mysql_fetch_array($kat);
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img width="100px" src="../joimg/galeri/<?php echo"$m[gambar]" ?>"></td> 
    				<td><?php echo"$ms[nama]" ?></td> 
    				<td><?php echo"$m[nama]" ?></td> 
    				<td align="center"><a href="<?php echo"?module=galeri&act=edit&id=$m[id_galeri]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=galeri&act=hapus&id=$m[id_galeri]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			</div><!-- end of #tab1 -->
			<div class="clear"></div>
		</div><!-- end of .tab_container -->
		</article>
		<br />
		<div class="clear"></div>
		
		<?php break; 
		case"insertnew":
		?>
		
		<article class="module width_full">
			<header><h3>Tambahkan Galeri</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=galeri&act=insertnew'>
				<div class="module_content">
				<?php
				$kat = mysql_query("SELECT * FROM kategori_album where id_katalbum='$m[id_katalbum]' ORDER BY id_katalbum DESC");
				$ms=mysql_fetch_array($kat);
				?>
					<fieldset><label>Nama Galeri</label><br />
						<input style="width:99%; margin-bottom:8px;" name="nama" type="text" >
					</fieldset>
					<fieldset><label>Album</label><br />
						<?php
						$tampil=mysql_query("SELECT * FROM album ORDER BY nama ASC");
						$cek=mysql_num_rows($tampil);
						?>
						<select name='album'><option value=0 selected>- Pilih album -</option>
							<?php
							while($r=mysql_fetch_array($tampil))
							{
							?>
								<option value="<?php echo"$r[id_album]"?>"><?php echo"$r[nama]"?></option>				
						<?php } ?>
						</select>
					</fieldset>
					<br />
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Thumbnail</label><br /><br />
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 360 x 256px.
					</fieldset>
					<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		<?php break; 
		case"edit":
			$galeri = mysql_query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
			$r=mysql_fetch_array($galeri);
			
		?>
		
		<article class="module width_full">
			<header><h3>Edit Galeri</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=galeri&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id_galeri]" ?>'>
				<div class="module_content">
						<table>
							
							<tr><td style="width:20%;"><label>Nama Galeri</label></td> <td style="width:50%; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama]" ?>"></td></tr>
							
							<?php
								echo"<tr><td>Album</td><td>  : <select name='album'>";
									
									$tampil=mysql_query("SELECT * FROM album ORDER BY nama ASC");
								  if ($r[id_album]==0){
									echo "<option value=0 selected>- Pilih Album -</option>";
									}   

								  while($w=mysql_fetch_array($tampil)){
									if ($r[id_album]==$w[id_album]){
									  echo "<option value=$w[id_album] selected>$w[nama]</option>";
									}
									else{
									  echo "<option value=$w[id_album]>$w[nama]</option>";
									}
								}
								echo "</select></td> </tr>";
							?>
							
						</table>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							&nbsp;&nbsp;<img width="270px" src="../joimg/galeri/<?php echo"$r[gambar]" ?>">
							<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 360 x 256px.
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		
		
		<?php	
			break;
			}
		
	 ?>
<?php } ?>