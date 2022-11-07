<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>BataBoom.Bet</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">
   
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/fresh/app.css">
    <link rel="stylesheet" href="assets/fresh/mycore.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <!-- Customized Core CSS betslip-card has advanced button animations that interfer with compose card, fix later -->


  <link rel="stylesheet" href="assets/new-css/betslip-card.css">
    <style type="text/css">
        /* brand logo is brand new */
            .brand-logo {
            position: relative;
            top: -100px;
            
                        }

        .sidebar-v1 .bottom-section ul li a {
  color: #9afbff8c;
}
</style>


    <!-- Customized Core CSS -->
   <link rel="stylesheet" href="assets/new-css/betslip-card.css">
    <style type="text/css">
        /* brand logo is brand new */
            .brand-logo {
            position: relative;
            top: -100px;
            
                        }

        .sidebar-v1 .bottom-section ul li a {
  color: #9afbff8c;
}


        .bball{
         --fa-primary-color: rgb(0, 0, 0);
         --fa-primary-opacity:  1;
         --fa-secondary-color:rgb(255,170,0);
         --fa-secondary-opacity: 0.9;


         --fa-animation-iteration-count:  15;
        }
        .bballl{
         --fa-primary-color:  #ff0000;
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: #ffdfb3;
         --fa-secondary-opacity: 1;
         --fa-animation-iteration-count:  15;
        }
        .sticks {

         --fa-primary-color:  rgb(58, 61, 208);
         --fa-primary-opacity:  1;
         --fa-secondary-color: rgb(242, 242, 242);
         --fa-secondary-opacity: 0.8;
         --fa-animation-iteration-count:  15;
        }
        .bball:hover{
         --fa-primary-color: rgb(255,170,0);
         --fa-primary-opacity:  1;
         --fa-secondary-color: rgb(0, 0, 0);
         --fa-secondary-opacity: 1;

        }
        .bballl:hover{
         --fa-primary-color:  #ff0000;
         --fa-primary-opacity:  0.6;
         --fa-secondary-color: #ffdfb3;
         --fa-secondary-opacity: 0.8;
      
        }
        .sticks:hover {

         --fa-primary-color:  rgb(242, 242, 242);
         --fa-primary-opacity:  1;
         --fa-secondary-color: rgb(58, 61, 208);
         --fa-secondary-opacity: 0.8;
      
        }
        .pfp {
            width: 128px;
            height: 128px;
            border-radius: 50%;
        }
           .follow {
         --fa-primary-color: rgb(237, 29, 84, 0.9);
    
         --fa-secondary-color: rgb(156, 204, 247,0.8);
      
        --fa-animation-iteration-count:  4;

        }
          .follow:hover {
         --fa-primary-color: rgb(236, 24, 105);
    
         --fa-secondary-color: rgb(236, 24, 105);
      
        --fa-animation-iteration-count:  4;

        }

        .editprofile{
        --fa-primary-color: rgb(165, 229, 248);
    
         --fa-secondary-color: rgb(33, 237, 162);
      
        --fa-animation-iteration-count:  2;

        }
        #fire{
            color: red;
        }
        #compose-card{
            display: none;
        }
        #h2colored {
  cursor: pointer;
}
 
    
     </style>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/ff83cd2b21.js" crossorigin="anonymous"></script>
</head>

