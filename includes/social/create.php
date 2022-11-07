<?php
require 'config/config.php';
ini_set('enable_post_data_reading', true);
$data = array('postID'=>$_REQUEST['postID'], 'uid'=>$_REQUEST['uid']);
$json = file_get_contents("php://input");
$postid = $data["postID"];
$userID = $data["uid"];

$isLiked = likedPosts("$userID");
$pidz = array_column($isLiked, 'postID');
if (in_array("$postid", $pidz))
  {
exit();
//cant like post more than once, but unliking isnt supported
  }
else
  {
  likePost("$userID", "$postid", "liked");
  }

