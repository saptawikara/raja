<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($module=='produk' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM produk WHERE id_produk='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
    unlink("../../../joimg/produk/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM produk WHERE id_produk='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='produk' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['nama_produk_en']);
  $judul_seo_ina      = seo_title($_POST['nama_produk_ina']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadProduk($nama_file_unik);
    mysql_query("INSERT INTO produk(nama_produk_en,
									 harga,
									 nama_produk_ina,
									 id_katmenu,
									 kondisi,
									 seo_en,
									 seo_ina,
									 isi_produk_ina,
									 isi_produk_en,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[nama_produk_en]',
									'$_POST[harga]',
									'$_POST[nama_produk_ina]',
									'$_POST[id_katmenu]',
									'$_POST[kondisi]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST['isi_produk_ina'])."',
									'".mysql_real_escape_string($_POST['isi_produk_en'])."',
									now(),
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO produk(nama_produk_en,
									 harga,
									 nama_produk_ina,
									 id_katmenu,
									 kondisi,
									 seo_en,
									 seo_ina,
									 isi_produk_ina,
									 isi_produk_en,
									 tanggal) 
                            VALUES('$_POST[nama_produk_en]',
									'$_POST[harga]',
									'$_POST[nama_produk_ina]',
									'$_POST[id_katmenu]',
									'$_POST[kondisi]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST['isi_produk_ina'])."',
									'".mysql_real_escape_string($_POST['isi_produk_en'])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='produk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['nama_produk_en']);
  $judul_seo_ina      = seo_title($_POST['nama_produk_ina']);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM produk WHERE id_produk='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/produk/$ex[gambar]");
		}
	
	UploadProduk($nama_file_unik);
  
    mysql_query("UPDATE produk SET nama_produk_en 	= '$_POST[nama_produk_en]',
								   nama_produk_ina 	= '$_POST[nama_produk_ina]',
								   kondisi 			= '$_POST[kondisi]',
								   harga 			= '$_POST[harga]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_produk_en 	= '".mysql_real_escape_string($_POST['isi_produk_en'])."',
									isi_produk_ina 	= '".mysql_real_escape_string($_POST['isi_produk_ina'])."',
									tanggal			= NOW(),
									gambar			= '$nama_file_unik'
									WHERE id_produk = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE produk SET nama_produk_en 	= '$_POST[nama_produk_en]',
								   nama_produk_ina 	= '$_POST[nama_produk_ina]',
								   kondisi 			= '$_POST[kondisi]',
								   harga 			= '$_POST[harga]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_produk_en 	= '".mysql_real_escape_string($_POST['isi_produk_en'])."',
									isi_produk_ina 	= '".mysql_real_escape_string($_POST['isi_produk_ina'])."',
									tanggal			= NOW()
									WHERE id_produk = '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}


?>
