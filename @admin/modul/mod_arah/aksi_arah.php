<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus arah
if ($module=='arah' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM direction_sub WHERE id='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM direction_sub WHERE id='$_GET[id]'");
    unlink("../../../joimg/direction_sub/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM direction_sub WHERE id='$id'");
	}
	
	header('location:../../media.php?module='.$module);
}

// Input header
elseif ($module=='arah' AND $act=='insertnew'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadArah($nama_file_unik);
	
    mysql_query("INSERT INTO direction_sub(nama,
									 id_direction,
									 link,
									 gambar,
									 tanggal) 
                            VALUES('$_POST[nama]',
									'$_POST[id_direction_sub]',
									'$_POST[link]',
									'$nama_file_unik',
									now())");
	}else {
	 mysql_query("INSERT INTO direction_sub(nama,
									 id_direction,
									 link,
									 tanggal) 
                            VALUES('$_POST[nama]',
									'$_POST[id_direction_sub]',
									'$_POST[link]',
									now())");
	}
  header('location:../../media.php?module='.$module);
}

// Update header
elseif ($module=='arah' AND $act=='update'){
  $arah_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
	if(!empty($arah_file)){
  
	$tampil=mysql_query("SELECT * FROM direction_sub WHERE id='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/arah/$ex[gambar]");
		}
	
	UploadArah($nama_file_unik);
  
    mysql_query("UPDATE direction_sub SET nama			= '$_POST[nama]',
									id_direction		= '$_POST[id_direction_sub]',
									link 				= '$_POST[link]',
									tanggal				= NOW(),
									gambar				= '$nama_file_unik'
									WHERE id  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE direction_sub SET nama			= '$_POST[nama]',
									id_direction		= '$_POST[id_direction_sub]',
									link 				= '$_POST[link]',
									tanggal				= NOW()
									WHERE id  = '$_POST[id]'");
	}
  header('location:../../media.php?module='.$module);
}

// Update header
if ($module=='arah' AND $act=='update_header'){
  
  $arah_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  
	if(!empty($arah_file)){
	
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
