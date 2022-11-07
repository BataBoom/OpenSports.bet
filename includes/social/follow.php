<?php
require 'config/config.php';
ini_set('enable_post_data_reading', true);
$data = array('followID'=>$_REQUEST['followID'], 'yourID'=>$_REQUEST['yourID']);

$fid = $data["followID"];
$yourID = $data["yourID"];




$isFollowed = protectFollow("$yourID");
$pidz = array_column($isFollowed, 'postID');
if (in_array("$fid", $pidz))
  {
echo "youre already following this user!";
  exit();
  }
else
  {
followUser("$yourID", "$fid");
  }

