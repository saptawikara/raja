<?php
function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/produk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_height = 155;
  $dst_width = ($dst_height/$src_height)*$src_width;
 /** $dst_height = ($dst_width/$src_width)*$src_height;**/

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "s_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "s_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "s_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "s_" . $fupload_name);
      }
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function UploadSlide($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/slide/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadProduk($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/produk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadInsideWisata($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/inside_wisata/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "../../../files/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadBerita($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/materi/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadGambarHeader($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/header_image/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadKategori_fasilitas($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/kategori_fasilitas/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadWisata($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/wisata/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}




function UploadStatik($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/statik/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadProfile($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/profile/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadArtikel($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/artikel/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadPaket($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/paket/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadFasilitas($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/fasilitas/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadRoom_rates($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/room_rates/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadPromo($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/promo/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadArah($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/arah/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadHouse_nama($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/house_nama/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadHouse_fasilitas($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/house_fasilitas/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}



function UploadVideo($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/video/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadAlbum($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/album/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadGaleri($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/galeri/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadKatalbum($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/katalbum/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}
function UploadService_group($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/service_group/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadService_proyek($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/service_proyek/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadFasilitator($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/fasilitator/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadBuku($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/buku/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadFileBuku($fupload_name){
  //direktori file
  $vdir_upload = "../../../files/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['file']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload);
}

function UploadFileAlumni($fupload_name){
  //direktori file
  $vdir_upload = "../../../joimg/file_alumni/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


function UploadKaos($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/ourpartner/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


function UploadAgenda($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/agenda/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadBannerz($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/banner/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadSubimages($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/subimages/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

function UploadSubagenda($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/subagenda/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //tipe file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}


//upload slide
function UploadHeader($fupload_name){
  //direktori Header
  $vdir_upload = "../../../joimg/slides/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  
 //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 200 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 200;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "s_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  
}

//upload img sosial media
function UploadSosial($fupload_name){
  //direktori slide
  $vdir_upload = "../../../joimg/sosial/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

//upload pemasok
function UploadPemasok($fupload_name){
  //direktori slide
  $vdir_upload = "joimg/pemasok/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}



//upload Partner
function UploadPartner($fupload_name){
  //direktori slide
  $vdir_upload = "../../../joimg/partner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

//upload barang pemasok
function UploadBarangPemasok($fupload_name){
  //direktori slide
  $vdir_upload = "joimg/barangpemasok/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

//upload reseller
function UploadReseller($fupload_name){
  //direktori slide
  $vdir_upload = "joimg/reseller/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


//upload bank
function UploadBank($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/bank/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Set ukuran gambar hasil perubahan
  $dst_width = 60;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "sbank_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "sbank_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "sbank_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "sbank_" . $fupload_name);
      }
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

//upload news
function UploadNews($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../joimg/news/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli  
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Set ukuran gambar hasil perubahan
  $dst_width = 100;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "s_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "s_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "s_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "s_" . $fupload_name);
      }
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

//upload Testimoni
function UploadTestimoni($fupload_name){
  //direktori slide
  $vdir_upload = "../../../joimg/testimoni/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

//upload header dinamis
function UploadHeader_dinamis($fupload_name){
  //direktori slide
  $vdir_upload = "../../../joimg/header_dinamis/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

//upload Testimoni
function UploadTestimoni2($fupload_name){
  //direktori slide
  $vdir_upload = "../../joimg/testimoni/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

?>
