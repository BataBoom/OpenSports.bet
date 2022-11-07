<?php
session_start();
require __DIR__ . '/../../includes/config/config.php';
checkSession();

$fetchID = $_POST["id"];
$fetchEmail = $_POST["email"];
$fetchBalance = $_POST["balance"];

changeEmail("$fetchID", "$fetchEmail");
updateBalance("$fetchID", "$fetchBalance");

$_SESSION['edit_success'] = "Successfully Updated!";
// Check if Referral URL exists
if (isset($_SERVER['HTTP_REFERER'])) {
  // Store Referral URL in a variable
  $refURL = $_SERVER['HTTP_REFERER'];
  header("Location:$refURL");
} else {
	$data = array('UA'=>$_SERVER['HTTP_USER_AGENT'],'ADDR'=>$_SERVER['REMOTE_ADDR'], 'HOST'=>$_SERVER['REMOTE_HOST'],'PORT'=>$_SERVER['REMOTE_PORT']);
  $inp = file_get_contents('updateUser.json');
  $tempArray = json_decode($inp);
  array_push($tempArray, $data);
  $jsonData = json_encode($tempArray);
  file_put_contents('updateUser.json', $jsonData);
  header("Location:https://opensports.bet");
}
//header("Location:)

?>

