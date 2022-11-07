<?php
use Curl\Curl;
use Monero\Wallet;
error_reporting(E_ALL);
/* aMember Pro */

/* Lookup Invoice */
function srchInvoice($invoiceno){
$curl = new Curl();
$curl->setHeader('X-API-Key', 'DyMdMmzUB4nsM777HWeU');
$curl->get("https://bb.co/membership/api/invoices/$invoiceno");
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    return $grabLogin;
  // echo $jsonEncoded->currency;
}
$curl->close();
}


/* Pay actual invoice */
function payInvoice(int $invoiceno, int $uid, string $txnid, int $amount){


$curl = new Curl();
$curl->setHeader('X-API-Key', 'DyMdMmzUB4nsM777HWeU');
$curl->post('https://bb.co/membership/api/invoice-payments', [

    'invoice_id' => $invoiceno,
    'user_id' => $uid,
    'paysys_id' => 'offline',
    'receipt_id' => '1',
    'transaction_id' => $txnid,
    'currency' => 'USD',
    'amount' => $amount
    
]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    print_r($grabLogin);
}
$curl->close();
}

/* credit time for actual invoice */
function creditUser(string $address){

$locateInvoice = readW("address", "$address", "invoices", "1");
$invoiceno = array_column($locateInvoice, 'invoice_id');
$duration = array_column($locateInvoice, 'duration');
$uid = array_column($locateInvoice, 'uid');
$status = array_column($locateInvoice, 'status');
$pid = array_column($locateInvoice, 'product_id');
$id = array_column($locateInvoice, 'id');
$amount = array_column($locateInvoice, 'amount');


if ($status[0] == 'paid'){
payInvoice("$invoiceno[0]", "$uid[0]", "$id[0]", "$amount[0]");
$curl = new Curl();
$curl->setHeader('X-API-Key', 'DyMdMmzUB4nsM777HWeU');
$curl->post("https://bb.co/membership/api/access/&_filter[user_id]=$uid[0]", [

    'invoice_id' => $invoiceno[0],
    'invoice_item_id' => $invoiceno[0],
    'invoice_payment_id' => 1,
    'user_id' => $uid[0],
    'product_id' => $pid[0],
    'transaction_id' => $id[0],
    'begin_date' => date("Y-m-d"),
    'expire_date' => date("Y-m-d", strtotime("+" . $duration[0]))
    
]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    print_r($grabLogin);
}
$curl->close();
}
}


/* Cashier Functions */
function generateAddress(){
    $btc = new \Shucream0117\Bitcoin\Bitcoin(
    'yourbot', // rpcuser
    'admin', // rpcpassword
    '69.232.69.1', // host
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
    '69.232.69.1', // host
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
    '69.232.69.1', // host
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
    '69.232.69.1', // host
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

    if ($coin == 'btc'){
//$address = "bc1q7dtte05jt99wqtsm4p0q09gphdc735zcsa53q4";
$btc = new \Shucream0117\Bitcoin\Bitcoin(
    'yourbot', // rpcuser
    'admin', // rpcpassword
    '69.232.69.1', // host
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
    'int3r3st1ngz', // rpcpassword
    '69.232.69.1', // host
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
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'invoices'
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $full = array($grabLogin['id'], $address);
    btcQR("$address", "$cryptoamt", "$wallet");
    return $full;
}
$curl->close();

}

function createInvoice($name, $orderID, $amount, $promoCode){
        global $merchant_id;
        $curl = new Curl();
        $curl->setOpt(CURLOPT_CUSTOMREQUEST, 'GET');
        $curl->setOpt(CURLOPT_NOBODY, true);
        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
        $curl->get("https://api.cryptonator.com/api/merchant/v1/startpayment?item_name=$name&order_id=$orderID&invoice_amount=$amount&item_description=$promoCode&invoice_currency=usd&merchant_id=$merchant_id");
        $new_url = $curl->effectiveUrl;
        header("Location:$new_url");
        $curl->close();
}

function createCoreInvoice($name, $orderID, $amount, $promoCode){
        global $merchant_id;
        $curl = new Curl();
        $curl->setOpt(CURLOPT_CUSTOMREQUEST, 'GET');
        $curl->setOpt(CURLOPT_NOBODY, true);
        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
        $curl->get("https://api.cryptonator.com/api/merchant/v1/startpayment?item_name=$name&order_id=$orderID&invoice_amount=$amount&item_description=$promoCode&invoice_currency=usd&merchant_id=$merchant_id");
        $new_url = $curl->effectiveUrl;
        header("Location:$new_url");
        $curl->close();
}


function updateBank($uid, $balance) {
    global $dbKey;
$record = array('id' => $uid, 'balance' => $balance);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Update', [
    'record' => $record,
    'table' => 'bank'
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    var_dump($curl->response);
}
$curl->close();
}

function creditInvoice($orderID){
    global $dbKey;
    global $now;
//table, column name, updated Data, data ID
$record = array('status'=>"Credited",'id'=>$orderID,'updated_at'=>$now);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Update', [
    'table' => "invoices",
    'record' => $record
]);

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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

