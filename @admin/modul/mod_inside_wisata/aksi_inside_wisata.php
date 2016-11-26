<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($module=='inside_wisata' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM inside_wisata WHERE id_inside_wisata='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM inside_wisata WHERE id_inside_wisata='$_GET[id]'");
    unlink("../../../joimg/inside_wisata/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM inside_wisata WHERE id_inside_wisata='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='inside_wisata' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['nama_wisata_en']);
  $judul_seo_ina      = seo_title($_POST['nama_wisata_ina']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadInsideWisata($nama_file_unik);
    mysql_query("INSERT INTO inside_wisata(nama_wisata_en,
									 harga,
									 nama_wisata_ina,
									 id_wisata,
									 kondisi,
									 seo_en,
									 seo_ina,
									 isi_wisata_ina,
									 isi_wisata_en,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[nama_wisata_en]',
									'$_POST[harga]',
									'$_POST[nama_wisata_ina]',
									'$_POST[id_wisata]',
									'$_POST[kondisi]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST['isi_wisata_ina'])."',
									'".mysql_real_escape_string($_POST['isi_wisata_en'])."',
									now(),
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO inside_wisata(nama_wisata_en,
									 harga,
									 nama_wisata_ina,
									 id_wisata,
									 kondisi,
									 seo_en,
									 seo_ina,
									 isi_wisata_ina,
									 isi_wisata_en,
									 tanggal) 
                            VALUES('$_POST[nama_wisata_en]',
									'$_POST[harga]',
									'$_POST[nama_wisata_ina]',
									'$_POST[id_wisata]',
									'$_POST[kondisi]',
									'$judul_seo_en',
									'$judul_seo_ina',
									'".mysql_real_escape_string($_POST['isi_wisata_ina'])."',
									'".mysql_real_escape_string($_POST['isi_wisata_en'])."',
									now())");
  }
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='inside_wisata' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo_en      = seo_title($_POST['nama_wisata_en']);
  $judul_seo_ina      = seo_title($_POST['nama_wisata_ina']);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM inside_wisata WHERE id_inside_wisata='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/inside_wisata/$ex[gambar]");
		}
	
	UploadInsideWisata($nama_file_unik);
  
   mysql_query("UPDATE inside_wisata SET id_wisata = '$_POST[pilih_wisata]',
    								nama_wisata_en 	= '$_POST[nama_wisata_en]',
								   nama_wisata_ina 	= '$_POST[nama_wisata_ina]',
								   kondisi 			= '$_POST[kondisi]',
								   harga 			= '$_POST[harga]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_wisata_en 	= '".mysql_real_escape_string($_POST['isi_wisata_en'])."',
									isi_wisata_ina 	= '".mysql_real_escape_string($_POST['isi_wisata_ina'])."',
									tanggal			= NOW(),
									gambar			= '$nama_file_unik'
									WHERE id_inside_wisata = '$_POST[id]'");
									//echo $sql; exit;
	}
	else{
	mysql_query("UPDATE inside_wisata SET id_wisata = '$_POST[pilih_wisata]',
									nama_wisata_en 	= '$_POST[nama_wisata_en]',
								   nama_wisata_ina 	= '$_POST[nama_wisata_ina]',
								   kondisi 			= '$_POST[kondisi]',
								   harga 			= '$_POST[harga]',
									seo_en 			= '$judul_seo_en',
									seo_ina 		= '$judul_seo_ina',
									isi_wisata_en 	= '".mysql_real_escape_string($_POST['isi_wisata_en'])."',
									isi_wisata_ina 	= '".mysql_real_escape_string($_POST['isi_wisata_ina'])."',
									tanggal			= NOW()
									WHERE id_inside_wisata = '$_POST[id]'");//);
									//echo $sql; exit;
									
	}
  header('location:../../media.php?module='.$module);
}


?>
