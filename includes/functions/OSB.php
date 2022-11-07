<?php
use Curl\Curl;
use Monero\Wallet;
//ini_set('display_errors', 0);


function trackUser() {

if (isset($_SESSION['uid'])) {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $email = $_SESSION['email'];
    $uid = $_SESSION['uid'];
    $timeNow = time();
    $string = $url."|".$email."|".$uid."|".$timeNow."\n";
    error_log($string, 3, "/var/www/bb/includes/logs/trackerv1.log");
    }

}


function readOffer($id){

    $readOffer = readW("id", "$id", "invoiceOffers", 1);

    return $readOffer[0];
}



/* Cashier Functions */
function generateAddress(){
    $btc = new \Shucream0117\Bitcoin\Bitcoin(
    'yourbot', // rpcuser
    'admin', // rpcpassword
    '1.1.1.1', // host
    8332, // port
    false // if use HTTPS
);

$response = $btc->callApi('getnewaddress');
$responseArray = json_decode($response->getBody()->getContents(), true);
return $responseArray['result'];
}

function generateLTCAddress(){
    $btc = new \Shucream0117\Bitcoin\Bitcoin(
    'liteuser', // rpcuser
    'int3r3st1ngz', // rpcpassword
    '1.1.1.1', // host
    9332, // port
    false // if use HTTPS
);

$response = $btc->callApi('getnewaddress');
$responseArray = json_decode($response->getBody()->getContents(), true);
return $responseArray['result'];
}

function generateXMRAddress(){

    $hostname = '127.0.0.1';
    $port = '28088';
    $wallet = new Monero\Wallet($hostname, $port);
    $address =  $wallet->integratedAddress();
    $responseArray = json_decode($address);
    $value = array('pid'=>$responseArray->payment_id, 'address'=>$responseArray->integrated_address);
    return $value;

}

function checkAddress($address){
    global $address;
    $btc = new \Shucream0117\Bitcoin\Bitcoin(
    'yourbot', // rpcuser
    'admin', // rpcpassword
    '1.1.1.1', // host
    8332, // port
    false // if use HTTPS
);
$response = $btc->callApi(
    'getreceivedbyaddress',
    [$address]
);




$responseArray = json_decode($response->getBody()->getContents(), true);
return $responseArray['result'];
}

function validateAddress($txid){
    global $txid;
    $btc = new \Shucream0117\Bitcoin\Bitcoin(
    'yourbot', // rpcuser
    'admin', // rpcpassword
    '1.1.1.1', // host
    8332, // port
    false // if use HTTPS
);

$response = $btc->callApi(
    'gettransaction',
    [$txid]
);




$responseArray = json_decode($response->getBody()->getContents(), true);
return $responseArray;

}



function incomingCoin($coin, $address){

    /* TEST
    BTC = bc1qe5g2u6mnhad8suthfpgzqyy0zq5zez53jhaac6
    LTC = ME4cu8Utg5EqtyJ3KsVwYT2Cwcxe1vzdyJ
    */

    if ($coin == 'btc'){
//$address = "bc1q7dtte05jt99wqtsm4p0q09gphdc735zcsa53q4";
$btc = new \Shucream0117\Bitcoin\Bitcoin(
    'yourbot', // rpcuser
    'admin', // rpcpassword
    '1.1.1.1', // host
    8332, // port
    false // if use HTTPS
);

$response = $btc->callApi(
    'getreceivedbyaddress',
    ["$address"]
);
$responseArray = json_decode($response->getBody(), true);
$result = $responseArray['result'];


 } elseif ($coin == 'ltc') {

$btc = new \Shucream0117\Bitcoin\Bitcoin(
    'liteuser', // rpcuser
    'int3r3st1ng2018', // rpcpassword
    '1.1.1.1', // host
    9332, // port
    false // if use HTTPS
);

$response = $btc->callApi(
    'getreceivedbyaddress',
    ["$address"]
);
$responseArray = json_decode($response->getBody(), true);
$result = $responseArray['result'];


    } elseif ($coin == 'xmr'){

    $hostname = '127.0.0.1';
    $port = '28088';
    $wallet = new Monero\Wallet($hostname, $port);
    $result = $wallet->getPayments("$address");
    $responseArray = json_decode($result['result']['payments']);
    $result = array('pid'=>$responseArray->payment_id, 'address'=>$responseArray->address, 'amount'=>$responseArray->amount);
    
   

    }
    return $result;
}