/* Registration Functions */
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
    $_SESSION['email'] = $grabSesh['account']['email'];
    $_SESSION['username'] = $grabSesh['account']['username'];
    $_SESSION['created'] = $grabSesh['account']['created'];
    $_SESSION['updated'] = $grabSesh['account']['updated'];
    $_SESSION['verified'] = $grabSesh['account']['verified'];
    return $grabSesh['account'];
    }
    $curl->close();
}

function getIP() {
        $result = null;

        //for proxy servers
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $result = end(array_filter(array_map('trim', explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']))));
        }
        else {
            $result = $_SERVER['REMOTE_ADDR'];
        }

        return $result;
    }


/* Log out */



function killSesh(){
    //global $decrypted_sesh;
    global $userAPItoken;
    $decrypted_sesh = encrypt_decrypt('decrypt', $_COOKIE['encrypted_sesh']);
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
/*
setcookie("BataBoom", "", time()-(60*60*24*7),"/");
setcookie("encrypted_sesh", "", time()-(60*60*24*7),"/");
unset($_COOKIE["BataBoom"]);
unset($_COOKIE["encrypted_sesh"]);
*/
unset($_COOKIE["encrypted_sesh"]);
session_destroy();
killSesh();
header("Location:https://bb.co/login/index.php");
}

function checkSession() {
    global $userAPItoken;
    global $decrypted_sesh;
    $decrypted_sesh = encrypt_decrypt('decrypt', $_COOKIE['encrypted_sesh']);
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/ReadSession', [
    'sessionId' => $decrypted_sesh
]);
    if ($curl->error) {
    // // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
     LogMeOut();
     //header("Location:https://bataboom.bet/login/index.php");
    
} else {

    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    $curl->close();
}

if ($grabSesh['session']['id'] === $decrypted_sesh && $_SESSION['logged_in'] === TRUE){
$_SESSION['valid'] = TRUE;
} else {
LogMeOut();
//header("Location:https://bataboom.bet/login/index.php");
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

/* Crons */
function uploadScore($gid, $winners, $vs, $newDate, $homeScore, $awayScore, $total, $totalFH, $FHWinners, $diffFH, $diff, $homeTM, $awayTM, $winLoc, $sport) {
    global $dbKey;
    global $dubcity;
$record = array('id' => $gid[$dubcity], 'gameid' => $gid[$dubcity], 'bookieGID' => $gid[$dubcity], 'winner' => $winners[$dubcity], 'game' => $vs[$dubcity], 'start' => $newDate[$dubcity], 'homescore'=>$homeScore[$dubcity], 'awayscore' => $awayScore[$dubcity], 'total' => $total[$dubcity], 'F5total'=> $totalFH[$dubcity], 'F5winner'=> $FHwinners[$dubcity], 'FHdiff'=> $diffFH[$dubcity], 'FGdiff'=> $diff[$dubcity], 'homeTM'=> $homeTM[$dubcity], 'awayTM'=>$awayTM[$dubcity], 'winLoc'=>$winLoc[$dubcity], 'sport' => $sport);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'scores'
    
]);
var_dump($curl->response);
var_dump($record);
$curl->close();
}

/*
function createLog($name, $error){
    /*
    global $error;
    $data = array($name,$msg);
    $now = unixtime();
    $inp = file_get_contents("../logs/$now-$name.json");
    $tempArray = json_decode($inp);
    array_push($tempArray, $data);
    $jsonData = json_encode($tempArray);
    file_put_contents("../logs/$now-$name.json", $jsonData);
    return $data;


    Debugger::$strictMode = true; // display all errors
    Debugger::$strictMode = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED; // all errors except deprecated notices
    Debugger::DEVELOPMENT;
    Debugger::DETECT, __DIR__ . '/includes/logs/';

    Debugger::setSessionStorage(new Tracy\NativeSession);
    Debugger::enable();
    Debugger::dispatch();
}

*/

