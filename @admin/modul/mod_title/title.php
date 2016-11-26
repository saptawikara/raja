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
		$aksi="modul/mod_title/aksi_title.php";
		switch($_GET[act]){
			default:
			$view = mysql_query("SELECT * FROM modul WHERE id_modul='90'");
				$g=mysql_fetch_array($view);
		
		?>
		
		<article style="min-width:260px;" class="module width_full">
			 <header><h3>Title Website</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_title/aksi_title.php?module=title&act=update'>
				<input type="hidden" name="id" value="<?php echo"$g[id_modul]" ?>">
				<div class="module_content">
						
						<fieldset>
							<input name="isi" rows="13" value="<?php echo"$g[static_content_en]" ?>">
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
		
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>