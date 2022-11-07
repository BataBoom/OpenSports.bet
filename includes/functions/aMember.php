<?php

use Curl\Curl;

/* aMember Pro */


/* Create User */
function aMember($username, $password, $email){
global $memberKey;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
$curl->post("https://bb.co/membership/api/users", [

    'login' => $username,
    'pass' => $password,
    'email' => $email,
    'name_f' => '',
    'name_l' => ''
]);
if ($curl->error) {
      error_log("Could not create user in aMember! Email: $email Function: aMember\n", 3, "/var/www/bb.co/includes/logs/custom.log");
}
$curl->close();
}



/* Lookup Invoice */
function srchInvoice($invoiceno){
global $memberKey;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
$curl->get("https://bb.co/membership/api/invoices/$invoiceno");
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
         error_log("Could not search invoice, invoice#: $invoiceno! Function: srchInvoice\n", 3, "/var/www/bb.co/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    return $grabLogin;
   //echo $curl->diagnose;
}
$curl->close();
}


/* Pay actual invoice */
function payInvoice(int $invoiceno, int $uid, string $txnid, int $amount){

global $memberKey;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
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
    //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    error_log("Could not credit user a subscription! Invoice ID: $invoiceno Function: payInvoice\n", 3, "/var/www/bb.co/includes/logs/custom.log");
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
global $memberKey;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
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
  //  echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
      error_log("Could not credit user a subscription! Invoice ID: $invoiceno function: creditUser\n", 3, "/var/www/bb.co/includes/logs/custom.log");
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    print_r($grabLogin);
}
$curl->close();
}
}

//fetch aMember User ID
function fetchMemberUID($email){
global $memberKey;
global $today;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
$curl->get('https://bb.co/membership/api/check-access/by-email', [

    'email' => $email
    
]);
if ($curl->error) {
       error_log("Sub duration not found. Email: $email Function: checkSubbyEmail\n", 3, "/var/www/bb.co/includes/logs/custom.log");
    $result = false;
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
}
   if (empty($grabLogin['subscriptions'])) {
        $result = FALSE;
    } elseif ($grabLogin['subscriptions']) {
        $result = TRUE;
    }

return $result;
$curl->close();
}


/* Check User Status */
function checkSub($username){
global $memberKey;
global $today;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
$curl->get('https://bb.co/membership/api/check-access/by-login', [

    'login' => $username
    
]);
if ($curl->error) {
    error_log("Sub duration not found. Email: $username Function: checkSub\n", 3, "/var/www/bb.co/includes/logs/custom.log");
    $result = false;
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
}
   if (empty($grabLogin['subscriptions'])) {
        $result = FALSE;
    } elseif ($grabLogin['subscriptions']) {
        $result = TRUE;
    }

return $result;
$curl->close();
}


function checkSubbyEmail($email){
global $memberKey;
global $today;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
$curl->get('https://bb.co/membership/api/check-access/by-email', [

    'email' => $email
    
]);
if ($curl->error) {
       error_log("Sub duration not found. Email: $email Function: checkSubbyEmail\n", 3, "/var/www/bb.co/includes/logs/custom.log");
    $result = false;
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
}
   if (empty($grabLogin['subscriptions'])) {
        $result = FALSE;
    } elseif ($grabLogin['subscriptions']) {
        $result = TRUE;
    }

return $result;
$curl->close();
}



function subDuration($username){
global $memberKey;
global $today;
$curl = new Curl();
$curl->setHeader('X-API-Key', $memberKey );
$curl->get('https://bb.co/membership/api/check-access/by-login', [

    'login' => $username
    
]);
if ($curl->error) {
         error_log("Sub duration not found. User: $username Function: subDuration\n", 3, "/var/www/bb.co/includes/logs/custom.log");
    $result = false;
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabLogin = json_decode($jsonEncoded, true);
    $result = array_values($grabLogin['subscriptions']);

}
return $result;
$curl->close();
}