function staticLog(){
/*   
 Debugger::getLogger();
    Debugger::$logSeverity = E_WARNING | E_NOTICE;
    Debugger::$showLocation = true;
    Debugger::$showBar = false;
    Debugger::enable(Debugger::DETECT, __DIR__ . '/logs');
*/
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
    //// echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    // echo "Success";
}
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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    // echo "Success";
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
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    // echo "Success";
}
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
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    // echo "Success";
}
$curl->close();
}

/* Bets */
function createBet($amount, $option, $type, $league, $ratio,  $gid, $username, $uid, $startDate, $cat, $status) {
    global $dbKey;
    global $now;
    global $isValid;
$record = array('amount' => $amount, 'option' => $option, 'type' => $type, 'league' => $league, 'ratio' => $ratio, 'gameid'=>$gid, 'username' => $username, 'userID'=> $uid, 'start'=> $startDate, 'category_id'=> $cat, 'created_at'=> $now, 'updated_at'=> $now, 'win_status'=>$status);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'bets'
    
]);
if ($curl->error) {
    //// echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $isValid = FALSE;
} else {
    $isValid = TRUE;
}
$curl->close();
}

function bank($id, $balance) {
    global $dbKey;
    global $now;
    global $isValid;
$record = array('id' => $id, 'balance' => $balance, 'updated_at' => $now);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'bank'
    
]);
if ($curl->error) {
    //// echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $isValid = FALSE;
} else {
    $isValid = TRUE;
}
$curl->close();
}


function fetchBalance($uid){
global $dbKey;
global $n;
//column name, search premise, table
$q = "'";
$order_id = "id == " . $q . $uid . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => "bank"
]);
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $bal = $grabLogin['records'][0]['balance'];
    return round($bal, 2);
    /*
if (empty($bal)) {
    unset($bal);
    $isValid = 0;
    //return "empty balance. Free play enabled, Refresh";
    return round($bal, 2);
    exit(7);
}   elseif (!(empty($bal))) {
     $isValid = 1;
     return round($bal, 2);
     }
     */
$curl->close();
}



function updateBalance($uid, $balance){
    global $dbKey;
    global $now;
    global $isValid;
    global $n;
//table, column name, updated Data, data ID
$record = array('balance'=>$balance,'id'=>$uid,'updated_at'=>$now);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Update', [
    'table' => "bank",
    'record' => $record
]);
if ($curl->error) {
    $isValid === FALSE;
    $curl->close();

} else {
    $isValid === TRUE;
    $curl->close();
    
}
}

function freePlay($id, $balance) {
    global $dbKey;
    global $now;
    global $isValid;
    global $FP;
$record = array('id' => $id, 'balance' => $balance, 'updated_at' => $now, 'note'=>"FREE PLAY");
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'bank'
    
]);
if ($curl->error) {
    //// echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $isValid = FALSE;
} else {
    $isValid = TRUE;
    $FP = "Free Play Enabled. Withdrawls cancelled for this account.";
}
$curl->close();
}

function fetchFreeBalance($uid){
global $dbKey;
//column name, search premise, table
$q = "'";
$order_id = "id == " . $q . $uid . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => "bank"
]);
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $note = $grabLogin['records'][0]['note'];
    $curl->close();
    if ($note == "FREE PLAY"){
    // echo "   Free Play Enabled. Withdrawls cancelled for this account.";
}


     }



/* Graders */

