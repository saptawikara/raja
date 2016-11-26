<!--===| Contact Body Start|===-->
  <section class="section-padding contact-wrapper">
    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-wrapper">
			<?php 
			$mp = mysql_fetch_array(mysql_query("SELECT * FROM modul where id_modul = '7'"));
			$nama_m  = $_SESSION['bahasa'] == "en" ? "nama_modul_".$_SESSION['bahasa'] : "nama_modul_ina";
			$isi_m   = $_SESSION['bahasa'] == "en" ? "static_content_".$_SESSION['bahasa'] : "static_content_ina";
			?>
			<h1><?php echo $mp[$nama_m]; ?></h1>
	 
			<?php echo $mp[$isi_m]; ?>
			<form id='contact_form' name="enqueryForm" method="post" action="proses-reservasi">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <input type="text" class="form-control" name="nama" placeholder="name">
                </div>
                <div class="col-xs-12 col-sm-12">
                  <input type="text" class="form-control" name="phone" placeholder="phone">
                </div>
                <div class="col-xs-12 col-sm-12">
                  <input id="email" type="email" class="form-control" name="email" placeholder="e-mail">
                </div>
                <div class="col-xs-12 col-sm-12">
                  <input type="text" class="form-control" name="subject" placeholder="subject">
                </div>
                <div class="col-xs-12 col-sm-12">
                  <textarea id="message" class="form-control" rows="4" name="message" placeholder="message"></textarea>
                </div>
               <div class="col-xs-12 col-sm-12">
					<div class="col-md-6">
						<img src="captcha/captcha.php?rand=<?php echo rand();?>" id='captcha_img'>
					</div>
				
					<input id="captcha_code" name="captcha_code" type="text" class="form-control" placeholder="Enter Captcha" style="width: 100%;" required>
					Can't read the image? click <a href='javascript: refresh_Captcha();'>here</a> to refresh.<br>
				</div>
               <button type="submit" class="btn btn-primary">Submit Message</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
			<iframe src="<?php echo $mp['extra'];?>" width="100%" height="400px"></iframe><!--//map-->
        </div>
      </div>
        </div>
  </section>
  <!--===| Contact Body End|===-->