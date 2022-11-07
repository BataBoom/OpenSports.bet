<?php
/**
 * Update Users Main Balance
 * Small Update just to help fix this retarded ass shit lmfao
 * Only Works for me, the Admin. Need to simulate users and think I can finish this. Added to Cron.
 */
?>
<?php
require __DIR__ . '/../config/config.php';

$today = date('Y-m-d');
$set = date('Y-m-d H:i:s');
$tmrw = date('Y-m-d', strtotime( $today . " +1 days"));
$yday = date('Y-m-d', strtotime( $today . " -1 days"));
$hours = date('Y-m-d', strtotime( $set . " -6 hours"));
$limit = 1000;
$readBets = readW("win_status", "GRADED", "bets", $limit);

//print_r($readBets);
$winners = array_values(array_filter($readBets, function($var) use ($yday) {
    return ($var['start'] == $yday);

}));

$matchU = array_column($winners, 'userID');
$matchAmT = array_column($winners, 'amount');
$count = count(array_unique($matchU));

print_r($winners);

for ($n = 0; $n < $count; ++$n){


    $winnerz[] = array_values(array_filter($readBets, function($var) use ($yday, $matchU, $n) {
    return ($var['start'] == $yday && $var['userID'] === $matchU[$n]);
    //update start later to hourly for quicker grading >=

}));

    //finish chk balance from uid add up the sumzz and update
$total[] = array_column($winnerz[$n], 'amount');
$uid[$n] = array_unique(array_column($winnerz[$n], 'userID'));
$sumz[] = array_sum($total[$n]);
$fb[] = $uid[$n][0];
$bal[$fb[$n]] = fetchBalance("$fb[$n]");

$updateBal[] = round($sumz[$n] + $bal[$fb[$n]], 2);
$userKeyz = array_keys($bal);
updateBalance("$userKeyz[$n]", "$updateBal[$n]");
updateDB("bank", "updated_at", "$set", $userKeyz[$n]);
print_r($sumz);
print_r($bal);
print_r($userKeyz);
print_r($updateBal);

/* For Loop + Foreach method... close but no cigar. Use above $sumz
    if ($winners[$n]['userID'] === $matchU[$n]){

        $new[$matchU[$n]][$n] = array($matchAmT[$n]);
    }


foreach ($winners as $key => $val){
    foreach ($val as $k => $v){
   if($k === 'userID' && $v === $matchU[$n]){
        $matches[$v][$n] = array($matchAmT[$n]);
        
            }
        }
    }
    */

}



