<?php
use Curl\Curl;

/* Social Functions */

ini_set('display_errors', 0);
error_reporting(0);
//record to database a comment has been posted
function postComment($uid, $xtra, $reposts, $likes, $cat){
global $dbKey;
global $now;
$record = array('uid'=>$uid,'created'=>$now,'updated'=>$now,'extra'=>$xtra,'reposts'=>$reposts,'likes'=>$likes,'category'=>$cat);
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


/* Betslips */
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

