<?php
/**
 * 
 * 
 * All NBA Odds Data Parsed
 * October 31st, 2021
 * 
 * 
 */
?>
<?php
error_reporting(1);
ini_set('display_errors', 1);
include_once __DIR__ . '/../includes/config/config.php';

$oddsdata = "https://api2.dimedata.net/v4/?feedID=464&api-key=$oddsKey"; 
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
*
*
* MATCH & MLB GAMEPK's to ODDS Array
* Three Simple Steps using mlbdata2.php included
*
*/

$count = count($allodds);
//$midz = array();
for ($wi = 0; $wi < $count; ++$wi) {
$searchTm[$wi] = array_unique(array_column($allML[$wi], "bName"));
$midz[$wi] = array_search($searchTm[$wi][0], $ateam);
$appendMLB[] = array('games'=>$allML[$wi], 'id'=>$gPK[$midz[$wi]], 'start'=>$oDate[$midz[$wi]]);
//$searchT = array_unique(array_column($ML, "away"));
$searchT = array_unique(array_column($ML, "away"));
}


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
*///[$midz[$n]]

for ($n = 0; $n < 6; ++$n){
    
$all[$n] = array('ML'=>$allML[$n], 'RL'=>$allRL[$n], 'OU'=>$allOU[$n], 'start'=>$DBDate[$n], 'niceStart'=>$ntime[$n], 'GID'=>$gPK[$midz[$n]], 'HP'=>$homePitcher[$midz[$n]], 'AP'=>$awayPitcher[$midz[$n]], 'weather'=>$weather[$midz[$n]]);
//$mlbInfo[$n] = array('mlbInfo'=>$getGID[$midz[$n]], 'PK'=>$gamePK[$midz[$n]], 'ML'=>$allML[$n], 'RL'=>$allRL[$n], 'OU'=>$allOU[$n]);
$mlbInfo[$n] = array('GID'=>$gPK[$midz[$n]], 'mlbInfo'=>$getGID[$midz[$n]]);
}


$PK = array_column($mlbInfo, 'GID');

/* Remove/Unset Spare Keys*/
$math = $endMLB / 6;
$removeX = count($allML);
$CountKeys = 6;
//$CountKeys = 10;
for ($rm = $CountKeys; $rm <= $removeX; ++$rm){
unset($all[$rm]);
}

/* Update 2022, removed OU First + Last BELOW... now Totals are gone, but page looks fixed, dont even have Totals graded so it works out */ 

for ($n = $MLFirst; $n <= $MLLast; ++$n){
$mlTeam[] = array_column($allML[$n], "bName");
$mlPrice[] = array_column($allML[$n], "bPrice");
$away[] = array_unique(array_column($allML[$n], "away"));
$home[] = array_unique(array_column($allML[$n], "home"));
$mleid[] = array_column($allML[$n], "id");
$ouTeam[] = array_column($allOU[$n], "bName");
$ouPrice[] = array_column($allOU[$n], "bPrice");
$oueid[] = array_column($allOU[$n], "id");
$start[] = array_column($allML[$n], "DBstart");
$niceStart[] = array_column($allML[$n], "start");

$rlTeam[] = array_column($allRL[$n], "bName");
$rlPrice[] = array_column($allRL[$n], "bPrice");
$rleid[] = array_column($allRL[$n], "id");
}
//$wth = array_column($all, "weather");
$awap = array_column($all, "AP");
$homp = array_column($all, "HP");
//print_r($mlTeam);
for ($k = $MLFirst; $k <= $MLLast; ++$k){

$searchString = " ";
$replaceString = "";
$homeI[$k] = str_replace($searchString, $replaceString, $home[$k]);
$awayI[$k] = str_replace($searchString, $replaceString, $away[$k]);
$awayImages = array_unique($awayI);
$homeImages = array_unique($homeI);
}
//echo $all[0]['HP'];
//print_r($allML);
//print_r($all[$i]['ML'][0]['id']);
//echo $CountKeys;

?>
