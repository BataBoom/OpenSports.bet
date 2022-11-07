<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>BataBoom | Feeds</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/fresh/app.css">
    <link rel="stylesheet" href="assets/fresh/mycore.css">
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
                 --fa-primary-opacity:  0.6;
                 --fa-secondary-color: rgb(238, 173, 43);
                 --fa-secondary-opacity: 0.9;
                 --fa-animation-iteration-count:  5;
                }
                .bball:hover{
                 --fa-primary-color: rgb(238, 173, 43);
                 --fa-primary-opacity:  0.6;
                 --fa-secondary-color: rgb(0, 0, 0);
                 --fa-secondary-opacity: 0.9;
                 --fa-animation-iteration-count:  5;
        
                }
                .sticks {
        
                 --fa-primary-color:  rgb(136,230,2);
                 --fa-primary-opacity:  1;
                 --fa-secondary-color: rgb(240,248,255);
                 --fa-secondary-opacity:1;
                 --fa-animation-iteration-count:  5;
                }
        
                .sticks:hover {
        
                 --fa-primary-color:  rgb(240,248,255);
                 --fa-primary-opacity:  1;
                 --fa-secondary-color: rgb(136,230,2);
                 --fa-secondary-opacity: 1;
              
                }
                
                .amfootball {
        
                 --fa-primary-color:  rgb(130,182,219);
                 --fa-primary-opacity:  0.6;
                 --fa-secondary-color: rgb(29,31,38);
                 --fa-secondary-opacity: 0.8;
                 --fa-animation-iteration-count:  5;
                }
        
                .amfootball:hover {
        
                 --fa-primary-color:  rgb(183,196,240);
                 --fa-primary-opacity:  0.6;
                 --fa-secondary-color: rgb(36,61,158);
                 --fa-secondary-opacity: 0.8;
              
                }
                .bat {
        
                       --fa-primary-color:  rgb(255,236,143);
                 --fa-primary-opacity:  0.6;
                 --fa-secondary-color: rgb(38,35,21);
                 --fa-secondary-opacity: 0.8;
        
                }
                .sunny{
                       --fa-primary-color:  rgb(255,255,25);
                 --fa-primary-opacity:  1;
                 --fa-secondary-color:rgb(255,203,135);
                 --fa-secondary-opacity: 1;
                 --fa-animation-iteration-count:  15;
                }
    </style>

    <style type="text/css">
        .emoji-picker {
          margin: 0 0.5em;
          border: 1px solid #999999;
          border-radius: 5px;
          box-shadow: 0px 0px 3px 1px #CCCCCC;
          background: #FFFFFF;
          width: 20.5rem;
          height: 27.5rem;
          font-family: Arial, Helvetica, sans-serif;
        }
        
        .emoji-picker__content {
          padding: 0.5em;
          height: 20.5rem;
        }
        
        .emoji-picker__preview {
          height: 2em;
          padding: 0.5em;
          border-top: 1px solid #999999;
          display: flex;
          flex-direction: row;
          align-items: center;
        }
        
        .emoji-picker__preview-emoji {
          font-size: 2em;
          margin-right: 0.25em;
          font-family: "Segoe UI Emoji", "Segoe UI Symbol", "Segoe UI", "Apple Color Emoji", "Twemoji Mozilla", "Noto Color Emoji", "EmojiOne Color", "Android Emoji";
        }
        
        .emoji-picker__preview-name {
          color: #666666;
          font-size: 0.85em;
          overflow-wrap: break-word;
          word-break: break-all;
        }
        
        .emoji-picker__tabs {
          margin: 0;
          padding: 0;
          display: flex;
        }
        
        .emoji-picker__tab {
          list-style: none;
          display: inline-block;
          padding: 0 0.5em;
          cursor: pointer;
          flex-grow: 1;
          text-align: center;
        }
        
        .emoji-picker__tab.active {
          border-bottom: 3px solid #4F81E5;
          color: #4F81E5;
        }
        
        .emoji-picker__tab-body {
          display: none;
          margin-top: 0.5em;
        }
        
        .emoji-picker__tab-body h2 {
          font-size: 0.75rem;
          text-transform: uppercase;
          color: #333333;
          margin: 0;
        }
        
        .emoji-picker__tab-body.active {
          display: block;
        }
        
        .emoji-picker__emojis {
          height: 17.5rem;
          overflow-y: scroll;
          display: flex;
          flex-wrap: wrap;
          align-content: flex-start;
          width: calc(1.3rem * 1.5 * 10);
          margin: auto;
        }
        
        .emoji-picker__emojis.search-results {
          height: 21rem;
        }
        
        .emoji-picker__emoji {
          background: transparent;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 1.3rem;
          width: 1.5em;
          height: 1.5em;
          padding: 0;
          margin: 0;
          font-family: "Segoe UI Emoji", "Segoe UI Symbol", "Segoe UI", "Apple Color Emoji", "Twemoji Mozilla", "Noto Color Emoji", "EmojiOne Color", "Android Emoji";
        }
        
        .emoji-picker__emoji:hover {
          background: #E8F4F9;
        }
        
        .emoji-picker__search-container {
          margin: 0.5em;
          position: relative;
          height: 2em;
          display: flex;
        }
        
        .emoji-picker__search-container input {
          box-sizing: border-box;
          width: 100%;
          border-radius: 5px;
          border: 1px solid #CCCCCC;
          padding-right: 2em;
        }
        
        .emoji-picker__search-icon {
          position: absolute;
          color: #CCCCCC;
          width: 1em;
          height: 1em;
          right: 0.75em;
          top: calc(50% - 0.5em);
        }
        
        .emoji-picker__search-not-found {
          color: #666666;
          text-align: center;
          margin-top: 2em;
        }
        
        .emoji-picker__search-not-found-icon {
          font-size: 3em;
        }
        
        .emoji-picker__search-not-found h2 {
          margin: 0.5em 0;
          font-size: 1em;
        }
        
        .emoji-picker__variant-overlay {
          background: rgba(0, 0, 0, 0.7);
          position: absolute;
          top: 0;
          left: 0;
          width: 20.5rem;
          height: 27.5rem;
          display: flex;
          flex-direction: column;
          justify-content: center;
        }
        
        .emoji-picker__variant-popup {
          background: #FFFFFF;
          margin: 0.5em;
          padding: 0.5em;
          text-align: center;
        }
        
        .emoji-picker__variant-popup-close-button {
          cursor: pointer;
          background: transparent;
          border: none;
          position: absolute;
          right: 1em;
          padding: 0;
          top: calc(50% - 0.5em);
          height: 1em;
          width: 1em;
        }
        #compose-card{
                    display:none;
                }
    </style>
