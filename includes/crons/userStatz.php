<?php
//session_start();
require '../config/config.php';
//bank("5c5d9f51b4c1", "2000.00", $clock);
$uid = "11d127b492bb";
$Stats = readW("userID", "$uid", "bets", "1000");
use Curl\Curl;
$MonthlyWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));
$MonthlyLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));

$league = array_column($MonthlyWins, "league");
$parseLeague = array_slice(array_count_values($league), 0, 5, true);
$FavSportvalue = max($parseLeague);
$FavSport = array_search($FavSportvalue, $parseLeague);

$option = array_column($MonthlyWins, "option");
$parseOption = array_slice(array_count_values($option), 0, 5, true);
$FavOptionvalue = max($parseOption);
$FavOption = array_search($FavOptionvalue, $parseOption);


$type = array_column($MonthlyWins, "type");
$parsetype = array_slice(array_count_values($type), 0, 5, true);
$Favtypevalue = max($parsetype);
$Favtype = array_search($Favtypevalue, $parsetype);

$worstleague = array_column($MonthlyLose, "league");
$worstparseLeague = array_slice(array_count_values($worstleague), 0, 5, true);
$worstSportvalue = max($worstparseLeague);
$worstSport = array_search($worstSportvalue, $worstparseLeague);

$worstoption = array_column($MonthlyWins, "option");
$worstparseOption = array_slice(array_count_values($worstoption), 0, 5, true);
$worstOptionvalue = max($worstparseOption);
$worstOption = array_search($worstOptionvalue, $worstparseOption);

$ratio = array_column($MonthlyWins, "ratio");
$locateUpset = max($ratio);
$Upset = array_search($locateUpset, $ratio);
$val = $MonthlyWins[$Upset];

$WinAmt = array_column($MonthlyWins, "amount");
$LoseAmt = array_column($MonthlyLose, "amount");
$wins = count($MonthlyWins);
$Losses = count($MonthlyLose);
$winSum = array_sum($WinAmt);
$loseSum = array_sum($LoseAmt);


$betCount = $wins + $Losses;
$winP = $wins / $betCount * 100;


$id = date('M-Y') . "-" . $uid;
$MainStats = array('sport'=>$FavSport, 'type'=>$Favtype, 'team'=>$FavOption, 'badTeam'=>$worstOption, 'WorstSport'=>$worstSport, 'wins'=>$wins,  'losses'=>$Losses, 'win_total'=>$winSum, 'loss_total'=>$loseSum, 'upsetRatio'=>$Upset, 'winPercent'=>$winP, 'uid'=>$uid, 'month'=>date('M Y'), 'id'=>$id);


$locateRecord = readW("id", "$id", "bettingStatistics", "1");

if ($locateRecord){
    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $dbKey);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/db/Update', [
    'id' => $id,
    'record'=>$MainStats,
    'table' => 'bettingStatistics'
    
]);
    var_dump($curl->response);

    if ($curl->error) {
    var_dump($curl->response);
    $curl->close();
 }

    } else {

    $curl = new Curl();
    $curl->setBasicAuthentication('Authorization', $dbKey);
    $curl->setHeader('Content-Type', 'application/json');
    $curl->get('https://api.m3o.com/v1/db/Create', [
    'record'=>$MainStats,
    'table' => 'bettingStatistics'
    ]);
    var_dump($curl->response);
     $curl->close(); 
            }
    