function readML(){
global $dbKey;
//global $results;
//BROKEN FUNC, DELETE BUT FIRST CHECK IF IT EXISTS 
$q = "'";
//QUERY type == Moneyline AND start == '2022-01-25'
$order_id = "type == Moneyline AND start == ". $q ."2022-01-25" . $q;
//$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => "bets"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

//namespace ReadW;
function readW($sort, $query, $table, $limit){
global $dbKey;
global $results;
global $n;
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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
   // $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function readWC($sort, $query, $table, $limit){
global $dbKey;
global $results;
global $n;
//column name, search premise, table
$q = "'";
$order_id = $sort . " >= " . $q . $query . $q;
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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
   // $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function readInvoices($query){
global $dbKey;
global $results;
//column name, search premise, table
$q = "'";
$order_id = "username == " . $q . $query . $q;
$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>"$order_id",
    'table' =>"invoices",
    'limit'=>"10",
    'order'=>"desc"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function readInvoicess(){
global $dbKey;
global $results;
//column name, search premise, table
$q = "'";
$order_id = "username == " . $q . $query . $q;
$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>"status",
    'table' =>"invoices",
    'limit'=>"50",
    'orderBy'=>"expires",
    'order'=>"desc"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

/*
{
    "table": "bets",
    "query": "league == 'NBA' AND amount == 13"
}
Can Query two columns
{
    "table": "bets",
    "query": "start == '2022-01-25' AND category_id == 2"
}
type == Moneyline AND start == '2022-01-25'
*/
function updateWins($table, $column, $data, $id){
global $dbKey;
//table, column name, updated Data, data ID
$record = array($column=>$data,'id'=>$id);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Update', [
    'table' => $table,
    'record' => $record
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    // echo "Success";
}
$curl->close();
}

function explodeSpreads($line){
foreach ($line as $value){
    $spread[] = explode("-", $value);
    }
    return $spread;
}

/* Social*/
//include 'social.php';
function generatePFP($username, $uid, $human){
    global $pfpKey;
$format = array('jpeg','png','male','female');
$generatePFP = array('format'=>$format[1],'gender'=>$human,'upload'=>true,'username'=>$username);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $pfpKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/avatar/Generate', [
    'format'=>$generatePFP["format"],
    'gender'=>$generatePFP["gender"],
    'upload'=>$generatePFP["upload"],
    'username'=>$generatePFP["username"]
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
        $fetchPFP = $curl->response;
        $encodePFP = json_encode($fetchPFP, true);
        $fetchPFP = json_decode($encodePFP, true);
        $getPFP = array($fetchPFP["url"], $fetchPFP["base64"]);
        $curl->close();
        $curl = new Curl();
        $curl->download("$getPFP[0]","assets/profile/$uid.png");
        $curl->close();
    }
}

function generateRegistrationPFP($username, $uid, $human){
    global $pfpKey;
$format = array('jpeg','png','male','female');
$generatePFP = array('format'=>$format[1],'gender'=>$human,'upload'=>true,'username'=>$username);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $pfpKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/avatar/Generate', [
    'format'=>$generatePFP["format"],
    'gender'=>$generatePFP["gender"],
    'upload'=>$generatePFP["upload"],
    'username'=>$generatePFP["username"]
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
        $fetchPFP = $curl->response;
        $encodePFP = json_encode($fetchPFP, true);
        $fetchPFP = json_decode($encodePFP, true);
        $getPFP = array($fetchPFP["url"], $fetchPFP["base64"]);
        $curl->close();
        $curl = new Curl();
        $curl->download("$getPFP[0]","../assets/profile/$uid.png");
        $curl->close();
    }
}

function postComment($uid, $xtra, $slink, $reposts, $likes, $cat){
global $dbKey;
global $now;
$record = array('uid'=>$uid,'created'=>$now,'updated'=>$now,'extra'=>$xtra, 'sharedLink'=>$slink, 'reposts'=>$reposts,'likes'=>$likes,'category'=>$cat);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'comments'
    
]);
var_dump($curl->response);
var_dump($record);
$curl->close();
}



function likedPosts($uid){
$fetch = readW("uid", $uid, "actions", "1000");
$clean = array_values(array_filter($fetch, function($var) {
    return ($var['type'] == 'post' && $var['action'] == 'liked' || $var['action'] == 'fire');

}));
$pidz = array_column($clean, "postID");
return array_values(array_unique($pidz));
$curl->close();
}

function isFollowing($uid){
$fetch = readW("uid", $uid, "actions", "1000");
$clean = array_values(array_filter($fetch, function($var) {
    return ($var['action'] == 'followed');

}));
$pidz = array_column($clean, "postID");
return array_values(array_unique($pidz));
$curl->close();
}


function allPosts($uid){
$posts = readW("uid", $uid, "comments", "1000");
$fire = readW("uid", $uid, "actions", "1000");
$gas = array_values(array_filter($fire, function($var) {
    return ($var['action'] == 'repost');

}));
//$total = count($gas) + count($posts);
return $posts;
}

function countAllPosts($uid){
$posts = readW("uid", $uid, "comments", "1000");
$fire = readW("uid", $uid, "actions", "1000");
$gas = array_values(array_filter($fire, function($var) {
    return ($var['action'] == 'repost');

}));
$total = count($gas) + count($posts);
return $total;

}

