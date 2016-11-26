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

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Update subfeature
	if ($module=='subfeature' AND $act=='update'){
	 
			mysql_query("UPDATE house_feature SET 	
								nama_feature 	= '$_POST[nama_feature]'
								WHERE id_feature  = '$_POST[id_feature]'");
								
			mysql_query("DELETE FROM wisata_kategori WHERE id_wisata ='$_POST[id_feature]'");
			$col = $_POST['demo3'];
			for($i=0; $i<sizeof($col); $i++){
				mysql_query("INSERT INTO wisata_kategori (id_promo, id_wisata) VALUES ('$col[$i]', '$_POST[id_feature]')");
			}

			
		header('location:../../media.php?module='.$module.'&id_feature='.$_POST['id_feature'].'&id_wisata='.$_POST['id_wisata']);
	}
	
	// Update Hapus feature
	if ($module=='subfeature' AND $act=='hapus'){	  
		$tampil=mysql_query("SELECT * FROM house_feature WHERE id_feature='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
			unlink("../../../joimg/house_feature/$ex[gambar]");
			mysql_query("DELETE FROM house_feature WHERE id_feature='$_GET[id]'");
			mysql_query("DELETE FROM wisata_kategori WHERE id_wisata='$ex[id_feature]'");
		}else {
			mysql_query("DELETE FROM house_feature WHERE id_feature='$_GET[id]'");
			mysql_query("DELETE FROM wisata_kategori WHERE id_wisata='$ex[id_feature]'");
		}
		header('location:../../media.php?module='.$module.'&id='.$ex['id_house']);
		
	}
	
	// Update Hapus failitas
	if ($module=='subfeature' AND $act=='hapus_fasilitas'){	  
		$tampil=mysql_query("SELECT * FROM house_feature WHERE id_wisata='$_GET[id_wisata]'");
		$ex=mysql_fetch_array($tampil);
		
			mysql_query("DELETE FROM house_feature WHERE id_feature='$_GET[id_feature]'");
			mysql_query("DELETE FROM wisata_kategori WHERE id_wisata='$ex[id_feature]'");
			
		header('location:../../media.php?module='.$module.'&id_wisata='.$ex['id_wisata']);	
	}

	//  Tambah subfeature
	if ($module=='subfeature' AND $act=='insertnew'){  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
		$now 			  = date("Y-m-d H:i:s");
	  
		if(!empty($lokasi_file)){	  
			Uploadsubfeature($nama_file_unik);
	  
			mysql_query("INSERT INTO house_feature(nama_feature,id_house,id_wisata,
										gambar,tanggal) 
								VALUES('$_POST[nama_feature]','$_POST[id_house]','$_POST[id_wisata]',
										'$nama_file_unik', '$now')");
								
								$sql=mysql_query("SELECT * FROM house_feature WHERE tanggal='$now'");
								$s=mysql_fetch_array($sql);
								
								$col = $_POST['demo3'];
								for($i=0; $i<sizeof($col); $i++){
									mysql_query("INSERT INTO wisata_kategori(id_promo, id_wisata) VALUES ('$col[$i]', '$s[id_feature]')");
								}				
			
		}else{
			mysql_query("INSERT INTO house_feature(nama_feature,id_house,id_wisata, tanggal) 
								VALUES('$_POST[nama_feature]','$_POST[id_house]','$_POST[id_wisata]','$now')");
								
								$sql=mysql_query("SELECT * FROM house_feature WHERE tanggal='$now'");
								$s=mysql_fetch_array($sql);
								
								$col = $_POST['demo3'];
								for($i=0; $i<sizeof($col); $i++){
									mysql_query("INSERT INTO wisata_kategori(id_promo, id_wisata) VALUES ('$col[$i]', '$s[id_feature]')");
								}					
		}
		if(!empty($_POST['id_wisata'])){
			header('location:../../media.php?module='.$module.'&id_wisata='.$_POST['id_wisata']);
		}elseif(!empty($_POST[id_house])){
			header('location:../../media.php?module='.$module.'&id='.$_POST['id_house']);
		}
	}

}
?>