/*
array_sum(array_map(function($item) { 
    return $item['f_count']; 
}, $arr));



function array_value_recursive($key, array $arr){
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($k == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}

var_dump(array_value_recursive('11d127b492bb', $winners)); 
//echo array_count_values(array_keys(array_column($winners, 'userID')))[$matchU[0]];
//print_r(array_map(array_column($winners, 'userID'))[$matchU[0]]);


var_dump(array_filter($winners, function($v, $k) {
    return $k == 'userID' || $v === $matchU[0];
}, ARRAY_FILTER_USE_BOTH));

print($matchU);
/*
var_dump(array_map('cb2', $arr, $arr));
var_dump(array_map(null,  $arr));
var_dump(array_map(null, $arr, $arr));



for ($win = 0; $win < $end; ++$win) {
$GetSUM = "SELECT SUM(win_amount) AS value_sum, user_id FROM bets WHERE OriginalDate='$yday' AND user_id='$giduser[$win]'";
$gibSUM = $conn->query($GetSUM);
if (!empty($gibSUM) && $gibSUM->num_rows > 0) {

    foreach ($gibSUM as $g){
      $gibBalance[$win] = array('username'=>$g["user_id"], 'money'=>$g["value_sum"]);
          
    }
    }

//print_r($gibBalance[100]);


$balanceUser = array_column($gibBalance, 'username');
$balanceMoney = array_column($gibBalance, 'money');
$locateUsers[$win] = array_search($balanceUser[$win], $giduser);
$add[$win] = $balanceMoney[$win] + $gidba[$win];
}
//print_r($add);


$endBank = end(array_keys($balanceUser)) + '1';
for ($win = 0; $win < $endBank; ++$win) {
$gibMoolah = "UPDATE users SET balance='$add[$win]', updated_at='$now' WHERE username='$balanceUser[$win]'";
if (mysqli_query($conn, $gibMoolah)) {
        echo "Records were updated successfully. $gibMoolah.\n";
    } 
}

    /*


$end = end(array_keys($gitui));
$gitwinnersinfo = "SELECT id, gameid, user_id, OriginalDate, match_id, option_id, win_status, win_amount, updated_at, amount, ratio FROM bets WHERE OriginalDate='$yday' AND win_status='1'";
$updateu = $conn->query($gitwinnersinfo);
if (!empty($updateu) && $updateu->num_rows > 0) {

  	foreach ($updateu as $singleu){
  		$giti[] = array('mid'=>$singleu["gameid"], 'pid'=>$singleu["id"], 'date'=>$singleu["OriginalDate"], 'gid'=>$singleu["match_id"], 'winstat'=>$singleu["win_status"], 'updatedAt'=>$singleu["updated_at"], 'oid'=>$singleu["option_id"], 'user'=>$singleu["user_id"], 'winamt'=>$singleu["win_amount"], 'betamt'=>$singleu["amount"], 'ratio'=>$singleu["ratio"]);
  		    
    }


$finduser = array();
$end = end(array_keys($giti));



foreach ($giti as $fbal){
$gitpid[] = $fbal['pid'];
$gituid[] = $fbal['user'];
$gitdate[] = $fbal['date'];
$gitwstat[] = $fbal['winstat'];
$gitmid[] = $fbal['mid'];
$gitgid[] = $fbal['gid'];
$gitoid[] = $fbal['oid'];
$gitbetamt[] = $fbal['betamt'];
$gitwinamt[] = $fbal['winamt'];
$gitratio[] = $fbal['ratio'];
}

//print_r($giti);
for ($j = 0; $j < $end; ++$j) {
if ($gitdate[$j] == '2021-06-15') {
$winnersarray = array('user'=> $gituid, 'winamt'=> $gitwinamt, 'betamt'=>$gitbetamt);
} else { 
  echo 'NOT FOUND!';
}
}

print_r($winnersarray);
$firstKey = array_key_first($gituid);
$LastKey = array_key_last($gituid);
$searchwinninguser = array_unique($gituid);
$gitsrch = $searchwinninguser;
$flipped = array_flip($searchwinninguser);
array_unshift($gitsrch, "thisisbroken");
print_r($gitsrch);
$end = end(array_keys($gitsrch));
for ($w = '1'; $w < $LastKey; ++$w) {
$ofg = mysqli_query($conn,"SELECT SUM(win_amount) AS value_sum FROM bets WHERE user_id='$gitsrch[$w]' AND OriginalDate='$yday'");
$row = $ofg->fetch_row();
$you[] = $row;
//print_r($rowww);
}
print_r($you);

for ($s = '0'; $s < $LastKey; ++$s) {


$locatewinners = "SELECT id, gameid, user_id, OriginalDate, match_id, option_id, win_status, win_amount, updated_at, amount, ratio FROM bets WHERE OriginalDate='$yday' AND win_status='1' AND user_id='$gitsrch[$s]'";

$loc = $conn->query($locatewinners);
if (!empty($loc) && $loc->num_rows > 0 && $gitsrch[$s] == $gitsrch[$s]) {

    foreach ($loc as $sinloc){
        $lock[] = array('mid'=>$sinloc["gameid"], 'pid'=>$sinloc["id"], 'date'=>$sinloc["OriginalDate"], 'gid'=>$sinloc["match_id"], 'winstat'=>$sinloc["win_status"], 'updatedAt'=>$sinloc["updated_at"], 'oid'=>$sinloc["option_id"], 'user'=>$sinloc["user_id"], 'winamt'=>$sinloc["win_amount"], 'betamt'=>$sinloc["amount"], 'ratio'=>$sinloc["ratio"]);
            
    }

}




//echo array_count_values(array_column($lock, 'user'))[$gitsrch[$s]]."\n";
/*
print_r($lock[$s]['user']);
if ($lock['user'] =! $lock['user']) {
echo $lock['user']."\n";
    
}
*/

