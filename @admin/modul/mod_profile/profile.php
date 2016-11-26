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
		$aksi="modul/mod_profile/aksi_profile.php";
		$module="profile";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Tentang kami</h3>
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Update Header' onclick="location.href='?module=<?php echo $module;?>&act=update_header'">
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>Thumbnail</th> 
    				<th>Tittle Profile</th> 
    				<th>Isi profile</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$profile = mysql_query("SELECT * FROM profile ORDER BY id_profile DESC");
				while($b=mysql_fetch_array($profile)){
				$tanggal = tgl_amerika($b['tanggal']);
				
				
				?>
				<tr>  
    				
    				<td align="center"><img height="70px" src="../joimg/profile/<?php echo"$b[gambar]" ?>"></td> 
    				<td><?php echo"$b[nama_profile_ina]" ?></td> 
					<td><?php echo"$b[isi_profile_ina]" ?></td>
    				<td width="90px"><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id_profile]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id_profile]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"></a>
					</td> 
				</tr> 
			<?php } ?>
				
				
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
		case"edit":
			$profile = mysql_query("SELECT * FROM profile WHERE id_profile='$_GET[id]'");
			$r=mysql_fetch_array($profile);
		?>
		
		<article class="module width_full">
			<header><h3>Edit profile</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
			<div class="col-lg-12">
				<input type='hidden' name='id' value='<?php echo"$r[id_profile]" ?>'>
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
										<fieldset><label>Judul</label>
											<input style="width:96%; margin-bottom:8px;" name="judul_ina" type="text" value="<?php echo"$r[nama_profile_ina]" ?>">
										</fieldset>
										<br />
										<fieldset><label>Deskripsi Profile</label><br /><br />
											<textarea name="isi_ina"><?php echo"$r[isi_profile_ina]" ?></textarea>
										</fieldset>
										
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Judul</label>
											<input style="width:96%; margin-bottom:8px;" name="judul_en" type="text" value="<?php echo"$r[nama_profile_en]" ?>">
										</fieldset>
										<br />
										<fieldset><label>Deskripsi Profile</label><br /><br />
											<textarea name="isi_en"><?php echo"$r[isi_profile_en]" ?></textarea>
										</fieldset>
										
									<div class="clear"></div>
									</div>	
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					</div>
				    <!--Gambar-->
						&nbsp;&nbsp;<img width="270px" src="../joimg/profile/<?php echo"$r[gambar]" ?>">
						<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 1024x370px.
					</fieldset>
					
					<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		
		
		
		
		
		<?php	
		 } ?>
		
<?php } ?>