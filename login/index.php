<?php

require __DIR__ . '/../includes/config/config.php';
if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === TRUE) && ($_SESSION['login_expires'] > $unixTime))
{
	header('Location:../index.php');
}
unset($_SESSION['valid_email']);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Login</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>

</head>
<body>
<?php 
							if ($_REQUEST['code'] === 'abc'){

					$code = "Code is set at two.";
				} else {

					$code = "Code is not set!";
				}


				?>
	<section class="container">
			<section class="login-form">
				<p><?php 
				//echo $code;

				?></p>
					<form role="login" method="POST" action="auth.php">
					<img src="assets/images/newOSB.png" class="img-responsive" alt="" />
					<input type="email" name="email" placeholder="Email" required class="form-control input-lg" />
					<input type="password" id="pw" name="password" placeholder="Password" required class="form-control input-lg" />
						<?php if (isset($_SESSION['login_failure'])): ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php
					echo $_SESSION['login_failure'];
					unset($_SESSION['login_failure']);
					?>
				</div>
				<?php endif; ?>
				<?php if (isset($_SESSION['register_success'])): ?>
				<div class="alert alert-success alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php
					echo $_SESSION['register_success'];
					unset($_SESSION['register_success']);

					?>
				</div>
				<?php endif; ?>
		
				  
      <div class="h-captcha" data-sitekey="<?php echo $hcaptcha;?>" data-theme="dark"></div>
					<button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
					<div>
						<a href="register.php">Create account</a> or <a href="reset.php">reset password</a>
					</div>
				</form>
				    <script>
      onload();
    </script>
				<div class="form-links">
					<a href="mailto:contact@OpenSports.bet">Contact@OpenSports.Bet</a>
					<br>
					<span style="color:#d0a5f8; font-size:8px;">This site is protected by hCaptcha and its <a href="https://hcaptcha.com/privacy">Privacy Policy</a> and <a href="https://hcaptcha.com/terms">Terms of Service</a> apply.</span>
				</div>
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
