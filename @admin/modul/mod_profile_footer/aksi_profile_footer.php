<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];



// Update header
if ($module=='profile_footer' AND $act=='update'){
  $judul_seo_en    	  = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
    mysql_query("UPDATE profile_footer SET 
									nama_profile_footer_en 		= '$_POST[judul_en]',
								    nama_profile_footer_ina 	= '$_POST[judul_ina]',
									seo_en 						= '$judul_seo_en',
									seo_ina 					= '$judul_seo_ina',
									isi_profile_footer_en 		= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_profile_footer_ina 		= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal						= NOW()
									WHERE id_profile_footer 	 = '$_POST[id]'");
									
  header('location:../../media.php?module='.$module);
}
?>