function checkSApaid($userID){
$dbname = 'sa_members';
$dbuser = 'boom';
$dbpass = 'IjHEWqfHT68Jpp3L';
$dbhost = 'sadb.showyou.tv';

$db = new MysqliDb ($dbhost, $dbuser, $dbpass, $dbname);
$db->where ('user_id', $userID);
$results = $db->get ('am_invoice_payment');
$amt = array_column($results, "amount");
$paid = array_sum($amt);
return floatval($paid);

}


function aMemberUID($username){
$dbname = 'oneAmember';
$dbuser = 'ONEAMEMBER';
$dbpass = 'uqjkZRiMb4pyQXks';
$dbhost = 'localhost';

$db = new MysqliDb ($dbhost, $dbuser, $dbpass, $dbname);
$db->where ('login', $username);
$uid = $db->getOne ('am_user');
return $uid['user_id'];


}

function addDemo($username){
    global $memberKey;
    global $ip;

    $aMemUID = aMemberUID($username);
    $curl = new Curl();
    $curl->setHeader('X-API-Key', $memberKey );
    $curl->post("https://bb.co/membership/api/access/&_filter[user_id]=$aMemUID", [

    'user_id' => $aMemUID,
    'product_id' => 6,
    'begin_date' => date('Y-m-d'), 
    'expire_date' => date("Y-m-d", strtotime("+ 3 days"))
    
]);
    if ($curl->error){
    $time = time();
    $reportString = "FAILED|".$username."|".$ip."|".$aMemUID."|".$time;
    error_log("$reportString\n", 3, "/var/www/bb.co/includes/logs/TrialSubs.log");
    } else {
    $time = time();
    $reportString = "SUCCESS|".$username."|".$ip."|".$aMemUID."|".$time;
    error_log("$reportString\n", 3, "/var/www/bb.co/includes/logs/TrialSubs.log");


    }
    $curl->close;

}

function addSub($uid, $productID, $duration){
    global $memberKey;
    global $ip;

    $aMemUID = aMemberUID($username);
    $curl = new Curl();
    $curl->setHeader('X-API-Key', $memberKey );
    $curl->post("https://bb.co/membership/api/access/&_filter[user_id]=$aMemUID", [

    'user_id' => $uid,
    'product_id' => $productID,
    'begin_date' => date('Y-m-d'), 
    'expire_date' => date("Y-m-d", strtotime("+ $duration"))
    
]);
    if ($curl->error){
    $time = time();
    $reportString = "FAILED|".$uid."|".$ip."|".$aMemUID."|".$time;
    error_log("$reportString\n", 3, "/var/www/bb.co/includes/logs/TrialSubs.log");
    } else {
    $time = time();
    $reportString = "SUCCESS|".$uid."|".$ip."|".$aMemUID."|".$time;
    error_log("$reportString\n", 3, "/var/www/bb.co/includes/logs/TrialSubs.log");


    }
    $curl->close;

}



/*
function fetchSAUsers($username){
global $SAKey;
$fetchSAapi = "https://sportsaccess.club/amember/api/check-access/by-login?_key=$SAKey&login=$username";
$readSA = file_get_contents($fetchSAapi);
$fetchSA = json_decode($readSA, true);
$SAuid = $fetchSA["user_id"];
return $SAuid;
}





include  __DIR__ . '/../../membership/bootstrap.php'; 
//Load user object;
function getUser($username)
{
    $user = Am_Di::getInstance()->userTable->getByLoginOrEmail($username);
    if($user) {
        $array['user_id'] = $user->user_id;
        $array['user_email'] = $user->email;
        $array['user_login'] = $user->login;
        $array['response'] = true;
        $services = false;
        $tmp = $user->getActiveProductIds();
        if(is_array($tmp)) {
            foreach($tmp as $t) {
                if($t == 22) continue;
                if($t == 4) continue;
                $services[] = $t;
            }
        }

        $array['products'] = $services;
        return $array;
    } else {
        return array("response" => false);
    }
}

function verify_password($id)
{
    $user = Am_Di::getInstance()->userTable->load($id);
    $result = $user->checkPassword($_GET['password']);
    return array("response" => (bool)$result);
}
*/

?>
