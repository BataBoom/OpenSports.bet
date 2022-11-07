<?php
require __DIR__ . '/../includes/config/config.php';
use Curl\Curl;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = filter_input(INPUT_POST, 'email');
	$username = filter_input(INPUT_POST, 'username');
	$amount = filter_input(INPUT_POST, 'amount');
	$coin = filter_input(INPUT_POST, 'coin');
	$uid = filter_input(INPUT_POST, 'uid');
	$addr = filter_input(INPUT_POST, 'addr');

$record = array('email'=>$email,'username'=>$username,'uid'=>$uid, 'coin'=>$coin,'amount'=>$amount,'addr'=>$addr,'created_at'=>$today,'updated_at'=>$now,'status'=>"NEW");

	$curl = new Curl();
	$curl->setBasicAuthentication('Authorization', $dbKey);
	$curl->setHeader('Content-Type', 'application/json');
	$curl->get('https://api.m3o.com/v1/db/Create', [
    'record'=>$record,
    'table' => 'withdrawls'
    
]);
	if ($curl->error) {
		$curl->close();
    $_SESSION['withdraw_error'] = "Error";
	header("Location:withdrawl.php");
	exit();
}
	$curl->close();
    $_SESSION['withdraw'] = "Created";
	header("Location:withdrawl.php");
	exit();

			

		}

	
