<?php
/* 
* New Moneyline Grader
    * Created: Oct 28th, 2022
    * Modified: Feb 23rd, 2022
* Author: @BataBoom
*/

require __DIR__ . '/../config/config.php';

$updated = date('Y-m-d H:i:s');
$today = date('Y-m-d');
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$limit = 1000;


$fetchBets = readW("start", "$yday", "bets", $limit);


$readBets = array_values(array_filter($fetchBets, function($var) {
    return ($var['type'] == 'Moneyline');

}));

$option = array_column($readBets, 'option');
$id = array_column($readBets, 'id');
$gid = array_column($readBets, 'gameid');




$endOptions = count($option);




//if ($yday === $yday) {

for ($n = 0; $n < $endOptions; ++$n){
   
    $grabScore[] = readW("gameid", "$gid[$n]", "scores", "1000");



if ($option[$n] === $grabScore[$n][0]["winner"]) {
    echo "================================"."\n";
    echo "WIN"."\n";
    echo "BetName: " . $option[$n] ."\n";
    echo "Game Winner: " . $grabScore[$n][0]["winner"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $id[$n]);
    echo $id[$n]."\n";


} elseif ($option[$n] !== $grabScore[$n][0]["winner"]) {
    echo "================================"."\n";
    echo "LOSE"."\n";
    echo "BetName: " . $option[$n] ."\n";
    echo "Game Winner: " . $grabScore[$n][0]["winner"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $id[$n]);
    echo $id[$n]."\n";

} elseif (empty($grabScore[$n][0])) {
    echo "================================"."\n";
    echo "SCORE NOT FOUND FUGGIN LA"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "SCORE_NOT_FOUND", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";
} else {
    echo "================================"."\n";
    echo "ELSE??"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    //updateDB("bets", "win_status", "LOSE", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";
} 
}




//print_r($grabScore);



?>