function likePost($uid, $postID, $action){
global $dbKey;
global $now;
$record = array('uid'=>$uid,'created'=>$now,'updated'=>$now,'action'=>$action, 'postID'=>$postID, 'type'=>'post');
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'actions'
    
]);
//var_dump($checkLiked);
//var_dump($alreadyLiked);
$curl->close();
}

function firePost($uid, $betslipID, $action){
global $dbKey;
global $now;
$record = array('uid'=>$uid,'created'=>$now,'updated'=>$now,'action'=>$action, 'postID'=>$betslipID, 'type'=>'betslip');
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'actions'
    
]);
//var_dump($checkLiked);
//var_dump($alreadyLiked);
$curl->close();
}



function followUser($uid, $followID){
global $dbKey;
global $now;
$record = array('uid'=>$uid,'created'=>$now,'updated'=>$now,'action'=>"followed", 'postID'=>$followID, 'type'=>"follow");
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'actions'
    
]);
$curl->close();
}

function protectFollow($uid){
$fetch = readW("uid", $uid, "actions", "1000");
$clean = array_values(array_filter($fetch, function($var) {
    return ($var['type'] == 'follow');

}));
return $clean;
$curl->close();
}

function countFollowers($uid, $type){

    if ($type === "following"){
$fetch = readW("uid", $uid, "actions", "1000");
$clean = array_values(array_filter($fetch, function($var) {
    return ($var['type'] == 'follow' && $var['uid'] != $uid);

}));
$cnt = count($clean);
return $cnt;
} elseif($type === "followers"){
    $fetch = readW("uid", $uid, "actions", "1000");
$clean = array_values(array_filter($fetch, function($var) {
    return ($var['type'] == 'follow' && $var['uid'] === "$uid");

}));
$cnt = count($clean);
return $cnt;
}
$curl->close();
}




/* Weather */
//weather Forecast
function viewWeather($location) {
global $weather;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $weather);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/weather/Forecast', [
    'days' => 0,
    'location' => $location
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabWeather = json_decode($jsonEncoded, true);
    $grabForecast = $grabWeather['forecast'];
    $loc = $grabWeather['location'];
    $country = $grabWeather['country'];
    $tz = $grabWeather['timezone'];
    $weatherDate = array_column($grabForecast, 'date');
    $maxTemp = array_column($grabForecast, 'max_temp_f');
    $minTemp = array_column($grabForecast, 'min_temp_f');
    $chanceRain = array_column($grabForecast, 'chance_of_rain');
    $rain = array_column($grabForecast, 'will_it_rain');
    $icon = array_column($grabForecast, 'icon_url');
    $condition = array_column($grabForecast, 'condition');
    $maxWind = array_column($grabForecast, 'max_wind_mph');
    $sunset = array_column($grabForecast, 'sunset');
    $returnWeather = array('loc'=>$loc, 'country'=>$country, 'timezone'=>$tz, 'date'=>$weatherDate[0], 'max_temp_f'=>$maxTemp[0], 'min_temp_f'=>$minTemp[0], 'rainChance'=>$chanceRain[0], 'will_it_rain'=>$rain[0], 'icon'=>$icon[0], 'condition'=>$condition[0], 'maxWind'=>$maxWind[0], 'sunset'=>$sunset[0]);
    return $returnWeather;
}
$curl->close();
}

//Weather update Live
function Weather($location) {
global $weather;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $weather);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/weather/Now', [
    'days' => 0,
    'location' => $location
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabWeatherNow = json_decode($jsonEncoded, true);
    $localTime = $grabWeatherNow['local_time'];
    $clouds = $grabWeatherNow['cloud'];
    $condition = $grabWeatherNow['condition'];
    $isDay = $grabWeatherNow['daytime'];
    $feelsLike = $grabWeatherNow['feels_like_f'];
    $humidity = $grabWeatherNow['humidity'];
    $windDir = $grabWeatherNow['wind_direction'];
    $windDegree = $grabWeatherNow['wind_degree'];
    $wind = $grabWeatherNow['wind_mph'];
    $icon = $grabWeatherNow['icon_url'];
    $temp = $grabWeatherNow['temp_f'];
    $returnWeather = array($localTime, $clouds, $condition, $isDay, $temp, $feelsLike, $humidity, $windDir, $windDegree, $wind, $icon);
    return $returnWeather;
}
$curl->close();
}