//Function for sending out aMember Invoices
function newInvoice($uid, $productID, $invoiceID, $coin, $duration, $amount, $cryptoamt, $promoCode) {
    global $dbKey;
    $unixNow = time();
    $expires = strtotime("+30 mins");
    if ($coin == 'btc'){
    $address = generateAddress();
     $wallet = 'bitcoin';
    }elseif ($coin == 'ltc'){
        $address = generateLTCAddress();
         $wallet = 'litecoin';
    } elseif ($coin == 'xmr'){
        $newXMR = generateXMRAddress();
        $address = $newXMR['address'];
        $label = $newXMR['pid'];
        $wallet = 'monero';
    }


$record = array('uid'=>$uid, 'product_id' => $productID, 'invoice_id'=>$invoiceID, 'address' => $address, 'currency'=>$coin, 'duration' => $duration,  'amount' => $amount,  'amt_crypto' => $cryptoamt, 'promo'=>$promoCode, 'expires'=>$expires, 'created'=>$unixNow, 'status'=>"unpaid", 'label'=>$label);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'invoices'
    
]);
if ($curl->error) {
     error_log("Offer Invoice Error! Table: invoices Query: $record Function: newInvoice\n", 3, "/var/www/bb/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $full = array($grabLogin['id'], $address);
    $curl->close();
    btcQR("$address", "$cryptoamt", "$wallet");
    return $full;
}


}

//Function for proposing Invoices to users that haven't yet logged into aMember, diff Invoice Id's this way.
function offerInvoice($uid, $productID, $duration, $amount, $promoCode, $ip) {
    global $dbKey;
    global $ip;
    $unixNow = time();
    $expires = strtotime("+60 mins");
    $record = array('uid'=>$uid, 'product_id' => $productID, 'duration' => $duration,  'amount' => $amount, 'promo'=>$promoCode, 'expires'=>$expires, 'created'=>$unixNow, 'status'=>"unpaid", 'ip' => $ip, 'crypto_address' => '', 'crypto_amt'=>'', 'currency'=>'');
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'invoiceOffers'
    
]);
if ($curl->error) {
     error_log("Offer Invoice Error! Table: invoiceOffers Query: $record Function: offerInvoice\n", 3, "/var/www/bb/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    return $grabLogin['id'];
}


}






function readInvoice($slipid){
    /* NOT WORKING DELETE */
global $dbKey;
global $results;
//column name, search premise, table
$q = "'";
$slipid = "id == " . $q . $id . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>$slipid,
    'table' =>"invoices",
    'limit'=>1
]);
if ($curl->error) {
      error_log("Read DB Error! Table: invoices Query: $slipid Function: readInvoice\n", 3, "/var/www/bb/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}


//!GOATED Query Function ReadW!//
function readW($sort, $query, $table, $limit){
global $dbKey;
global $w;
//column name, search premise, table
$q = "'";
$order_id = $sort . " == " . $q . $query . $q;
//$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => $table,
    'limit'=>$limit,
    'order'=>"desc"
]);
if ($curl->error) {
     error_log("Read DB Error! Table: $table Query: $order_id Function: readW\n\n", 3, "/var/www/bb/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);

    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}


function remoteIP(){

$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
    $ip = $_SERVER['HTTP_X_REAL_IP'];
} elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $commapos = strrpos($ip, ',');
    $ip = trim( substr($ip, $commapos ? $commapos + 1 : 0) );
}

return $ip;

}


