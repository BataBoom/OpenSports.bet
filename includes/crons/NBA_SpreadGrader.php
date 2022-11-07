<?php
/* 
* New Spreads Grader
    * Created: Jan 28th, 2022
    * Modified: Feb 23rd, 2022
* Author: @BataBoom
NBA SPreads don't work, use  FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);  
*/
ini_set('precision', 18);
require __DIR__ . '/../config/config.php';

$updated = date('Y-m-d H:i:s');
$today = date('Y-m-d');
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$limit = 1000;


$fetchBets = readW("start", "$yday", "bets", $limit);


$readBets = array_values(array_filter($fetchBets, function($var) {
    return ($var['type'] == 'Spread' && $var['league'] == 'NBA');

}));
$opt = array_column($readBets, 'option');


$ender = count($readBets);
for ($i = 0; $i < $ender; ++$i){
    $cleanSpreadName[] = filter_var($opt[$i], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
    $cleanBetName[] = explode($cleanSpreadName[$i], $opt[$i]);

    if ($cleanSpreadName[$i] > 0){
        $plusSpreadz[] = array('betSlip'=>$readBets[$i], 'count'=>trim($cleanSpreadName[$i]), 'whutAmi'=> "plus", 'cleanOption'=>trim($cleanBetName[$i][0]));
    } elseif (0 > $cleanSpreadName[$i]){
        $killNeg[$i] = explode("-", $cleanSpreadName[$i]);
        $minusSpreadz[] = array('betSlip'=>$readBets[$i], 'count'=>$killNeg[$i][1], 'whutAmi'=> "minus", 'cleanOption'=>trim($cleanBetName[$i][0]));
    }
    $allSpreads = array_merge($minusSpreadz, $plusSpreadz);

}
print_r($cleanSpreadName);



 
$option = array_column($allSpreads, "cleanOption");
$byCount = array_column($allSpreads, "count");
$whutAmi = array_column($allSpreads, "whutAmi");
$endOptions = count($option);




//if ($yday === $yday) {

for ($n = 0; $n < $endOptions; ++$n){
    $gid[] = $allSpreads[$n]["betSlip"]["gameid"];
    
    $grabScore[] = readW("gameid", "$gid[$n]", "scores", "1000");



/* Grade MiNUS Spreads? 
* YES!*/


if ($whutAmi[$n] === "minus") {
if ($option[$n] === $grabScore[$n][0]["winner"] && $byCount[$n][0] < $grabScore[$n][0]["FGdiff"]) {
    echo "================================"."\n";
    echo "WIN"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";


} elseif ($option[$n] === $grabScore[$n][0]["winner"] && $byCount[$n][0] === $grabScore[$n][0]["FGdiff"]) {
    echo "================================"."\n";
    echo "PUSH"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "PUSH", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";

} elseif ($option[$n] === $grabScore[$n][0]["winner"] && $byCount[$n][0] > $grabScore[$n][0]["FGdiff"])  {
    echo "================================"."\n";
    echo "LOSE1"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "LOSE", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";

} elseif ($option[$n] !== $grabScore[$n][0]["winner"]){
    echo "================================"."\n";
    echo "LOSE2"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . " OPTION:" . $option[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "LOSE", $allSpreads[$n]["betSlip"]["id"]);
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
}


for ($n = 0; $n < $endOptions; ++$n){
    $gid[] = $allSpreads[$n]["betSlip"]["gameid"];

    $grabScore[] = readW("gameid", "$gid[$n]", "scores", "1000");

/* Grade Plus Spreads? 
* YES!*/

if ($whutAmi[$n] === "plus") {
if ($option[$n] === $grabScore[$n][0]["winner"]) {
    echo "================================"."\n";
    echo "WIN1"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";


} elseif ($option[$n] !== $grabScore[$n][0]["winner"] && $byCount[$n][0] > $grabScore[$n][0]["FGdiff"]) {
    echo "================================"."\n";
    echo "WIN2"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "WIN", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";

} elseif ($option[$n] !== $grabScore[$n][0]["winner"] && $byCount[$n][0] === $grabScore[$n][0]["FGdiff"]) {
    echo "================================"."\n";
    echo "PUSH"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "PUSH", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";

} elseif ($option[$n] !== $grabScore[$n][0]["winner"] && $byCount[$n][0] < $grabScore[$n][0]["FGdiff"])  {
    echo "================================"."\n";
    echo "LOSE"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    updateDB("bets", "win_status", "LOSE", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";

} else{
    echo "================================"."\n";
    echo "ELSE??"."\n";
    echo "BetName: " . $whutAmi[$n] . ": ". $byCount[$n] . "\n";
    echo "FGDiff: " . $grabScore[$n][0]["FGdiff"]."\n";
    echo "Game: " . $grabScore[$n][0]["game"]."\n";
    //updateDB("bets", "win_status", "LOSE", $allSpreads[$n]["betSlip"]["id"]);
    echo $allSpreads[$n]["betSlip"]["id"]."\n";
}     
}
}





//print_r($grabScore);



?>
