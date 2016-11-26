<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>

		<?php
		
		$aksi="modul/mod_user/aksi_user.php";
			$user = mysql_query("SELECT * FROM users WHERE username='admin'");
				$g=mysql_fetch_array($user);
		
		if($_POST['submit']=="Change"){
				$old = trim($_POST['old']);
				$baru = trim($_POST['baru']);
				$passold=md5($_POST['old']);
				$pass=md5($_POST['baru']);
				if($passold=="$g[password]") {
					include('josys/koneksi.php');
					mysql_query("UPDATE users SET 	password = '$pass'
                            WHERE username  = 'admin'");
							
					echo '<h4 class="alert_success">Password changed</h4><br/>';
					
				}
				else {
					echo '<h4 class="alert_error">Sorry wrong !!</h4><br/>';
				}
		}
		?>
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Change Password</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='?module=user'>
				<input type="hidden" name="username" value="<?php echo"$g[username]" ?>">
				<div class="module_content">
						<fieldset>
							<label>Old Password</label>
							<input name="old" type="text">
						</fieldset>
						<fieldset>
							<label>New Password</label>
							<input name="baru" type="text">
						</fieldset>
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="submit" value="Change" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		
		
<?php } ?>