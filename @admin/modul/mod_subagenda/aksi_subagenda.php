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

	// Update subagenda
	if ($module=='subagenda' AND $act=='update'){
	  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){	  
			$tampil=mysql_query("SELECT * FROM subagenda WHERE id='$_POST[id]'");
			$ex=mysql_fetch_array($tampil);
			if($ex['gambar'] != ''){
				unlink("../../../joimg/subagenda/$ex[gambar]");
			}
			
			Uploadsubagenda($nama_file_unik);
		  
			mysql_query("UPDATE subagenda SET 	
											judul 	= '$_POST[judul]',
											link 	= '$_POST[link]',
											gambar	= '$nama_file_unik'
									WHERE id  = '$_POST[id]'");
		}else{
			mysql_query("UPDATE subagenda SET 	
											judul 	= '$_POST[judul]',
											link 	= '$_POST[link]'
								WHERE id  = '$_POST[id]'");
		}
		header('location:../../media.php?module='.$module.'&id='.$_POST['id_agenda']);
	}
	
	// Update Hapus Message
	elseif ($module=='subagenda' AND $act=='hapus'){	  
		$tampil=mysql_query("SELECT * FROM subagenda WHERE id='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
			unlink("../../../joimg/subagenda/$ex[gambar]");
			mysql_query("DELETE FROM subagenda WHERE id='$_GET[id]'");
		}else {
			mysql_query("DELETE FROM subagenda WHERE id='$_GET[id]'");
		}
		header('location:../../media.php?module='.$module.'&id='.$_GET['id_agenda']);
	}

	// Update Tambah subagenda
	elseif ($module=='subagenda' AND $act=='insertnew'){  
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
	  
		if(!empty($lokasi_file)){	  
			Uploadsubagenda($nama_file_unik);
	  
			mysql_query("INSERT INTO subagenda(judul,
											   id_agenda,
											   link,
										       gambar,
											   tanggal) 
										VALUES('$_POST[judul]',
										       '$_POST[id_agenda]',
										       '$_POST[link]',
										       '$nama_file_unik',
											   now() )");
		}else{
			mysql_query("INSERT INTO subagenda(judul,
											   id_agenda,
											   link,
											   tanggal) 
										VALUES('$_POST[judul]',
										       '$_POST[id_agenda]',
										       '$_POST[link]',
											   now() )");
		}
		header('location:../../media.php?module='.$module.'&id='.$_POST['id_agenda']);
	}

}
?>