/*
$MonthlyWinTotals = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['type'] === 'Totals' | 'Total'  && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));
$MonthlyLoseTotals = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE' && $var['type'] === 'Totals' | 'Total'  && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));

$MonthlyWinSpreads = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['type'] === 'Spread' | 'Spreads'  && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));
$MonthlyLoseSpreads = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE' && $var['type'] === 'Spread' | 'Spreads'  && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));

$MonthlyWinML = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['type'] === 'Moneyline'  && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));
$MonthlyLoseML = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE' && $var['type'] === 'Moneyline' && $var['start'] >= date('Y-m-01') && $var['start'] <= date('Y-m-t'));

}));

$LT1 = array_column($MonthlyLoseTotals, 'amount');
$LT2 = array_column($MonthlyLoseTotals, 'ratio');
$LT3 = array_column($MonthlyLoseTotals, 'option');
$LT4 = array_column($MonthlyLoseTotals, 'league');
$LTsum = array_sum($LT1);

/* Most Bet Option 
$LTO =  array_slice(array_count_values($LT3), 0, 5, true);
$LTOvalue = max($LTO);
$LTOkey = array_search($LTOvalue, $LTO);

/* Most Used Ratio/odds 
$LTRatio =  array_slice(array_count_values($LT2), 0, 5, true);
$LTvalue = max($LTRatio);
$LTkey = array_search($LTvalue, $LTRatio);
/* Most Bet League 
$LTL = array_slice(array_count_values($LT4), 0, 5, true);
$LTLvalue = max($LTL);
$LTLkey = array_search($LTLvalue, $LTL);

$WT1 = array_column($MonthlyWinTotals, 'amount');
$WT2 = array_column($MonthlyWinTotals, 'ratio');
$WT3 = array_column($MonthlyWinTotals, 'option');
$WT4 = array_column($MonthlyWinTotals, 'league');
$WTsum = array_sum($WT1);

/* Most Totals Bet Option 
$WTO =  array_slice(array_count_values($WT3), 0, 5, true);
$WTOvalue = max($WTO);
$WTOkey = array_search($WTOvalue, $WTO);

/* Most Totals Ratio/odds 
$WTRatio =  array_slice(array_count_values($WT2), 0, 5, true);
$WTvalue = max($WTRatio);
$WTkey = array_search($WTvalue, $WTRatio);
/* Most Totals Bet League 
$WTL = array_slice(array_count_values($WT4), 0, 5, true);
$WTLvalue = max($WTL);
$WTLkey = array_search($WTLvalue, $WTL);
$total = $WTsum - $LTsum;

$LML1 = array_column($MonthlyLoseML, 'amount');
$LML2 = array_column($MonthlyLoseML, 'ratio');
$LML3 = array_column($MonthlyLoseML, 'option');
$LML4 = array_column($MonthlyLoseML, 'league');
$LMLsum = array_sum($LML1);

/* Most Bet ML  Option 
$LMLO =  array_slice(array_count_values($LML3), 0, 5, true);
$LMLOvalue = max($LMLO);
$LMLOkey = array_search($LMLOvalue, $LMLO);

/* Most Used ML Ratio/odds 
$LMRatio =  array_slice(array_count_values($LML2), 0, 5, true);
$LMvalue = max($LMRatio);
$LMkey = array_search($LMvalue, $LMRatio);
/* Most Bet ML League 
$LML = array_slice(array_count_values($LML4), 0, 5, true);
$LMLvalue = max($LML);
$LMLkey = array_search($LMLvalue, $LML);

echo $LMLOkey."\n";
echo $LMkey."\n";
echo $LMLkey."\n";
echo $LMLsum."\n";



$WML1 = array_column($MonthlyWinML, 'amount');
$WML2 = array_column($MonthlyWinML, 'ratio');
$WML3 = array_column($MonthlyWinML, 'option');
$WML4 = array_column($MonthlyWinML, 'league');
$WMLsum = array_sum($WML1);
$MLsum = $WMLsum - $LMLsum;

$WML =  array_slice(array_count_values($WML3), 0, 5, true);
$WMLvalue = max($WML);
$WMLkey = array_search($WMLvalue, $WML);


$WMLRatio =  array_slice(array_count_values($WML2), 0, 5, true);
$WMLvalue = max($WMLRatio);
$WMLRkey = array_search($WMLvalue, $WMLRatio);

$WMLL = array_slice(array_count_values($WML4), 0, 5, true);
$WMLLvalue = max($WMLL);
$WMLLkey = array_search($WMLLvalue, $WMLL);

echo $WMLkey."\n";
echo $WMLRkey."\n";
echo $WMLLkey."\n";


echo $MLsum."\n";

/*
$all = count($Stats);
$wins = count($MonthlyWins);
$Ls = count($MonthlyLose);
$uname = array_column($Stats, 'username');
$ratio = array_column($Stats, 'ratio');

$Wratio = array_column($MonthlyWins, 'ratio');
$Wopt = array_column($MonthlyWins, 'option');
$Lratio = array_column($MonthlyLose, 'ratio');
$Wamt = array_column($MonthlyWins, 'amount');
$Lamt = array_column($MonthlyLose, 'amount');
$Ratios = array("Max Lost Ratio"=>max($Lratio), "Min Lost Ratio"=>min($Lratio), "Max Won Ratio"=>max($Wratio), "Min Win Ratio"=>min($Wratio), "Max L"=>max($Lamt), "Min L"=>min($Lamt), "Max W"=>max($Wamt), "Min W"=>min($Wamt));
//Most Common Values//Averagge Win Lines
$Wcounts = array_count_values($Wratio);
$Woptz = array_count_values($Wopt);

$Wtop_with_count = array_slice($Wcounts, 0, 5, true);
$TopWinRatios = array_keys($Wtop_with_count);
$TopLoseRatios = array_slice($Lcounts, 0, 5, true);
$LKe = array_keys($Ltop_with_count);


///Stats
$fel = $Ls + $wins;
$pending = $all - $fel;
$winP = $wins / $fel * 100;
$stats = array('user'=>$uname[0], 'total'=>$all, 'wins'=>$wins, 'losses'=>$Ls, 'pending'=>$pending, 'winPercentage'=>$winP, "AVG Loss Odds"=>$AVGL, "Avg Win Odds"=>$AVGW);


print_r($LTsum);
*/
//echo "Average Win Odds Line: " . $AVGW . "\n" . "Average Loss Odds Line: " . $AVGL;













