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

	// Update subimages
	if ($module=='subimages' AND $act=='update'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){	  
			$tampil=mysql_query("SELECT * FROM subimages WHERE id='$_POST[id]'");
			$ex=mysql_fetch_array($tampil);
			if($ex['gambar'] != ''){
				unlink("../../../joimg/subimages/$ex[gambar]");
			}
			
			UploadSubimages($nama_file_unik);
		  
			mysql_query("UPDATE subimages SET 	judul 	= '$_POST[judul]',id_fasilitas 	= '$_POST[id_fasilitas]',
											gambar	= '$nama_file_unik'
									WHERE id  = '$_POST[id]'");
		}else{
			mysql_query("UPDATE subimages SET 	judul 	= '$_POST[judul]', id_fasilitas 	= '$_POST[id_fasilitas]'
								WHERE id  = '$_POST[id]'");
		}
		header('location:../../media.php?module='.$module.'&id='.$ex['id_fasilitas']);
	}
	// Update Hapus Message
	if ($module=='subimages' AND $act=='hapus'){	  
		$tampil=mysql_query("SELECT * FROM subimages WHERE id='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
			unlink("../../../joimg/subimages/$ex[gambar]");
			mysql_query("DELETE FROM subimages WHERE id='$_GET[id]'");
		}else {
			mysql_query("DELETE FROM subimages WHERE id='$_GET[id]'");
		}
		header('location:../../media.php?module='.$module.'&id='.$ex['id_fasilitas']);
	}

	// Update Tambah subimages
	if ($module=='subimages' AND $act=='insertnew'){  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){	  
			UploadSubimages($nama_file_unik);
	  
			mysql_query("INSERT INTO subimages(judul,id_fasilitas,
										gambar,tanggal) 
								VALUES('$_POST[judul]','$_POST[id_fasilitas]',
										'$nama_file_unik',now() )");
		}else{
			mysql_query("INSERT INTO subimages(judul,id_fasilitas,tanggal) 
								VALUES('$_POST[judul]','$_POST[id_fasilitas]',now() )");
		}
		header('location:../../media.php?module='.$module.'&id='.$_POST['id_fasilitas']);
	}

}
?>