</head>

<body class="is-dark">
       <?php 
    //require 'includes/config/config.php';
    require 'sidenav.php';
    checkSession();
   ?>
    <!-- Container -->
    <?php


$howMany = reComments("2");
$gibber = reComments("1");

$gibUpdated = array_column($gibber, 'updated');
$gibCat = array_column($gibber, 'category');
$gibComment = array_column($gibber, 'extra');
$gibLinkz = array_column($gibber, 'sharedLink');
$gibLink = array_reverse($gibLinkz);
$gibId = array_column($gibber, 'id');
$gibUid = array_column($gibber, 'uid');
$gibLikes = array_column($gibber, 'likes');
$gibReposts = array_column($gibber, 'reposts');


//$allComments = array('updated'=>$gibUpdated, 'comment'=>$gibComment, 'sLink'=>$gibLink, 'postID'=>$gibId, 'author'=>$gibUid, 'likes'=>$gibLikes, 'reposts'=>$gibReposts);

    $mee = $_SESSION['uid'];
    $fz = likedPosts("$mee");
    $cnz = count($fz);

?>
 

             <div id="posts-feed" class="container" data-open-sidebar data-page-title="Explore The Community">
                <br>
                <br>
            <!-- Feed page main wrapper -->
             <?php
             print_r($fz);
             ?>

           
            <?php if (isset($_SESSION['comment']) && $_SESSION['comment'] == 'ERROR'){?>
                        <div class="notification is-danger is-dark is-centered has-text-centered">
                            <button class="delete"></button>
                            <p style="color:black;"> Error: New content require's more characters!</p>
                            <?php
            
            unset($_SESSION['comment']);
        } 
        ?>
                                <?php if (isset($_SESSION['comment']) && $_SESSION['comment'] == 'SUCCESS'){?>
                                <div class="notification is-success is-dark is-centered has-text-centered">
                                    <button class="delete"></button>
                                    <p style="color:black;"> Your post has been created successfully!</p>
                                    <?php
            
            unset($_SESSION['comment']);
        }
       
        ?>

                                </div>
                        </div>


                         <div id="activity-feed" class="container">
                          

         

                <div class="columns">

                    <!-- Middle column -->
                    <div class="column is-8">


                        
                         <!-- Compose form -->
                            <div id="compose-card" class="card is-new-content">
                                <form id="postnew" method="POST" action="posts/go.php">
                                    <!-- Top tabs -->
                                    <div class="tabs-wrapper">
                                        <div class="tabs is-boxed is-fullwidth">
                                            <ul>
                                                <li class="is-active is-fullwidth">
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

                                                    <img src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" alt="">
                                                    <div class="control">
                                                        <textarea name="post-text" id="publish" class="textarea" rows="3" placeholder="The ink is wet, quick.."></textarea>
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
                                                    <input id="link-autocpl" name="sharedLink" type="text" class="input" placeholder="Enter the link URL.. Youtube/SoundCloud/Vimeo/Bandcamp is fully supported">
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
                                            </form>
                                        </div>
                                    </div>
                            </div>
                       
                      
                        <!-- Post 6 -->
                        <!-- /partials/pages/feed/posts/feed-post6.html -->
                        <!-- POST #6 -->

                        <?php

     for ($i = 0; $i < $howMany; ++$i) { 
        $infoz[$gibId[$i]] = postInfo("$gibId[$i]");
        $likes[$i] = count($infoz[$gibId[$i]]);
        $postpfp[$gibId[$i]] = array_map(function($element){return $element['pfp'];}, $infoz[$gibId[$i]]);
        $likeuid[$gibId[$i]] = array_map(function($element){return $element['likes'];}, $infoz[$gibId[$i]]);
        $likeuname[$gibId[$i]] = array_map(function($element){return $element['uname'];}, $infoz[$gibId[$i]]);
        $fetchUz[$i] = fetchAUser("$gibUid[$i]");
        $authorName[$i] = $fetchUz[$i]['account']['username'];
        $fakez = array('BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling');
        if (empty($authorName[$i])){
            $authorName[$i] = $fakez[$i];
        }
        
        $ripple[$i] = new Jamband\Ripple\Ripple;
        $ripple[$i]->options(['embed' => ['Soundcloud' => 'size=large/']]);
        $ripple[$i]->request("$gibLinkz[$i]");
        $embed[$i] = $ripple[$i]->embed();

        ?>


                        <div class="card is-post is-simple">
                            <!-- Main wrap -->
                            <div class="content-wrap">
                                <!-- Header -->
                                <div class="card-heading">
                                    <!-- User image -->
                                    <div class="user-block">
                                        <div class="image">
                                              <img src="https://bataboom.bet/assets/profile/<?php echo $gibUid[$i];?>.png" data-demo-src="https://bataboom.bet/assets/profile/<?php echo $gibUid[$i];?>.png" alt=""/>
                                        </div>
                                        <div class="user-info">
                                           <a href="profile.php?uid=<?php echo $gibUid[$i];?>">
                                                    <?php echo $authorName[$i];?>
                                                </a>
                                                <span class="time"><?php echo date("jS F, Y", strtotime($gibUpdated[$i]));?></span>
                                                <span id="#post-<?php echo $i;?>" class="hidden"><?php echo $gibId[$i];?></span>
                                                <span id="#uid" class="hidden"><?php echo $_SESSION['uid'];?></span>
                                        </div>
                                    </div>
                                    <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                                    <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                        <div>
                                            <div class="button">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
                                                <a href="#" class="dropdown-item">
                                                    <div class="media">
                                                        <i data-feather="bookmark"></i>
                                                        <div class="media-content">
                                                            <h3>Bookmark</h3>
                                                            <small>Add this post to your bookmarks.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item">
                                                    <div class="media">
                                                        <i data-feather="bell"></i>
                                                        <div class="media-content">
                                                            <h3>Notify me</h3>
                                                            <small>Send me the updates.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr class="dropdown-divider">
                                                <a href="#" class="dropdown-item">
                                                    <div class="media">
                                                        <i data-feather="flag"></i>
                                                        <div class="media-content">
                                                            <h3>Flag</h3>
                                                            <small>In case of inappropriate content.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header -->

                                <!-- Post body -->
                                <div class="card-body">
                                    <!-- Post body text -->
                                    <div class="post-text">
                                        <p>
                                                <?php echo $gibComment[$i]; 
                                    ?>
                                            </p>
                                            <?php
                                    if($gibLinkz[$i] != " " || empty($gibLinkz[$i])) { 
                                            
                                            ?>
                                                <iframe width="100%" height="100%" src="<?php echo $embed[$i]; ?>" class="sc" allowfullscreen></iframe>

                                                <?php } ?>

                                    </div>
                                    <!-- Post actions -->
                                    <div class="post-actions">
                                            <!-- Post actions -->
                                            <div class="like-wrapper">
                                                <a href="javascript:void(0);" onclick="likePost(<?php echo $i;?>)" id="<?php echo $gibId[$i];?>" class="like-button">
                                                    <i class="mdi mdi-heart not-liked bouncy"></i>
                                                    <i class="mdi mdi-heart is-liked bouncy"></i>
                                                    <span class="like-overlay"></span>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-share">
                                                <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="share-modal">
                                                    <i data-feather="link-2"></i>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-comment">
                                                <a onClick="initPostComments();" class="small-fab">
                                                    <i data-feather="message-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                                <!-- /Post body -->

                                <!-- Post footer -->
                                <div class="card-footer">
                                    <!-- Followers -->
                                    <div class="likers-group">
                                          <?php 
                foreach ($postpfp as $key => $value) {
                if($key === "$gibId[$i]"){
                foreach ($value as $val){
                    ?>
                                            <?php echo "<img src=" . "$val" . ">";
                
                      }
            }
        }
        ?>
                                    </div>
                                    <div class="likers-text">
                                         <p>
                                                <?php 
                foreach ($likeuname as $key => $value) {
                if($key === "$gibId[$i]"){
                foreach ($value as $val){
                    if (!(empty($val))) {
                        echo $val."  ";
                    ?>
                                                <p> liked this</p>
                                                <?php }
                }
            }
        }
                    ?>

                                            </p>
                                    </div>
                                    <!-- Post statistics -->
                                    <div class="social-count">
                                        <div class="likes-count">
                                             <i data-feather="heart"></i>
                                                <span><?php echo $likes[$i];?></span>
                                        </div>
                                        <div class="shares-count">
                                            <i data-feather="link-2"></i>
                                                <span><?php echo $shuf[$i];?></span>
                                        </div>
                                        <div class="comments-count">
                                           <i data-feather="message-circle"></i>
                                                <span><?php echo $shev[$i];?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Post footer -->
                            </div>
                            <!-- /Main wrap -->

                            <!-- Post #6 comments -->
                            <div class="comments-wrap is-hidden">
                                <!-- Header -->
                                <div class="comments-heading">
                                    <h4>
                                        Comments
                                        <small>(0)</small>
                                    </h4>
                                    <div class="close-comments">
                                        <i data-feather="x"></i>
                                    </div>
                                </div>
                                <!-- /Header -->

                                <!-- Comments body -->
                                <div class="comments-body has-slimscroll">
                                    <div class="comments-placeholder">
                                        <img src="assets/img/icons/feed/bubble.svg" alt="">
                                        <h3>Nothing in here yet</h3>
                                        <p>Be the first to post a comment.</p>
                                    </div>
                                </div>
                                <!-- /Comments body -->

                                <!-- Comments footer -->
                                <div class="card-footer">
                                    <div class="media post-comment has-emojis">
                                        <!-- Textarea -->
                                        <div class="media-content">
                                            <div class="field">
                                                <p class="control">
                                                    <textarea class="textarea comment-textarea" rows="5" placeholder="Write a comment..."></textarea>
                                                </p>
                                            </div>
                                            <!-- Additional actions -->
                                            <div class="actions">
                                                <div class="image is-32x32">
                                                    <img class="is-rounded" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                                </div>
                                                <div class="toolbar">
                                                    <div class="action is-auto">
                                                        <i data-feather="at-sign"></i>
                                                    </div>
                                                    <div class="action is-emoji">
                                                        <i data-feather="smile"></i>
                                                    </div>
                                                    <div class="action is-upload">
                                                        <i data-feather="camera"></i>
                                                        <input type="file">
                                                    </div>
                                                    <a class="button is-solid primary-button raised">Post Comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Comments footer -->
                            </div>
                            <!-- /Post #6 comments -->
                        </div>
                        <?php
                    }
                    ?>
                        <!-- /POST #6 -->
                        <!-- Load more posts -->
                        <div class=" load-more-wrap has-text-centered">
                            <a href="#" class="load-more-button">Load More</a>
                        </div>
                        <!-- /Load more posts -->

                    </div>
                    <!-- /Middle column -->

                    <!-- Right side column -->
                    <div class="column is-4">
  <div class="buttons mt-4 has-text-centered">
                                <a class="button is-solid primary-button is-half raised" onClick="createPost();"> Toggle Create Post</a>
                                <a class="button is-solid primary-button is-half raised" onClick="slide();"> Refresh Feed</a>
                            </div> 
                         <div class="card">
                                    <div class="card-heading is-bordered">
                                        <h4>Upcoming Games</h4>
                                    </div>
                                    <div class="card-body no-padding">
                                        <!-- Suggested Game -->
                                        <div class="add-friend-block transition-block">
                                            <i class="fa-duotone bball fa-basketball fa-2x fa-spin"></i>
                                            <div class="page-meta">
                                                <span>Hornets vs Bulls</span>
                                                <span>NBA</span>
                                            </div>
                                            <div class="add-friend add-transition">
                                                <i data-feather="clock"></i>
                                            </div>
                                        </div>
                                        <!-- Suggested friend -->
                                        <div class="add-friend-block transition-block">
                                            <i class="fa-duotone amfootball fa-football-helmet fa-2x fa-flip"></i>
                                            <div class="page-meta">
                                                <span>Stallions vs Generals</span>
                                                <span>USFL</span>
                                            </div>
                                            <div class="add-friend add-transition">
                                                <i data-feather="clock"></i>
                                            </div>
                                        </div>
                                        <!-- Suggested friend -->
                                        <div class="add-friend-block transition-block">
                                            <i class="fa-duotone sticks fa-hockey-sticks fa-2x fa-shake"></i>

                                            <div class="page-meta">
                                                <span>Hurricanes vs Lightning</span>
                                                <span>NHL</span>
                                            </div>
                                            <div class="add-friend add-transition">
                                                <i data-feather="clock"></i>
                                            </div>
                                        </div>
                                        <!-- Suggested friend -->
                                        <div class="add-friend-block transition-block">
                                            <i class="fa-duotone bball fa-basketball fa-2x fa-spin"></i>
                                            <div class="page-meta">
                                                <span>Hornets vs Bulls</span>
                                                <span>NBA</span>
                                            </div>
                                            <div class="add-friend add-transition">
                                                <i data-feather="clock"></i>
                                            </div>
                                        </div>
                                        <!-- Suggested friend -->
                                        <div class="add-friend-block transition-block">
                                            <i class="fa-duotone amfootball fa-football-helmet fa-2x fa-flip"></i>
                                            <div class="page-meta">
                                                <span>Stallions vs Generals</span>
                                                <span>USFL</span>
                                            </div>
                                            <div class="add-friend add-transition">
                                                <i data-feather="clock"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Weather widget -->
                                <div class="card is-weather-card has-background-image" data-background="https://wallpapercave.com/wp/xzVucnY.jpg">
                                    <div class="card-heading">
                                        <div class="dropdown is-spaced is-accent is-right dropdown-trigger is-light">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="map-pin"></i>
                                                            <div class="media-content">
                                                                <h3>Select Game</h3>
                                                                <small>View the weather for a specific game</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="rotate-ccw"></i>
                                                            <div class="media-content">
                                                                <h3>Synchronize</h3>
                                                                <small>Synchronize with a weather source.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="settings"></i>
                                                            <div class="media-content">
                                                                <h3>Settings</h3>
                                                                <small>Access widget settings.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="trash-2"></i>
                                                            <div class="media-content">
                                                                <h3>Remove</h3>
                                                                <small>Removes this widget from your feed.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-heading is-justify-content-center">
                                            <span class="is-size-3 has-text-white"> Dodgers vs Braves</span>
                                        </div>
                                        <div class="temperature">
                                            <span>71</span>
                                        </div>
                                        <div class="weather-icon">
                                            <div><i class="fa-duotone sunny fa-sun fa-beat fa-2x"></i>
                                                <h4>Sunny</h4>
                                                <div class="details">
                                                    <span>Real Feel: 78° </span>
                                                    <span>Rain Chance: 5%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="previsions">
                                            <div class="day">
                                                <span>5pm</span>
                                                <i data-feather="sun"></i>
                                                <span>85°</span>
                                            </div>
                                            <div class="day">
                                                <span>6pm</span>
                                                <i data-feather="cloud-lightning"></i>
                                                <span>82°</span>
                                            </div>
                                            <div class="day">
                                                <span>7pm</span>
                                                <i data-feather="cloud-lightning"></i>
                                                <span>73°</span>
                                            </div>
                                            <div class="day">
                                                <span>8pm</span>
                                                <i data-feather="sun"></i>
                                                <span>68°</span>
                                            </div>
                                            <div class="day">
                                                <span>9pm</span>
                                                <i data-feather="cloud-drizzle"></i>
                                                <span>66°</span>
                                            </div>
                                            <div class="day">
                                                <span>10pm</span>
                                                <i data-feather="cloud-rain"></i>
                                                <span>65°</span>
                                            </div>
                                            <div class="day">
                                                <span>11pm</span>
                                                <i data-feather="sun"></i>
                                                <span>64°</span>
                                            </div>
                                        </div>
                                        <div class="current-date-location has-text-centered">
                                            <span class="date">Sunday, 18th 2022</span>
                                            <span class="location"> <i data-feather="map-pin"></i> Los Angeles, CA</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Stories widget -->
                                <!-- /partials/widgets/stories-widget.html -->
                                <div class="card">
                                    <div class="card-heading is-bordered">
                                        <h4>On this day..</h4>
                                        <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="tv"></i>
                                                            <div class="media-content">
                                                                <h3>Browse history</h3>
                                                                <small>View all</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="settings"></i>
                                                            <div class="media-content">
                                                                <h3>Settings</h3>
                                                                <small>Access widget settings.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="trash-2"></i>
                                                            <div class="media-content">
                                                                <h3>Remove</h3>
                                                                <small>Removes this widget from your feed.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body no-padding">
                                        <!-- Story block -->
                                        <div class="story-block">
                                            <a id="add-story-button" href="#" class="add-story">
                                                <i data-feather="plus"></i>
                                            </a>
                                            <div class="story-meta">
                                                <span>Sack your records</span>
                                                <span>Beat the bookie</span>
                                            </div>
                                        </div>
                                        <!-- Story block -->
                                        <div class="story-block">
                                            <div class="img-wrapper">
                                                <img src="https://bataboom.bet/tmp/winzer-b8394298646a.png" data-demo-src="https://bataboom.bet/tmp/kinzer-228e5aea96c5.png" data-user-popover="1" alt="view highlight">
                                            </div>
                                            <div class="story-meta">
                                                <span>John Stockton</span>
                                                <span>Sets 4th single season most assists in NBA history, he owns records 1-4</span>
                                            </div>
                                        </div>
                                        <!-- Story block -->
                                        <div class="story-block">
                                            <div class="img-wrapper">
                                                <img src="https://bataboom.bet/tmp/finzer-e70a7190e8c0.png" data-user-popover="8" alt="view highlight">
                                            </div>
                                            <div class="story-meta">
                                                <span>Stephen Curry</span>
                                                <span>Sets the single season most 3pt field goals in NBA history</span>
                                            </div>
                                        </div>
                                        <!-- Story block -->
                                        <div class="story-block">
                                            <div class="img-wrapper">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6" alt="view highlight">
                                            </div>
                                            <div class="story-meta">
                                                <span>LaDainian Tomlinson</span>
                                                <span>Sets most Touchdowns in a single season in NFL history</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Birthday widget -->
                                <!-- /partials/widgets/birthday-widget.html -->
                                <div class="card is-birthday-card has-background-image" data-background="assets/img/illustrations/cards/birthday-bg.svg">
                                    <div class="card-heading">
                                        <i data-feather="gift"></i>
                                        <div class="dropdown is-spaced is-right dropdown-trigger is-light">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="clock"></i>
                                                            <div class="media-content">
                                                                <h3>Remind me</h3>
                                                                <small>Remind me of this later today.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="message-circle"></i>
                                                            <div class="media-content">
                                                                <h3>Message</h3>
                                                                <small>Send an automatic greeting message.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="trash-2"></i>
                                                            <div class="media-content">
                                                                <h3>Remove</h3>
                                                                <small>Removes this widget from your feed.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="birthday-avatar">
                                                <img src="https://www.insidehook.com/wp-content/uploads/2020/02/steve-smith-wellness.jpg?w=300" data-demo-src="https://www.insidehook.com/wp-content/uploads/2020/02/steve-smith-wellness.jpg?w=300" alt="">
                                                <div class="birthday-indicator">
                                                    43
                                                </div>
                                            </div>
                                            <div class="birthday-content">
                                                <h4 class="has-text-white">Steve Smith Sr turns 43 today!</h4>
                                                <p class="has-text-white">Send him your best wishes by leaving something on his wall.</p>
                                                <button type="button" class="button light-button">Write Message</button>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
        <!-- Share from feed modal -->
        <!-- /partials/pages/feed/modals/share-modal.html -->
        <div id="share-modal" class="modal share-modal is-xsmall has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <div class="dropdown is-primary share-dropdown">
                            <div>
                                <div class="button">
                                    <i class="mdi mdi-format-float-left"></i> <span>Share in your feed</span> <i
                                            data-feather="chevron-down"></i>
                                </div>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-item" data-target-channel="feed">
                                        <div class="media">
                                            <i class="mdi mdi-format-float-left"></i>
                                            <div class="media-content">
                                                <h3>Share in your feed</h3>
                                                <small>Share this publication on your feed.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item" data-target-channel="friend">
                                        <div class="media">
                                            <i class="mdi mdi-account-heart"></i>
                                            <div class="media-content">
                                                <h3>Share in a friend's feed</h3>
                                                <small>Share this publication on a friend's feed.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item" data-target-channel="group">
                                        <div class="media">
                                            <i class="mdi mdi-account-group"></i>
                                            <div class="media-content">
                                                <h3>Share in a group</h3>
                                                <small>Share this publication in a group.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item" data-target-channel="page">
                                        <div class="media">
                                            <i class="mdi mdi-file-document-box"></i>
                                            <div class="media-content">
                                                <h3>Share in a page</h3>
                                                <small>Share this publication in a page.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item" data-target-channel="private-message">
                                        <div class="media">
                                            <i class="mdi mdi-email-plus"></i>
                                            <div class="media-content">
                                                <h3>Share in message</h3>
                                                <small>Share this publication in a private message.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="share-inputs">
                        <div class="field is-autocomplete">
                            <div id="share-to-friend" class="control share-channel-control is-hidden">
                                <input id="share-with-friend" type="text" class="input is-sm no-radius share-input simple-users-autocpl" placeholder="Your friend's name">
                                <div class="input-heading">
                                    Friend :
                                </div>
                            </div>
                        </div>

                        <div class="field is-autocomplete">
                            <div id="share-to-group" class="control share-channel-control is-hidden">
                                <input id="share-with-group" type="text" class="input is-sm no-radius share-input simple-groups-autocpl" placeholder="Your group's name">
                                <div class="input-heading">
                                    Group :
                                </div>
                            </div>
                        </div>

                        <div id="share-to-page" class="control share-channel-control no-border is-hidden">
                            <div class="page-controls">
                                <div class="page-selection">

                                    <div class="dropdown is-accent page-dropdown">
                                        <div>
                                            <div class="button page-selector">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/hanzo.svg" alt=""> <span>Css Ninja</span> <i
                                                        data-feather="chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
                                                <div class="dropdown-item">
                                                    <div class="media">
                                                        <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/hanzo.svg" alt="">
                                                        <div class="media-content">
                                                            <h3>Css Ninja</h3>
                                                            <small>Share on Css Ninja.</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="dropdown-item">
                                                    <div class="media">
                                                        <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/logos/nuclearjs.svg" alt="">
                                                        <div class="media-content">
                                                            <h3>NuclearJs</h3>
                                                            <small>Share on NuclearJs.</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="dropdown-item">
                                                    <div class="media">
                                                        <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/logos/slicer.svg" alt="">
                                                        <div class="media-content">
                                                            <h3>Slicer</h3>
                                                            <small>Share on Slicer.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="alias">
                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/jenna.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="field is-autocomplete">
                            <div id="share-to-private-message" class="control share-channel-control is-hidden">
                                <input id="share-with-private-message" type="text" class="input is-sm no-radius share-input simple-users-autocpl" placeholder="Message a friend">
                                <div class="input-heading">
                                    To :
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="control">
                            <textarea class="textarea comment-textarea" rows="1" placeholder="Say something about this ..."></textarea>
                            <button class="emoji-button">
                                <i data-feather="smile"></i>
                            </button>
                        </div>
                        <div class="shared-publication">
                            <div class="featured-image">
                                <img id="share-modal-image" src="https://via.placeholder.com/1600x900" data-demo-src="assets/img/demo/unsplash/1.jpg" alt="">
                            </div>
                            <div class="publication-meta">
                                <div class="inner-flex">
                                    <img id="share-modal-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                    <p id="share-modal-text">Yesterday with <a href="#">@Karen Miller</a> and <a href="#">@Marvin Stemperd</a> at the
                                        <a href="#">#Rock'n'Rolla</a> concert in LA. Was totally fantastic! People were really
                                        excited about this one!
                                    </p>
                                </div>
                                <div class="publication-footer">
                                    <div class="stats">
                                        <div class="stat-block">
                                            <i class="mdi mdi-earth"></i>
                                            <small>Public</small>
                                        </div>
                                        <div class="stat-block">
                                            <i class="mdi mdi-eye"></i>
                                            <small>163 views</small>
                                        </div>
                                    </div>
                                    <div class="publication-origin">
                                        <small>Friendkit.io</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bottom-share-inputs">

                        <div id="action-place" class="field is-autocomplete is-dropup is-hidden">
                            <div id="share-place" class="control share-bottom-channel-control">
                                <input type="text" class="input is-sm no-radius share-input simple-locations-autocpl" placeholder="Where are you?">
                                <div class="input-heading">
                                    Location :
                                </div>
                            </div>
                        </div>

                        <div id="action-tag" class="field is-autocomplete is-dropup is-hidden">
                            <div id="share-tags" class="control share-bottom-channel-control">
                                <input id="share-friend-tags-autocpl" type="text" class="input is-sm no-radius share-input" placeholder="Who are you with">
                                <div class="input-heading">
                                    Friends :
                                </div>
                            </div>
                            <div id="share-modal-tag-list" class="tag-list no-margin"></div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="action-wrap">
                            <div class="footer-action" data-target-action="tag">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <div class="footer-action" data-target-action="place">
                                <i class="mdi mdi-map-marker"></i>
                            </div>
                            <div class="footer-action dropdown is-spaced is-neutral dropdown-trigger is-up" data-target-action="permissions">
                                <div>
                                    <i class="mdi mdi-lock-clock"></i>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="globe"></i>
                                                <div class="media-content">
                                                    <h3>Public</h3>
                                                    <small>Anyone can see this publication.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="users"></i>
                                                <div class="media-content">
                                                    <h3>Friends</h3>
                                                    <small>only friends can see this publication.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>Specific friends</h3>
                                                    <small>Don't show it to some friends.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="lock"></i>
                                                <div class="media-content">
                                                    <h3>Only me</h3>
                                                    <small>Only me can see this publication.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="button-wrap">
                            <button type="button" class="button is-solid dark-grey-button close-modal">Cancel</button>
                            <button type="button" class="button is-solid primary-button close-modal">Publish</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- No Stream modal -->
        <!-- /partials/pages/feed/modals/no-stream-modal.html -->
        <div id="no-stream-modal" class="modal no-stream-modal is-xsmall has-light-bg">
            <div class="modal-background"></div>
            <div class="modal-content">

                <div class="card">
                    <div class="card-heading">
                        <h3></h3>
                        <!-- Close X button -->
                        <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                        </div>
                    </div>
                    <div class="card-body has-text-centered">

                        <div class="image-wrap">
                            <img src="assets/img/illustrations/characters/no-stream.svg" alt="">
                        </div>

                        <h3>Streaming Disabled</h3>
                        <p>Streaming is not allowed from mobile web. Please use our mobile apps for mobile streaming.</p>

                        <div class="action">
                            <a href="/#demos-section" class="button is-solid accent-button raised is-fullwidth">Got It</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google places Lib -->
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyAGLO_M5VT7BsVdjMjciKoH1fFJWWdhDPU&libraries=places"></script>
    </div>

    <div class="chat-wrapper">
        <div class="chat-inner">

            <!-- Chat top navigation -->
            <div class="chat-nav">
                <div class="nav-start">
                    <div class="recipient-block">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        </div>
                        <div class="username">
                            <span>Dan Walker</span>
                            <span><i data-feather="star"></i> <span>| Online</span></span>
                        </div>
                    </div>
                </div>
                <div class="nav-end">

                    <!-- Settings icon dropdown -->
                    <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                        <div>
                            <a class="chat-nav-item is-icon">
                                <i data-feather="settings"></i>
                            </a>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="message-square"></i>
                                        <div class="media-content">
                                            <h3>Details</h3>
                                            <small>View this conversation's details.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="settings"></i>
                                        <div class="media-content">
                                            <h3>Preferences</h3>
                                            <small>Define your preferences.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="bell"></i>
                                        <div class="media-content">
                                            <h3>Notifications</h3>
                                            <small>Set notifications settings.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="bell-off"></i>
                                        <div class="media-content">
                                            <h3>Silence</h3>
                                            <small>Disable notifications.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="box"></i>
                                        <div class="media-content">
                                            <h3>Archive</h3>
                                            <small>Archive this conversation.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="trash-2"></i>
                                        <div class="media-content">
                                            <h3>Delete</h3>
                                            <small>Delete this conversation.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-search">
                        <div class="control has-icon">
                            <input type="text" class="input" placeholder="Search messages">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="chat-nav-item is-icon is-hidden-mobile">
                        <i data-feather="at-sign"></i>
                    </a>
                    <a class="chat-nav-item is-icon is-hidden-mobile">
                        <i data-feather="star"></i>
                    </a>

                    <!-- More dropdown -->
                    <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                        <div>
                            <a class="chat-nav-item is-icon no-margin">
                                <i data-feather="more-vertical"></i>
                            </a>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="file-text"></i>
                                        <div class="media-content">
                                            <h3>Files</h3>
                                            <small>View all your files.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="users"></i>
                                        <div class="media-content">
                                            <h3>Users</h3>
                                            <small>View all users you're talking to.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="gift"></i>
                                        <div class="media-content">
                                            <h3>Daily bonus</h3>
                                            <small>Get your daily bonus.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="download-cloud"></i>
                                        <div class="media-content">
                                            <h3>Downloads</h3>
                                            <small>See all your downloads.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="life-buoy"></i>
                                        <div class="media-content">
                                            <h3>Support</h3>
                                            <small>Reach our support team.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="chat-nav-item is-icon close-chat">
                        <i data-feather="x"></i>
                    </a>
                </div>
            </div>
            <!-- Chat sidebar -->
            <div id="chat-sidebar" class="users-sidebar">
                <!-- Header -->
                <div class="header-item">
                    <img class="light-image" src="assets/img/logo/friendkit-bold.svg" alt="">
                    <img class="dark-image" src="assets/img/logo/friendkit-white.svg" alt="">
                </div>
                <!-- User list -->
                <div class="conversations-list has-slimscroll-xs">
                    <!-- User -->
                    <div class="user-item is-active" data-chat-user="dan" data-full-name="Dan Walker" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="stella" data-full-name="Stella Bergmann" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="daniel" data-full-name="Daniel Wellington" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="david" data-full-name="David Kim" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="edward" data-full-name="Edward Mayers" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="elise" data-full-name="Elise Walker" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="nelly" data-full-name="Nelly Schwartz" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="milly" data-full-name="Milly Augustine" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                </div>
                <!-- Add Conversation -->
                <div class="footer-item">
                    <div class="add-button modal-trigger" data-modal="add-conversation-modal"><i data-feather="user"></i></div>
                </div>
            </div>

            <!-- Chat body -->
            <div id="chat-body" class="chat-body is-opened">
                <!-- Conversation with Dan -->
                <div id="dan-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:03am</span>
                            <div class="message-text">Hi Jenna! I made a new design, and i wanted to show it to you.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:03am</span>
                            <div class="message-text">It's quite clean and it's inspired from Bulkit.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:12am</span>
                            <div class="message-text">Oh really??! I want to see that.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="message-block">
                            <span>8:13am</span>
                            <div class="message-text">FYI it was done in less than a day.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:17am</span>
                            <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:18am</span>
                            <div class="message-text">And if you have a prototype, you can also send me the link to it.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Stella -->
                <div id="stella-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>10:34am</span>
                            <div class="message-text">Hey Stella! Aren't we supposed to go the theatre after work?.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>10:37am</span>
                            <div class="message-text">Just remembered it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                        <div class="message-block">
                            <span>11:22am</span>
                            <div class="message-text">Yeah you always do that, forget about everything.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Daniel -->
                <div id="daniel-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Yesterday</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>3:24pm</span>
                            <div class="message-text">Daniel, Amanda told me about your issue, how can I help?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:42pm</span>
                            <div class="message-text">Hey Jenna, thanks for answering so quickly. Iam stuck, i need a car.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:43pm</span>
                            <div class="message-text">Can i borrow your car for a quick ride to San Fransisco? Iam running behind and
                                there' no train in sight.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with David -->
                <div id="david-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>12:34pm</span>
                            <div class="message-text">Damn you! Why would you even implement this in the game?.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>12:32pm</span>
                            <div class="message-text">I just HATE aliens.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:09pm</span>
                            <div class="message-text">C'mon, you just gotta learn the tricks. You can't expect aliens to behave like
                                humans. I mean that's how the mechanics are.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:11pm</span>
                            <div class="message-text">I checked the replay and for example, you always get supply blocked. That's not
                                the right thing to do.</div>
                        </div>
                    </div>
                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>13:12pm</span>
                            <div class="message-text">I know but i struggle when i have to decide what to make from larvas.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:17pm</span>
                            <div class="message-text">Join me in game, i'll show you.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Edward -->
                <div id="edward-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Monday</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:55pm</span>
                            <div class="message-text">Hey Jenna, what's up?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:56pm</span>
                            <div class="message-text">Iam coming to LA tomorrow. Interested in having lunch?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:21pm</span>
                            <div class="message-text">Hey mate, it's been a while. Sure I would love to.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>5:27pm</span>
                            <div class="message-text">Ok. Let's say i pick you up at 12:30 at work, works?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:43pm</span>
                            <div class="message-text">Yup, that works great.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>5:44pm</span>
                            <div class="message-text">And yeah, don't forget to bring some of my favourite cheese cake.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>5:27pm</span>
                            <div class="message-text">No worries</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Edward -->
                <div id="elise-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">September 28</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>11:53am</span>
                            <div class="message-text">Elise, i forgot my folder at your place yesterday.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>11:53am</span>
                            <div class="message-text">I need it badly, it's work stuff.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                        <div class="message-block">
                            <span>12:19pm</span>
                            <div class="message-text">Yeah i noticed. I'll drop it in half an hour at your office.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Nelly -->
                <div id="nelly-conversation" class="chat-body-inner has-slimscroll is-hidden">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">September 17</span>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:22pm</span>
                            <div class="message-text">So you watched the movie?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:22pm</span>
                            <div class="message-text">Was it scary?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                        <div class="message-block">
                            <span>9:03pm</span>
                            <div class="message-text">It was so frightening, i felt my heart was about to blow inside my chest.</div>
                        </div>
                    </div>
                </div>
                <!-- Conversation with Milly -->
                <div id="milly-conversation" class="chat-body-inner has-slimscroll">
                    <div class="date-divider">
                        <hr class="date-divider-line">
                        <span class="date-divider-text">Today</span>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:01pm</span>
                            <div class="message-text">Hello Jenna, did you read my proposal?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:01pm</span>
                            <div class="message-text">Didn't hear from you since i sent it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:02pm</span>
                            <div class="message-text">Hello Milly, Iam really sorry, Iam so busy recently, but i had the time to read
                                it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:04pm</span>
                            <div class="message-text">And what did you think about it?</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:05pm</span>
                            <div class="message-text">Actually it's quite good, there might be some small changes but overall it's
                                great.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>2:07pm</span>
                            <div class="message-text">I think that i can give it to my boss at this stage.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="message-block">
                            <span>2:09pm</span>
                            <div class="message-text">Crossing fingers then</div>
                        </div>
                    </div>
                </div>
                <!-- Compose message area -->
                <div class="chat-action">
                    <div class="chat-action-inner">
                        <div class="control">
                            <textarea class="textarea comment-textarea" rows="1"></textarea>
                            <div class="dropdown compose-dropdown is-spaced is-accent is-up dropdown-trigger">
                                <div>
                                    <div class="add-button">
                                        <div class="button-inner">
                                            <i data-feather="plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="code"></i>
                                                <div class="media-content">
                                                    <h3>Code snippet</h3>
                                                    <small>Add and paste a code snippet.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="file-text"></i>
                                                <div class="media-content">
                                                    <h3>Note</h3>
                                                    <small>Add and paste a note.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="server"></i>
                                                <div class="media-content">
                                                    <h3>Remote file</h3>
                                                    <small>Add a file from a remote drive.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="monitor"></i>
                                                <div class="media-content">
                                                    <h3>Local file</h3>
                                                    <small>Add a file from your computer.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="chat-panel" class="chat-panel is-opened">
                <div class="panel-inner">
                    <div class="panel-header">
                        <h3>Details</h3>
                        <div class="panel-close">
                            <i data-feather="x"></i>
                        </div>
                    </div>

                    <!-- Dan details -->
                    <div id="dan-details" class="panel-body is-user-details">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Dan Walker</h3>
                                <h4>IOS Developer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">WebSmash Inc.</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-school"></i>
                                    <div class="about-text">
                                        <span>Studied at</span>
                                        <span><a class="is-inverted" href="#">Riverdale University</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Stella details -->
                    <div id="stella-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Stella Bergmann</h3>
                                <h4>Shop Owner</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-purple">
                                    <div>
                                        <i class="mdi mdi-bomb"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-check-decagram"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Trending Fashions</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Oklahoma City</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Daniel details -->
                    <div id="daniel-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Daniel Wellington</h3>
                                <h4>Senior Executive</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-google-cardboard"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-pizza"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-linux"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-puzzle"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Peelman & Sons</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Los Angeles</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- David details -->
                    <div id="david-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>David Kim</h3>
                                <h4>Senior Developer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Frost Entertainment</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Chicago</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Edward details -->
                    <div id="edward-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Edward Mayers</h3>
                                <h4>Financial analyst</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Brettmann Bank</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Santa Fe</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Elise details -->
                    <div id="elise-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Elise Walker</h3>
                                <h4>Social influencer</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Social Media</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">London</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Nelly details -->
                    <div id="nelly-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Nelly Schwartz</h3>
                                <h4>HR Manager</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Carrefour</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Melbourne</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Milly details -->
                    <div id="milly-details" class="panel-body is-user-details is-hidden">
                        <div class="panel-body-inner">

                            <div class="subheader">
                                <div class="action-icon">
                                    <i class="mdi mdi-video"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-camera"></i>
                                </div>
                                <div class="action-icon">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                                <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                    <div>
                                        <div class="action-icon">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>View profile</h3>
                                                        <small>View this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="mail"></i>
                                                    <div class="media-content">
                                                        <h3>Send message</h3>
                                                        <small>Send a message to the user's inbox.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="share-2"></i>
                                                    <div class="media-content">
                                                        <h3>Share profile</h3>
                                                        <small>Share this user's profile.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="x"></i>
                                                    <div class="media-content">
                                                        <h3>Block user</h3>
                                                        <small>Block this user permanently.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-avatar">
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                                <div class="call-me">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>

                            <div class="user-meta has-text-centered">
                                <h3>Milly Augustine</h3>
                                <h4>Sales Manager</h4>
                            </div>

                            <div class="user-badges">
                                <div class="hexagon is-red">
                                    <div>
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-green">
                                    <div>
                                        <i class="mdi mdi-dog"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-accent">
                                    <div>
                                        <i class="mdi mdi-flash"></i>
                                    </div>
                                </div>
                                <div class="hexagon is-blue">
                                    <div>
                                        <i class="mdi mdi-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="user-about">
                                <label>About Me</label>
                                <div class="about-block">
                                    <i class="mdi mdi-domain"></i>
                                    <div class="about-text">
                                        <span>Works at</span>
                                        <span><a class="is-inverted" href="#">Salesforce</a></span>
                                    </div>
                                </div>
                                <div class="about-block">
                                    <i class="mdi mdi-map-marker"></i>
                                    <div class="about-text">
                                        <span>From</span>
                                        <span><a class="is-inverted" href="#">Seattle</a></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="add-conversation-modal" class="modal add-conversation-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>New Conversation</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                        <span class="close-modal">
                                <i data-feather="x"></i>
                            </span>
                    </div>
                </div>
                <div class="card-body">

                    <img src="assets/img/icons/chat/bubbles.svg" alt="">

                    <div class="field is-autocomplete">
                        <div class="control has-icon">
                            <input type="text" class="input simple-users-autocpl" placeholder="Search a user">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="help-text">
                        Select a user to start a new conversation. You'll be able to add other users later.
                    </div>

                    <div class="action has-text-centered">
                        <button type="button" class="button is-solid accent-button raised">Start conversation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <script type="text/javascript">
            //Like Button Animation
            for (let i = 0; i < <?php echo $cnz;?>; ++i) {
               
                let likedPosts = <?php echo json_encode($fz); ?>;
                
                 document.getElementById(likedPosts[i]).className = "like-button is-active";
                 }
                 // document.getElementById('fc2f4fb0-6c52-4291-acfa-d933dc21c1bd').className = "like-button is-active";
        </script>

        <!-- Components js -->

        <script src="assets/fresh/js/app.js"></script>
        <script src="assets/fresh/js/custom.js"></script>
        <script src="assets/data/tipuedrop_content.js"></script>
        <script src="assets/js/feed/compose.js"></script>
        <script src="assets/js/feed/widgets.js"></script>

        <script type="text/javascript">
            //Comment on Post 
            function initPostComments() {
          $(".fab-wrapper.is-comment, .close-comments").on("click", function (e) {
            $(this)
              .addClass("is-active")
              .closest(".card")
              .find(".content-wrap, .comments-wrap")
              .toggleClass("is-hidden");
            var jump = $(this).closest(".is-post");
            var new_position = $(jump).offset();
            console.log(new_position);
            $("html, body")
              .stop()
              .animate({ scrollTop: new_position.top - 70 }, 500);
            e.preventDefault();
            setTimeout(function () {
              $(".emojionearea-editor").val("");
            }, 400);
          });
        }
        
        //Toggle Create Post
            function createPost(){
                    $(`#compose-card`).toggle();
                
            }
        
        //Delete Notifyh's
        document.addEventListener('DOMContentLoaded', () => {
          (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;
        
            $delete.addEventListener('click', () => {
              $notification.parentNode.removeChild($notification);
            });
          });
        });
        </script>

</body>
</html>
