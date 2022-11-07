<?php
/**
 * 
 * 
 * All NCAAB Odds Data Parsed
 * March 1st, 2022
 * THE NEW STANDARD!
 * 
 */
?>
<?php
error_reporting(1);
ini_set('display_errors', 1);
//include_once __DIR__ . '/../includes/config/config.php';
//http://site.api.espn.com/apis/site/v2/sports/basketball/mens-college-basketball/scoreboard
$oddsdata = "https://api2.dimedata.net/v4/?feedID=1203&api-key=a71b8fe8e9eb957db549aaa5d99797a4"; 
$readodds = file_get_contents($oddsdata);
$fetchOdds = json_decode($readodds, true);
$fodds = $fetchOdds['data'];
$odds = array_reverse($fodds);
$today = date("Y-m-d H:i:s");
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
$ntime[] = date("F j, Y, @ g:i A ",  strtotime($startDate[$win]));
$DBDate[] = date("Y-m-d",  strtotime($startDate[$win]));

$allodds[$win] = array('id'=>$bookieID[$win], 'start'=>$ntime[$win], 'DBstart'=>$DBDate[$win], 'bType'=> $bType[$win], 'bName'=> $bName[$win] , 'bPrice'=>$bPrice[$win], 'home'=>$homeTeams[$win], 'away'=>$awayTeams[$win], 'sbook'=> $sBook[$win], 'Live'=>$Live[$win], 'updated'=>$checked[$win]);
$games = array_chunk($allodds, 6);
$gamesUO[$win] = array_chunk($allodds, 2);

$test[] = array_flip($allodds[$win]);
$index[] = array_search($test, 'Moneyline');


}


//print_r($allodds);

$fakeML = array_fill(0, 300, 'Moneyline');
$fakeOU = array_fill(0, 300, 'Total Points');
$fakeRL = array_fill(0, 300, 'Point Spread');



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
/*
$mlid = array_column($ML, 'id');
$rlid = array_column($RL, 'id');
$ouid = array_column($OU, 'id');
*/




/* Start UTC => EST & Cleaning Conversion */
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
$newDate[] = convert_to_server_date($startD[$d]);
}

$allD = array_chunk($newDate, 6);



/*
*
* Append it!
*


$endAll = count($allRL);

for ($n = 0; $n < $endAll; ++$n){
    
$all[] = array('ML'=>$ML[$n], 'RL'=>$allRL[$n], 'OU'=>$allOU[$n], 'start'=>$DBDate[$n], 'niceStart'=>$ntime[$n]);

}
*/




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

//print_r($rlTeam);
//print_r($homeImages);

//print_r($homeImages);
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
