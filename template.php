<!DOCTYPE HTML>
<html lang="en" class="no-js"> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title><?php  include "jonang/seo/title.php"; ?></title>
  <meta name="keywords" content="<?php include "jonang/seo/keyword.php"; ?>">
  <meta name="description" content="<?php include "jonang/seo/deskripsi.php"; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no"/>
  
  <link rel="icon" type="image/png" href="img/favicon.png">

  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,100italic,100,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" type="text/css" href="style.css" media="screen">
   <link rel="stylesheet" type="text/css" href="css/main.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="css/custom_ganang.css" media="screen">
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
  <!-- tambahan -->
  <link rel="stylesheet" href="css/mega-menu/css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/mega-menu/css/style.css"> <!-- Resource style -->
  <script src="css/mega-menu/js/modernizr.js"></script> <!-- Modernizr -->

  <!-- tambahan end -->
  <!--[if lt IE 9]>
      <script type="text/javascript" src="js/ie.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  
</head>

<body>
 <!--===| Search Start |===-->
 <div class="search-wrapper">
   <div class="search-container">
    <div class="search-contents">
      <p class="close"><i class="fa fa-times"></i></p>
      <form action="pencarian" method="GET">
	    <input name="mod" value="pencarian" type="hidden">
        <input name="search" type="search" placeholder="type keyword(s) here">
       <button class="btn btn-primary btn-lg" type="submit">Search</button>
     </form>
    </div>
   </div>
 </div>
 <!--===| Search End |===-->