function QR($uid){
global $qr;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $qr);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/qr/Generate', [
    'size' => 300,
    'text' => "https://bataboom.bet/profile.php?uid=$uid"
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['qr'];
    $curl->close();
    //return $grabQR;
    $curl = new Curl();
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->download($grabQR, "tmp/qr/qr-$uid.png");
     //$curl->diagnose();
    $curl->close();
   
    }
}

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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['qr'];
    $curl->close();
    //return $grabQR;
    $curl = new Curl();
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->download($grabQR, "/var/www/opensports/tmp/qr/$network-qr-$addy.png");
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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
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
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabBTCNow = json_decode($jsonEncoded, true);
    return $grabBTCNow['close'];
}
$curl->close();
}

function gifGod($query) {
global $gifgod;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $gifgod);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/gifs/Search', [
    'limit' => 20,
    'query'=>$query
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchGIF = json_decode($jsonEncoded, true);
    $id = $fetchGIF['data'][0]['id'];
    $slug = $fetchGIF['data'][0]['slug'];
    $embed_url = $fetchGIF['data'][0]['embed_url'];
    $rating = $fetchGIF['data'][0]['rating'];
    $title = $fetchGIF['data'][0]['title'];
    $image = $fetchGIF['data'][0]['images']['original']['url'];
    $previewimg = $fetchGIF['data'][0]['images']['preview_gif']['url'];
    $returnGiphy = array($id, $slug, $embed_url, $rating, $title, $image, $previewimg);
    return $returnGiphy;
    //print_r($fetchGIF);

        }
    $curl->close();
    }

function searchTwt($query) {
global $twitter;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $twitter);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/twitter/Search',
    [
        
        'query' => $query
     


    ]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
   $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchTwt = json_decode($jsonEncoded, true);
    $grabTwt = $fetchTwt['tweets'];
    $curl->close();
    return $fetchTwt;

}
$curl->close();
}

//searchTwt("#GamblingTwitter");

function stalkTwt($username) {
global $twitter;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $twitter);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/twitter/Timeline',
    [
        
        'limit' => 10,
        'username' => $username,
        
     


    ]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
   $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['tweets'];
    $curl->close();
    return $fetchQR;

}
$curl->close();
}

//stalkTwt("JimmyTheBag");

function trendsTwt() {
global $twitter;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $twitter);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/twitter/Trends');
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
   $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['tweets'];
    $curl->close();
    print_r($fetchQR);

}
$curl->close();
}

//trendsTwt();


function recordStalk($victim, $subject) {
    global $dbKey;
    global $twitter;
    $grabVictim = stalkTwt("$victim");
    $formatVictim = $grabVictim['tweets'];
    $count = count($formatVictim);
    $content = array_column($formatVictim, "text");
    for ($i = 0; $i < $count; ++$i){
$record = array('author' => $formatVictim[$i]['username'], 'created_at' => $formatVictim[$i]['created_at'], 'subject' => $subject, 'regex' => "N/A", 'retweeted_count' => $formatVictim[$i]['retweeted_count'], 'favourited_count' => $formatVictim[$i]['favourited_count'], 'content'=>$content[$i]);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'stalker'
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    
} else {


// echo $count;
$curl->close();
    }
}
}

function recordGamblingTwitter($search, $subjectt) {
    global $dbKey;
    global $twitter;
    $grabVictim = searchTwt("$search");
    $formatVictim = $grabVictim['tweets'];
    $count = count($formatVictim);
    $content = array_column($formatVictim, "text");
    for ($i = 0; $i < $count; ++$i){
$record = array('author' => $formatVictim[$i]['username'], 'created_at' => $formatVictim[$i]['created_at'], 'subject' => $subjectt, 'regex' => "N/A", 'retweeted_count' => $formatVictim[$i]['retweeted_count'], 'favourited_count' => $formatVictim[$i]['favourited_count'], 'content'=>$content[$i]);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'stalker'
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose;
    
} else {

//print_r($content);

$curl->close();
    }
}
}
//recordStalk("jimmythebag","picks");
  
function ListAnalytics() {
global $analytics;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $analytics);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/analytics/List');
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabStat = json_decode($jsonEncoded, true);
    var_dump($grabStat);
}
$curl->close();
}

//ListAnalytics();

