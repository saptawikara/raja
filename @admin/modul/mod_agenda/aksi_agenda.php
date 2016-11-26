<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus agenda
if ($module=='agenda' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM agenda WHERE id_agenda='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM agenda WHERE id_agenda='$_GET[id]'");
    unlink("../../../joimg/agenda/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM agenda WHERE id_agenda='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='agenda' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['judul_en']);
  $judul_seo_ina      = seo_title($_POST['judul_ina']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadAgenda($nama_file_unik);
    mysql_query("INSERT INTO agenda(nama_agenda_en,
									 nama_agenda_ina,
									 tanggal_acara,
									 waktu_acara,
									 seo_en,
									 seo_ina,
									 isi_agenda_ina,
									 isi_agenda_en,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$_POST[tanggal_acara]',
									'$_POST[waktu_acara]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now(),
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO agenda(nama_agenda_en,
									nama_agenda_ina,
									tanggal_acara,
									 waktu_acara,
									 seo_en,
									 seo_ina,
									 isi_agenda_ina,
									 isi_agenda_en,
									 tanggal) 
                            VALUES('$_POST[judul_en]',
									'$_POST[judul_ina]',
									'$_POST[tanggal_acara]',
									'$_POST[waktu_acara]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST[isi_ina])."',
									'".mysql_real_escape_string($_POST[isi_en])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='agenda' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['judul_en']);
  $judul_seo_ina      = seo_title($_POST['judul_ina']);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM agenda WHERE id_agenda='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/agenda/$ex[gambar]");
		}
	
	UploadAgenda($nama_file_unik);
  
    mysql_query("UPDATE agenda SET nama_agenda_en 	= '$_POST[judul_en]',
								    nama_agenda_ina = '$_POST[judul_ina]',
								    tanggal_acara 	= '$_POST[tanggal_acara]',
								    waktu_acara 	= '$_POST[waktu_acara]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_agenda_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									isi_agenda_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."',
									tanggal			= NOW(),
									gambar			= '$nama_file_unik'
									WHERE id_agenda  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE agenda SET nama_agenda_en 	= '$_POST[judul_en]',
								   nama_agenda_ina 	= '$_POST[judul_ina]',
								    tanggal_acara 	= '$_POST[tanggal_acara]',
								    waktu_acara 	= '$_POST[waktu_acara]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_agenda_en 	= '".mysql_real_escape_string($_POST['isi_en'])."',
									tanggal			= NOW(),
									isi_agenda_ina 	= '".mysql_real_escape_string($_POST['isi_ina'])."'
									WHERE id_agenda  ='$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}


?>
