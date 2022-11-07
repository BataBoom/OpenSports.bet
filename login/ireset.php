<?php
session_start();
require __DIR__ . '/../includes/config/config.php';
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Reset Password</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
</head>
<body>

	<section class="container">
			<section class="verify-form">
				
					<form role="login" method="POST" action="update.php">
					<img src="assets/images/logo3.png" class="img-responsive" alt="" />
					<input type="email" name="email" placeholder="<?php echo $_SESSION['reset_email'];?>" value="<?php echo $_SESSION['reset_email'];?>" required class="form-control input-lg" />
					<input type="code" name="code" placeholder="<?php echo $_REQUEST['code'];?>" value="<?php echo $_REQUEST['code'];?>" required class="form-control input-lg" />
					<input type="password" name="password" placeholder="New Password?" required class="form-control input-lg" />
				<?php if (isset($_SESSION['reset'])): ?>
				<div class="alert alert-success alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php
					echo $_SESSION['reset'];
					unset($_SESSION['reset']);
					?>
				</div>
				<?php endif; ?>
					<button type="submit" class="btn btn-lg btn-primary btn-block">Update Password</button>
				</form>
				<div class="form-links">
					<a href="mailto:contact@bataboom.bet">Contact@OpenSports.Bet</a>
					
					
				</div>
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
