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
		$aksi="modul/mod_album/aksi_album.php";
		switch($_GET[act]){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Daftar album</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=album&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
    				<th>Album</th> 
    				<th>Kategori album</th> 
					<th>Deskripsi</th>
    				<th>Aksi</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				
				$album = mysql_query("SELECT * FROM album ORDER BY id_album DESC");
				while($m=mysql_fetch_array($album)){
				
				$kat = mysql_query("SELECT * FROM kategori_album where id_katalbum='$m[id_katalbum]' ORDER BY id_katalbum DESC");
				$ms=mysql_fetch_array($kat);
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img width="100px" src="../joimg/album/<?php echo"$m[gambar]" ?>"></td> 
    				<td><?php echo"$m[nama]" ?></td>
					
					<td><?php echo"$ms[nama]" ?></td>					
					<td><?php echo"$m[deskripsi]" ?></td> 
    				<td align="center"><a href="<?php echo"?module=album&act=edit&id=$m[id_album]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=album&act=hapus&id=$m[id_album]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
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
			<header><h3>Tambahkan Album</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=album&act=insertnew'>
				<div class="module_content">
					<fieldset><label>Nama Album</label><br />
						<input style="width:99%; margin-bottom:8px;" name="nama" type="text" >
					</fieldset>
					
					<br />
					<fieldset><label>Keterangan Singkat</label><br /><br />
						<textarea name="deskripsi" style="height:150px"></textarea>
					</fieldset>
					*** Usahakan penulisan <strong>deskripsi</strong> hanya dua baris saja, agar menyesuaikan tampilan tinggi gambar disampingnya.
					<div class="clear"></div>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Thumbnail</label><br /><br />
						<input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 650 x 450px.
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
			$album = mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
			$r=mysql_fetch_array($album);
			
		?>
		
		<article class="module width_full">
			<header><h3>Edit Album</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=album&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id_album]" ?>'>
				<div class="module_content">
					
						
						<fieldset style="float:left; width:30%; margin-right: 3%;"><label>Nama album</label><br />
							<input style="width:96%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama]"?>" >
						</fieldset><div class="clear"></div>
						
					<div class="clear"></div>
					<br />
					<fieldset><label>Edit Deskripsi album</label><br /><br />
						<textarea name="deskripsi" style="height:150px"><?php echo"$r[deskripsi]" ?></textarea>
					</fieldset>
					*** Usahakan penulisan <strong>deskripsi</strong> hanya dua baris saja, agar menyesuaikan tampilan tinggi gambar disampingnya.
					<div class="clear"></div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						&nbsp;&nbsp;<img width="270px" src="../joimg/album/<?php echo"$r[gambar]" ?>">
						<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 650 x 450px.
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