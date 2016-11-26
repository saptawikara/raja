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
		$aksi="modul/mod_inside_wisata/aksi_inside_wisata.php";
		$module="inside_wisata";
		switch($_GET[act]){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Menu Produk</h3>
				
				<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=inside_wisata&act=insertnew'">
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Thumbnail</th> 
    				<th>Nama Menu</th> 
    				<th>Condition</th> 
    				<th>Harga</th> 
    				<th>Kategori Wisata</th> 
    				<th>Aksi</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				
				$produk = mysql_query("SELECT * FROM inside_wisata ORDER BY id_inside_wisata DESC");
				while($m=mysql_fetch_array($produk)){
				
				$kat = mysql_query("SELECT * FROM wisata where id_wisata='$m[id_wisata]'");
				$ms=mysql_fetch_array($kat);
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img width="100px" src="../joimg/inside_wisata/<?php echo"$m[gambar]" ?>"></td> 
    				<td><?php echo"$m[nama_wisata_ina]" ?></td>
    				<td><?php echo"$m[kondisi]" ?></td>
    				<td><?php echo"$m[harga]" ?></td>
					
					<td><?php echo"$ms[nama_wisata_en]" ?></td>					
    				<td align="center"><a href="<?php echo"?module=inside_wisata&act=edit&id=$m[id_inside_wisata]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=inside_wisata&act=hapus&id=$m[id_inside_wisata]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
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
			<header><h3 style="color: Red;">Tambah Tour Package</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
			<div class="col-lg-12">
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
											<input style="width:96%; margin-bottom:8px;" name="nama_wisata_ina" type="text" >
										</fieldset>
										
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_wisata_ina" id="jogmce"></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="nama_wisata_en" type="text" >
										</fieldset>
										
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_wisata_en"></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
							<div class="module_content">
								<fieldset>
									<label>Nama kategori menu</label><br />
									<?php
									$tampil=mysql_query("SELECT * FROM wisata ORDER BY id_wisata");
									$cek=mysql_num_rows($tampil);
									?>
									<select name='id_wisata'><option value=0 selected>- Pilih Kategori menu -</option>
										<?php
										while($r=mysql_fetch_array($tampil))
										{
										?>
										<option value="<?php echo"$r[id_wisata]"?>"><?php echo"$r[nama_wisata_en]"?></option>				
									<?php } ?>
									</select>
								</fieldset>
								<br />
								<fieldset><label>Condition Tour</label>
									<input style="width:96%; margin-bottom:8px;" name="kondisi" type="text"><br />
								</fieldset>
								<br />
								<fieldset><label>Harga</label><br />
									<input style="width:96%; margin-bottom:8px;" name="harga" type="text" Placeholder="1000"><br />&nbsp;&nbsp;&nbsp;&nbsp;*) Hanya Angka tanpa "titik/(.)"
								</fieldset>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					</div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> 
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
			$produk = mysql_query("SELECT * FROM inside_wisata WHERE id_inside_wisata='$_GET[id]'");
			$r=mysql_fetch_array($produk);
			
		?>
		
		<article class="module width_full">
			<header><h3>Edit Tour Package</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=inside_wisata&act=update'>
				<input type='hidden' name='id' value='<?php echo"$r[id_inside_wisata]" ?>'>
				<div class="col-lg-12">
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
											<input style="width:96%; margin-bottom:8px;" name="nama_wisata_ina" value="<?php echo $r['nama_wisata_ina']; ?>" type="text" >
										</fieldset>
										
										<fieldset><label>Deskripsi</label><br /><br />
											<textarea name="isi_wisata_ina" id="jogmce"><?php echo"$r[isi_wisata_ina]" ?></textarea>
										</fieldset>
									<div class="clear"></div>
									</div>
                                </div>
                                <div class="tab-pane fade" id="en">
									<div class="module_content">
										<fieldset><label>Tittle</label><br /><br />
											<input style="width:96%; margin-bottom:8px;" name="nama_wisata_en" type="text" value="<?php echo"$r[nama_wisata_en]" ?>" >
										</fieldset>
										
										<fieldset><label>Description</label><br /><br />
											<textarea name="isi_wisata_en" ><?php echo"$r[isi_wisata_en]" ?></textarea>
										</fieldset>
									</div>	
                                </div>
                            </div>
							<div class="module_content">
								<fieldset>
									<label>Nama kota tour</label><br />
							
									<select name='pilih_wisata'>
										<?php
										$tampil=mysql_query("SELECT * FROM wisata ORDER BY id_wisata");
										if ($r['id_wisata']==0){
										?>
											<option value=0 selected>- Pilih Kota Tour -</option>
										 <?php }  
										    while($w=mysql_fetch_array($tampil)){
											if ($r['id_wisata']==$w['id_wisata']){ ?>  
											  <option value=<?php echo"$w[id_wisata]"?> selected><?php echo"$w[nama_wisata_en]"?></option>
											<?php }
											else{ ?>
											  <option value=<?php echo"$w[id_wisata]"?>><?php echo"$w[nama_wisata_en]"?></option>
										<?php	} } ?>
									</select>
								</fieldset>
								<br />
								<fieldset><label>Condition Tour</label><br />
									<input style="width:96%; margin-bottom:8px;" name="kondisi" value="<?php echo"$r[kondisi]"?>" type="text"><br />
								</fieldset>
								<br />
								<fieldset><label>Harga</label><br />
									<input style="width:96%; margin-bottom:8px;" name="harga" value="<?php echo"$r[harga]"?>" type="text"><br />&nbsp;&nbsp;&nbsp;&nbsp;*) Hanya Angka tanpa "titik/(.)"
								</fieldset>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					</div>
					<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
						&nbsp;&nbsp;<img width="270px" src="../joimg/inside_wisata/<?php echo"$r[gambar]" ?>">
						<br /><br /><label>Ganti Thumbnail</label><input style="margin-left:10px;" type="file" name="fupload" size=40>
						<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 500x375px.
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
			break;
			}
		
	 ?>
<?php } ?>