<?php
/**
 * 
 * 
 * All NHL Odds Data Parsed
 * October 31st, 2021
 * 
 * 
 */
?>
<?php
error_reporting(1);
ini_set('display_errors', 1);


$oddsdata = "https://api2.dimedata.net/v4/?feedID=641&api-key=a71b8fe8e9eb957db549aaa5d99797a4"; // 
//$oddsdata = "https://api2.dimedata.net/v4/?feedID=641&api-key=$oddsKey"; // 
$readodds = file_get_contents($oddsdata);
$fetchOdds = json_decode($readodds, true);
$fodds = $fetchOdds['data'];
$odds = array_reverse($fodds);
$today = date("Y-m-d H:i:s");
$todayy = date("Y-m-d");
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$filltime = '23:59:59';

$endMLB = count($odds);






for ($win = 0; $win < $endMLB; ++$win) {

$bookieID[$win] = $odds[$win]["gameUID"]; 
$bType[$win] = $odds[$win]['betType']; 
$bName[$win] = $odds[$win]["betName"]; 
$bPrice[$win] = $odds[$win]["betPrice"]; 
$homeTeams[$win] = $odds[$win]["homeTeam"]; 
$awayTeams[$win] = $odds[$win]["awayTeam"]; 
$sBook[$win] = $odds[$win]["sportsbook"]; 
$Live[$win] = $odds[$win]["isLive"]; 
$checked[$win] = $odds[$win]["checkedDate"]; 
$startDate[$win] = $odds[$win]["startDate"];
$ntime[] = date("F j, Y, @ g:i A ",  strtotime($startDate[$win]  . " -5 hours"));
$DBDate[] = date("Y-m-d",  strtotime($startDate[$win]  . " -5 hours"));

$preparedodds[] = array('id'=>$bookieID[$win], 'start'=>$ntime[$win], 'DBstart'=>$DBDate[$win], 'bType'=> $bType[$win], 'bName'=> $bName[$win] , 'bPrice'=>$bPrice[$win], 'home'=>$homeTeams[$win], 'away'=>$awayTeams[$win], 'sbook'=> $sBook[$win], 'Live'=>$Live[$win], 'updated'=>$checked[$win]);
$games = array_chunk($allodds, 6);
$gamesUO[$win] = array_chunk($allodds, 2);

$test[] = array_flip($allodds[$win]);
$index[] = array_search($test, 'Moneyline');


}
$startTime = array_values(array_filter($allodds, function($var) {
    return ($var['DBstart'] == $todayy);

}));

/* NHL Bets returning tmrw's game lines first... temp fix array reverse fuck */

$allodds = array_reverse($preparedodds);
$newtime = array_reverse($ntime);
$newDBDate = array_reverse($DBDate);


$fakeML = array_fill(0, 300, 'Moneyline');
$fakeOU = array_fill(0, 300, 'Total Goals');
$fakeRL = array_fill(0, 300, 'Puck Line');


$betTypeCol = array_column($allodds, "bType");
$updated = array_column($allodds, "updated");
$bookie = array_column($allodds, "sbook");
$amLive = array_column($allodds, "Live");
$startD = array_column($allodds, "start");
$findML = array_intersect($betTypeCol, $fakeML);
$findRL = array_intersect($betTypeCol, $fakeRL);
$findOU = array_intersect($betTypeCol, $fakeOU);
$fetchMLKeys = array_keys($findML);
$fetchRLKeys = array_keys($findRL);
$fetchOUKeys = array_keys($findOU);
$MLFirst = array_key_first($fetchMLKeys);
$MLLast = array_key_last($fetchMLKeys);
$RLFirst = array_key_first($fetchRLKeys);
$RLLast = array_key_last($fetchRLKeys);
$OUFirst = array_key_first($fetchOUKeys);
$OULast = array_key_last($fetchOUKeys);
$matchEnd = count($getKeys);
for ($n = $MLFirst; $n <= $MLLast; ++$n){

$ML[] = $allodds[$fetchMLKeys[$n]];
$ST[] = $allodds[$fetchMLKeys[$n]];
}
for ($n = $RLFirst; $n <= $RLLast; ++$n){
$RL[] = $allodds[$fetchRLKeys[$n]];
}
for ($n = $OUFirst; $n <= $OULast; ++$n){
$OU[] = $allodds[$fetchOUKeys[$n]];

}

$allML = array_chunk($ML, 2);
$allRL = array_chunk($RL, 2);
$allOU = array_chunk($OU, 2);



