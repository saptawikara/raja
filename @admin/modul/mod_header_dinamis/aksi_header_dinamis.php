<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus header_dinamis
if ($module=='header_dinamis' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM header_dinamis WHERE id_header_dinamis='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM header_dinamis WHERE id_header_dinamis='$_GET[id]'");
    unlink("../../../joimg/header_dinamis/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM header_dinamis WHERE id_header_dinamis='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='header_dinamis' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['judul_en']);
  $judul_seo_ina      = seo_title($_POST['judul_ina']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadHeader_dinamis($nama_file_unik);
    mysql_query("INSERT INTO header_dinamis(nama_header_dinamis_en,
									 nama_header_dinamis_ina,
									 seo_en,
									 seo_ina,
									 isi_header_dinamis_ina,
									 isi_header_dinamis_en,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST['isi_ina'])."',
									'".mysql_real_escape_string($_POST['isi_en'])."',
									now(),
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO header_dinamis(nama_header_dinamis_en,
									nama_header_dinamis_ina,
									 seo_en,
									 seo_ina,
									 isi_header_dinamis_ina,
									 isi_header_dinamis_en,
									 tanggal) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST['isi_ina'])."',
									'".mysql_real_escape_string($_POST['isi_en'])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='header_dinamis' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['judul_en']);
  $judul_seo_ina      = seo_title($_POST['judul_ina']);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM header_dinamis WHERE id_header_dinamis='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/header_dinamis/$ex[gambar]");
		}
	
	UploadHeader_dinamis($nama_file_unik);
  
    mysql_query("UPDATE header_dinamis SET nama_header_dinamis_en 	= '$_POST[judul_en]',
								   nama_header_dinamis_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_header_dinamis_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_header_dinamis_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal			= NOW(),
									gambar			= '$nama_file_unik'
									WHERE id_header_dinamis  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE header_dinamis SET nama_header_dinamis_en 	= '$_POST[judul_en]',
								   nama_header_dinamis_ina 	= '$_POST[judul_ina]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_header_dinamis_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									tanggal			= NOW(),
									isi_header_dinamis_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id_header_dinamis  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}

?>