<!--===| Header Top Start |===-->
  <div id="offcanvas-container" class="wrapper offcanvas-container">
    <div class="inner-wrapper offcanvas-pusher">
    <div class="header-top">
          <div class="container-header">
            <div class="row">
            <div class="col-xs-12 hidden-xs col-sm-7">
				<ul class="fa-ul list-inline top-info level-one">
                  
				    <?php 
          $sosmed=mysql_query("SELECT * FROM sosial ORDER by id DESC");
          while($so=mysql_fetch_array($sosmed)){
        ?>

          <li style="margin-right: -3px;"><a href="<?php echo $so['link']; ?>"><img src="joimg/sosial/<?php echo $so['gambar']; ?>" style="padding:5px;"></a></li>
          <?php } ?>
                 
          <!-- alamat telphone -->
				  <?php 
					$phones=mysql_fetch_array(mysql_query("SELECT * FROM modul where id_modul='1'"));
					$emails=mysql_fetch_array(mysql_query("SELECT * FROM modul where id_modul='2'")

             );
					$isi_p  = $_SESSION['bahasa'] == "en" ? "static_content_".$_SESSION['bahasa'] : "static_content_ina";
					$isi_e  = $_SESSION['bahasa'] == "en" ? "static_content_".$_SESSION['bahasa'] : "static_content_ina";
				  ?> 
				 <!--  <li><i class="fa fa-phone"></i> <?php //echo strip_tags($phones[$isi_p]); ?></li>
          <li><i class="fa fa-envelope"></i> <?php //echo strip_tags($emails[$isi_e]); ?></li> -->
                </ul>  

            </div>
            <!-- Top right side content -->
            <div class="col-xs-12 col-sm-5">  
               <ul style="float: right; display: -webkit-inline-box;">
                <li><a href="in">IN <img style="width:33px;" src="img/flag/ina.png" title="Bahasa indonesia"></a></li>
                <li><a href="en">EN <img style="width:25px;" src="img/flag/eng.png" title="English"></a></li>
            <!--     <li><a href="bahasa.php?bahasa=ina">IN <img style="width:33px;" src="img/flag/ina.png" title="Bahasa indonesia"></a></li>
                <li><a href="bahasa.php?bahasa=en">EN <img style="width:25px;" src="img/flag/eng.png" title="English"></a></li> -->
              </ul>
            </div>


          </div>
          </div>
        </div>
        <!--===| Header Top End |===-->
      
        <header class="header-wrapper">
          <div class="container-header">
          <div class="row">
            <div class="col-xs-12">
              <div class="logo">
                <a title="Raja tours Indonesia" href="index.php">
                  <img id="logo" src="img/logo.png" alt="Raja tours Indonesia">
                </a>
              </div><!-- /Logo -->
              <!-- =========================================
              Menu
              ========================================== -->
              <div class="navbar navbar-default mainnav">
                <div class="navbar-header navbar-right pull-right">
                  <div id="offcanvas-trigger-effects" class="column">
                    <button type="button" class="navbar-toggle visible-sm visible-xs" data-toggle="offcanvas" data-target=".navbar-collapse" data-placement="right" data-effect="offcanvas-effect"> <i class="fa fa-bars"></i>
                    </button>
                  </div><!-- offcanvas-trigger-effects -->
                </div><!-- .navbar-header -->
               
			   <!-- menu dua bahasa -->
				<?php
				$beranda 	 = $_SESSION['bahasa'] == "en" ? "Home" : "Beranda" ;
				$about	 	 = $_SESSION['bahasa'] == "en" ? "About" : "Tentang" ;
				$artikel	 = $_SESSION['bahasa'] == "en" ? "Article" : "Artikel" ;
				$tour	 	 = $_SESSION['bahasa'] == "en" ? "Tour Package" : "Paket Wisata" ;
				$wisata	 	 = $_SESSION['bahasa'] == "en" ? "Category Tour" : "Kategori Wisata" ;
				$destination = $_SESSION['bahasa'] == "en" ? "Destination" : "Tujuan" ;
				$event	 	 = $_SESSION['bahasa'] == "en" ? "Event" : "Agenda" ;
				$album	 	 = $_SESSION['bahasa'] == "en" ? "Album Gallery" : "Album Galeri" ;
				$galeri	 	 = $_SESSION['bahasa'] == "en" ? "Gallery" : "Galeri" ;
				$foto	 	 = $_SESSION['bahasa'] == "en" ? "Photo" : "Foto" ;
				$video		 = $_SESSION['bahasa'] == "en" ? "Video" : "Video" ;
				$kontak		 = $_SESSION['bahasa'] == "en" ? "Contact" : "Kontak" ;
				
			
				?>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                 <!--    <li <?php if($_GET['mod']=="home"){?> class="active" <?php } else{ }?>><a href="index.php"><?php // echo $beranda ?></a></li> -->
                    <li ><a href="profile"><?php echo $about ?></a></li>
					 <!-- Kategori wisata -->
                    <li class="dropdown"><a href="kategori-wisata"><?php echo $wisata; ?> <i class="fa fa-angle-down"></i></a>
                      <div class="submenu-wrapper no-pointer-events submenu-wrapper-topbottom">
                        <div class="submenu-inner submenu-inner-topbottom">
                          <ul class="level-one dropdown-menu single-dropdown">
                          <?php 
            								$wisata_kat=mysql_query("SELECT * FROM wisata ORDER by id_wisata DESC");
            								while($wss=mysql_fetch_array($wisata_kat)){
            								$nama_ws  = $_SESSION['bahasa'] == "en" ? "nama_wisata_".$_SESSION['bahasa'] : "nama_wisata_ina";
            								$seo_ws   = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
            							?>
            								<li><a href="detail-kategori-wisata-<?php echo $wss[$seo_ws].'-'.$wss['id_wisata']; ?>"><?php echo $wss[$nama_ws]; ?></a></li>
            							<?php } ?>
                          </ul>
                        </div><!-- .submenu-inner -->
                      </div><!-- .submenu-sub-wrapper -->
                    </li>
          <!-- /Portfolio Pages -->
                    <!-- Mega Menu -->
                    <li class="dropdown mega-menus"><a href="tujuan-wisata"><?php echo $destination; ?><i class="fa fa-angle-down"></i></a>
                      <div class="submenu-wrapper no-pointer-events submenu-wrapper-topbottom megamenu-wrapper">
                        <div class="submenu-inner  submenu-inner-topbottom megamenu-inner">
                          <ul class="level2 dropdown-menu">
                            <li>
                              <div class="mega-content">
                                <div class="row">
                                  <div class="col-sm-9">
									   <?php 
											$kota_desti=mysql_query("SELECT * FROM kategori_furniture ORDER by id DESC");
											while($ds=mysql_fetch_array($kota_desti)){
											$nama_ds  = $_SESSION['bahasa'] == "en" ? "judul_".$_SESSION['bahasa'] : "judul_ina";
									   ?>
									   <div class="col-sm-4">
										<ul>
										  <!-- judul kategori -->
										  <li class="dropdown-header"><?php echo $ds[$nama_ds]; ?></li>
										  
										  <!-- sub kategori -->
										  <?php 
											$Desti=mysql_query("SELECT * FROM promo where id_katfurniture='$ds[id]' ORDER by id_promo DESC ");
											while($dt=mysql_fetch_array($Desti)){
											$nama_dt  = $_SESSION['bahasa'] == "en" ? "nama_promo_".$_SESSION['bahasa'] : "nama_promo_ina";
											$seo_dt   = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
										  ?>
											<li style="list-style-type:circle;"><a href="destination-tours-<?php echo $dt[$seo_dt].'-'.$dt['id_promo']; ?>"><?php echo $dt[$nama_dt]; ?></a></li>
											
										  <?php } ?>
										  <li style="list-style-type:circle; color:red;"><a style="color:red;" href="tujuan-wisata">View More</a></li>
										</ul>
									   </div> <!-- .col-sm-4 -->
									  <?php } ?>
                                  </div> <!-- .col-sm-9 -->
                                  
                                  <div class="col-sm-3">
                                    <ul class="menu-carousel">
                                      <li>
                                        <div id="myCarousel-menu" class="carousel slide" data-ride="carousel">
                                          <div class="carousel-inner">
                                             <?php 
  												$img_desti=mysql_query("SELECT * FROM promo ORDER by id_promo DESC LIMIT 10");
  												$id1=mysql_fetch_array($img_desti);
  												$nama_id  = $_SESSION['bahasa'] == "en" ? "judul_".$_SESSION['bahasa'] : "judul_ina";
  											?>
  										   <div class="item active">
                                                <a href="#-"><img style="height:140px;" src="joimg/promo/<?php echo $id1['gambar']; ?>" alt="<?php echo $id1[$nama_id]; ?>"></a>
                                              </div><!-- End Item -->
                                              
  											<?php while($id=mysql_fetch_array($img_desti)){?>
  											<div class="item">
                                              <a href="#-"><img style="height:140px;" src="joimg/promo/<?php echo $id['gambar']; ?>" class="img-responsive" alt="<?php echo $id[$nama_id]; ?>"></a>
                                            </div><!-- End Item -->
                                            <?php } ?>
										   
                                          </div><!-- End Carousel Inner -->
                                          <!-- Controls -->
                                          <a class="left carousel-control" href="#myCarousel-menu" data-slide="next"> <i class="fa fa-angle-left"></i></a>
                                          <a class="right carousel-control" href="#myCarousel-menu" data-slide="prev"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                      </li><!-- /.carousel -->
                                      <li class="mega-carousel-more"><a href="#-">View all Destination <i class="fa fa-angle-double-right"></i></a></li>
                                    </ul>
                                  </div> <!-- .col-sm-3 -->
                                </div> <!-- .row -->
                              </div> <!-- .mega-content -->
                            </li>
                          </ul>
                        </div> <!-- .submenu-inner -->
                      </div><!-- .submenu-wrapper -->
                    </li><!-- /Mega Menu -->
                   
                    <!-- Tour Package -->
                    <li class="dropdown"><a href="paket-wisata"><?php echo $tour; ?> <i class="fa fa-angle-down"></i></a>
                      <div class="submenu-wrapper no-pointer-events submenu-wrapper-topbottom">
                        <div class="submenu-inner submenu-inner-topbottom">
                          <ul class="level-one dropdown-menu single-dropdown">
                             <?php 
              								$tour_kat=mysql_query("SELECT * FROM kategori_menu ORDER by id DESC");
              								while($tw=mysql_fetch_array($tour_kat)){
              								$nama_tw  = $_SESSION['bahasa'] == "en" ? "judul_".$_SESSION['bahasa'] : "judul_ina";
              							?>
              								<li class="dropdown"><a href="paket-tour-<?php echo $tw['seo'].'-'.$tw['id']; ?>"><?php echo $tw[$nama_tw]; ?></a>
                    <!-- paket start -->
                     <!-- <div class="submenu-wrapper no-pointer-events submenu-wrapper-topbottom"> -->
                     <div class="submenu-wrapper no-pointer-events submenu-wrapper-topbottom">
                        <div class="submenu-inner submenu-inner-topbottom" style="
                               margin-top: -36px;
                               margin-left: 174px;
                          ">
                          <ul class="level-one dropdown-menu single-dropdown" >
                          <?php
                         $prod=mysql_query("SELECT * FROM produk where id_katmenu=$tw[id]");
                          while($data_product=mysql_fetch_array($prod)){
                            $nama_seo = $_SESSION['bahasa'] == "en" ? "seo_".$_SESSION['bahasa'] : "seo_ina";
                          ?>
                            <li>
                            <a href="detail-paket-tour-<?php echo $data_product[$nama_seo]."-".$data_product['id_produk']; ?>">
                            <?php   
                            $asu  = $_SESSION['bahasa'] == "en" ? "nama_produk_".$_SESSION['bahasa'] : "nama_produk_ina"; 
                            echo $data_product[$asu];
                            ?>
                            </a>
                            </li>
                          <?php
                          }
                          ?>

                          </ul>
                        </div><!-- .submenu-inner -->
                      </div><!-- .submenu-sub-wrapper -->
                    <!-- /Portfolio Pages -->
                    <!-- paket end -->


                              </li>
              							<?php } ?>
                          </ul>
                        </div><!-- .submenu-inner -->
                      </div><!-- .submenu-sub-wrapper -->
                    </li><!-- /Portfolio Pages -->
					
					<!-- event -->
                    <li><a href="agenda"><?php echo $event; ?></a></li><!-- /Contact Pages -->
					
					<!-- event -->
          <!--
					<li><a href="artikel"><?php // echo $artikel; ?></a></li> --><!-- /Contact Pages -->
                    
					<!-- Galeryy -->
                    <li class="dropdown"><a href="#"><?php echo $galeri; ?> <i class="fa fa-angle-down"></i></a>
                      <div class="submenu-wrapper no-pointer-events submenu-wrapper-topbottom">
                        <div class="submenu-inner submenu-inner-topbottom">
                          <ul class="level-one dropdown-menu single-dropdown">
                            <li><a href="album-galeri"><?php echo $galeri; ?></a></li>

                            <!-- test -->

                            <!-- test end -->
                            <li><a href="video"><?php echo $video; ?></a></li>
                          </ul>
                        </div><!-- .submenu-inner -->
                      </div><!-- .submenu-sub-wrapper -->
                    </li><!-- /Portfolio Pages -->
                    <!-- Contact Pages -->
                    <li><a href="kontak"><?php echo $kontak; ?></a></li><!-- /Contact Pages -->
                    <li><i id="search" class="flaticon-search74"></i></li><!-- /Contact Pages -->
                  </ul><!-- .navbar-nav -->
                </div><!-- .navbar-collapse -->
              </div><!-- .navbar -->
            </div><!-- .col-xs-12 -->
          </div><!-- .row -->
          </div> <!-- .container -->
        </header><!-- /header-wrapper -->      

		<!--==| Slider section==-->
		<?php include "jonang/slider.php"; ?>
		<!--==| Slider section End|==-->
 
		<!--==| MainContent section==-->
		<?php include "jonang/mainContent.php"; ?>
		<!--==| mainContent section End|==-->
 
		<!--==| Footer section==-->
		<?php include "jonang/footer.php"; ?>
		<!--==| Footer section End|==-->

