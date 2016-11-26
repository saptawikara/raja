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
		$aksi="modul/mod_profile_footer/aksi_profile_footer.php";
		$module="profile_footer";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Tentang kami (footer)</h3>
			
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>Tittle profile_footer</th> 
    				<th>Isi profile footer</th> 
    				<th width="80px">Date</th> 
    				<th width="130px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$profile_footer = mysql_query("SELECT * FROM profile_footer ORDER BY id_profile_footer DESC");
				while($b=mysql_fetch_array($profile_footer)){
				$tanggal = tgl_amerika($b['tanggal']);
				
				
				?>
				<tr>  
    				<td><?php echo"$b[nama_profile_footer_ina]" ?></td> 
					<td><?php echo"$b[isi_profile_footer_ina]" ?></td>
    				<td width="90px"><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b[id_profile_footer]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b[id_profile_footer]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"></a>
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
			$profile_footer = mysql_query("SELECT * FROM profile_footer WHERE id_profile_footer='$_GET[id]'");
			$r=mysql_fetch_array($profile_footer);
		?>
		
		<article class="module width_full">
			<header><h3>Edit profile_footer</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
			<div class="col-lg-12">
				<input type='hidden' name='id' value='<?php echo"$r[id_profile_footer]" ?>'>
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
											<input style="width:96%; margin-bottom:8px;" name="judul_ina" type="text" value="<?php echo"$r[nama_profile_footer_ina]" ?>">
										</fieldset>
										<br />
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_ina"><?php echo"$r[isi_profile_footer_ina]" ?></textarea>
										</fieldset>
										
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Judul</label>
											<input style="width:96%; margin-bottom:8px;" name="judul_en" type="text" value="<?php echo"$r[nama_profile_footer_en]" ?>">
										</fieldset>
										<br />
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_en"><?php echo"$r[isi_profile_footer_en]" ?></textarea>
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
		break;
		 } ?>
		
<?php } ?>