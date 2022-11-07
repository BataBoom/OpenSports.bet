<?php
session_start();
require __DIR__ . '/../includes/config/config.php';
use Curl\Curl;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = filter_input(INPUT_POST, 'email');

	$curl = new Curl();
	$curl->setBasicAuthentication('Authorization', $userAPItoken);
	$curl->setHeader('Content-Type', 'application/json');
	$curl->post('https://api.m3o.com/v1/user/SendPasswordResetEmail', [
    'email' => $email,
    'fromName' => 'Open Sports Bet',
    'subject' => 'Password Reset',
    'textContent' => "Hi there,\n click here to reset your password: https://opensports.bet/login/ireset.php?code=$"."code"
]);
	var_dump($curl->response);

			//Registration successfull redirect user
	        $_SESSION['reset_email'] = $email;
			$_SESSION['reset'] = "Password Reset sent!";
			header('Location:ireset.php');
}
		
	?>
