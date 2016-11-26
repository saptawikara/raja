<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Lokasi
if ($module=='lokasi' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM direction WHERE id_direction='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM direction WHERE id_direction='$_GET[id]'");
    unlink("../../../joimg/direction/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM direction WHERE id_direction='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='lokasi' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);

  
    mysql_query("INSERT INTO direction(nama,
									 seo_en,
									 seo_ina,
									 isi_direction_ina,
									 isi_direction_en,
									 link,
									 tanggal) 
                            VALUES('$_POST[nama]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									'$_POST[link]',
									now())");
  
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='lokasi' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST[judul_en]);
  $judul_seo_ina      = seo_title($_POST[judul_ina]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM direction WHERE id_direction='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/direction/$ex[gambar]");
		}
	
	UploadDirection($nama_file_unik);
  
    mysql_query("UPDATE direction SET nama				= '$_POST[nama]',
									seo_en 				= '$judul_seo_en',
									seo_ina 			= '$judul_seo_ina',
									link 				= '$_POST[link]',
									isi_direction_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_direction_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal				= NOW(),
									gambar				= '$nama_file_unik'
									WHERE id_direction  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE direction SET nama				= '$_POST[nama]',
								   	link 				= '$_POST[link]',
									seo_en 				= '$judul_seo_en',
									seo_ina 			= '$judul_seo_ina',
									isi_direction_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									tanggal				= NOW(),
									isi_direction_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id_direction  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}

// Update header
if ($module=='lokasi' AND $act=='update_header'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
	if(!empty($lokasi_file)){
	
	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/gif" AND $tipe_file != "image/png"){?>
    <script>window.alert("Upload Gagal, Pastikan File yang di Upload bertipe *.JPG, *.GIF, *.PNG");
        window.location=("../../media.php?module=<?php echo $module.'&act=edit&id='.$_POST['id'] ?>")</script>;
    <?php die();}
  
	$tampil=mysql_query("SELECT * FROM header WHERE id_header='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/header_image/$ex[gambar]");
		}
	
	UploadGambarHeader($nama_file_unik);
  
    mysql_query("UPDATE header SET 	
									nama_header_ina			= '$_POST[nama_header_ina]',
									nama_header_en		 	= '$_POST[nama_header_en]',
									isi_header_ina			=  '".mysql_real_escape_string($_POST[isi_header_ina])."',
									isi_header_en			=  '".mysql_real_escape_string($_POST[isi_header_en])."',
									tanggal					= NOW(),
									gambar					= '$nama_file_unik'
							WHERE id_header		   			= '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE header SET 	
									nama_header_ina			= '$_POST[nama_header_ina]',
									nama_header_en		 	= '$_POST[nama_header_en]',
									isi_header_ina			=  '".mysql_real_escape_string($_POST[isi_header_ina])."',
									isi_header_en			=  '".mysql_real_escape_string($_POST[isi_header_en])."',
									tanggal					= NOW()
                            WHERE id_header		       	= '$_POST[id]'");
	}
	
  header('location:../../media.php?module='.$module);
}
?>
