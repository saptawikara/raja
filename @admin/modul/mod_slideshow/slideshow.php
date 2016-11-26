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
		$aksi="modul/mod_slideshow/aksi_slideshow.php";
		$module="slideshow";
		switch($_GET['act']){
			default:
		?>
		
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Slideshow</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
    				<th>Tittle</th> 
    				<th>Kategori Menu</th> 
    				<th>Link</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$slideshow = mysql_query("SELECT * FROM slide ORDER BY id DESC");
				while($b=mysql_fetch_array($slideshow)){
					
				$ks= mysql_fetch_array(mysql_query("SELECT * FROM kategori_slide where id='$b[id_katslide]'"));
				$tanggal = tgl_amerika($b['tanggal']);
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img height="70px" src="../joimg/slide/<?php echo"$b[gambar]" ?>"></td> 
    				<td><?php echo"$b[judul_ina]" ?></td> 
    				<td><?php echo"$ks[nama]" ?></td> 
    				<td><?php echo"$b[link]" ?></td> 
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
		
		<?php break; 
		case"insertnew":
		?>
		
		<article class="module width_full">
			<header><h3 style="color: Red;">Add Slideshow</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                                <li class=""><a href="#en" data-toggle="tab">Content English</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="ina">
									<div class="module_content">
										<fieldset><label>Judul</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_ina" type="text" >
										</fieldset>
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina" id="jogmce"></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_en" type="text" >
										</fieldset>
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_en"></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
							<div class="module_content">
								<fieldset>
									<label>Kategori Menu</label><br />
									<?php
									$tampil=mysql_query("SELECT * FROM kategori_slide ORDER BY id");
									$cek=mysql_num_rows($tampil);
									?>
									<select name='id_katslide'><option value=0 selected>- Pilih Menu -</option>
										<?php
										while($r=mysql_fetch_array($tampil))
										{
										?>
										<option value="<?php echo"$r[id]"?>"><?php echo"$r[nama]"?></option>				
									<?php } ?>
									</select>
								</fieldset>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    <!-- /.panel -->
					</div>
					<fieldset><label>Link</label><br />
						<input style="width:96%; margin-bottom:8px;" name="link" type="text" >
					</fieldset>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 1600x650 px.
					</fieldset>
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
			$slideshow = mysql_query("SELECT * FROM slide WHERE id='$_GET[id]'");
				$g=mysql_fetch_array($slideshow);
		
		?>
		
	<article class="module width_full">
			 <header><h3 class="tabs_involved">Edit Slide</h3>
				
				<input style="float:right; margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_slideshow/aksi_slideshow.php?module=slideshow&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id]" ?>'>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ina" data-toggle="tab">Content Indonesia</a>
                                </li>
                                <li class=""><a href="#en" data-toggle="tab">Content English</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="ina">
									<div class="module_content">
										<fieldset><label>Judul</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_ina" type="text" value="<?php echo"$g[judul_ina]" ?>">
										</fieldset>
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina" id="jogmce"><?php echo"$g[isi_ina]" ?></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="judul_en" type="text" value="<?php echo"$g[judul_en]" ?>">
										</fieldset>
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_en"><?php echo"$g[isi_en]" ?></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					<div class="module_content">
						<fieldset>
							<label>Nama Menu</label><br />
							<select name='id_katslide'>
								<?php
								$tampil=mysql_query("SELECT * FROM kategori_slide ORDER BY id");
								if ($g['id_katslide']==0){
								?>
									<option value=0 selected>- Pilih Kategori Menu -</option>
								 <?php }  
									while($w=mysql_fetch_array($tampil)){
									if ($g['id_katslide']==$w['id']){ ?>  
									  <option value=<?php echo"$w[id]"?> selected><?php echo"$w[nama]"?></option>
									<?php }
									else{ ?>
									  <option value=<?php echo"$w[id]"?>><?php echo"$w[nama]"?></option>
								<?php	} } ?>
							</select>
						</fieldset>
					</div>
						<fieldset>
							<label>Link</label>
							<input name="link" type="text" value="<?php echo"$g[link]" ?>">
						</fieldset>
						
						
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Thumbnail</label><br /><br />
							<img width="200px" style="margin-left:5px;" src="../joimg/slide/<?php echo"$g[gambar]" ?>">
							
						</fieldset>
							
						<fieldset style="margin-top: 185px; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Change Thumbnail</label><br /><br />
							<input style="margin-left:10px; margin-right:-20px;" type="file" name="fupload">
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 1600x650 px.
						</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
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