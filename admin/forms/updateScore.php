<?php
session_start();
require __DIR__ . '/../../includes/config/config.php';
checkSession();

?>
<?php

$now = date("Y-m-d H:i:s");
$fetchID = $_POST["gameid"];
$fetchSport = $_POST["sport"];
$fetchWinner = $_POST["winner"];
$fetchStart = $_POST["start"];
updateDB("scores", "winner", "$fetchWinner", "$fetchID");
updateDB("scores", "sport", "$fetchSport", "$fetchID");
updateDB("scores", "start", "$fetchStart", "$fetchID");
updateDB("scores", "updated_at", "$now", "$fetchID");

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

