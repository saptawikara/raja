<?php

$sql=mysql_query("SELECT static_content_en FROM modul WHERE id_modul = '90' ");
$s=mysql_fetch_array($sql);

$default = trim($s['static_content_en']) ;

	if($_GET['mod']=='home')
	{
		echo "$default";
	}
	
	
	else if($_GET['mod']=='profile')
	{
		$sql=mysql_query("SELECT * FROM profile WHERE id_profile ='9' ");
		$s=mysql_fetch_array($sql);
		
			echo "$s[nama_profile_ina] | $default";
	}
	
	else if($_GET['mod']=='fasilitas')
	{
		echo "fasilitas | $default";
	}
	
	else if($_GET['mod']=='kegiatan')
	{
		echo "kegiatan | $default";
	}
	
	else if($_GET['mod']=='album_galeri')
	{
		echo "Album galeri | $default";
	}
	
	else if($_GET['mod']=='video')
	{
		echo "Video | $default";
	}
	
	else if($_GET['mod']=='maps')
	{
		echo "Maps | $default";
	}
	
	else if($_GET['mod']=='lokasi')
	{
		echo "Lokasi | $default";
	}
	
	else if($_GET['mod']=='testimoni')
	{
		echo "Testimoni | $default";
	}
	
	
	
	//////////////////// BLOG ARTIKEL ///////////////////
	else if($_GET['mod']=='konten_ganda')
	{
		$berita=mysql_query("SELECT * FROM konten_ganda WHERE kategori='$_GET[seo]'");
		$a=mysql_fetch_array($berita);
		
		echo "$a[kategori] | $default";
	}
	
	else if($_GET['mod']=='detail_konten_ganda')
	{
		$berita=mysql_query("SELECT * FROM konten_ganda WHERE id='$_GET[id]'");
		$a=mysql_fetch_array($berita);
		
		echo "$a[judul] | $default";
	}
	
	
	
	
	
	else {
	
		echo "$default";
	}

?>