<body class="is-dark">


   <?php
    require 'sidenav.php';
       
    if (empty($_REQUEST['uid'])){
        $uidd = $_SESSION['uid'];
        $usernamee = $_SESSION['username'];
    } else {
        $uidd = filter_var($_REQUEST['uid'], FILTER_SANITIZE_STRING);
        //$username = readW
    }
    
    $combine = $username."-".$uidd;
    $liked = likedPosts("$uidd");
    $countLiked = count($liked);
    $posts = allPosts("$uidd");
    $countPosts = count($posts);
    $following = countFollowers("$uidd", "following");
    $followers = countFollowers("$uidd", "followers");

    $readBets = readW("userID", "$uidd", "bets", "8");
    $cntBetz = count($readBets);

    
    $fz = isFollowing("$uidd");



    ?>

  <div class="block"></div>
 
          <div class="column features is-12">
                <div class="tile is-ancestor">
                 <div class="tile is-parent">
                  <!-- PROFILE CARD START -->
                 
                <div class="profile-card-6">
                    <!-- PROILE PHOTO -->
                    <img src="https://bataboom.bet/assets/profile/<?php echo $uidd;?>.png" class="img img-responsive">

                    <!-- PROFILE NAME -->
                    <div class="profile-name"><?php echo $usernamee;?></div>
                    <span id="uidd" class="hidden"><?php echo $uidd;?></span>
                    <!-- PROFILE POSITION -->
                    <div class="profile-position"></div>
                    <!-- PROFILE OVERVIEW -->
                    <div class="profile-overview">
                        
                           <div class="level-item has-text-centered">
                                <div>
                                  <p class="is-size-6 has-text-white">1</p>
                                  <p class="is-size-4 has-text-success">Rank</p>
                                </div>
                             </div>
                               <div class="level-item has-text-centered">
                                <div>
                                  <p class="is-size-6 has-text-white">69.37</p>
                                  <p class="is-size-4 has-text-success">Win %</p>
                                </div>
                             </div>

                        </div>
                    </div>
                </div>
                  
               
  <div class="tile is-child is-8">
    <p class="is-6 has-text-white">Follow</p>
    <a href="javascript:void(0);" class="like-button" onclick="Follow()"> <i class="fa-duotone follow fa-heart fa-beat fa-3x" style="color:red;"></i></a>
<div class="block"></div>
<?php if ($uidd === $_SESSION['uid']){?>
     <p class="is-6 has-text-white">Edit</p>
    <button class="betslipButton icon is-large is-clickable" href="editProfile.php?id=<?php echo $_REQUEST['uid'];?>"> <i class="fa-duotone editprofile fa-user-gear fa-shake fa-2x"></i></button>
<div class="block"></div>
   <p class="is-6 has-text-white">Create Post</p>
    <button class="betslipButton icon is-large is-clickable" onClick="slidePost();"> <i class="fa-duotone fa-feather-pointed fa-2x"></i></button>
<div class="block"></div>
   <p class="is-6 has-text-white">Profile QR</p>
    <button class="betslipButton icon is-large is-clickable" onClick="slider();"> <i class="fa-duotone fa-feather-pointed fa-2x"></i></button>
<div class="block"></div>


<?php }?>

  </div> </div> </div>
  

             
                        <div class="block"></div>
                            <nav class="level is-mobile">
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Posts</p>
      <p class="title"><?php echo $countPosts;?></p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Following</p>
      <p class="title"><?php echo $following;?></p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Followers</p>
      <p class="title"><?php echo $followers;?></p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Likes</p>
      <p class="title"><?php echo $countLiked;?></p>
    </div>
  </div>