function delAnalytics($name) {
global $analytics;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $analytics);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/analytics/Delete', [
    'name' => "$name"
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabStat = json_decode($jsonEncoded, true);
    var_dump($grabStat);
}
$curl->close();
}

//delAnalytics();

function TrackAnalytics($name) {
global $analytics;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $analytics);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/analytics/Track', [
    'name' => $name
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabStat = json_decode($jsonEncoded, true);
    var_dump($grabStat);
}
$curl->close();
}

//TrackAnalytics("follows");

function ReadAnalytics($name) {
global $analytics;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $analytics);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/analytics/Track', [
    'name' => $name
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabStat = json_decode($jsonEncoded, true);
    var_dump($grabStat);
}
$curl->close();
}


//ReadAnalytics("follows");


/* FUCK */
/*
function Follow($authoruid, $requesteruid) {
    global $now;
    global $dbKey;
    $findAuthor = readW("author", "$authoruid", "follows", 1000);
    $hasMet = readW("author", "$requesteruid", "follows", 100);
    $jb = array_filter($findAuthor, function($var) {
    return ($var['requester_uid'] === "$requesteruid" && $var['status'] === "accepted");


    if($jb){
        // echo "ERROR already followed";
        die();
   } else {
     

    $fetchFollowers = $findAuthor;
    $addFollower = $fetchFollowers++;
    TrackAnalytics("$authoruid");  
    $record = array('author' => $authoruid, 'requester_uid'=> $requesteruid,'type' => "follow_request", 'request_date'=>$now, 'accept_date' => $now, 'status'=> 'accepted', 'updated_at'=> $now, 'followers'=>$addFollower, 'extra'=>'n/a');
            $curl = new Curl();
            $curl->setBasicAuthentication('Authorization', $dbKey);
            $curl->setHeader('Content-Type', 'application/json');
            $curl->get('https://api.m3o.com/v1/db/Create', [
            'record' => $record,
            'table' => 'follows'
    
            ]);
            if ($curl->error) {
             // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";

            } else {
       
            }
            print_r($jb);
            $curl->close();
            }
        }

    
    


    /* Bets */


/* Admin */
function countNewBets(){
global $dbKey;
//column name, search premise, table
$new = "'NEW'";
$order_id = "win_status == " . $new;
//$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => "bets",
    'limit'=>"1000"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    return count($grabLogin['records']);
}
$curl->close();


$filter = "NEW";

$read = array_filter($results, function($var) use ($filter) {
    return ($var['win_status'] == $filter);

});

$count = count($read);
// echo $count;
}

function countLoseBets(){
global $dbKey;
//column name, search premise, table
$losers = "win_status == 'LOSE'";
//$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$losers",
    'table' => "bets",
    'limit'=>"1000"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = $grabLogin['records'];
}
$curl->close();

$count = count($results);
return $count;
}

function listOpenBets(){
global $dbKey;
global $results;
$new = "NEW";
$q = "'";
$order = "win_status == " . $q . $new . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>"$order",
    'table' =>"bets",
    'limit'=>"1000",
    'order'=>"desc"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function readBetslip($id){
global $dbKey;
global $results;
//column name, search premise, table
$q = "'";
$slipid = "id == " . $q . $id . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>"$slipid",
    'table' =>"bets",
    'limit'=>1
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function listGradedBets(){
global $dbKey;
global $results;
$today = "NEW";
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
//column name, search premise, table
$q = "'";
$order = "win_status != " . $q . $today . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>"$order",
    'table' =>"bets",
    'limit'=>"100",
    'order'=>"desc"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function fetchBrokenLosers(){
global $dbKey;
//column name, search premise, table
$new = "'NEW'";
$order_id = "win_status == " . $new;
//$t = $q . $table . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$order_id",
    'table' => "bets",
    'limit'=>"1000"
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['records'];
}
$curl->close();


$filter = "NEW";

$read = array_filter($results, function($var) use ($filter) {
    return ($var['win_status'] == $filter);

});

return $read;
}

//User Betting Statistics
function Stats($uid){
$Stats = readW("userID", "$uid", "bets", "1000");

$winners = array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED');

});

$losers = array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE');

});

$all = count($Stats);
$wins = count($winners);
$Ls = count($losers);
$uname = array_column($Stats, 'username');
$fel = $Ls + $wins;
$pending = $all - $fel;
$winP = $wins / $fel * 100;
$statRecord = array('user'=>$uname[0], 'total'=>$all, 'wins'=>$wins, 'losses'=>$Ls, 'pending'=>$pending, 'winPercentage'=>$winP);
return $statRecord;
}

