<?php
use Curl\Curl;
use Tracy\Debugger;

function staticLog(){
    $logger = Debugger::getLogger();
    Debugger::$logSeverity = E_ERROR | E_NOTICE;
    Debugger::$showLocation = true;
    Debugger::$showBar = true;
    Debugger::enable(Debugger::DETECT, __DIR__ . '/logs');

}

/* Cashier Functions */
function newInvoice($username, $orderID, $amount, $promoCode) {
    global $dbKey;
    global $now;
    global $thirtymins;
    global $clock;
$record = array('id' => $orderID, 'username' => $username, 'invoice_id' => '', 'created' => $now, 'expires' => $thirtymins, 'status' => 'unpaid',  'amount' => $amount, 'promo'=>$promoCode);
$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $dbKey);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/db/Create', [
    'record' => $record,
    'table' => 'invoices'
    
]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
	var_dump($curl->response);
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
     //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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

// Finally, destroy the session.
session_destroy();
header('Location:../index.php');
}


function killSesh(){
    //global $decrypted_sesh;
    global $userAPItoken;
    $decrypted_sesh = encrypt_decrypt('decrypt', $_SESSION['token']);
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Logout', [
    'sessionId' => $decrypted_sesh
]);
   
    $curl->close();
}

function checkSession() {
    global $userAPItoken;
    //global $decrypted_sesh;
    $decrypted_sesh = encrypt_decrypt('decrypt', $_SESSION['token']);
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/ReadSession', [
    'sessionId' => $decrypted_sesh
]);
    if ($curl->error) {
     //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
     LogMeOut();
    
} else {

    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabSesh = json_decode($jsonEncoded, true);
    $curl->close();
}

if ($grabSesh['session']['id'] === $decrypted_sesh){
$_SESSION['valid'] = TRUE;
} else {
LogMeOut();
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo "Success";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo "Success";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo "Success";
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
    print_r($grabLogin['count']);
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo "Success";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo "Success";
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
    //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $isValid = FALSE;
} else {
    $isValid = TRUE;
}
$curl->close();
}

function bank($id, $balance, $clock) {
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
    //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo "   Free Play Enabled. Withdrawls cancelled for this account.";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    'query' =>"",
    'table' =>"invoices",
    'limit'=>"1000",
    'orderBy'=>"expires",
    'order'=>"desc"
]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    echo "Success";
}
$curl->close();
}

function explodeSpreads($line){
foreach ($line as $value){
    $spread[] = explode("-", $value);
    }
    return $spread;
}

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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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

$count = count($read);
echo $count;
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
$curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $userAPItoken);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/user/Read', [
    'id' => $uid

]);
    if ($curl->error) {
     //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
     LogMeOut();
    
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $isValid = FALSE;
} else {
    $isValid = TRUE;
    echo "Success!";
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
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $results = $grabLogin['records'];
}
$curl->close();
return $results;
}


?>
