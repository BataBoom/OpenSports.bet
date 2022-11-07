<?php

require __DIR__ . '/includes/config/config.php';
use Curl\Curl;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$coin = filter_input(INPUT_POST, 'coin');
	$product = filter_input(INPUT_POST, 'plan');


	$username = $_SESSION['username'];
    $email =  $_SESSION['email'];
    $uid = $_SESSION['uid'];
    if ($product = 'basic'){
        $amount = 20;
    } elseif ($product = 'starter'){
        $amount = 30;
    } elseif($product = 'advanced'){
        $amount = 50;
    } else{
        $amount = 69;
    }
    $generateInvoice = newInvoice("$uid", $amount, "newnew");
    $oid = $generateInvoice[0];
    $addy = $generateInvoice[1];
    $_SESSION['orderID'] = $generateInvoice[0];
    $_SESSION['addy']  = $generateInvoice[1];
    


   
	$curl = new Curl();
	//$curl->setBasicAuthentication('Authorization', $userAPItoken);
	$curl->setHeader('Content-Type', 'application/json');
	$curl->post('https://bataboom.bet/pay4.php', [
    'product' => $product,
    'coin' => "btc",
    'username' => $username,
    'address' => $addy, 
    'amount' => $amount
    
]);
	if ($curl->error) {
    		 var_dump($curl->response);
} else {
    

			
			 $curl->close();
			
			echo "https://bataboom.bet/pay4.php?product=$product&coin=btc&address=$addy&amount=$amount";
			//header("Location:https://bataboom.bet/pay4.php?product=$product&coin=btc&address=$addy&amount=$amount");
			$curl->close();
}

		}
