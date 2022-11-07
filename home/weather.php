<?php

require 'includes/config/config.php';
//trunkDB("follows");
//Follow("b8394298646a", "e70a7190e8c0");
use Curl\Curl;


//recordStalk("jimmythebag","picks");
recordGamblingTwitter("#GamblingTwitter", "gamblingTwitter");
readDB("regex", "N/A", "stalker", "asc");
/*

function allAnalytics(int $type){
global $type;

if ($type = 0){
   return  ListAnalytics();
    } elseif($type = 1){
   return  ReadAnalytics("name");
    }elseif($type = 2){
    return delAnalytics("name");
    }elseif($type === 3){
    return TrackAnalytics("name");
    }
}

allAnalytics("0");
allAnalytics("1");
allAnalytics("2");
allAnalytics("3");


function Thumbs() {
global $thumbss;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $thumbss);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/thumbnail/Screenshot',
    [
        'height' => '720',
        'url' => "https://usa-08.cdnstreams.in/frostyy/ch09q1/playlist.m3u8",
        'width'=>'1280'


    ]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    $curl->diagnose();
} else {
   $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['imageURL'];
    $curl->close();
    //return $grabQR;
    $curl = new Curl();
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->download($grabQR, "tmp/09.png");
     $curl->diagnose();
    $curl->close();
    //var_dump($grabScreen);
}
$curl->close();
}

Thumbs();

/*
$vw = viewWeather("Los Angeles");
print_r($vw);

use Curl\Curl;
function Weather($location) {
global $weather;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $weather);
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://api.m3o.com/v1/weather/Now', [
    'days' => 0,
    'location' => $location
    
]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $grabWeatherNow = json_decode($jsonEncoded, true);
    $localTime = $grabWeatherNow['local_time'];
    $clouds = $grabWeatherNow['cloud'];
    $condition = $grabWeatherNow['condition'];
    $isDay = $grabWeatherNow['daytime'];
    $feelsLike = $grabWeatherNow['feels_like_f'];
    $humidity = $grabWeatherNow['humidity'];
    $windDir = $grabWeatherNow['wind_direction'];
    $windDegree = $grabWeatherNow['wind_degree'];
    $wind = $grabWeatherNow['wind_mph'];
    $icon = $grabWeatherNow['icon_url'];
    $temp = $grabWeatherNow['temp_f'];
    $returnWeather = array($localTime, $clouds, $condition, $isDay, $temp, $feelsLike, $humidity, $windDir, $windDegree, $wind, $icon);
    return $returnWeather;
}
$curl->close();
}
$vw = Weather("Enid");
print_r($vw);

$vi = viewWeather("Enid");
print_r($vi);


function QR($uid){
global $qr;

$curl = new Curl();
$curl->setBasicAuthentication('Authorization', $qr);
$curl->setHeader('Content-Type', 'application/json');
$curl->post('https://api.m3o.com/v1/qr/Generate', [
    'size' => 300,
    'text' => "https://bataboom.bet/profile.php?uid=$uid"
    
]);
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    $fetchResponse = $curl->response;
    $jsonEncoded = json_encode($fetchResponse);
    $fetchQR = json_decode($jsonEncoded, true);
    $grabQR = $fetchQR['qr'];
    $curl->close();
    //return $grabQR;
    $curl = new Curl();
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->download($grabQR, "tmp/qr/qr-$uid.png");
     //$curl->diagnose();
    $curl->close();
   
    }
}
$wq = QR("d631625fd38d");
print_r($wq);



function postAPI(){
$curl = new Curl();
$curl->setHeader('Content-Type', 'application/json');
$curl->get('https://bataboom.bet:8080/php-crud-api/records/comments/1');
if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
     $curl->diagnose();
} else {
    $fetchResponse = $curl->response;
    $curl->diagnose();
    $curl->close();
    return $fetchResponse;
   
    }
}
$fw = postAPI();
print_r($fw);
*/