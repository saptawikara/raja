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
		$aksi="modul/mod_arah/aksi_arah.php";
		$module="arah";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Petunjuk arah</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Gambar cover</th> 
					<th>Titik awal</th> 
    				<th>Titik Lokasi</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				
				
				$arah = mysql_query("SELECT * FROM direction_sub ORDER BY id DESC");
				while($b=mysql_fetch_array($arah)){
				$tanggal = tgl_amerika($b['tanggal']);
				
				$tampill=mysql_query("SELECT * FROM direction where id_direction='$b[id_direction]' ORDER BY nama");
				$ts=mysql_fetch_array($tampill);
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
					<td align="center"><img height="70px" src="../joimg/arah/<?php echo"$b[gambar]" ?>"></td> 
					<td><?php echo"$b[nama]" ?></td> 
    				<td align="center">
					<?php echo"$ts[nama]" ?>
					</td> 
    				<td width="90px"><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
					</td> 
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
			<header><h3 style="color: Red;">Add arah</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<fieldset><label>Titik awal</label><br />
								<input style="width:96%; margin-bottom:8px;" name="nama" type="text" >
							</fieldset>
							<fieldset><label>Titik yang dituju</label><br />
								<?php
								$tampil=mysql_query("SELECT * FROM direction ORDER BY nama");
								$cek=mysql_num_rows($tampil);
								?>
								<select style="width:96%; margin-bottom:15px;" name='id_direction_sub'><option value=0 selected>- Pilih Titik yang dituju -</option>
									<?php
									while($r=mysql_fetch_array($tampil))
									{
									?>
										<option value="<?php echo"$r[id_direction]"?>"><?php echo"$r[nama]"?></option>				
								<?php } ?>
								</select>
							</fieldset>
							<fieldset><label>Maps / link arah</label><br />
								<input style="width:96%; margin-bottom:8px;" name="link" type="text" >
							</fieldset>
							<br />
							<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
								<label>Gambar Cover</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
							</fieldset>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					
					<div class="clear"></div>
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
			$direction_sub = mysql_query("SELECT * FROM direction_sub WHERE id='$_GET[id]'");
			$r=mysql_fetch_array($direction_sub);
		?>
		
		<article class="module width_full">
			<header><h3>Edit Petunjuk arah</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id]" ?>'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<fieldset><label>Nama arah</label><br />
								<input style="width:96%; margin-bottom:8px;" name="nama" type="text" value="<?php echo"$r[nama]" ?>">
							</fieldset>
							<fieldset><label>Edit Titik yang dituju</label><br />
								<select style="width:96%; margin-bottom:12px;" name='id_direction_sub'>
									<?php
									$tampil=mysql_query("SELECT * FROM direction ORDER BY id_direction");
									if ($r['id_direction']==0){
									?>
									<option value=0 selected>- Pilih Titik yang dituju -</option>
									 <?php }  
									  while($w=mysql_fetch_array($tampil)){
										if ($r['id_direction']==$w['id_direction']){ ?>  
										  <option value=<?php echo"$w[id_direction]"?> selected><?php echo"$w[nama]"?></option>
										<?php }
										else{ ?>
										  <option value=<?php echo"$w[id_direction]"?>><?php echo"$w[nama]"?></option>
									<?php	} } ?>
								</select>
							</fieldset>
							<fieldset><label>Maps / link arah</label><br />
								<input style="width:96%; margin-bottom:12px;" name="link" type="text" value="<?php echo"$r[link]" ?>">
							</fieldset>
							<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
								&nbsp;&nbsp;<img width="270px" src="../joimg/arah/<?php echo"$r[gambar]" ?>">
								<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
								<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 500x375px.
							</fieldset>
						</div>
                        <!-- /.panel-body -->
                    </div>
					<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		
		<div class="clear"></div><br/><br/>
		
		
		
		<?php	
		break;
		 } ?>
		
<?php } ?>