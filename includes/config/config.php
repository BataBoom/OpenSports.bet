<?php
require __DIR__ . '/sessions.php';
require __DIR__ . '/../../libs/vendor/autoload.php';
//require __DIR__ . '/../functions/all.php';
require __DIR__ . '/../functions/btc.php';
ini_set('display_errors', 0);
//staticLog();

//require __DIR__ . '/../../libs/vendor/formr/formr/class.formr.php';
//echo'<script defer data-domain="opensports.bet" src="https://plausible.io/js/plausible.js"></script>';
//hCaptcha
$hcaptcha = "e17";
//cryptonator
$secret = "";
$merchant_id = "";
$webhook_Key = '';
$webhook_Token = '';
$site = "https://";
$fromName = "OSB";
//crypto
$btcusd = "MzA5M2E4ZWUtM2VhZiYjItZTA1NjI5NGExZG";
$cryptousd = "NDQ3MzZjOWEtNTAxZCOGEtYzM2Yzdi";

//sportsData
$oddsKey = "a71b8fe8e9eb957daa5d99";

//m3o
$dbKey = "NDFmM2RjYzQtNzY2Zi00NmM2LTg0NYTlkOT";
$userAPItoken = 'YzQ2M2UxYjgtYzI5My00MjY1LThhZmFhM';
$OTPtoken = "NWQ3ZDZjYmEtMzI5OS00OTU1LWI1ZGYtg";
//qr
$qr = "NDg4MTMyOWItYTdkMi00NTAwLTlhMzMtMmF";
//Cashier Promo Message
$PROMO = '<p>Launch Code: "BATABOOM" for 20% free play credit! </p>';

//Bet Increment, Bet Min & Max?
$step = 5;
$minbet = 5;
$maxbet = 300;

//Bet Form
$addon = '<span class="input-group-text">Ł</span>';
$cents = '<span class="input-group-text">.00</span>';

//time
$unixTime = time();
$today = date("Y-m-d");
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$clock = date('H:i:s');
$now = date("Y-m-d H:i:s");
$thirtymins = date('Y-m-d H:i:s', strtotime( $now . " +30 mins"));