function LogMeIn($email, $passwd){

global $userAPItoken;
    
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Login', [
    'email' => $email,
    'password' => $passwd
]);
    if ($curl->error) {
            $_SESSION['login_failure'] = "Invalid user name or password";
            header('Location:index.php');
            
} else {

    $curl->response;
    $encrypted_sesh = encrypt_decrypt('encrypt', $grabLogin['session']['id']);
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['login_expires'] = $grabLogin['session']['expires'];
    $_SESSION['uid'] = $grabLogin['session']['userId'];
    $_SESSION['token'] = $encrypted_sesh;
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    $uid = $grabLogin['session']['userId'];
    fetchUser($uid);
    $expire = $_SESSION['login_expires'];
    $arr_cookie_options = array (
//              'value' => $encrypted_sesh,
                'expires' => $expire,
                'path' => '/',
                'domain' => '.opensports.bet', 
                'secure' => true,     
                'httponly' => false,  
                'SameSite' => 'strict'
                );
setcookie('NBZONE', $encrypted_sesh, $arr_cookie_options); 
setcookie('user', $uid, $arr_cookie_options); 
    $curl->close();
    //Authentication successfull redirect user
            header('Location:../index.php');
        }
    }


/* Registration Functions */

function Register($email, $passwd, $username, $group, $note){

global $userAPItoken;
global $site;
global $fromName;


$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
    $ip = $_SERVER['HTTP_X_REAL_IP'];
} elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $commapos = strrpos($ip, ',');
    $ip = trim( substr($ip, $commapos ? $commapos + 1 : 0) );
}


    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Create', [
    'email' => $email,
    'password' => $passwd,
    'username' => $username,
    'profile' => array('group'=>$group, 'note'=>$note, 'site'=>$site)
    
]);
    if ($curl->error) {
             $_SESSION['login_failure'] = "Error!";
             $_SESSION['logged_in'] = FALSE;

             $curl->close;
             $response = 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $_SESSION['valid_email'] = $email;
    $curl->close();
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/SendVerificationEmail', [
    'email' => $email,
    'failureRedirectUrl' => "$site/login/failed.php",
    'fromName' => $fromName,
    'redirectUrl' => "$site/login",
    'subject' => "$fromName Email verification",
    'textContent' => "Hi there,Please verify your email by clicking this link: $"."micro_verification_link"
]);

            //Registration successfull redirect user
            $response = header("Location:$site/login/iverify.php");

        }
$curl->close();
var_dump($response);
//Register("sixtynine@bb.com", "sixtynine", "sixtynine", "sixtynine", "LEGEND");
}
function create_userID(){
    $bytes = random_bytes(6);
    return bin2hex($bytes);
}
/* Auth & Login Functions */
function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'naPvJ_5}85M=@)t!';
    $secret_iv = 'eYD;2[(2n[GcVX-_';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a w>
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
    }

function fetchUser($uid) {
    global $userAPItoken;
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Read', [
    'id' => $uid

]);
    if ($curl->error) {
     //// echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
     LogMeOut();
    
} else {

    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    return $grabSesh['account'];
    }
    $curl->close();
}



/* Log out */



function killSesh(){
    //global $decrypted_sesh;
    global $userAPItoken;
    $decrypted_sesh = encrypt_decrypt('decrypt', $_COOKIE['NBZONE']);
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Logout', [
    'sessionId' => $decrypted_sesh
]);
   
    $curl->close();
}

function LogMeOut(){

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

setcookie("NBZONE", "", time()-(60*60*24*7),"/");
unset($_COOKIE["NBZONE"]);
session_destroy();
killSesh();
header("Location:https://nbz.one/login/index.php");
}