/* Start UTC => EST & Cleaning Conversion 
function convert_to_server_date($date, $format = 'Y-m-d', $oddsTimeZone = 'UTC')
{
    try {
        $dateTime = new DateTime ($date, new DateTimeZone($oddsTimeZone));
        $dateTime->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        return $dateTime->format($format);
    } catch (Exception $e) {
        return '';
    }
}

$endDates = count($startD);
$newDate = array();
for ($d = 0; $d < $endDates ;++$d) {
$newDate[] = convert_to_server_date($$startDate[$d]);
}

$allD = array_chunk($newDate, 6);


/*
*
* Append it!
*
*///

$mlTeam = array_chunk(array_unique(array_column($ML, "bName")), 2);
$mlPrice = array_chunk(array_column($ML, "bPrice"), 2);
$mleid = array_chunk(array_column($ML, "id"), 2);






$ouTeam = array_chunk(array_column($OU, "bName"), 2);
$ouPrice = array_chunk(array_column($OU, "bPrice"), 2);
$oueid = array_chunk(array_column($OU, "id"), 2);



$rlTeam = array_chunk(array_unique(array_column($RL, "bName")), 2);
$rlPrice = array_chunk(array_column($RL, "bPrice"), 2);
$rleid = array_chunk(array_column($RL, "id"), 2);
$start = array_chunk(array_column($RL, "DBstart"), 2);
$niceStart = array_chunk(array_column($RL, "start"), 2);
$away = array_column($RL, "away");
$home = array_column($RL, "home");

$endAll = count($RL) + 20;

for ($k = 0; $k < $endAll; ++$k){
$searchString = " ";
$replaceString = "";
$homeI[] = str_replace($searchString, $replaceString, $home[$k]);
$awayI[] = str_replace($searchString, $replaceString, $away[$k]);
$awayImages = array_values(array_unique($awayI));
$homeImages = array_values(array_unique($homeI));

}


/* Remove/Unset Spare Keys
$math = $endMLB / 6;
$removeX = count($allML);
$CountKeys = 8;
//$CountKeys = 10;
for ($rm = $CountKeys; $rm <= $removeX; ++$rm){
unset($all[$rm]);
}

for ($n = $OUFirst; $n <= $OULast; ++$n){
$mlTeam[] = array_column($allML[$n], "bName");
$mlPrice[] = array_column($allML[$n], "bPrice");
$away[] = array_unique(array_column($allML[$n], "away"));
$home[] = array_unique(array_column($allML[$n], "home"));
$mleid[] = array_column($allML[$n], "id");
$ouTeam[] = array_column($allOU[$n], "bName");
$ouPrice[] = array_column($allOU[$n], "bPrice");
$oueid[] = array_column($allOU[$n], "id");

$rlTeam[] = array_column($allRL[$n], "bName");
$rlPrice[] = array_column($allRL[$n], "bPrice");
$rleid[] = array_column($allRL[$n], "id");
}


print_r($rleid);
//$wth = array_column($all, "weather");
$awap = array_column($all, "AP");
$homp = array_column($all, "HP");

for ($k = $MLFirst; $k <= $MLLast; ++$k){

$searchString = " ";
$replaceString = "";
$homeI[$k] = str_replace($searchString, $replaceString, $home[$k]);
$awayI[$k] = str_replace($searchString, $replaceString, $away[$k]);
$awayImages = array_unique($awayI);
$homeImages = array_unique($homeI);
}


//echo $all[0]['HP'];

//echo $CountKeys;
/* Gibberish Below
*  Fuggin post Season MLB cant collect 1 game ID, doesnt appear on their API. 
* Method is close but isnt appended to all odds array


$tcount = count($ateam);
$grab = array();
for ($loc = 0; $loc < $tcount; ++$loc) {
foreach ($searchT as $value => $key) {
    if ($key == $ateam[$loc]) {
        $grab[] = $value;
        

    }
}
}
$grabKeyz = array_keys($grab);
//print_R($gamePK[$grabKeyz[2]]);
echo "\n";
//print_R($grabKeyz);
echo "\n";
//print_R($grabKeyz);
$ST = array();
for ($n = 1; $n < 5; ++$n){
$ST[] = $gamePK[$grabKeyz[$n]];
}
print_r($ateam);
echo $tcount;
*/


/* Terrrific Functi9n
$awayPitchers = [];
array_walk_recursive(
    $mlbInfo,
    function($leafNode, $key) use(&$awayPitchers) {
        if ($key === 'awayPitcherERA') {
            $awayPitchers[] = $leafNode;
        }

    }
);
*/
?>