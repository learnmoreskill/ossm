<!DOCTYPE html>
<html lang="en">
<head>
	<title>Orangic Smart School Management</title>
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
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login_assets/images/img-01.png" alt="IMG">
				</div>

				<form id="register_school_form" class="login100-form validate-form">
					<span class="login100-form-title">
						Register School
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Please enter school name">
						<input class="input100" type="text" name="nameofschool" placeholder="School name" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-graduation-cap" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter school address">
						<input class="input100" type="text" name="address" placeholder="School full address" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter your name">
						<input class="input100" type="text" name="name" placeholder="Your full name" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter your contact number">
						<input class="input100" type="number" name="contact" placeholder="Contact number" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: abc@gmail.com">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="submitBtn" type="submit">
							Login
						</button>
						<span id="loadingBtn" style="display: none; margin-right: 20px;"><img src="images/loading.gif" width="30px" height="30px"/></span>
					</div>


					<div class="loginFooter">
						<a class="txt2" href="index.php">
							Back to login
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
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