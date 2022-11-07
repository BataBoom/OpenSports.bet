<?php
/**
 * Update Winners Amounts
 * Reset Array Keys and its done
 * attempted with array_values on winners
 * Working perfect so far.. but havent had a plus odds winner to confirm 
 */
?>
<?php
require __DIR__ . '/../config/config.php';
$today = date("Y-m-d"); 
$now = date("Y-m-d H:i:s"); 
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$limit = 1000;

$winnerz = readW("win_status", "WIN", "bets", $limit);



$winners = array_values(array_filter($winnerz, function($var) use ($yday) {
    return ($var['start'] == $yday);

}));

//$rend = array_key_last($winners);
//$start = array_key_first($winners);
$count = count($winners);

for ($n = 0; $n < $count; ++$n) {
$ex[$n] = array($winners[$n]['ratio'], $winners[$n]['amount'], $winners[$n]['gameid'], $winners[$n]['userID'], $winners[$n]['id']);


$betid = array_column($ex, 5);



if (0 > $ex[$n][0]) {
$v = ltrim($ex[$n][0], '-');
$x = 100 / $v;
$u = $ex[$n][1] * $x;
$y[$n] = $ex[$n][1] + $u;


} elseif($ex[$n][0] > 0) {

$x = $ex[$n][1] / 100;
$y[$n] = $ex[$n][1] * $x;

}

$now = date("Y-m-d H:i:s");
updateDB("bets", "amount", "$y[$n]", $ex[$n][4]);
updateDB("bets", "updated_at", "$now", $ex[$n][4]);
updateDB("bets", "win_status", "GRADED", $ex[$n][4]);
}
print_r($betid);
print_r($ex);
print_r($y);
echo $count;


?>
