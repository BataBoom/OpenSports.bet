<?php
/**
 * 
 * 
 * laliga ML Odds Data Parsed
 * October 31st, 2021
 * 
 * 
 */
?>
<?php
error_reporting(1);
ini_set('display_errors', 1);


$oddsdata = "https://api2.dimedata.net/v4/?feedID=1115&api-key=a71b8fe8e9eb957db549aaa5d99797a4"; // 
$readodds = file_get_contents($oddsdata);
$fetchOdds = json_decode($readodds, true);
$fodds = $fetchOdds['data'];
$odds = array_reverse($fodds);
$today = date("Y-m-d H:i:s");
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$filltime = '23:59:59';

$endPL = count($odds);

for ($win = 0; $win < $endPL; ++$win) {

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




}


$allML = array_chunk($allodds, 3);

$count = count($allML);
for ($i = 0; $i < $count; ++$i){
$mlTeam[] = array_column($allML[$i], "bName");
$mlPrice[] = array_column($allML[$i], "bPrice");
$mleid[] = array_column($allML[$i], "id");
$away[] = array_column($allML[$i], "away");
$home[] = array_column($allML[$i], "home");
}
//print_r($allML);

/*
$date = date("Y-m-d H:i:s");
/* Start UTC => EST & Cleaning Conversion 
function convert_to_server_date($date, $format = 'Y-m-d H:i:s', $oddsTimeZone = 'UTC')
{
    try {
        $dateTime = new DateTime ($date, new DateTimeZone($oddsTimeZone));
        $dateTime->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        return $dateTime->format($format);
    } catch (Exception $e) {
        return '';
    }
}

$endDates = count($startDate);
$newDate = array();
for ($d = 0; $d < $endDates ;++$d) {
$newDate[] = convert_to_server_date($startDate[$d]);
}
*/
//print_r($startDate);


?>