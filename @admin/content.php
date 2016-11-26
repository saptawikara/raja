<?php
include "../josys/koneksi.php";
include "../josys/library.php";
include "../josys/fungsi_combobox.php";
include "../josys/fungsi_amerikatgl.php";
include "../josys/class_paging.php";
include "../josys/fungsi_rupiah.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){ ?>
  <h4 class="alert_info">Selamat Datang Di Raja tours Indonesia admin panel.</h4>
		
		<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				
				<?php
					error_reporting(0);
					  // Statistik user
					  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
					  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
					  $waktu   = time(); // 

					  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
					  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
					  // Kalau belum ada, simpan data user tersebut ke database
					  if(mysql_num_rows($s) == 0){
					  } 
					  else{
					  }

					  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
					  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
					  $hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal'"), 0); 
					  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $bataswaktu       = time() - 300;
					  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

					  $path = "joinc/counter/";
					  $ext = ".png";

					  $tothitsgbr = sprintf("%06d", $tothitsgbr);
					  for ( $i = 0; $i <= 9; $i++ ){
						   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
					  }

					?>
				
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count"><?php echo"$pengunjung"; ?></p>
						<p class="overview_type">Visits</p>
						<p class="overview_count"><?php echo"$hits"; ?></p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">All Time</p>
						<p class="overview_count"><?php echo"$totalpengunjung"; ?></p>
						<p class="overview_type">Visits</p>
						<p class="overview_count"><?php echo"$totalhits"; ?></p>
						<p class="overview_type">Views</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article --><?php
  }
}
// Bagian Home
elseif ($_GET['module']=='halaman_home'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_home/home.php";
  }
}

// Bagian Header dinamis
elseif ($_GET['module']=='header_dinamis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_header_dinamis/header_dinamis.php";
  }
}

// Bagian profile
elseif ($_GET['module']=='profile'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profile/profile.php";
  }
}

// Bagian reservasi
elseif ($_GET['module']=='reservasi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_reservasi/reservasi.php";
  }
}

// Bagian profile footer
elseif ($_GET['module']=='profile_footer'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profile_footer/profile_footer.php";
  }
}

// Bagian kategori album
elseif ($_GET['module']=='katalbum'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katalbum/katalbum.php";
  }
}

// Bagian Kategori Wisata
elseif ($_GET['module']=='wisata'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_wisata/wisata.php";
  }
}

// Bagian kategori menu
elseif ($_GET['module']=='kategori_menu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori_menu/kategori_menu.php";
  }
}

// Bagian kategori furniture
elseif ($_GET['module']=='kategori_furniture'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori_furniture/kategori_furniture.php";
  }
}

// Bagian kategori fasilitas
elseif ($_GET['module']=='kategori_fasilitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori_fasilitas/kategori_fasilitas.php";
  }
}


// Bagian product
elseif ($_GET['module']=='product'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/product/index.php";
  }
}

// Bagian review
elseif ($_GET['module']=='review'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_review/review.php";
  }
}

// Bagian subcategory
elseif ($_GET['module']=='subcategory'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subcategory/subcategory.php";
  }
}

// Bagian berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_berita/berita.php";
  }
}

// Bagian artikel
elseif ($_GET['module']=='artikel'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_artikel/artikel.php";
  }
}

// Bagian artikel
elseif ($_GET['module']=='paket'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_paket/paket.php";
  }
}

// Bagian  fasilitas
elseif ($_GET['module']=='fasilitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_fasilitas/fasilitas.php";
  }
}

// Bagian  fasilitas
elseif ($_GET['module']=='room_rates'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_room_rates/room_rates.php";
  }
}

// Bagian  promo
elseif ($_GET['module']=='promo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_promo/promo.php";
  }
}

// Bagian  testimoni
elseif ($_GET['module']=='testimoni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_testimoni/testimoni.php";
  }
}

// Bagian  FAQ
elseif ($_GET['module']=='faq'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_faq/faq.php";
  }
}

