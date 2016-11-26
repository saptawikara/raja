<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_indotgl.php";

$module=$_GET[module];
$act=$_GET[act];



// Hapus header
if ($module=='testimoni' AND $act=='hapus'){
	
	$id = $_GET['id'];
	$gbr= $_GET['file'];
	
	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM testimoni WHERE id_testimoni='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM testimoni WHERE id_testimoni='$_GET[id]'");
    unlink("../../../joimg/testimoni/$cek[gambar]");   
	} else { 
	mysql_query("DELETE FROM testimoni WHERE id_testimoni='$id'");
	}
	
  header('location:../../media.php?module='.$module);
}


// Update
if ($module=='testimoni' AND $act=='update'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
	
	//Apabila gambar tidak kosong
	if(!empty($lokasi_file)){
	
	$tampil=mysql_query("SELECT * FROM testimoni WHERE id_testimoni='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/testimoni/$ex[gambar]");
		}
	
	UploadTestimoni($nama_file_unik);
	mysql_query("UPDATE testimoni SET 	
									nama			= '$_POST[nama]',
									isi			 	= '".mysql_real_escape_string($_POST[isi])."',
									tanggal			= '$tgl_sekarang',
									gambar			= '$nama_file_unik',
                                    hari			= '$hari_ini'
                            WHERE id_testimoni	    = '$_POST[id]'");
	} else {
	mysql_query("UPDATE testimoni SET 	
									nama			= '$_POST[nama]',
									isi			 	= '".mysql_real_escape_string($_POST[isi])."',
									tanggal			= '$tgl_sekarang',
                                    hari			= '$hari_ini'
                            WHERE id_testimoni	    = '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}
// Update Room Type
if ($module=='testimoni' AND $act=='insertnew'){
  
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
    //Apabila gambar tidak kosong
	if(!empty($lokasi_file)){
	UploadTestimoni($nama_file_unik);
	mysql_query("INSERT INTO testimoni(
									nama,
									isi,
									tanggal,
									gambar,
									hari) 
                            VALUES(
								   '$_POST[nama]',
								   '".mysql_real_escape_string($_POST[isi])."',
								   '$tgl_sekarang',
								   '$nama_file_unik',
								   '$hari_ini')");
	}else{
	mysql_query("INSERT INTO testimoni(
									nama,
									isi,
									tanggal,
									hari) 
                            VALUES(
								   '$_POST[nama]',
								   '".mysql_real_escape_string($_POST[isi])."',
								   '$tgl_sekarang',
								   '$hari_ini')");	
	}
  header('location:../../media.php?module='.$module);
}

//update publish
elseif($module=='testimoni' AND $act=='updatestatus')
{
	$id   = $_GET['id'];
	$stat = $_GET['stat'];
	if($stat=='N')
	{
		mysql_query("UPDATE testimoni SET aktif='Y' WHERE id_testimoni='$id'");
	}
	else
	{
		mysql_query("UPDATE testimoni SET aktif='N' WHERE id_testimoni='$id'");
	
}
header('location:../../media.php?module='.$module);
}


}
?>