</nav>
   <div class="block"></div>
   <?php if ($uidd === $_SESSION['uid']) { ?>
  <div class="column features is-12">
     <div id="compose-card" class="card is-new-content">
        <form id="postnew" method="POST" action="posts/go.php">
                            <!-- Top tabs -->
                            <div class="tabs-wrapper">
                                <div class="tabs is-boxed is-fullwidth">
                                    <ul>
                                        <li class="is-active">
                                            <a>
                                                <span class="icon is-small"><i data-feather="edit-3"></i></span>
                                                <span>Publish</span>
                                            </a>
                                        </li>
                                       
                                        <!-- Close X button -->
                                        <li class="close-wrap">
                                            <span class="close-publish">
                                                    <i class="fa-duotone fa-x fa-2x" style="color: white;"></i>
                                                </span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Tab content -->
                                <div class="tab-content">
                                    <!-- Compose form -->
                                    <div class="compose">
                                          <form class="compose-form" id="compose1" method="POST" action="createPost.php">
                                        
                                            <img src="https://bataboom.bet/tmp/bataboom-d631625fd38d.png" alt="">
                                            <div class="control">
                                                <textarea name="post-text" id="publish" class="textarea" rows="3" placeholder="Write something about you..."></textarea>
                                            </div>
                                        </div>

                                        <div id="feed-upload" class="feed-upload">

                                        </div>

                                        <div id="options-summary" class="options-summary"></div>

                                        <div id="tag-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <!-- Tag friends suboption -->
                                            <div id="tag-list" class="tag-list"></div>
                                            <div class="control">
                                                <input id="users-autocpl" type="text" class="input" placeholder="Who are you with?">
                                                <div class="icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                   <i class="fa-duotone fa-x fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Tag friends suboption -->

                                        <!-- Activities suboption -->
                                        <div id="activities-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="activities-autocpl-wrapper" class="control has-margin">
                                                <input id="activities-autocpl" name="comment-cat" type="text" class="input" placeholder="What are you doing right now?">
                                                <div class="icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>

                                            <!-- Mood suboption -->
                                            <div id="mood-autocpl-wrapper" class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="mood-autocpl" type="text" class="input is-subactivity" placeholder="How do you feel?">
                                                    <div class="input-block">
                                                        Feels
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Drinking suboption child -->
                                            <div id="drinking-autocpl-wrapper" class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="drinking-autocpl" type="text" class="input is-subactivity" placeholder="What are you drinking?">
                                                    <div class="input-block">
                                                        Drinks
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Eating suboption child -->
                                            <div id="eating-autocpl-wrapper" class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="eating-autocpl" type="text" class="input is-subactivity" placeholder="What are you eating?">
                                                    <div class="input-block">
                                                        Eats
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reading suboption child -->
                                            <div id="reading-autocpl-wrapper" class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="reading-autocpl" type="text" class="input is-subactivity" placeholder="What are you reading?">
                                                    <div class="input-block">
                                                        Reads
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Watching suboption child -->
                                            <div id="watching-autocpl-wrapper" class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="watching-autocpl" type="text" class="input is-subactivity" placeholder="What are you watching?">
                                                    <div class="input-block">
                                                        Watches
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Travel suboption child -->
                                            <div id="travel-autocpl-wrapper" class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="travel-autocpl" type="text" class="input is-subactivity" placeholder="Where are you going?">
                                                    <div class="input-block">
                                                        Travels
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /Activities suboption -->

                                        <!-- Location suboption -->
                                        <div id="location-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="location-autocpl-wrapper" class="control is-location-wrapper has-margin">
                                                <input id="location-autocpl" type="text" class="input" placeholder="Where are you now?">
                                                <div class="icon">
                                                    <i data-feather="map-pin"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Link suboption -->
                                        <div id="link-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="link-autocpl-wrapper" class="control is-location-wrapper has-margin">
                                                <input id="link-autocpl" type="text" class="input" placeholder="Enter the link URL">
                                                <div class="icon">
                                                    <i data-feather="link-2"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- GIF suboption -->
                                        <div id="gif-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="gif-autocpl-wrapper" class="control is-gif-wrapper has-margin">
                                                <input id="gif-autocpl" type="text" class="input" placeholder="Search a GIF to add" autofocus>
                                                <div class="icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                                <div class="gif-dropdown">
                                                    <div class="inner">
                                                        <div class="gif-block">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/1.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/2.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/3.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/4.gif" alt="">
                                                        </div>
                                                        <div class="gif-block">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/5.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/6.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/7.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/8.gif" alt="">
                                                        </div>
                                                        <div class="gif-block">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/9.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/10.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/11.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344" data-demo-src="assets/img/demo/gif/12.gif" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    <!-- /Compose form -->

                                    <!-- General extended options -->
                                    <div id="extended-options" class="compose-options is-hidden">
                                        <div class="columns is-multiline is-full">
                                            <!-- Upload action -->
                                            <div class="column is-6 is-narrower">
                                                <div class="compose-option is-centered">
                                                    <i data-feather="camera"></i>
                                                    <span>Photo/Video</span>
                                                    <input id="feed-upload-input-1" type="file" accept=".png, .jpg, .jpeg" onchange="readURL(this)">
                                                </div>
                                            </div>
                                            <!-- Mood action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="extended-show-activities" class="compose-option is-centered">
                                                    <img src="assets/img/icons/emoji/emoji-1.svg" alt="">
                                                    <span>Mood/Activity</span>
                                                </div>
                                            </div>
                                            <!-- Tag friends action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-tag-suboption" class="compose-option is-centered">
                                                    <i data-feather="tag"></i>
                                                    <span>Tag friends</span>
                                                </div>
                                            </div>
                                            <!-- Post location action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-location-suboption" class="compose-option is-centered">
                                                    <i data-feather="map-pin"></i>
                                                    <span>Post location</span>
                                                </div>
                                            </div>
                                            <!-- Share link action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-link-suboption" class="compose-option is-centered">
                                                    <i data-feather="link-2"></i>
                                                    <span>Share link</span>
                                                </div>
                                            </div>
                                            <!-- Post GIF action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-gif-suboption" class="compose-option is-centered">
                                                    <i data-feather="image"></i>
                                                    <span>Post GIF</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /General extended options -->

                                    <!-- General basic options -->
                                    <div id="basic-options" class="compose-options">
                                        <!-- Upload action -->
                                        <div class="compose-option">
                                            <i data-feather="camera"></i>
                                            <span>Media</span>
                                            <input id="feed-upload-input-2" type="file" type="file" accept=".png, .jpg, .jpeg" onchange="readURL(this)">
                                        </div>
                                        <!-- Mood action -->
                                        <div id="show-activities" class="compose-option">
                                            <img src="assets/img/icons/emoji/emoji-1.svg" alt="">
                                            <span>Activity</span>
                                        </div>
                                        <!-- Expand action -->
                                        <div id="open-extended-options" class="compose-option">
                                            <i data-feather="more-horizontal"></i>
                                        </div>
                                    </div>
                                    <!-- /General basic options -->

                                    <!-- Hidden Options -->
                                  
                                           
                                    <!-- Footer buttons -->
                                    <div class="more-wrap">
                                        <!-- Publish button -->
                                        <button id="publish-button" type="submit" class="button is-solid accent-button is-fullwidth">
                                            Publish
                                        </button>
                                    
                                    </div>
                                </div>
                            </div>
                                    <!-- /Compose form -->
                                <?php } ?>