</div><!--==| .inner-wrapper |==-->

    <!--==| offcanvas-menu |==-->
    <div class="offcanvas-menu offcanvas-effect  hidden-sm hidden-md hidden-lg">
      <button id="off-canvas-close-btn" class="close" type="button" aria-hidden="true" data-toggle="offcanvas" >&times;</button>
      <h2>MENU</h2>
      <ul>
        <!-- <li><a href="index.php">Home</a></li> -->
        <li><a href="profile">About</a></li> 
        <li><a href="kategori-wisata">Category Tours</a></li> 
        <li><a href="tujuan-wisata">Destination</a></li> 
        <li><a href="paket-wisata">Tour Package </a></li> 
        <li><a href="agenda">Event </a></li> 
        <<!-- li><a href="artikel">Article </a></li> -->
        <li><a href="#">Gallery </a></li> 
        <li><a href="kontak">Contact </a></li> 
      </ul>
    </div> <!-- .offcanvas-menu -->
  </div><!-- .wrapper -->

  <!--  JAVASCRIPT -->
  <script type="text/javascript" src="js/jquery.min.js"></script> 

  <!-- Modernizr JS --> 
  <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>

  <!--Bootatrap JS-->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <!-- Animate js -->
  <script type="text/javascript" src="js/wow.min.js"></script>

  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
  <script type="text/javascript" src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script type="text/javascript" src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

  <!-- Fancy Box JS -->
  <script type="text/javascript" src="vendor/fancybox/jquery.fancybox.min.js"></script>
  
  <!-- OWL CAROUSEL   -->
  <script type="text/javascript" src="js/owl.carousel.min.js"></script> 

  <!-- Offcanvas -->
  <script type="text/javascript" src="js/sidebarEffects.js"></script>
  <script type="text/javascript" src="js/classie.js"></script>

  <!-- Gallery Shuffle Js -->
  <script type="text/javascript" src="js/jquery.shuffle.min.js"></script>
   
  <!-- jQuery UI -->
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>

  <!-- Validation -->
  <script type="text/javascript" src="js/validation.js"></script>

  <!-- Tweetie JS  -->
  <script type="text/javascript" src="js/tweetie.min.js"></script>

  <!-- Google Map PopUp -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript" src="js/map-popup.js"></script>
  
  <!-- Css Preseter -->
  <script type="text/javascript" src="js/preset.js"></script>
  
  <!-- Custom script --> 
  <script type="text/javascript" src="js/custom.js"></script>

 </body>
</html>