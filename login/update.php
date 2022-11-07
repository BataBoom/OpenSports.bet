<?php
session_start();
require __DIR__ . '/../includes/config/config.php';
use Curl\Curl;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = filter_input(INPUT_POST, 'email');
	$code = filter_input(INPUT_POST, 'code');
	$pass = filter_input(INPUT_POST, 'password');

	$curl = new Curl();
	$curl->setBasicAuthentication('Authorization', $userAPItoken);
	$curl->setHeader('Content-Type', 'application/json');
	$curl->post('https://api.m3o.com/v1/user/ResetPassword', [
    'code' => "$code",
    'confirmPassword' => "$pass",
    'email' => "$email",
    'newPassword' => "$pass"
]);
	
	if ($curl->error) {
    		 $_SESSION['reset'] = "Error!";
    		 $curl->close;
			 header('Location:index.php');
			exit();
			
} else {
			 $_SESSION['reset'] = "Password Updated Successfully!";
    		 $curl->close;
			 header('Location:index.php');
			exit();

}
}
		
	?>
