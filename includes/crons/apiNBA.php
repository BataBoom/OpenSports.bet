<?php
require __DIR__ . '/../config/config.php';
use Curl\Curl;

error_reporting(1);
ini_set('display_errors', 1);
$today = date("Y-m-d");
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$filltime = '23:59:59';
$now = date("Y-m-d H:i:s"); 

$getscore = "https://api2.dimedata.net/v4/?feedID=465&api-key=a71b8fe8e9eb957db549aaa5d99797a4&status=Completed";
$fetchscore = file_get_contents($getscore);
$score = json_decode($fetchscore, true); 
$endscore = count($score['data']);


for ($win = 0; $win < $endscore; ++$win) {

$scoreG[$win] = array (
  'id'=>$score['data'][$win]['id'],
  'gid'=>$score['data'][$win]['gameUID'],
  'start'=>$score['data'][$win]['startDate'],
  'week'=>$score['data'][$win]['seasonWeek'],
  'awayTeam'=>$score['data'][$win]['awayTeam'],
  'homeTeam'=>$score['data'][$win]['homeTeam'],
  'awayTeamAbb'=>$score['data'][$win]['awayTeamAbb'],
  'homeTeamAbb'=>$score['data'][$win]['homeTeamAbb'],
  'period'=>$score['data'][$win]['period'],
  'clock'=>$score['data'][$win]['clock'],
  'live'=>$score['data'][$win]['live'],
  'checked'=>$score['data'][$win]['checked'],
  'status'=>$score['data'][$win]['status'],
  'scoreAwayTotal'=>$score['data'][$win]['scoreAwayTotal'],
  'scoreAwayPeriod1'=>$score['data'][$win]['scoreAwayPeriod1'],
  'scoreAwayPeriod2'=>$score['data'][$win]['scoreAwayPeriod2'],
  'scoreAwayPeriod3'=>$score['data'][$win]['scoreAwayPeriod3'],
  'scoreAwayPeriod4'=>$score['data'][$win]['scoreAwayPeriod4'],
  'scoreHomeTotal'=>$score['data'][$win]['scoreHomeTotal'],
  'scoreHomePeriod1'=>$score['data'][$win]['scoreHomePeriod1'],
  'scoreHomePeriod2'=>$score['data'][$win]['scoreHomePeriod2'],
  'scoreHomePeriod3'=>$score['data'][$win]['scoreHomePeriod3'],
  'scoreHomePeriod4'=>$score['data'][$win]['scoreHomePeriod4']
  );
$startSc0 = array_column($scoreG, 'start');
$normalDate[] = date("l jS F Y g:ia ",  strtotime($startSc0[$win]));
$DBDate[] = date("Y-m-d",  strtotime($startSc0[$win]));
  }

$gid = array_column($scoreG, 'gid');
$homeTM = array_column($scoreG, 'homeTeam');
$awayTM = array_column($scoreG, 'awayTeam');
$startScore = array_column($scoreG, 'start');
$weekScore = array_column($scoreG, 'week');
$awayScore = array_column($scoreG, 'scoreAwayTotal');
$homeScore = array_column($scoreG, 'scoreHomeTotal');
$checked = array_column($scoreG, 'checked');
$live = array_column($scoreG, 'live');
$clock = array_column($scoreG, 'clock');
$period = array_column($scoreG, 'period');
$aShrt = array_column($scoreG, 'awayTeamAbb');
$hShrt = array_column($scoreG, 'homeTeamAbb');
$status = array_column($scoreG, 'status');




$fu = count($scoreG);
for ($t = 0; $t < $fu; ++$t) {

$FHAS[$t] = $scoreG[$t]['scoreAwayPeriod1'] + $scoreG[$t]['scoreAwayPeriod2'];
$FHHS[$t] = $scoreG[$t]['scoreHomePeriod1'] + $scoreG[$t]['scoreHomePeriod2'];
$totalFH[$t] = $FHAS[$t] + $FHHS[$t];
if ($FHHS[$t] > $FHAS[$t] && $status[$t] === 'Completed'){
  $FHwinners[$t] = $homeTM[$t];
  $diffFH[$t] = $FHHS[$t] - $FHAS[$t];

} elseif ($FHAS[$t] > $FHHS[$t] && $status[$t] === 'Completed'){
  $FHwinners[] = $awayTM[$t];
  $diffFH[$t] = $FHAS[$t] - $FHHS[$t];
}


$total[$t] = $awayScore[$t] + $homeScore[$t];
$vs[$t] = $awayTM[$t].' vs '.$homeTM[$t];

if ($homeScore[$t] > $awayScore[$t] && $status[$t] === 'Completed'){

  $winners[$t] = $homeTM[$t];
  $newDate[$t] = $DBDate[$t];
  $diff[$t] = $homeScore[$t] - $awayScore[$t];
  $winLoc[$t] = 'home';
} elseif ($awayScore[$t] > $homeScore[$t] && $status[$t] === 'Completed'){
  $winners[$t] = $awayTM[$t];
  $newDate[$t] = $DBDate[$t];
  $diff[$t] = $awayScore[$t] - $homeScore[$t];
  $winLoc[$t] = 'away';
}
}

$sport = 'NBA';


$countDubs = count($winners);
for ($dubcity = 0; $dubcity < $countDubs; ++$dubcity) {
if ($status[$dubcity] === 'Completed'){
    uploadScore($gid, $winners, $vs, $newDate, $homeScore, $awayScore, $total, $totalFH, $FHWinners, $diffFH, $diff, $homeTM, $awayTM, $winLoc, $sport);
}
}
?>
