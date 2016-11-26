<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
 <center>Anda harus login dulu <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard Admin Rajatours</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	

	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
	</script>
	<!-- TinyMCE 4.x -->
 
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
 
tinymce.init({
  selector: "textarea",
  
  // ===========================================
  // INCLUDE THE PLUGIN
  // ===========================================
	
  plugins: [
    "advlist autolink lists link image charmap print preview anchor spellchecker",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages"
  ],
	
  // ===========================================
  // PUT PLUGIN'S BUTTON on the toolbar
  // ===========================================
	
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect |  bullist numlist outdent indent | link image jbimages",
	
  // ===========================================
  // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
  // ===========================================
	
  relative_urls: false
	
});
 
</script>
<!-- /TinyMCE -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="?module=home">Rajatours Admin</a></h1>
			<h2 class="section_title">
			<?php if ($_GET['module']=='home') {?>
			Dashboard
			<?php } elseif ($_GET['module']=='profile'){?>
			Edit Profil
			<?php } elseif ($_GET['module']=='profile_footer'){?>
			Edit Profil Footer
			<?php } elseif ($_GET['module']=='halaman_home'){?>
			Edit Halaman home
			<?php } elseif ($_GET['module']=='fasilitator'){?>
			Edit fasilitator
			<?php } elseif ($_GET['module']=='katalbum'){?>
			Edit Katagori album
			<?php } elseif ($_GET['module']=='brands'){?>
			Edit Brands
			<?php } elseif ($_GET['module']=='slideshow'){?>
			Edit Slideshow
			<?php } elseif ($_GET['module']=='static_content'){?>
			Edit Content Website
			<?php } elseif ($_GET['module']=='pesan'){?>
			Read Message
			<?php } elseif ($_GET['module']=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET['module']=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET['module']=='keyword'){?>
			Edit Keyword Website
			<?php } elseif ($_GET['module']=='user'){?>
			Edit Change Password
			<?php } elseif ($_GET['module']=='subcategory'){?>
			Edit Sub category
			<?php } elseif ($_GET['module']=='artikel'){?>
			Edit Activity
			<?php } elseif ($_GET['module']=='fasilitas'){?>
			Edit Fasilitas
			<?php } elseif ($_GET['module']=='promo'){?>
			Edit Art & Furniture
			<?php } elseif ($_GET['module']=='lokasi'){?>
			Edit Lokasi
			<?php } elseif ($_GET['module']=='arah'){?>
			Edit Arah
			<?php } elseif ($_GET['module']=='order'){?>
			Edit Order Elliottii
			<?php } elseif ($_GET['module']=='sosial'){?>
			Edit Sosial Media
			<?php } elseif ($_GET['module']=='video'){?>
			Edit video
			<?php } elseif ($_GET['module']=='testimoni'){?>
			Edit Testimoni
			<?php } elseif ($_GET['module']=='agenda'){?>
			Edit Agenda
			<?php } elseif ($_GET['module']=='reservasi'){?>
			Edit Reservation
			
			<?php } ?>
			
			</h2><div  class="btn_view_site"><a  href="../index.php" target='_BLANK'>View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="?module=home">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">
			<?php if ($_GET['module']=='home') {?>
			Dashboard
			<?php } elseif ($_GET['module']=='profile'){?>
			Edit Profil
			<?php } elseif ($_GET['module']=='profile_footer'){?>
			Edit Profil Footer
			<?php } elseif ($_GET['module']=='halaman_home'){?>
			Edit Halaman home
			<?php } elseif ($_GET['module']=='fasilitator'){?>
			Edit fasilitator
			<?php } elseif ($_GET['module']=='katalbum'){?>
			Edit Katagori album
			<?php } elseif ($_GET['module']=='brands'){?>
			Edit Brands
			<?php } elseif ($_GET['module']=='slideshow'){?>
			Edit Slideshow
			<?php } elseif ($_GET['module']=='static_content'){?>
			Edit Content Website
			<?php } elseif ($_GET['module']=='pesan'){?>
			Read Message
			<?php } elseif ($_GET['module']=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET['module']=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET['module']=='keyword'){?>
			Edit Keyword Website
			<?php } elseif ($_GET['module']=='user'){?>
			Edit Change Password
			<?php } elseif ($_GET['module']=='subcategory'){?>
			Edit Sub category
			<?php } elseif ($_GET['module']=='artikel'){?>
			Edit Activity
			<?php } elseif ($_GET['module']=='fasilitas'){?>
			Edit Fasilitas
			<?php } elseif ($_GET['module']=='promo'){?>
			Edit Art & Furniture
			<?php } elseif ($_GET['module']=='lokasi'){?>
			Edit Lokasi
			<?php } elseif ($_GET['module']=='arah'){?>
			Edit Arah
			<?php } elseif ($_GET['module']=='order'){?>
			Edit Order Elliottii
			<?php } elseif ($_GET['module']=='sosial'){?>
			Edit Sosial Media
			<?php } elseif ($_GET['module']=='video'){?>
			Edit video
			<?php } elseif ($_GET['module']=='testimoni'){?>
			Edit Testimoni
			<?php } elseif ($_GET['module']=='album'){?>
			Edit Album
			<?php } elseif ($_GET['module']=='galeri'){?>
			Edit Galeri
			<?php } elseif ($_GET['module']=='agenda'){?>
			Edit Agenda
			<?php } elseif ($_GET['module']=='reservasi'){?>
			Edit Reservation
			
			<?php } ?>
			</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		
		<h3>Main Menu</h3>
		<ul class="toggle">
	
			<li class="icn_categories"><a href="?module=static_content&id=94">Home</a>
			<li class="icn_categories"><a href="?module=static_content&id=1">Phone Header</a>
			<li class="icn_categories"><a href="?module=static_content&id=2">Email Header</a>
			<li class="icn_categories"><a href="?module=profile">Profile</a></li>
			<li class="icn_categories"><a href="?module=static_content&id=7">Contact Us</a></li>
		</ul>
		
		<h3>Menu utama</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=wisata">Kategori Wisata</a></li>
			<li class="icn_categories"><a href="?module=inside_wisata">Wisata</a></li>
			<li class="icn_categories"><a href="?module=agenda">Agenda</a></li>
			<li class="icn_categories"><a href="?module=artikel">Artikel</a></li>
		</ul>
		
		<h3>Paket Tour</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=kategori_menu">Kategori Paket Tour</a></li>
			<li class="icn_categories"><a href="?module=produk">Paket Tour</a></li>
		
		</ul>
		
		<h3>Destinasi</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=kategori_furniture">Kategori Destinasi</a></li>
			<li class="icn_categories"><a href="?module=promo">Destinasi</a></li>
		</ul>
		
		
		<h3>Footer</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=static_content&id=3">Jam Buka</a></li>
			<li class="icn_categories"><a href="?module=profile_footer">Profile footer</a></li>
			<li class="icn_categories"><a href="?module=static_content&id=4">Contact Footer</a></li>
		</ul>
		

		
		<h3>Menu Galeri foto album</h3>
		<ul class="toggle">
			<!--<li class="icn_categories"><a href="?module=katalbum">Kategori album</a></li>-->
			<li class="icn_categories"><a href="?module=album">Album foto</a></li>
			<li class="icn_categories"><a href="?module=galeri">Galeri foto</a></li>
			<li class="icn_categories"><a href="?module=video">Koleksi Video</a></li>
			
		</ul>
		
		
		<h3>Menu Support</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?module=slideshow">Slideshow</a></li>
			<li class="icn_categories"><a href="?module=reservasi">Reservation</a></li>
			<li class="icn_categories"><a href="?module=pesan">Message</a></li>
			<li class="icn_categories"><a href="?module=sosial">Social Media</a></li>
			
		</ul>
		<h3>SEO</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="?module=title">Title</a></li>
			<li class="icn_settings"><a href="?module=description">Description</a></li>
			<li class="icn_settings"><a href="?module=keyword">Keyword</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_profile"><a href="?module=user">Change Password</a></li>
			<li class="icn_jump_back"><a href="logout.php">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p  align="justify" style="margin-bottom:10px; padding: 11px;">Jika Anda kesulitan dalam menginputkan data, silahkan hubungi kami :<br />
			&nbsp; &nbsp; <strong>HOTLINE : 0274 8280770</strong> atau
			<strong><br />&nbsp;&nbsp; SMS : 0822 2300 0770</strong><br />
			&nbsp;&nbsp;<strong> E-mail :  support@jogjasite.com</strong></p>
			<p style="margin-bottom:10px;"><strong>Copyright &copy; 2016 Jogjasite.com</strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	<section id="main" class="column">
		<?php include('content.php'); ?>
	</section>
</body>
</html>
<?php
}
?>