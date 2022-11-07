<?php
session_start();
require __DIR__ . '/../../includes/config/config.php';
checkSession();

?>
<?php

$now = date("Y-m-d H:i:s");
$gid = $_POST["gameid"];
$sport = $_POST["sport"];
$homeTM = $_POST["homeTM"];
$awayTM = $_POST["awayTM"];
$homeOdds = $_POST["homeO"];
$awayOdds = $_POST["awayO"];
$startDate = $_POST["start"];
$cat = 100;
$created_at = $now;
$updated_at = $now;


createCustomMatch($gid, $sport, $homeTM,  $awayTM, $homeOdds, $awayOdds, $startDate, $cat, $created_at, $updated_at);

$_SESSION['edit_success'] = "Successfully Created!";
// Check if Referral URL exists
if (isset($_SERVER['HTTP_REFERER'])) {
  // Store Referral URL in a variable
  $refURL = $_SERVER['HTTP_REFERER'];
  header("Location:$refURL");
} else {
	$data = array('UA'=>$_SERVER['HTTP_USER_AGENT'],'ADDR'=>$_SERVER['REMOTE_ADDR'], 'HOST'=>$_SERVER['REMOTE_HOST'],'PORT'=>$_SERVER['REMOTE_PORT']);
  $inp = file_get_contents('createBet.json');
  $tempArray = json_decode($inp);
  array_push($tempArray, $data);
  $jsonData = json_encode($tempArray);
  file_put_contents('createBet.json', $jsonData);
  header("Location:https://opensports.bet");
}
//header("Location:)

?>

