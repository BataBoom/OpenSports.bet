<?php
require __DIR__ . '/config/config.php';
use Curl\Curl;
error_reporting(1);
ini_set('display_errors', 1);
$today = date("Y-m-d");
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$filltime = '23:59:59';
$now = date("Y-m-d H:i:s"); 

$getchuck = "https://api.chucknorris.io/jokes/random";
$fetchchuck = file_get_contents($getchuck);
$chuck = json_decode($fetchchuck, true); 
$value = $chuck["value"];
$endchuck = count($chuck['data']);

var_dump($value);
?>
