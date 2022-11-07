<?php
/**
 * 
 * 
 * THE-ODDS-API //FREE///
 * FUCK STANFORD //$750/MO///
 * 
 * 
 */
?>
<?php
error_reporting(1);
ini_set('display_errors', 1);
include_once __DIR__ . '/../config/config.php';


$oddsdata = "https://api.the-odds-api.com/v4/sports/baseball_mlb/odds/?apiKey=$theoddsAPI&regions=eu&markets=h2h&oddsFormat=american&dateFormat=unix"; 
$readodds = file_get_contents($oddsdata);
$fetchOdds = json_decode($readodds, true);

/*
$spreadsdata = "https://api.the-odds-api.com/v4/sports/baseball_mlb/odds/?apiKey=$theoddsAPI&regions=eu&markets=spreads&oddsFormat=american&dateFormat=unix"; 
$readspreads = file_get_contents($spreadsdata);
$fetchspreads = json_decode($readspreads, true);

$totalsdata = "https://api.the-odds-api.com/v4/sports/baseball_mlb/odds/?apiKey=$theoddsAPI&regions=eu&markets=totals&oddsFormat=american&dateFormat=unix"; 
$readtotals = file_get_contents($totalsdata);
$fetchTotals = json_decode($readtotals, true);
*/
 //echo $oddsdata."\n";

$endML = count($fetchOdds);
$endSP = count($fetchspreads);
$endTO = count($fetchTotals);

