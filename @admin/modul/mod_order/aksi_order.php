<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	include "../../../josys/koneksi.php";
	include "../../../josys/fungsi_thumb.php";
	include "../../../josys/fungsi_seo.php";

	$module=$_GET['module'];
	$act=$_GET['act'];
	$idp=$_GET['id'];
	
	
	if ($module=='order' AND $act=='hapus'){
		mysql_query("DELETE FROM orders WHERE id_orders = '$_GET[id]' ");
		mysql_query("DELETE FROM orders_detail WHERE id_orders = '$_GET[id]' ");
								
		header('location:../../media.php?module=order');
	}
	
	elseif ($module=='order' AND $act=='update'){
		 mysql_query("UPDATE orders SET status_order = 
						'$_POST[status_order]' WHERE 
						id_orders = '$idp'");
	
	header('location:../../media.php?module='.$module);
	}
	

}
?>
