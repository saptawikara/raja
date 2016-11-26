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
		$aksi="modul/mod_order/aksi_order.php";
		switch($_GET['act']){
			default:
		?>
		
		<article class="module width_full">
			<header><h3 class="tabs_involved">Orders</h3>
				
			</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Name elliotti</th> 
    				<th>Fasilitas</th> 
    				<th>House rate</th> 
    				<th>Name Customer</th> 
    				<th>Order Date</th> 
    				<th width="80px">Status</th> 
    				<th width="150px">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$berita = mysql_query("SELECT * FROM orders ORDER BY id_orders DESC");
				while($b=mysql_fetch_array($berita)){
				$tgl = date('d F Y',strtotime($b['tgl_order']));
				
				$house_nama=mysql_query("SELECT * FROM house_nama where id_house='$b[house_nama]' order by id_house ASC");
				$hn=mysql_fetch_array($house_nama);
				
				$house_fasilitas=mysql_query("SELECT * FROM house_fasilitas where id_fasilitas_harga='$b[house_fasilitas]' order by nama_fasilitas DESC");
				$hs=mysql_fetch_array($house_fasilitas);
				
				$rates=mysql_query("SELECT * FROM house_rate where id_rate='$b[house_rate]'");
				$ra=mysql_fetch_array($rates);
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td><?php echo"$hn[nama]" ?></td> 
    				<td><?php echo"$hs[nama_fasilitas]" ?></td>
							
    				<td><?php echo"$ra[nama_rate]" ?></td> 
    				<td><?php echo"$b[nama]" ?></td> 
    				<td><?php echo"$tgl" ?></td> 
    				<td><span style='color:<?php if($b['status_order'] == 'Baru'){echo"#19C901;";} elseif($b['status_order'] == 'Canceled'){echo"#FF0000;";} else{echo"#0072CC;";} echo"'>$b[status_order]" ?></td> 
    				<td align="center"><a href="<?php echo"?module=order&act=edit&id=$b[id_orders]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=order&act=hapus&id=$b[id_orders]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
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
		case"edit":
			$berita = mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id]'");
			$r=mysql_fetch_array($berita);
			$tanggal = date('d F Y',strtotime($r['tgl_order']));
			$checkin	= date('d F Y',strtotime($r['checkin']));
			$checkout	= date('d F Y',strtotime($r['checkout']));
		?>
		<article class="module width_full">
			<header><h3>Edit order</h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=order&act=update&id=<?php echo"$r[id_orders]" ?>'>
				<input type='hidden' name='id' value='<?php echo"$r[id_orders]" ?>'>
				<div class="module_content">
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>No. Order</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[id_orders]" ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Date and Time Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$tanggal, $r[jam_order] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Status Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:
									<select name='status_order'>
										<?php 
										if($r['status_order']=='Baru'){
											echo'	<option value="Completed">Completed</option>
													<option value="Canceled">Canceled</option>
													<option value="Baru" selected>Baru</option>';											
										}elseif($r['status_order']=='Canceled'){
											echo'	<option value="Completed">Completed</option>
													<option value="Canceled" selected>Canceled</option>
													<option value="Baru">Baru</option>';											
										}else{
											echo'	<option value="Completed" selected>Completed</option>
													<option value="Canceled">Canceled</option>
													<option value="Baru">Baru</option>';			
										}
										?>
									</select>
									<input class='butt' type='submit' value='Change Status'>
								</td>
							</tr>
							
						</table>
						<br />
						<fieldset><label width="100%">Keterangan</label><br />
						<?php
							// tampilkan rincian produk yang di order
							$sql2=mysql_query("SELECT * FROM orders where id_orders='$_GET[id]' order by id_orders DESC");
							   
							
							echo "<table  class='prodCart' width='100%'>";
													echo "<thead><tr style='border-bottom: 1px solid #DDD; font-weight:bold;'>
															<td class='center'>No.</td>
															<td>House nama</td>
															<td>House fasilitas</td>
															<td>House rate</td>
															<td>Price</td>
															</thead>
														</tr><tbody>";
												$no=1;
												$total=0;
												$totalberat=0;
												while($ra=mysql_fetch_array($sql2))
												{
												
												$house_nama=mysql_query("SELECT * FROM house_nama where id_house='$ra[house_nama]' order by id_house ASC");
												$hn=mysql_fetch_array($house_nama);
												
												$house_fasilitas=mysql_query("SELECT * FROM house_fasilitas where id_fasilitas_harga='$ra[house_fasilitas]' order by nama_fasilitas DESC");
												$hs=mysql_fetch_array($house_fasilitas);

													$disc        = ($ra['discount']/100)*$ra['harga'];
													$hargadisc   = number_format(($ra['harga']-$disc),0,",",".");
													$subtotal    = ($ra['harga']-$disc) * $ra['jumlah'];
													$total       = $total + $subtotal;  
													
													$berat       = $ra['weight'] * $ra['jumlah'];
													$totalberat  = $totalberat + $berat;
													$ongkoskirim = ceil($totalberat) * $k['ongkos_kirim'];
													
													$gtotal      = $total + $ongkoskirim;
													
													$subtotal_rp = format_rupiah($subtotal);
													$total_rp    = format_rupiah($total);
													$gtotal_rp    = format_rupiah($gtotal);
													$okirim_rp    = format_rupiah($ongkoskirim);
													$harga       = format_rupiah($ra['harga']);
													
													$gambar = "<img width='50' height='50'  src='joimg/produk/$ra[gambar]' style='float: left; margin-right: 5px;' />";
												   
													echo "
													<tr style='border-bottom: 1px solid #DDD;'>
														<td class='vtop center' style='vertical-align: middle;'><b>$no.</b></td>
															<input type=hidden name=id[$no] value=$ra[id_orders_temp]>
														  <td class='left vtop' style='vertical-align: middle;color: #5E5E5E;'>
															<h4 class='prodMeta _capitalize' style='margin-top: 14px;'>$hn[nama]
															</h4>
														  </td>
														  <td class='vtop center' style='vertical-align: middle;'>$hs[nama_fasilitas]</td>
														  <td class='vtop center' style='vertical-align: middle;'>$ra[house_rate]</td>
														  <td class='vtop' style='vertical-align: middle;'>Rp. $ra[price],-</td>
													  </tr>";
												$no++; 
											  }
												echo "</tbody></table>";
						?>
						</fieldset>
						<br />
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>Customer Name</label></td>
								<td style="width:70%; margin-bottom:8px;">: <?php echo"$r[nama]" ?></td>
							</tr><tr>
								<td style="width:30%;"><label>Email</label></td>
								<td style="width:70%; margin-bottom:8px;">: <?php echo"$r[email]" ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Address</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[address] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Number Phone</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[phone] " ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Checkin</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$checkin" ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Checkout</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$checkout" ?></td>
							</tr><tr>
								<td style="width:10%;"><label>Message</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r[message] " ?></td>
							</tr>
							
						</table>
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
		
		
		<div class="clear"></div><br/><br/>
		
		
		
		<?php	
		break;
		 } ?>
		
<?php } ?>