function checkSession() {
    global $userAPItoken;
    global $decrypted_sesh;
    global $ip;
    $decrypted_sesh = encrypt_decrypt('decrypt', $_COOKIE['NBZONE']);
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/ReadSession', [
    'sessionId' => $decrypted_sesh
]);
    if ($curl->error) {
    // // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
     LogMeOut();
     //header("Location:https://bataboom.co/login/index.php");
    
} else {

    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    $curl->close();
    $username = $_SESSION['username'];
    $isSub = checkSub($username);
}

if ($grabSesh['session']['id'] === $decrypted_sesh && $_SESSION['logged_in'] === TRUE && $isSub === TRUE){
$_SESSION['valid'] = TRUE;
} elseif ($isSub === FALSE) {
$noSubReport = "Username=".$username."ip=".$ip."\n";
error_log($noSubReport, 3, "/var/www/bb/includes/logs/noSubReport.log");
header("Location:https://nbz.one/renew.php");
} else {
LogMeOut();
//header("Location:https://bataboom.co/login/index.php");
}


$curl->close();
}

function changeEmail($uid, $newEmail){
global $userAPItoken;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $userAPItoken);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/user/Update', [
    'email' => "$newEmail",
    'id' => $uid
]);
if ($curl->error) {
   // // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    // echo "Success";
}
$curl->close();
}




/* Database Operations */
function listTables(){
    global $dbKey;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/ListTables');

    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $listTables = json_decode($jsonEncoded, true);
    print_r($listTables);
    $curl->close();
}



function readDB($sort, $query, $table, $orderBy){
global $dbKey;
//column name, search premise, table
$q = "'";
$order_id = $sort . " == " . $q . $query . $q;
$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => $table,
    'orderBy'=>$orderBy,
    'limit'=>1000,
    'order'=>"desc"
]);
if ($curl->error) {
     error_log("Read DB Error! Table: $table Query: $order_id\n", 3, "/var/www/bb/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    print_r($grabLogin['records']);
}
$curl->close();
}


function updateDB($table, $column, $data, $id){
global $dbKey;
global $n;
//table, column name, updated Data, data ID
$record = array($column=>$data,'id'=>$id);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Update', [
    'table' => $table,
    'record' => $record
]);
$curl->close();
}

function deleteDB($table, $id){
global $dbKey;
global $i;
//table, data ID
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Delete', [
    'id' => $id,
    'table' => $table
]);
if ($curl->error) {

} else {
      error_log("DB Table Deleted! Table: $table\n", 3, "/var/www/bb/includes/logs/custom.log");
}
$curl->close();
}

function countDB($table){
global $dbKey;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Count', [
    'table' => $table
    
]);
  $fetchResponse = $curl->response;
  $jsonEncoded = json_encode($fetchResponse);
  $grabLogin = json_decode($jsonEncoded, true);
  return $grabLogin['count'];
$curl->close();
}

function renameTable($from, $to){
global $dbKey;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/RenameTable', [
    'from' => $from,
    'to'=> $to
    
]);
var_dump($curl->response);
$curl->close();
}

function trunkDB($table){
global $dbKey;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Truncate', [
    'table' => $table
    
]);
$curl->close();
}

function dropDB($table){
global $dbKey;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/DropTable', [
    'table' => $table
    
]);

$curl->close();
}


/* Crypto Stuff */

function btcQR($addy, $amt, $network){
global $qr;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $qr);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/qr/Generate', [
    'size' => 300,
    'text' => "$network:$addy?amount=$amt"
    
]);
if ($curl->error) {

   error_log("QR Conversion Failed!\n", 3, "/var/www/bb/includes/logs/custom.log");

} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['qr'];
    $curl->close();
    //return $grabQR;
    $curl = new Curl();
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->download($grabQR, "/var/www/bb/tmp/qr/$network-qr-$addy.png");
     //$curl->diagnose();
    $curl->close();
   
    }
}