<nav class="level">
<div class="columns is-multiline is-centered">

     <?php 
     
     if ($cntBetz >= 3) {
    
     for ($i = 0; $i < $cntBetz; ++$i) {

        $sport = array_column($readBets, "league");
        if ($sport[$i] === "NBA"){
            $icon = "basketball";
            $color = "orange";
            $clazz = "bball";
            $spin = "fa-spin";
        } elseif($sport[$i] === "ncaab"){
            $icon = "baseball";
            $color = "white";
            $clazz = "bballl";
            $spin = "fa-spin fa-spin-reverse";
        } elseif($sport[$i] === "NHL"){
            $icon = "hockey-sticks";
            $color = "white";
            $clazz = "sticks";
            $spin = "fa-bounce";
        }
      $gameid[] = $readBets[$i]['id'];
         

     ?>
   
      <div class="column is-full-mobile is-half-tablet is-one-third-desktop is-one-third-widescreen is-one-quarter-fullhd">
      <div class="OSB-card-10 has-text-centered">
      
       
        <!-- PROILE PHOTO -->
        <img class="pfp" src="https://bataboom.bet/assets/profile/<?php echo $uidd;?>.png">
        <!-- OSB NAME -->
        <div class="OSB-name" id="proftext"><?php echo $usernamee;?></div>
        <!-- OSB LOCATION -->
        <!-- OSB DESCRIPTION -->
        <p class="OSB-record mx-auto" id="proftext3">104 Wins - 76 Losses - 5 Draws </p>
        <!-- OSB ICONS -->
       <div class="betslip mx-auto">
          <div class="list-view">
                 <i class="fa-duotone <?php echo $clazz;?> fa-<?php echo $icon;?> fa-2x <?php echo $spin;?>" alt="<?php echo $sports[$i];?>"></i>

            <div id="bet-money"> <i class="fa-solid fa-dollar" style="color: lime; padding-bottom: 10px;"></i> <?php echo $readBets[$i]['amount'];?></div>

            <div id="bet-pick"><i class="fa-solid fa-bolt" style="color: #ccef34;"></i> <?php echo $readBets[$i]['option'] ." ". $readBets[$i]['ratio'];?> (+185)</div>

            <div id="bet-time"> <i class="fa-solid fa-clock" style="color: white;"></i> <?php echo date("jS F, Y", strtotime($readBets[$i]['start']));?></div>
            <div id="#uidd" style="display: none;"><?php echo $_SESSION['uid'];?></div>
            <div id="#betid-<?php echo $i;?>" style="display: none;"><?php echo $gameid[$i];?></div>
            <button onClick="firePost(<?php echo $i;?>);" class="button icon is-large is-warning is-clickable"> <i class="fa-solid fa-fire-flame-curved fa-beat" id="fire"></i></button>
            <button onClick="retweetPost(<?php echo $i;?>)" class="button icon is-large is-dark is-clickable" id="#repost"><i class="fa-solid fa-retweet fa-beat" style="color: #18ec94;"></i></button>
              <button onClick="slider(<?php echo $i;?>);" class="button icon is-large is-link is-clickable"><i class="fa-solid fa-plus fa-beat" style="color: lightblue;"></i></button>
          </div>

         <!--   <form class="form" id=" //echo "form" . $i" method="POST" action="comm.php"> -->
            
            <div class="media-content comments" id="comment-<?php echo $i;?>" style="display:none;">
                
                <form id="compose-comment" method="POST" action="posts/go2.php">
                    <input type="hidden" name="betid" style="display: none;" value="<?php echo $gameid[$i];?>"></input>
              <div class="field">
                <p class="control">

                  <textarea name="comment" class="textarea" placeholder="Add a comment..."></textarea>
                </p>
              </div>
              <nav class="level">
                <div class="level-left">
                  <div class="level-item">
                    <button class="submit-shrink" type="submit">Submit</button>
                  </div>
                </div>
                <div class="level-right">
                  <div class="level-item">
                    <span class="chars">
                      
                    </span>
                  </div>
                </div>
              </nav>
          </form>
            </div>
          </div>
        </div>
      </div>

 

    
    <?php } } else { ?>
    </div></div>
      <div class="block"></div>
      
      <h1 class="is-2 has-text-primary">Empty... let me assist you with that </h1>
      <div class="block"></div>
    
  <?php } ?>
                   
          </div>
        </div>
      </div>
  


<script type="text/javascript">


    function slidePost(){
            $(`#compose-card`).toggle();
        
    }


    for (let i = 0; i < <?php echo $cntBetz;?>; ++i) {
    function slider(i) {
    $(`#comment-${i}`).toggle();
    }
    }
       
        //X Notifys
        document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});


for (let i = 0; i < <?php echo $cnz;?>; ++i) {
   
let isFollowing = <?php echo json_encode($fz); ?>;
    
document.getElementById(isFollowing[i]).className = "like-button is-active";

     }


    </script>
   <!-- JavaScript -->
    <!-- Compose --> 
    <script src="assets/fresh/js/custom.js"></script>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <!-- alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
   
</body>

</html>