/*
function get_in_array( string $needle, array $haystack, string $column ){
    return array_filter( $haystack, function( $item )use( $needle, $column ){
      return $item[ $column ] === $needle;
    });
}


$bookzz = array_column($fetchspreads, "bookmakers");
$endBooks = count($fetchOdds[0]['bookmakers']);
for ($bk = 0; $bk < $endBooks; ++$bk) {

$fetchBookies = array_column($bookzz, $bk);
$fetchBookiez = array_column($fetchBookies, $bk);
$fb = array_column($fetchBookies, "title");
$pinnacle = get_in_array("Pinnacle", $fetchBookies,  "title");



}




print_r($fetchBookies);
$jsonData = json_encode($fetchBookies);
file_put_contents('includes/logs/pin.json', $jsonData);


*/
for ($win = 0; $win < $endML; ++$win) {


$id[$win] = $fetchOdds[$win]['id'];
$hTeam[$win] = $fetchOdds[$win]['home_team'];
$aTeam[$win] = $fetchOdds[$win]['away_team'];
$start[$win] = $fetchOdds[$win]['commence_time'];
$bookmakers[$win] = $fetchOdds[$win]['bookmakers'][$win]['title'];
$checked[$win] = $fetchOdds[$win]['bookmakers'][$win]['last_update'];
$hPrice[$win] = $fetchOdds[$win]['bookmakers'][0]['markets'][0]['outcomes'][1]['price'];
$aPrice[$win] = $fetchOdds[$win]['bookmakers'][0]['markets'][0]['outcomes'][0]['price'];
$vsML[$win] = $hTeam[$win] .' vs '.  $aTeam[$win];



$MLOdds[] = array( 

    'id' => $id[$win],
    'hTeam' => $hTeam[$win],
    'aTeam' => $aTeam[$win],
    'game'    => $vsML[$win],
    'start' => date("Y-m-d H:i:s", $start[$win]),
    'DBDate' => date("Y-m-d", $start[$win]),
    'bookmakers' => $bookmakers[$win],
    'checked' => $checked[$win],
    'markets' => $marketz[$win]


);

}
/*
for ($win = 0; $win < $endSP; ++$win) {
$idSpreads[$win] = $fetchspreads[$win]['id'];
$hTeamSpreads[$win] = $fetchspreads[$win]['home_team'];
$aTeamSpreads[$win] = $fetchspreads[$win]['away_team'];
$startSpreads[$win] = $fetchspreads[$win]['commence_time'];
$bookmakersSpreads[$win] = $fetchspreads[$win]['bookmakers'][$win]['title'];
$checkedSpreads[$win] = $fetchspreads[$win]['bookmakers'][$win]['last_update'];
$hSP[$win] = $fetchspreads[$win]['bookmakers'][$win]['markets'][0]['outcomes'][0]['name'] .' '. $fetchspreads[$win]['bookmakers'][$win]['markets'][0]['outcomes'][0]['point'];
$aSP[$win] = $fetchspreads[$win]['bookmakers'][$win]['markets'][0]['outcomes'][1]['name'] .' '. $fetchspreads[$win]['bookmakers'][$win]['markets'][0]['outcomes'][1]['point'];
$hPriceSpreads[$win] = $fetchspreads[$win]['bookmakers'][$win]['markets'][0]['outcomes'][1]['price'];
$aPriceSpreads[$win] = $fetchspreads[$win]['bookmakers'][$win]['markets'][0]['outcomes'][0]['price'];
$vsSP[$win] = $hTeamSpreads[$win] .' vs '.  $aTeamSpreads[$win];

$SpreadsOdds[] = array( 

    'id' => $idSpreads[$win],
    'hTeam' => $hTeamSpreads[$win],
    'aTeam' => $aTeamSpreads[$win],
    'game' => $vsSP[$win],
    'start' => date("Y-m-d H:i:s", $startSpreads[$win]),
    'DBDate' => date("Y-m-d", $startSpreads[$win]),
    'bookmakers' => $bookmakersSpreads[$win],
    'checked' => $checkedSpreads[$win],
    'markets' => $marketzSpreads[$win]

);
}
for ($win = 0; $win < $endTO; ++$win) {
$idTotals[$win] = $fetchTotals[$win]['id'];
$hTeamTotals[$win] = $fetchTotals[$win]['home_team'];
$aTeamTotals[$win] = $fetchTotals[$win]['away_team'];
$startTotals[$win] = $fetchTotals[$win]['commence_time'];
$bookmakersTotals[$win] = $fetchTotals[$win]['bookmakers'][$win]['title'];
$checkedTotals[$win] = $fetchTotals[$win]['bookmakers'][$win]['last_update'];
$hPriceTotals[$win] = $fetchTotals[$win]['bookmakers'][$win]['markets'][0]['outcomes'][1]['price'];
$aPriceTotals[$win] = $fetchTotals[$win]['bookmakers'][$win]['markets'][0]['outcomes'][0]['price'];
$hTO[$win] = $fetchTotals[$win]['bookmakers'][$win]['markets'][0]['outcomes'][0]['name'] .' '. $fetchTotals[$win]['bookmakers'][$win]['markets'][0]['outcomes'][0]['point'];
$aTO[$win] = $fetchTotals[$win]['bookmakers'][$win]['markets'][0]['outcomes'][1]['name'] .' '. $fetchTotals[$win]['bookmakers'][$win]['markets'][0]['outcomes'][1]['point'];
$vsTO[$win] = $hTeamTotals[$win] .' vs '.  $aTeamTotals[$win];

$TotalsOdds[] = array( 

    'id' => $idTotals[$win],
    'hTeam' => $hTeamTotals[$win],
    'aTeam' => $aTeamTotals[$win],
    'game' => $vsTO[$win],
    'start' => date("Y-m-d H:i:s", $startTotals[$win]),
    'DBDate' => date("Y-m-d", $startTotals[$win]),
    'bookmakers' => $bookmakersTotals[$win],
    'checked' => $checkedTotals[$win],
    'markets' => $marketzTotals[$win]

);
}
*/
for ($win = 0; $win < $endML; ++$win) {
$allOdds[] = array('ML'=>$MLOdds[$win],'Totals'=>$TotalsOdds[$win],'Spreads'=>$SpreadsOdds[$win]);
$mlTeam[] = array($hTeam[$win], $aTeam[$win]);
$mlPrice[] = array($hPrice[$win], $aPrice[$win]);

$mlStart[] = $MLOdds[$win]['start'];
$mlDBStart[] = $MLOdds[$win]['DBDate'];
$mlID[] = $MLOdds[$win]['id'];

/*
$ouTeam[] = array($hTO[$win], $aTO[$win]);
$ouPrice[] = array($hPriceTotals[$win], $aPriceTotals[$win]);

$rlTeam[] = array($hSP[$win], $aSP[$win]);
$rlPrice[] = array($hPriceSpreads[$win], $aPriceSpreads[$win]);


$ouStart[] = $TotalsOdds[$win]['start'];
$rlStart[] = $SpreadsOdds[$win]['start'];

$mlDBStart[] = $MLOdds[$win]['DBDate'];
$ouDBStart[] = $TotalsOdds[$win]['DBDate'];
$rlDBStart[] = $SpreadsOdds[$win]['DBDate'];

$mlID[] = $MLOdds[$win]['id'];
$ouID[] = $TotalsOdds[$win]['id'];
$rlID[] = $SpreadsOdds[$win]['id'];
*/
$bookMakerz = array('Moneyline'=>$bookmakers, 'Spreads'=>$bookmakersSpreads, 'Totals'=>$bookmakersTotals);
$defined[] = array('Spreads'=>$rlTeam,$rlPrice,'Totals'=>$ouTeam,$ouPrice,'Moneyline'=>$mlTeam,$mlPrice);

$searchString = " ";
$replaceString = "";
$homeI[] = str_replace($searchString, $replaceString, $hTeam[$win]);
$awayI[] = str_replace($searchString, $replaceString, $aTeam[$win]);


}


/*

Dumb shit, apply (+) to positive numbers in mlPrice for end users looks sake.. should be ez but should move fwd for now.. array walk works but applying it to arr should be easier, just need a break from this 
function test_print($item, $key)
{
    if ($item > 0){
    echo "+ $item";
}
}

array_walk_recursive($mlPrice, 'test_print');
*/

?>