//echo $you[0][0]."\n";
//array_unshift($you, "thisisbroken");
//print_r($you[1]);
//print_r($lock);
/*
for ($s = '0'; $s < $LastKey; ++$s) {
   //echo $you[$s][0]."\n";
    $fixyou[] = $you[$s][0];
}

array_shift($gitsrch);
//print_r($gitsrch);
$end = end(array_keys($gitsrch));
$endb = end(array_keys($fixyou));
echo $end."\n";
$payday = array('user'=>$gitsrch, 'money'=>$fixyou);
print_r($payday);
for ($w = '0'; $w < $endb; ++$w) {
$funally = "UPDATE users SET balance='$fixyou[$w]', created_at=NULL WHERE username='$gitsrch[$w]'";
if (mysqli_query($conn, $funally)) {
    echo "Records were updated successfully.$funally.\n";

} else {
    echo "ERROR: Could not able to execute $funally. " . mysqli_error($conn);
}
}


/*
for ($s = '0'; $s < '5'; ++$s) {
$filterArray = array_filter($sloc, function ($var) {
    return (strpos($var, $sloc[$s]) === false);
});
}

foreach ($lock as $clock){
$wloc[] = $clock['winamt'];
$bloc[] = $clock['betamt'];
$sloc[] = $clock['user'];
}



$betbag[] = array_sum($bloc);
$winbag[] = array_sum($wloc);
$hu[] = $betbag + $winbag;



//echo $hu."\n";

if (in_array($sloc, $gituid)) {
    echo "Got Irix";
}
$findui = array_search($gitsrch, $giduser);





$funally = "UPDATE users SET balance=$dubag, WHERE user=$searchwinninguser[$s]";
if (mysqli_query($conn, $funally)) {
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $funally. " . mysqli_error($conn);
}
}







if ($gitwstat[$j] == '1' && $gitdate[$j] == $yday) {
$gib = "INSERT INTO userwins SET paymentid='$gitpid[$j]', graded='$now', selection='$gitoid[$j]', gameid='$gitmid[$j]', gamedate='$gitdate[$j]', amount='$gitbetamt[$j]', win_amount='$gitwinamt[$j]', ra$result = array_diff($array1, $array2);

print_r($result);tio='$gitratio[$j]', userid='$gituid[$j]'";

if (mysqli_query($conn, $gib)) {
    echo "Records were updated successfully.";

} else {
    echo "ERROR: Could not able to execute $gib. " . mysqli_error($conn);
}
}
}
/*
$gituw = "SELECT paymentid, amount, win_amount, graded, userid FROM userwins'";
$updateub = $conn->query($gituw);
if (!empty($updateub) && $updateub->num_rows > 0) {

    foreach ($updateub as $singleuw){
      $givebalance[] = array('pid'=>$singleuw["paymentid"], 'date'=>$singleuw["graded"], 'winamt'=>$singleuw["win_amount"], 'betamt'=>$singleuw["amount"], 'user'=>$singleuw["userid"]);
          
    }

print_r($gituw);
$endb = end(array_keys($givebalance)) + 1;

foreach ($givebalance as $gbal){
$givpid[] = $gbal['pid'];
$givuid[] = $gbal['user'];
$givdate[] = $gbal['date'];
$givwamt[] = $gbal['winamt'];
$givbamt[] = $gbal['betamt'];
}
print_r($givebalance);
for ($k = 0; $k < $endb; ++$k) {

if ($givebalance[$k]['user'] == $givebalance[$k]['user']) {
$x[$k] = $givebalance[$k]['winamt'] + $givebalance[$k]['betamt'];
    print_r($x);
    //echo sum($x[$k]);

  }
/*
    $gibmonies = "UPDATE user SET balance='$x[$j]', graded='$now', selection='$gitoid[$j]', gameid='$gitmid[$j]', gamedate='$gitdate[$j]', amount='$gitbetamt[$j]', win_amount='$gitwinamt[$j]', ratio='$gitratio[$j]', user='$gituid[$j]'";
  }



if ($gitwstat[$k] == '1' && $gitdate[$k] == '2021-05-25') {

$gibmonies = "UPDATE user SET balance='$gitpid[$j]', graded='$now', selection='$gitoid[$j]', gameid='$gitmid[$j]', gamedate='$gitdate[$j]', amount='$gitbetamt[$j]', win_amount='$gitwinamt[$j]', ratio='$gitratio[$j]', user='$gituid[$j]'";

if (mysqli_query($conn, $gibmonies)) {
    echo "Records were updated successfully.";

} else {
    echo "ERROR: Could not able to execute $gibmonies. " . mysqli_error($conn);
}
}
}
*/








?>
