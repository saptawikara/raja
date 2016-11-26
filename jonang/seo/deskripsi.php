<?php
$sql=mysql_query("SELECT static_content_en FROM modul WHERE id_modul = 92 ");
$s=mysql_fetch_array($sql);

$default = strip_tags($s['static_content_en']) ;
		
		if($_GET['mod']=='home')
	{
		echo "$default";
	}
	
	else if($_GET['mod']=='profile')
	{
		$sql = mysql_query("select * from profile where id_profile='9'");
		$j   = mysql_fetch_array($sql);
		echo strip_tags($j['isi_profile_ina']).$default;
	}
	
	
	
	else {
	
		echo "$default";
	}
		
?>