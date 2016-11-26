<!--===================== MODUL CONTENT HOME =====================-->
<?php if($_GET['mod']=='home') { 
	include "jonang/page/home.php" ;?>

<!--===================== MODUL CONTENT ABOUT ====================-->
<?php } elseif($_GET['mod']=='profile') {
	include "jonang/page/profile.php" ;?>
	
<!--===================== MODUL CONTENT ARTIKEL ====================-->
<?php } elseif($_GET['mod']=='artikel') {
	include "jonang/page/artikel.php" ;?>
	
<!--===================== MODUL CONTENT ALBUM GALERI ====================-->
<?php } elseif($_GET['mod']=='album_galeri') {
	include "jonang/page/album_galeri.php" ;?>
		
<!--===================== MODUL CONTENT GALERI ====================-->
<?php } elseif($_GET['mod']=='galeri') {
	include "jonang/page/galeri.php" ;?>

	<!--===================== MODUL CONTENT VIDEO ====================-->
<?php } elseif($_GET['mod']=='video') {
	include "jonang/page/video.php" ;?>
	
<!--===================== MODUL CONTENT MAPS ====================-->
<?php } elseif($_GET['mod']=='kontak') {
	include "jonang/page/kontak.php" ;?>
	
<!--===================== MODUL AGENDA ====================-->
<?php } elseif($_GET['mod']=='agenda') {
	include "jonang/page/agenda.php" ;?>
	
<!--===================== MODUL PAKET TOUR ====================-->
<?php } elseif($_GET['mod']=='paket_wisata') {
	include "jonang/page/paket_wisata.php" ;?>
	
<!--===================== MODUL SUB PAKET TOUR ====================-->
<?php } elseif($_GET['mod']=='sub_paket') {
	include "jonang/page/sub_paket_wisata.php" ;?>
	
<!--===================== MODUL DETAIL PAKET WISATA ====================-->
<?php } elseif($_GET['mod']=='detail_paket_wisata') {
	include "jonang/page/detail_paket_wisata.php" ;?>
	
<!--===================== MODUL TUJUAN WISATA ====================-->
<?php } elseif($_GET['mod']=='tujuan_wisata') {
	include "jonang/page/tujuan_wisata.php" ;?>
	
<!--===================== MODUL DETAIL TUJUAN WISATA ====================-->
<?php } elseif($_GET['mod']=='detail_tujuan_wisata') {
	include "jonang/page/detail_tujuan_wisata.php" ;?>
	
<!--===================== MODUL DETAIL ARTIKEL ====================-->
<?php } elseif($_GET['mod']== 'detail_artikel') {
	include "jonang/page/detail_artikel.php" ;?>
	
<!--===================== MODUL DETAIL ARTIKEL ====================-->
<?php } elseif($_GET['mod']== 'detail_agenda') {
	include "jonang/page/detail_agenda.php" ;?>
	

	
<!--===================== MODUL KATEGORI WISATA ====================-->
<?php } elseif($_GET['mod']=='kategori_wisata') {
	include "jonang/page/kategori_wisata.php" ;?>
	
	
<!--===================== MODUL DETAIL KATEGORI WISATA ====================-->
<?php } elseif($_GET['mod']=='detail_kategori_wisata') {
	include "jonang/page/detail_kategori_wisata.php" ;?>
	
		
<!--===================== MODUL DETAIL PENCARIAN ====================-->
<?php } elseif($_GET['mod']== 'pencarian') {
	include "jonang/page/hasil_pencarian.php" ;?>
	


<?php } ?>