function btcusd() {
global $btcusd;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $btcusd);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/bitcoin/Price', [
    'symbol' => "BTCUSD"
    
]);
if ($curl->error) {
   error_log("Crypto Conversion Failed!\n", 3, "/var/www/bb/includes/logs/custom.log");
  
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabBTCNow = json_decode($jsonEncoded, true);
    return $grabBTCNow['price'];
}
$curl->close();
}


function cryptousd($coin) {
global $cryptousd;

$join = $coin . "USD";
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $cryptousd);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/crypto/History', [
    'symbol' => $join
    
]);
if ($curl->error) {
   error_log("Crypto Conversion Failed!\n", 3, "/var/www/bb/includes/logs/custom.log");


} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabBTCNow = json_decode($jsonEncoded, true);
        return $grabBTCNow['close'];
}
$curl->close();
}



/* OTP */

function generateOTP($id) {
global $OTPtoken;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $OTPtoken);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/otp/Generate', [
    'id' => $id
    
]);
if ($curl->error) {
     header('HTTP/1.1 400 BadRequest');
     error_log("Could not generate OTP userID: $id! Function: generateOTP\n", 3, "/var/www/bb/includes/logs/custom.log");
        die();
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabStat = json_decode($jsonEncoded, true);
    return $grabStat['code'];
}
$curl->close();
}

function validateOTP($id, $code) {
global $OTPtoken;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $OTPtoken);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/otp/Validate', [
    'id' => $id,
    'code' => $code
    
]);
if ($curl->error) {
    header('HTTP/1.1 400 BadRequest');
    error_log("Could not validate OTP userID: $id! Function: validateOTP\n", 3, "/var/www/bb/includes/logs/custom.log");
    die();
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabStat = json_decode($jsonEncoded, true);
    if ($grabStat['success'] === TRUE){
        $result = TRUE;
        // THEORY=> var_export($sessionData->JSON);

    } else {
        $result = FALSE;
    }
}
return $result;
$curl->close();
}




function fetchValidated($id) {
    global $userAPItoken;
$curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Read', [
    'username' => $id

]);
    if ($curl->error) {
    header('HTTP/1.1 400 BadRequest');
     error_log("Could not fetchValidated userID: $id! Function: fetchValidated\n", 3, "/var/www/bb/includes/logs/custom.log");
    die();
    
} else {

    $isActive = checkSub($id);
}
if (boolval($isActive)){
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    $_SESSION['email'] = $grabSesh['account']['email'];
    $_SESSION['username'] = $grabSesh['account']['username'];
    $_SESSION['created'] = $grabSesh['account']['created'];
    $_SESSION['updated'] = $grabSesh['account']['updated'];
    $_SESSION['verified'] = $grabSesh['account']['verified'];
    $_SESSION['active'] = TRUE;
    echo "User Authenticated Successfully!";
    }
    $curl->close();
}


function fetchUsername($uid) {
    global $userAPItoken;
$curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Read', [
    'id' => $uid

]);
    if ($curl->error) {
    header('HTTP/1.1 400 BadRequest');
     error_log("Could not fetch userID: $uid! Function: fetchUsername\n", 3, "/var/www/bb/includes/logs/custom.log");
    die();

    
} else {


    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    $_SESSION['email'] = $grabSesh['account']['email'];
    $_SESSION['username'] = $grabSesh['account']['username'];
    $_SESSION['created'] = $grabSesh['account']['created'];
    $_SESSION['updated'] = $grabSesh['account']['updated'];
    $_SESSION['verified'] = $grabSesh['account']['verified'];
    }
    $curl->close();
}

/* Check Invoices */

function setPaid($orderID, $orderType){
    global $dbKey;

    $unixNow = time();

    
    $record = array('realid'=>$orderID, 'created'=>$unixNow, 'status'=>"unpaid", 'type'=>$orderType);
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $dbKey);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'setpaid'
    
    ]);
    $curl->close();

}


