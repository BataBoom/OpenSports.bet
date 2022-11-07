<?php
session_start();
require __DIR__ . '/../../includes/config/config.php';
checkSession();

?>
<?php

$now = date("Y-m-d H:i:s");
$fetchID = $_POST["id"];
$fetchAmount = $_POST["amount"];
$fetchStatus = $_POST["winner"];
$fetchHTM = $_POST["homeTM"];
$fetchATM = $_POST["awayTM"];
$fetchHTMO = $_POST["homeO"];
$fetchATMO = $_POST["awayO"];
$fetchSport = $_POST["sport"];
$fetchStart = $_POST["start"];
updateDB("custommatches", "winner", "$fetchStatus", "$fetchID");
updateDB("custommatches", "homeTM", "$fetchHTM", "$fetchID");
updateDB("custommatches", "awayTM", "$fetchATM", "$fetchID");
updateDB("custommatches", "homeOdds", "$fetchHTMO", "$fetchID");
updateDB("custommatches", "awayOdds", "$fetchATMO", "$fetchID");
updateDB("custommatches", "sport", "$fetchSport", "$fetchID");
updateDB("custommatches", "updated_at", "$now", "$fetchID");
updateDB("custommatches", "start", "$fetchStart", "$fetchID");
$_SESSION['edit_success'] = "Successfully Updated!";
// Check if Referral URL exists
if (isset($_SERVER['HTTP_REFERER'])) {
  // Store Referral URL in a variable
  $refURL = $_SERVER['HTTP_REFERER'];
  header("Location:$refURL");
} else {
	$data = array('UA'=>$_SERVER['HTTP_USER_AGENT'],'ADDR'=>$_SERVER['REMOTE_ADDR'], 'HOST'=>$_SERVER['REMOTE_HOST'],'PORT'=>$_SERVER['REMOTE_PORT']);
  $inp = file_get_contents('updateBets.json');
  $tempArray = json_decode($inp);
  array_push($tempArray, $data);
  $jsonData = json_encode($tempArray);
  file_put_contents('updateBets.json', $jsonData);
  header("Location:https://opensports.bet");
}
//header("Location:)

?>

