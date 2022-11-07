<?php
ini_set('precision', 18);
/* 
* New Totals Grader, Works for all Sports
    * Created: Jan 28th, 2022
    * Modified: Feb 23rd, 2022
* Author: @BataBoom
*/

require __DIR__ . '/../config/config.php';
error_reporting(E_ERROR);
$updated = date('Y-m-d H:i:s');
$today = date('Y-m-d');
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$limit = 1000;


$fetchBets = readW("start", "$yday", "bets", $limit);
$readBets = array_values(array_filter($fetchBets, function($var) {
    return ($var['type'] == 'Totals' && $var['league'] == 'NBA' );

}));

$opt = array_column($readBets, 'option');
$gid = array_column($readBets, 'gameid');


$ender = count($readBets);
for ($i = 0; $i < $ender; ++$i){
    if (str_starts_with($opt[$i], 'Over')){
   
        $cleanOvers = filter_var($readBets[$i]['option'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);  
        $Overs[] = array('betSlip'=>$readBets[$i], 'count'=>$cleanOvers, 'whutAmi'=> "Over");

    }elseif (str_starts_with($opt[$i], 'Under')){
       
         $cleanUnders = filter_var($readBets[$i]['option'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);  
         $Unders[] = array('betSlip'=>$readBets[$i], 'count'=>$cleanUnders, 'whutAmi'=> "Under");
    
}
    $allTotals = array_merge($Unders, $Overs);
}



 
$byCount = array_column($allTotals, "count");
$whutAmi = array_column($allTotals, "whutAmi");
$endOptions = count($allTotals);



for ($n = 0; $n < $endOptions; ++$n){

    $grabScore[] = readW("gameid", "$gid[$n]", "scores", "1000");



/* Grade Overs! */


if ($whutAmi[$n] === "Over") {
if ($byCount[$n] < $grabScore[$n][0]["total"]) {
    echo "================================"."\n";
    echo "WIN"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "Total: " . $grabScore[$n][0]["total"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $allTotals[$n]["betSlip"]["id"]);
    print_r($allTotals[$n]["betSlip"]["id"]);


} elseif ($byCount[$n] === $grabScore[$n][0]["total"]) {
    echo "================================"."\n";
    echo "PUSH"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "Total: " . $grabScore[$n][0]["total"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "PUSH", $allTotals[$n]["betSlip"]["id"]);
    print_r($allTotals[$n]["betSlip"]["id"]);

} elseif ($byCount[$n] > $grabScore[$n][0]["total"])  {
    echo "================================"."\n";
    echo "LOSE"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "Total: " . $grabScore[$n][0]["total"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "LOSE", $allTotals[$n]["betSlip"]["id"]);
    print_r($allTotals[$n]["betSlip"]["id"]);

} elseif (empty($grabScore[$n][0])) {
    echo "================================"."\n";
    echo "SCORE NOT FOUND FUGGIN LA"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "SCORE_NOT_FOUND", $allTotals[$n]["betSlip"]["id"]);
    echo $allTotals[$n]["betSlip"]["id"]."\n";
}
}
}

for ($n = 0; $n < $endOptions; ++$n){

    $grabScore[] = readW("gameid", "$gid[$n]", "scores", "1000");


/* Grade Unders! */
if ($whutAmi[$n] === "Under") {
    if ($byCount[$n] > $grabScore[$n][0]["total"]) {
    echo "================================"."\n";
    echo "WIN"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "Total: " . $grabScore[$n][0]["total"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $allTotals[$n]["betSlip"]["id"]);
    


} elseif ($byCount[$n] === $grabScore[$n][0]["total"]) {
    echo "================================"."\n";
    echo "PUSH"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "Total: " . $grabScore[$n][0]["total"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "PUSH", $allTotals[$n]["betSlip"]["id"]);
    

} elseif ($byCount[$n] < $grabScore[$n][0]["total"])  {
    echo "================================"."\n";
    echo "LOSE"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "Total: " . $grabScore[$n][0]["total"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "LOSE", $allTotals[$n]["betSlip"]["id"]);
    
} elseif (empty($grabScore[$n][0])) {
    echo "================================"."\n";
    echo "SCORE NOT FOUND FUGGIN LA"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "SCORE_NOT_FOUND", $allTotals[$n]["betSlip"]["id"]);
    echo $allTotals[$n]["betSlip"]["id"]."\n";
}
}
}




?>
