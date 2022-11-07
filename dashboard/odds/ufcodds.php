<?php
/**
 * MLB F5 ML
 * Started Sept 14th, 2021
 * 
 * 
 */
?>
<?php

//require __DIR__ . '/../includes/config/config.php';
/*

$ch8 = curl_init();
$timeout = 5;
curl_setopt($ch8, CURLOPT_URL, "http://api.dimedata.net/api/json/odds/bovada/v2/900/mixed-martial-arts/ufc/all?api-key=$oddsKey");
curl_setopt($ch8, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch8, CURLOPT_CONNECTTIMEOUT, $timeout);
$dataufc = curl_exec($ch8);
curl_close($ch8);

*/



$oddsdata = "https://api2.dimedata.net/v4/?feedID=972&api-key=$oddsKey"; // 
$readodds = file_get_contents($oddsdata);
$fetchOdds = json_decode($readodds, true);
$ufc = $fetchOdds['data'];

$endufc = count($ufc);

//print_r($ufc);
for ($win = 0; $win < $endufc; ++$win) {

$ufcGames[$win] = array (
  'league'=>$ufc[$win]['league'],
  'gameUID'=>$ufc[$win]['gameUID'],
  'id'=>$ufc[$win]['id'],
  'book'=>$ufc[$win]['sportsbook'],
  'start'=>$ufc[$win]['startDate'],
  'away'=>$ufc[$win]['awayTeam'],
  'home'=>$ufc[$win]['homeTeam'],
  'description'=>$ufc[$win]['description'],
  'isLive'=>$ufc[$win]['isLive'],
  'MLAway'=>$ufc[$win]['betName'],
  'MLHome'=>$ufc[$win]['betPrice'],
  'checkedDate'=>$ufc[$win]['checkedDate']);
}

//print_r($ufcGames);


$end = count($ufcGames);
$bookieid = array_column($ufcGames, 'id');
$ufcgid = array_column($ufcGames, 'gameUID');
$homeufc = array_column($ufcGames, 'home');
$awayufc = array_column($ufcGames, 'away');
$league = array_column($ufcGames, 'league');
$startD = array_column($ufcGames, 'start');

$book = array_column($ufcGames, 'book');
$description = array_column($ufcGames, 'description');
$isLive = array_column($ufcGames, 'isLive');
$MLHome = array_column($ufcGames, 'MLHome');
$MLAway = array_column($ufcGames, 'MLAway');
$checkedDate = array_column($ufcGames, 'checkedDate');

/*
$ufcGames = array('eventID' => $bookieid, 'gameID'=> $ufcgid, 'start' => $startD, 'home' => $homeufc, 'away' => $awayufc, 'league' => $league, 'description' => $description, 'isLive' => $isLive, 'hWinner' => $winnerHome, 'aWinner' => $winnerAway, 'status' => $status, 'venue' => $venue, 'venueLoc' => $venueLoc, 'broadcast' => $broadcast, 'attendance' => $attendance, 'ml' => $ml, 'spread' => $SD, 'totals'=> $TOT);
*/
//print_r($ufcGames);



?>
