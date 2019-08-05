<?php 
session_start(); 

   if(isset($_SESSION['login_user_admin']) || isset($_SESSION['login_user_manager'])){
      header("location:admin/welcome.php");
   }
   elseif (isset($_SESSION['login_user_teacher'])) {
       header("location:nsk/welcome.php");
   }
   elseif (isset($_SESSION['login_user_student'])) {
       header("location:smart/swelcome.php");
   }
   elseif (isset($_SESSION['login_user_parent'])) {
       header("location:parents/welcome.php");
   }



   require("config/config.php");

    $check_subdomain = mysqli_query($db,"SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db_database'");
    $countrow = mysqli_num_rows($check_subdomain);

    if($countrow == 1) {

      $schl_query = mysqli_query($db,"SELECT `school_name`, `school_code`, `school_address`, `slogo`, `slogan`, `recaptcha` FROM `schooldetails` ");
      $schl = mysqli_fetch_array($schl_query,MYSQLI_ASSOC);

    }else{

          ?><script> alert('<?php echo "School sub-domain is not valid!!!!"; ?>'); window.location.href = 'https://orangicsmarttechnology.com.np'; </script><?php
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo ((!empty($schl['school_name']))? $schl['school_name'] : 'Orangic Smart School Management'  ); ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login_assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">


				<div class="w-full schoolDetails">
                        <img style="width: 60px;" src="<?php $image=$schl["slogo"]; if(!empty($image)){ echo "uploads/".$fianlsubdomain."/logo/".$image; }else{ echo "login_assets/images/ossm.png"; } ?>"  alt="OSSM" class="avatar">
                        <p style="font-size: 20px; line-height: 1.2; text-align: center;margin-bottom: 10px;margin-top: 8px; text-transform: capitalize; "><?php echo $schl['school_name']; ?></p> 
                        <?php if(!empty($schl["slogan"])){ ?>
                         <h6 text-center style="margin-top: 10px; text-transform: capitalize;"><?php echo $schl["slogan"]; ?></h6>
                       <?php } ?>
				</div>


				<div class="login100-pic js-tilt" data-tilt>
					<img src="login_assets/images/img-01.png" alt="IMG">
				</div>

				<form id="admin_login" class="login100-form validate-form">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: abc@gmail.com">
						<input class="input100" type="email" name="username" placeholder="Email" 
							onclick="hideErrMsgAdmin()" value="<?php if(isset($_COOKIE["admin_username_hackster"])) { echo $_COOKIE["admin_username_hackster"]; } ?>"
						>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" 
							onclick="hideErrMsgAdmin()" value="<?php if(isset($_COOKIE["admin_password_hackster"])) { echo $_COOKIE["admin_password_hackster"]; } ?>"
						>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div style="color: red;" id='admin_login_failed'></div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<label for="chk_remember" class="rs pb20 clearfix">
		                     <input name="chk_remember" id="chk_remember" type="checkbox" class="chk-remember" <?php if($_COOKIE["remember_admin_login"]=="admin_remember_saved") { echo "checked"; } ?> />
		                     <span class="lbl-remember">Remember me</span>
		                </label>
					</div>

					<?php if($schl["recaptcha"] != 1 ){ ?>

                     <label class="rs pb20 clearfix">
                         <div id="admin1"></div>
                     </label>

                    <?php } ?>

                    <div style="color: red;" id='admin_recaptcha_failed'></div>

					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="submitBtn" type="submit">
							Login
						</button>
						<span id="loadingBtn" style="display: none; margin-right: 20px;"><img src="images/loading.gif" width="30px" height="30px"/></span>
					</div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div> -->

					<div class="loginFooter">
						<a class="txt2" href="register.php">
							Register New School
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				</form>

				<div class="poweredBySmall">
					Powered by &nbsp;<a href="http://orangicsmarttechnology.com.np"><img style="width: 90px;" src="login_assets/images/orangic_logo.png" alt="Orangic Smart Technology"></a>
				</div>


			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login_assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login_assets/js/main.js"></script>


<!--===============================================================================================-->
<?php if($schl["recaptcha"] != 1 ){ ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php } ?>
</body>

</html>
<script src='login_assets/l_hackster.js'></script>
<?php if($schl["recaptcha"] != 1 ){ ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<?php } ?>

</body>
</html>