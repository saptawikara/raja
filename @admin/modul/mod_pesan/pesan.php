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
		$aksi="modul/mod_pesan/aksi_pesan.php";
		switch($_GET['act']){
			default:
		?>
		<!-- comment -->
		<article class="module width_full">
			<header><h3>Message</h3></header>
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Date</th> 
    				<th>Name</th> 
    				<th>Email</th> 
    				<th>Read</th> 
    				<th>Aksi</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$room = mysql_query("SELECT * FROM contact ORDER BY tanggal DESC");
				while($r=mysql_fetch_array($room)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><?php echo"$r[tanggal]" ?></td> 
    				<td align="center"><?php echo"$r[nama]" ?></td> 
    				<td align="center"><?php echo"$r[email]" ?></td> 
    				<td align="center"><?php echo"$r[dibaca]"; ?></td> 
					<td align="center"><a href="<?php echo"?module=pesan&act=edit&id=$r[id]";?>"><input type="image" src="images/icn_edit.png" title="Detail"></a> &nbsp;<a href="<?php echo"$aksi?module=pesan&act=hapus&id=$r[id]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</article>
		<!-- end of comment -->
		
		
		<?php break; 
		case"edit":
			$room = mysql_query("SELECT * FROM contact WHERE id='$_GET[id]'");
			$r=mysql_fetch_array($room);
			$on = mysql_query("SELECT * FROM berita WHERE id_berita='$r[id]'");
			$o=mysql_fetch_array($on);
			
			$tgl = tgl_amerika($r['tanggal']);
		?>
		<article style="min-width:500px;" class="module width_quarter">
			 <header><h3>Message</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='modul/mod_pesan/aksi_pesan.php?module=pesan&act=update2'>
				<input type="hidden" name="id" value='<?php echo"$_GET[id]" ?>'>
				<div class="module_content">
						
						<table>
							<tr><td><label>Name</label></td><td>:</td><td><?php echo"$r[nama]" ?></td></tr>
							<tr><td><label>Email</label></td><td>:</td><td><?php echo"$r[email]" ?></td></tr>
							<tr><td><label>Phone</label></td><td>:</td><td><?php echo"$r[phone]" ?></td></tr>
							<tr><td style="vertical-align: top;"><label>Message</label></td><td style="vertical-align: top;">:</td><td><?php echo"$r[message]" ?></td></tr>
							<tr><td><label>Date</label></td><td>:</td><td><?php echo"$tgl"; ?></td></tr>
							<tr>
								<td><label>Read</label></td><td>:</td>
							
								<?php 
									if($r['dibaca'] == 'No'){
								?>
									<td><input type="radio" name="aktif" class="radio" value="Yes" > Yes </td>
									<td><input type="radio" name="aktif" class="radio" value="No" checked > No  </td>
								<?php } else {?>
									<td><input type="radio" name="aktif" class="radio" value="Yes"  checked> Yes  </td>
									<td><input type="radio" name="aktif" class="radio" value="No" > No  </td>
								<?php } ?>
								
							</tr>
						</table>
						
						
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		<?php	
		break;
		 } ?>
		
<?php } ?>