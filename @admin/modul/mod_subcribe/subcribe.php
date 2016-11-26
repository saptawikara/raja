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
		$aksi="modul/mod_subcribe/aksi_subcribe.php";
		switch($_GET['act']){
			default:
		?>
		
		
		
		<article style="min-width:535px;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">subcribe Media</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Email</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$slide = mysql_query("SELECT * FROM subcribe ORDER BY id_subcribe DESC");
				while($s=mysql_fetch_array($slide)){
				
				?>
				<tr style="background: #E2E4FF;">  
    				<th><?php echo"$no" ?></th>
    				<td style="text-align:center;"><a href="mailto:<?php echo"$s[email]" ?>"><?php echo"$s[email]" ?></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		
		
		<?php break; 
		case"edit":
			$subcribe = mysql_query("SELECT * FROM subcribe ORDER BY id_subcribe DESC");
				$g=mysql_fetch_array($subcribe);
		
		?>
		
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>