/*
$FebWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-02" && $var['start'] <= "2022-02-28");

}));
$MarWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-03" && $var['start'] <= "2022-03-31");

}));
$AprWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-04" && $var['start'] <= "2022-04-30");

}));
$MayWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-05" && $var['start'] <= "2022-05-31");

}));
$JuneWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-06" && $var['start'] <= "2022-06-30");

}));
$JulyWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-07" && $var['start'] <= "2022-07-31");

}));
$AugWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-08" && $var['start'] <= "2022-08-31");

}));
$SeptWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-09" && $var['start'] <= "2022-09-30");

}));
$OctWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-09" && $var['start'] <= "2022-09-31");

}));
$NovWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-11" && $var['start'] <= "2022-11-30");

}));
$DecWins = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'WIN' | 'GRADED' && $var['start'] >= "2022-12" && $var['start'] <= "2022-12-31");

}));
$JanLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-01" && $var['start'] <= "2022-01-31");

}));
$FebLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-01" && $var['start'] <= "2022-01-31");
     return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-02" && $var['start'] <= "2022-02-28");

}));
$MarLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-03" && $var['start'] <= "2022-03-31");

}));
$AprLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-04" && $var['start'] <= "2022-04-30");

}));
$MayLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-05" && $var['start'] <= "2022-05-31");

}));
$JuneLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-06" && $var['start'] <= "2022-06-30");

}));
$JulyLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-07" && $var['start'] <= "2022-07-31");

}));
$AugLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-08" && $var['start'] <= "2022-08-31");

}));
$SeptLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-09" && $var['start'] <= "2022-09-30");

}));
$OctLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-09" && $var['start'] <= "2022-09-31");

}));
$NovLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-11" && $var['start'] <= "2022-11-30");

}));
$DecLose = array_values(array_filter($Stats, function($var) {
    return ($var['win_status'] === 'LOSE'  && $var['start'] >= "2022-12" && $var['start'] <= "2022-12-31");

}));





$losers = array($JanLose,$FebLose,$MarLose,$AprLose,$JuneLose,$JulyLose,$AugLose,$SeptLose,$OctLose,$NovLose,$DecLose);
$winners = array($JanWins,$FebWins,$MarWins,$AprWins,$JuneWins,$JulyWins,$AugWins,$SeptWins,$OctWins,$NovWins,$DecWins);
/*
array_walk(                      // iterate each element of an input array
    $winners,                      // this is the input array
    function($v)use(&$filtered){ // $v is each value, $filter (output) is declared/modifiable
        if(!is_null($v)){        // this literally checks for null values
            $filtered[]=$v;      // value is pushed into output with new indexes
        }
    }
);
*/
