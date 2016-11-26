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
		<?php 	$aksi="modul/mod_static_content/aksi_static_content.php";
				$jasa = mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
				$w=mysql_fetch_array($jasa);
				?>
		
		<article class="module width_full">
			<header><h3>Edit <?php echo "$w[nama_modul]";?></h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=static_content&act=update'>
			<input type='hidden' name='id' value='<?php echo"$w[id_modul]" ?>'>
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
										<table>
											<tr><td style="width:10%;"><label>Judul</label></td> <td style="width:1000px; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama_modul_ina" type="text" value="<?php echo"$w[nama_modul_ina]" ?>"></td></tr>
										</table>
										
										<fieldset style="float:left; width:100%%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
											<textarea name="isi_ina" id="jogmce" rows="12"><?php echo"$w[static_content_ina]" ?></textarea>
										</fieldset>
											<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
										<div class="clear"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="en">
									<div class="module_content">
										<table>
											<tr><td style="width:10%;"><label>Title</label></td> <td style="width:1000px; margin-bottom:8px;"><input style="width:100%; margin-bottom:8px;" name="nama_modul_en" type="text" value="<?php echo"$w[nama_modul_en]" ?>"></td></tr>
										</table>
										
										<fieldset style="float:left; width:100%%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
											<textarea name="isi_en" rows="12"><?php echo"$w[static_content_en]" ?></textarea>
										</fieldset>
											<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
										<div class="clear"></div>
									</div>
								</div>
								<?php
								if($_GET['id']=="7")
									{
								?>
									<tr><td valign='top' class='left'>Google Map Iframe</td>
									<td class='left'><input name='gmap' value='<?php echo"$w[extra]" ?>' style='height:100px;width:100%;'></td></tr>
											<?php } ?>
								<!--<fieldset style="float:left; width:30%; margin-right: 3%;"> 
									&nbsp;&nbsp;<img width="270px" src="../joimg/statik/<?php// echo"$w[gambar]" ?>">
									<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
									<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 1024x370 px.
								</fieldset>-->
								<div class="clear"></div>
							</div>
						</div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer>
			</form>
		</article>
		
<?php } ?>