function filterSetPaid($srch){

  //$listIt = (strtotime($end_date) >= strtotime('today') ? 1 : 0);
  
    $results = readW("status", "unpaid", "setpaid", "1000");
    $unixNow = time();
    $checkTime = date('Y-m-d H:i:s', $unixNow);
    $onehourago = date('Y-m-d H:i:s', strtotime( $checkTime . " -6 hours"));
    $readMarkedPaid = array_values(array_filter($results, function($var) {
    return ($var['created'] >= $onehourago && $var['status'] == 'unpaid');

}));

$realID = array_column($readMarkedPaid, 'realid');
$typical = array();
$offers = array();  

    foreach ($readMarkedPaid as $key => $value){
        foreach($value as $k => $v){
        if ($k == "type" && $v == "1"){
        $typical[$key] = array($realID[$key]);
        } elseif ($k == "type" && $v == "2"){
        $offers[$key] = array($realID[$key]);
        }
    }
}
    $Invoices = array('typical'=>array_values($typical),'offers'=>array_values($offers));

    $newTypical = $Invoices['typical'];
    $parseTyp = array_column($newTypical, 0);
    $countTypical = count($newTypical);
    for ($w = 0; $w < $countTypical; ++$w){
    $invoiceInfo = readW("id", "$parseTyp[$w]", "invoices", "1");
    $coin = $invoiceInfo[0]['currency'];
    $address = $invoiceInfo[0]['address'];
    $amount = $invoiceInfo[0]['amount'];
    $amountRecieved = incomingCoin($coin, $address);
    $checker[$parseTyp[$w]] = array($coin, $address, $amount, $amountRecieved);
    //$checker2[$w] = array($coin, $address, $amount, $amountRecieved, $parseTyp[$w]);

    //print_r($checker);

    $invoiceAmt = array_column($checker, 2);
    $invoicePaid = array_column($checker, 3);
    $checkerKeys = array_keys($checker);
    if ($invoicePaid[$w] != '0' && $invoicePaid[$w] >= $invoiceAmt[$w]){
        $findmarkedID = readW("realid", "$checkerKeys[$w]", "setpaid", "1");
        $realID = $findmarkedID[0]['id'];
        $easier = $findmarkedID[0]['realid'];
        updateDB("setpaid", "status", "paid", "$realID");
        updateDB("invoices", "status", "paid", "$easier");
        echo "ADDED!";
    //Credit User STill to Come!
    } //elseif (Fractional Payments!)
}



    $newOffers = $Invoices['offers'];
    $parseOffers = array_column($newOffers, 0);
    $countOffers = count($newOffers);
    for ($w = 0; $w < $countOffers; ++$w){
    $invoiceInfoz = readW("id", "$parseOffers[$w]", "invoiceoffers", "1");
    $coin = $invoiceInfoz[0]['currency'];
    $address = $invoiceInfoz[0]['crypto_address'];
    $amount = $invoiceInfoz[0]['crypto_amt'];
    $amountRecieved = incomingCoin($coin, $address);
    $Offerchecker[$parseOffers[$w]] = array($coin, $address, $amount, $amountRecieved);
    //$Offerchecker2[$w] = array($coin, $address, $amount, $amountRecieved, $parseOffers[$w]);
    //print_r($Offerchecker)


    $offerAmt = array_column($Offerchecker, 2);
    $offerPaid = array_column($Offerchecker, 3);
    $offerKeys = array_keys($Offerchecker);
    if ($offerPaid[$w] != '0' && $offerPaid[$w] >= $offerAmt[$w]){
        $findmarkedID = readW("realid", "$offerKeys[$w]", "setpaid", "1");
        $realID = $findmarkedID[0]['id'];
        $easier = $findmarkedID[0]['realid'];
        updateDB("setpaid", "status", "paid", "$realID");
        updateDB("invoiceoffers", "status", "paid", "$easier");
        echo "ADDED!";
          //Credit User STill to Come!
        } //elseif (Fractional Payments!)
    }
}




?>
