<?php
	$sql=mysql_query("SELECT static_content_en FROM modul WHERE id_modul = 91");
	$s=mysql_fetch_array($sql);
	$cek = mysql_num_rows($sql);

	echo strip_tags($s['static_content_en']); 
?>