// Bagian  Lokasi
elseif ($_GET['module']=='lokasi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_lokasi/lokasi.php";
  }
}

// Bagian  PETUNJUK ARAH
elseif ($_GET['module']=='arah'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_arah/arah.php";
  }
}

// Bagian house nama
elseif ($_GET['module']=='house_nama'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_house_nama/house_nama.php";
  }
}

// Bagian fasilitas & harga
elseif ($_GET['module']=='fasilitas_harga'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_fasilitas_harga/fasilitas_harga.php";
  }
}

// Bagian Proses fasilitas & harga
elseif ($_GET['module']=='proses_fasilitas_harga'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_proses_fasilitas_harga/proses_fasilitas_harga.php";
  }
}

// Bagian Proses fasilitas & harga
elseif ($_GET['module']=='proses_add_price'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_proses_add_price/proses_add_price.php";
  }
}

// Bagian Sub feature
elseif ($_GET['module']=='subfeature'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subfeature/subfeature.php";
  }
}

// Bagian order
elseif ($_GET['module']=='order'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_order/order.php";
  }
}


// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_agenda/agenda.php";
  }
}

// Bagian Newsletter
elseif ($_GET['module']=='newsletter'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_newsletter/newsletter.php";
  }
}

// Bagian comment
elseif ($_GET['module']=='comment'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_comment/comment.php";
  }
}


// Jasa ongkos kirim
elseif ($_GET['module']=='jasa'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_jasa/jasa.php";
  }
}
// Bagian ongkos
elseif ($_GET['module']=='ongkir'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ongkir/ongkir.php";
  }
}

// Bagian subcribe
elseif ($_GET['module']=='subcribe'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subcribe/subcribe.php";
  }
}


// Bagian slideshow
elseif ($_GET['module']=='slideshow'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_slideshow/slideshow.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri
elseif ($_GET['module']=='galeri'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galeri/galeri.php";
  }
}


// Bagian video
elseif ($_GET['module']=='video'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_video/video.php";
  }
}

// Bagian model
elseif ($_GET['module']=='model'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_model/model.php";
  }
}

// Bagian confirmation
elseif ($_GET['module']=='confirmation'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_confirmation/confirmation.php";
  }
}

// Bagian bank
elseif ($_GET['module']=='bank'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bank/bank.php";
  }
}

// Bagian banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian buku
elseif ($_GET['module']=='buku'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_buku/buku.php";
  }
}


// Bagian subimages
elseif ($_GET['module']=='subimages'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subimages/subimages.php";
  }
}

// Bagian subagenda
elseif ($_GET['module']=='subagenda'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_subagenda/subagenda.php";
  }
}

// Preorder produk
elseif ($_GET['module']=='produk'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_produk/produk.php";
  }
}

// Bagian Title
elseif ($_GET['module']=='title'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_title/title.php";
  }
}

// Bagian Description
elseif ($_GET['module']=='description'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_description/description.php";
  }
}

// Bagian Keyword
elseif ($_GET['module']=='keyword'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_keyword/keyword.php";
  }
}

// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_user/user.php";
  }
}

// Bagian static_content
elseif ($_GET['module']=='static_content'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_static_content/static_content.php";
  }
}

// Bagian download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}

// Bagian pesan
elseif ($_GET['module']=='pesan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_pesan/pesan.php";
  }
}

// Bagian sosial
elseif ($_GET['module']=='sosial'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sosial/sosial.php";
  }
}

// Bagian overview
elseif ($_GET['module']=='overview'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_overview/overview.php";
  }
}




// Bagian Testimoni
elseif ($_GET['module']=='testimoni'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_testimoni/testimoni.php";
  }
}


// Bagian Partner
elseif ($_GET['module']=='partner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_partner/partner.php";
  }
}

elseif ($_GET['module']=='inside_wisata'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_inside_wisata/inside_wisata.php";
  }
}



// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