function listUsers(){
global $userAPItoken;
global $results;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $userAPItoken);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/user/List', [
    'limit'=>100,
    'offset'=>0
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = array();
    $results = $grabLogin['users'];
}
$curl->close();
return $results;
}

function fetchAUser($uid) {
    global $userAPItoken;
    global $w;
$curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Read', [
    'id' => $uid

]);
    if ($curl->error) {
     // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    // LogMeOut();
    
} else {

    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    $results = $grabSesh;
    return $results;
    
    }
    $curl->close();
}

function fetchGID($gameid){
global $dbKey;
//column name, search premise, table
$q = "'";
$search = "gameid == " . $q . $gameid . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' => "$search",
    'table' => "scores",
    'orderBy'=>"",
    'limit'=>100
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    return $grabLogin['records'];
}
$curl->close();
}

function createCustomMatch($gid, $sport, $homeTM,  $awayTM, $homeOdds, $awayOdds, $startDate, $cat, $created_at, $updated_at) {
    global $dbKey;
    global $now;
$record = array('id'=>$gid, 'sport' => $sport, 'homeTM'=>$homeTM, 'awayTM' => $awayTM, 'homeOdds'=> $homeOdds, 'awayOdds'=> $awayOdds, 'start'=> $startDate, 'category_id'=> $cat, 'created_at'=> $now, 'updated_at'=> $now, 'winner'=>"NA");
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'CustomMatches'
    
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $isValid = FALSE;
} else {
    $isValid = TRUE;
    // echo "Success!";
}
$curl->close();
}

function readCustomBetslip($id){
global $dbKey;
global $results;
//column name, search premise, table
$q = "'";
$slipid = "id == " . $q . $id . $q;
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Read', [
    'query' =>"$slipid",
    'table' =>"custommatches",
    'limit'=>1
]);
if ($curl->error) {
    // echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}

function userInfo($uid){
    global $i;
$fetch = fetchAUser("$uid");
$uname = $fetch['account']['username'];
$id = $fetch['account']['id'];
$pfp = "https://bataboom.bet/tmp/$uname-$id.png";
$infoz = array($pfp, $uname);
return $infoz;

}

function postInfo($postid){
    global $i;
    //refer to likedPosts() for cleaning double likes
$fetch = readW("postID", $postid, "actions", "1000");
    $clean = array_values(array_filter($fetch, function($var) {
    return ($var['action'] == 'liked');

}));
    $likes = array_unique(array_column($clean, "uid"));
    for ($w = 0; $w < count($likes); ++$w){
        $more[] = fetchAUser("$likes[$w]");
        $uname[] = $more[$w]['account']['username'];
    $pfp[] = "https://bataboom.bet/assets/profile/$likes[$w].png";
    $infoz[] = array('pfp'=>$pfp[$w], 'likes'=>$likes[$w], 'uname'=>$uname[$w]);
}   

    return $infoz;
    }
 function filter_callback($val) {
    $val = trim($val);
    return $val != '';
}




function reComments($which){
$today = date("Y-m-d");
$twodays = date('Y-m-d H:i:s', strtotime( $today . " -4 days"));
$ff = readW("category", "general", "comments", "1000");
$gib = array_filter($ff, function($v) use ($twodays) {
                                return ($v['created']) >= $twodays;
                            });


if ($which === "1"){
return array_reverse($gib);
} elseif($which === "2"){
   return count($gib);
}
}



function deleteME(){
$fetch = readW("gameid", "4c5934f64a6a69c2ef0611de79d657ae", "bets", "1000");
$today = date("Y-m-d");
$twodays = date('Y-m-d H:i:s', strtotime( $today . " -2 days"));
$twodays = "2022-03-30 23:39:37";
//$ff = readW("category", "general", "comments", "1000");
//$gib = array_filter($fetch, function($v) use ($twodays) {
                               // return ($v['created_at']) >= $twodays;
                       //     });


$ct = count($fetch);
for ($i = 0; $i < $ct; ++$i){
$fid[] = $fetch[$i]['id'];
//$gi =  updateDB("bets", "start", "2022-03-31", "$fid[$i]");
$gi = deleteDB("bets", "$fid[$i]");
echo $gi;
}
return $fetch;

}



?>
