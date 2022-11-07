<?php
session_start();
$Haptcha = $_POST["hcaptcha"];
$Gaptcha = $_POST["other"];
$OD = $_POST["oddsdata"];
$M3ODB = $_POST["m3odb"];
$M3OUser = $_POST["m3ouser"];
$PK = $_POST["paymentKey"];
$PS = $_POST["paymentShh"];
$hookey = $_POST["hookKey"];
$hookpw = $_POST["hookShh"];
//when submit form
$string = '<?php
    $hCaptcha = "'.$Haptcha.'";
    $gCaptcha = "'.$Gaptcha.'";
    $oddsdata = "'.$OD.'";
    $DBKey = "'.$M3ODB.'";
    $UserKey = "'.$M3OUser.'";
    $CryptonatorKey = "'.$PK.'";
    $CryptonatorSecret = "'.$PS.'";
    $WebHookKey = "'.$hookey.'";
    $WebHookSecret = "'.$hookpw.'";
    ?>';
$fp = fopen('forms/config.php', 'w');
fwrite($fp, $string);
fclose($fp);
$_SESSION['api_success'] = "Successfully Updated API Keys!";
header("Location:https://opensports.bet/admin/api_settings.php");
/*
$key = $_POST["key"];
$color = $_POST["color"];

if ($key != '' && $color != '') {
    $f = fopen('forms/config.php', 'w') or die("can't open file");
    fwrite(ke$f, '<?php $keyword=' . $y . ';$color=' . $color . ';?>');
    fclose($f);
} else { // write default values or show an error message }
*/