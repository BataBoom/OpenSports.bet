<?php
session_start();
$maxb = $_POST["max-bet"];
$minb = $_POST["min-bet"];
//when submit form
$string = '<?php
    $MinBet = "'.$minb.'";
    $MaxBet = "'.$maxb.'";
    ?>';
$fp = fopen('forms/config.php', 'w');
fwrite($fp, $string);
fclose($fp);
$_SESSION['api_success'] = "Successfully Updated Site Settings!";
header("Location:https://opensports.bet/admin/control_center.php");
/*
$key = $_POST["key"];
$color = $_POST["color"];

if ($key != '' && $color != '') {
    $f = fopen('forms/config.php', 'w') or die("can't open file");
    fwrite(ke$f, '<?php $keyword=' . $y . ';$color=' . $color . ';?>');
    fclose($f);
} else { // write default values or show an error message }
*/