<?php
session_start();
require __DIR__ . '/../includes/config/config.php';
/*
if ($_SERVER['HTTP_REFERER'] === "https://opensports.bet/login/register.php
" && isset($_SESSION['valid_email'])) {
} else {
header("Location:https://opensports.bet");
}
*/
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Verify Account</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
</head>
<body>

<center>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperTable" style="max-width:600px">
  <tbody>
    <tr>
      <td align="center" valign="top">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="oneColumn" style="background-color: rgb(255, 255, 255);">
          <tbody>
            <tr>
              <td align="center" valign="top" style="padding-bottom: 40px;" class="imgPost"><a href="#" style="text-decoration:none"><img alt="" border="0" src="http://weekly.grapestheme.com/newsletter/img/hero/account.png" style="width:100%;max-width:600px;height:auto;display:block" width="600"></a></td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding-bottom: 20px; padding-left: 20px; padding-right: 20px;" class="title">
                <h2 class="bigTitle" style="color:#313131;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:26px;font-weight:600;font-style:normal;letter-spacing:normal;line-height:34px;text-align:center;padding:0;margin:0">Welcome Aboard,  <?php echo $_SESSION['valid_email'];?>!</h2>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding-bottom:20px">
                <table border="0" cellpadding="0" cellspacing="0" width="50" class="divider" align="center">
                  <tbody>
                    <tr>
                      <td align="center" style="border-bottom:2px solid #8d6cd1;font-size:0;line-height:0">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding-bottom: 20px; padding-left: 20px; padding-right: 20px;" class="description">
                <p class="midText" style="color:#919191;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:20px;text-align:center;padding:0;margin:0">Please verify your email by clicking the link in your inbox. <b>Unvalidated Accounts will be deleted after 10 days.</b><br><br></p>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding-bottom: 40px; padding-left: 20px; padding-right: 20px;" class="btn-card">
                <table border="0" cellpadding="0" cellspacing="0" align="center">
                  <tbody>
                    <tr>
                      <td align="center" style="background-color:#8d6cd1;padding-top:10px;padding-bottom:10px;padding-left:25px;padding-right:25px;border-radius:2px" class="postButton"><a href="https://opensports.bet/dashboard/deposit.php" style="color:#fff;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:600;letter-spacing:1px;line-height:20px;text-transform:uppercase;text-decoration:none;display:block">CONTiNUE</a></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding-bottom: 40px; padding-left: 20px; padding-right: 20px;" class="description">
                <p class="midText" style="color:#313131;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:20px;text-align:center;padding:0;margin:0">Cashier: <a href="https://opensports.bet/dashboard/deposit.php" style="color:#8d6cd1">https://opensports.bet/dashboard/deposit.php</a></p>
              </td>
            </tr>
          </tbody>
        </table>
       
			
			
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
