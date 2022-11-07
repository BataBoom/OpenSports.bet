<?php
require 'includes/config/config.php';
checkSession();
$meee = $_SESSION['uid'];
$balance = fetchBalance("$meee");
$usd = btcusd();
//$address = generateAddress();

?>
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
    <link rel="stylesheet" href="assets/new-css/contests.css">
    <link rel="stylesheet" href="assets/new-css/stats.css">

        <!-- Customized Core CSS -->
    <style type="text/css">
        /* brand logo is brand new */
            .brand-logo {
            position: relative;
            top: -100px;
            
                        }

        .sidebar-v1 .bottom-section ul li a {
  color: #9afbff8c;
}

        .bitcoin {

         --fa-primary-color: rgb(236, 146, 19, 0.6);
         --fa-secondary-color: rgb(243, 203, 109, 0.8);
         --fa-animation-iteration-count:  15;
        }
        .bitcoin:hover{
         --fa-primary-color: rgb(243, 203, 109, 0.6);
         --fa-secondary-color: rgb(208, 150, 17, 0.8);
         

        }
        .hidden {
            display: none;
        }
</style>


    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/ff83cd2b21.js" crossorigin="anonymous"></script>
    <!-- Apex Charts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://bataboom.bet/assets/stats/apex-data.js" async></script>
</head>

<body class="is-dark">

  
 
               <div class="pageloader"></div>
    <div class="infraloader is-active"></div> 
    <div class="app-overlay is-sidebar-v1"></div>

    <div class="sidebar-v1 is-fold">

        <div class="top-section">
            <img class="brand-logo" src="https://bataboom.bet/assets/img/logov3.png" alt=""></img>
            <button id="sidebar-v1-close" class="close-button">
                <i data-feather="arrow-left"></i>
            </button>
            

            
 

        <div class="user-block">
<?php 
                $uid = $_SESSION['uid'];
                $combine = $_SESSION['username']."-".$_SESSION['uid'];?>
                <img class="avatar" src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" data-demo-src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" alt="">
                <div class="meta">
                    <span><?php echo strtoupper($_SESSION['username']);?></span>
                    <span>Undrafted Free Agent</span>
                </div>
                 <span id="you" class="hidden"><?php echo $uid;?></span>
</div>
                 
        
        <div class="bottom-section">
    
            

            <ul>
                  <li>
                    <a href="nba.php">
                       <i class="fa-regular fa-card-spade fa-2x fa-flip" style="--fa-animation-iteration-count: 5;"></i>
                        <span>&nbsp; Bookie</span>
                    </a>
                </li>

                <li>
                    <a href="feeds.php" class="is-active">
                     <i class="fa-regular fa-timeline fa-2x"></i>
                        <span>&nbsp; Timeline</span>
                    </a>
                </li>
                 <li>
                    <a href="feeds.php" class="is-active">
                     <i class="fa-regular fa-globe fa-2x fa-pulse" style="--fa-animation-iteration-count: 5;"></i>
                        <span>&nbsp;  Explore Community</span>
                    </a>
                </li>
        
                <li>
                    <a href="livepicks.php">
                       <i class="fa-regular fa-megaphone fa-2x"></i>
                        <span>&nbsp; Live Picks</span>
                    </a>
                </li>
                  <li>
                    <a href="index.php">
                      <i class="fa-regular fa-calculator-simple fa-2x" style="--fa-primary-color: white;"></i>
                        <span>&nbsp; Stats</span>
                    </a>
                </li>
                
                <li>
                    <a href="news.php" class="is-disabled">
                       <i class="fa-regular fa-play fa-2x" style="--fa-primary-color: white;"></i>
                        <span>&nbsp; Sports News</span>
                    </a>
                </li>
                   <li>
                    <a href="profile.php">
                        <i class="fa-solid fa-user-astronaut fa-2x"></i>
                        <span>&nbsp; Profile</span>
                    </a>
                </li>
               

            </ul>
            <ul>
                <li>
                    <a href="settings.php">
                        <i data-feather="settings"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="login/logout.php">
                        <i data-feather="log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>

                     <li>
                    <a href="cashier.php">
                        <i class="fa-regular fa-coins fa-bounce" style="color:#676a79; --fa-animation-iteration-count: 5;"></i>
                        <span>&nbsp; Cashier</span>
                    </a>
                </li>
            </ul>
       
 
 </div>
    </div>
    </div>
    <div class="view-wrapper is-sidebar-v1 is-fold">

        <div class="toolbar-v1-fixed-wrap is-fold">
            <div class="toolbar-v1 is-narrow">
                <!-- Sidebar Trigger -->
                <div class="friendkit-hamburger sidebar-v1-trigger">
                    <span class="menu-toggle has-chevron">
                            <span class="icon-box-toggle">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                    </span>
                    </span>
                </div>
                <h1>Timeline</h1>
                <div class="controls">
                    <div class="navbar-item is-icon drop-trigger">
                        <a class="icon-link is-friends" href="javascript:void(0);">
                            <i data-feather="heart"></i>
                            <span class="indicator"></span>
                        </a>

                        <div class="nav-drop is-right">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span>Friend requests</span>
                                    <a href="#">
                                        <i data-feather="search"></i>
                                    </a>
                                </div>
                                <div class="nav-drop-body is-friend-requests">
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/bobby.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Bobby Brown</a>
                                            <span>Najeel verwick is a common friend</span>
                                        </div>
                                        <div class="media-right">
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/dan.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Dan Walker</a>
                                            <span>You have 4 common friends</span>
                                        </div>
                                        <div class="media-right">
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/nelly.png" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span>You are now friends with <a href="#">Nelly Schwartz</a>. Check her <a href="#">profile</a>.</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="tag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/milly.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Milly Augustine</a>
                                            <span>You have 8 common friends</span>
                                        </div>
                                        <div class="media-right">
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/elise.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span>You are now friends with <a href="#">Elise Walker</a>. Check her <a href="#">profile</a>.</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="tag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/edward.jpeg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span>You are now friends with <a href="#">Edward Mayers</a>. Check his <a href="#">profile</a>.</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="tag"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-drop-footer">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item is-icon drop-trigger">
                        <a class="icon-link" href="javascript:void(0);">
                            <i data-feather="bell"></i>
                            <span class="indicator"></span>
                        </a>

                        <div class="nav-drop is-right">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span>Notifications</span>
                                    <a href="#">
                                        <i data-feather="bell"></i>
                                    </a>
                                </div>
                                <div class="nav-drop-body is-notifications">
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/david.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">David Kim</a> commented on <a href="#">your post</a>.</span>
                                            <span class="time">30 minutes ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/daniel.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">Daniel Wellington</a> liked your <a href="#">profile.</a></span>
                                            <span class="time">43 minutes ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/stella.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">Stella Bergmann</a> shared a <a href="#">New video</a> on your wall.</span>
                                            <span class="time">Yesterday</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="youtube"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/elise.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">Elise Walker</a> shared an <a href="#">Image</a> with you an 2 other people.</span>
                                            <span class="time">2 days ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-drop-footer">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item is-icon drop-trigger">
                        <a class="icon-link is-active" href="javascript:void(0);">
                            <i data-feather="mail"></i>
                            <span class="indicator"></span>
                        </a>

                        <div class="nav-drop is-right">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span>Messages</span>
                                    <a href="messages-inbox.html">Inbox</a>
                                </div>
                                <div class="nav-drop-body is-friend-requests">
                                    <!-- Message -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="https://bataboom.bet/assets/img/avatars/nelly.png" data-user-popover="9" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Nelly Schwartz</a>
                                            <span>I think we should meet near the Starbucks so we can get...</span>
                                            <span class="time">Yesterday</span>
                                        </div>
                                        <div class="media-right is-centered">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="https://bataboom.bet/assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Edward Mayers</a>
                                            <span>That was a real pleasure seeing you last time we really should...</span>
                                            <span class="time">last week</span>
                                        </div>
                                        <div class="media-right is-centered">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="https://bataboom.bet/assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Dan Walker</a>
                                            <span>Hey there, would it be possible to borrow your bicycle, i really need...</span>
                                            <span class="time">Jun 03 2018</span>
                                        </div>
                                        <div class="media-right is-centered">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-drop-footer">
                                    <a href="#">Clear All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item is-cart">
                        <div class="cart-button">
                        <i class="fa-duotone fa-bitcoin-sign fa-2x bitcoin"></i>
                            <div class="cart-count">
                            </div>
                        </div>

                        <!-- Cart dropdown -->
                        <div class="shopping-cart">
                            <div class="cart-inner">

                                <!--Loader-->
                                <div class="navbar-cart-loader is-active">
                                    <div class="loader is-loading"></div>
                                </div>

                                <div class="shopping-cart-header">
                                    <a href="#" class="cart-link">Cashier</a>
                                    <div class="shopping-cart-total">
                                        <span class="lighter-text">Balance:</span>
                                        <span class="main-color-text"><?php echo $balance;?></span>
                                    </div>
                                </div>
                              
                                

                                <a href="cashier.php" class="button primary-button is-raised">Visit Cashier</a>
                            </div>
                        </div>
                    </div>
                    <div id="account-dropdown" class="navbar-item is-account drop-trigger has-caret">
                        <div class="user-image">
                            <img src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" data-demo-src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" alt="">
                            <span class="indicator"></span>
                        </div>

                        <div class="nav-drop is-account-dropdown">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <a class="username" href="profile.php?uid=<?php echo $_SESSION['uid'];?>"><?php echo $_SESSION['username'];?></a>
                                    <label class="theme-toggle">
                                        <input type="checkbox">
                                        <span class="toggler">
                                                <span class="dark">
                                                    <i data-feather="moon"></i>
                                                </span>
                                        <span class="light">
                                                    <i data-feather="sun"></i>
                                                </span>
                                        </span>
                                    </label>
                                </div>

                                <div class="nav-drop-body account-items">
                                     <a class="account-item" href="profile.php?uid=<?php echo $_SESSION['uid'];?>">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i class="fa-duotone fa-user-visor fa-2x"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3><?php echo $_SESSION['username'];?>'s Profile</h3>
                                                <small>View your profile</small>
                                            </div>
                                        </div>
                                    </a><i class="fa-duotone fa-user-visor"></i>
                               
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="settings"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3>Settings</h3>
                                                <small>Access widget settings.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="life-buoy"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3>Help</h3>
                                                <small>Contact our support.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="login/logout.php">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="power"></i>
                                            </div>
                                            <div class="media-content">
                                               <h3>Log out</h3>
                                                <small>Log out from your account.</small>
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
       

            <div class="toolbar-v1 is-narrow">
                <!-- Sidebar Trigger -->
                <div class="friendkit-hamburger sidebar-v1-trigger">
                    <span class="menu-toggle has-chevron">
                            <span class="icon-box-toggle">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                    </span>
                    </span>
                </div>
                <h1>Timeline</h1>
                <div class="controls">
                    <div class="navbar-item is-icon drop-trigger">
                        <a class="icon-link is-friends" href="javascript:void(0);">
                            <i data-feather="heart"></i>
                            <span class="indicator"></span>
                        </a>

                        <div class="nav-drop is-right">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span>Friend requests</span>
                                    <a href="#">
                                        <i data-feather="search"></i>
                                    </a>
                                </div>
                                <div class="nav-drop-body is-friend-requests">
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/bobby.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Bobby Brown</a>
                                            <span>Najeel verwick is a common friend</span>
                                        </div>
                                        <div class="media-right">
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/dan.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Dan Walker</a>
                                            <span>You have 4 common friends</span>
                                        </div>
                                        <div class="media-right">
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/nelly.png" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span>You are now friends with <a href="#">Nelly Schwartz</a>. Check her <a href="#">profile</a>.</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="tag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/milly.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Milly Augustine</a>
                                            <span>You have 8 common friends</span>
                                        </div>
                                        <div class="media-right">
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-plus"></i>
                                            </button>
                                            <button class="button icon-button is-solid grey-button raised">
                                                <i data-feather="user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/elise.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span>You are now friends with <a href="#">Elise Walker</a>. Check her <a href="#">profile</a>.</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="tag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Friend request -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/edward.jpeg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span>You are now friends with <a href="#">Edward Mayers</a>. Check his <a href="#">profile</a>.</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="tag"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-drop-footer">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item is-icon drop-trigger">
                        <a class="icon-link" href="javascript:void(0);">
                            <i data-feather="bell"></i>
                            <span class="indicator"></span>
                        </a>

                        <div class="nav-drop is-right">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span>Notifications</span>
                                    <a href="#">
                                        <i data-feather="bell"></i>
                                    </a>
                                </div>
                                <div class="nav-drop-body is-notifications">
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/david.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">David Kim</a> commented on <a href="#">your post</a>.</span>
                                            <span class="time">30 minutes ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/daniel.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">Daniel Wellington</a> liked your <a href="#">profile.</a></span>
                                            <span class="time">43 minutes ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/stella.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">Stella Bergmann</a> shared a <a href="#">New video</a> on your wall.</span>
                                            <span class="time">Yesterday</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="youtube"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="https://bataboom.bet/assets/img/avatars/elise.jpg" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <span><a href="#">Elise Walker</a> shared an <a href="#">Image</a> with you an 2 other people.</span>
                                            <span class="time">2 days ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="added-icon">
                                                <i data-feather="image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-drop-footer">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item is-icon drop-trigger">
                        <a class="icon-link is-active" href="javascript:void(0);">
                            <i data-feather="mail"></i>
                            <span class="indicator"></span>
                        </a>

                        <div class="nav-drop is-right">
                            <div class="inner">
                                <div class="nav-drop-header">
                                    <span>Messages</span>
                                    <a href="messages-inbox.html">Inbox</a>
                                </div>
                                <div class="nav-drop-body is-friend-requests">
                                    <!-- Message -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="https://bataboom.bet/assets/img/avatars/nelly.png" data-user-popover="9" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Nelly Schwartz</a>
                                            <span>I think we should meet near the Starbucks so we can get...</span>
                                            <span class="time">Yesterday</span>
                                        </div>
                                        <div class="media-right is-centered">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="https://bataboom.bet/assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Edward Mayers</a>
                                            <span>That was a real pleasure seeing you last time we really should...</span>
                                            <span class="time">last week</span>
                                        </div>
                                        <div class="media-right is-centered">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message -->
                                    <div class="media">
                                        <figure class="media-left">
                                            <p class="image">
                                                <img src="https://via.placeholder.com/150x150" data-demo-src="https://bataboom.bet/assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <a href="#">Dan Walker</a>
                                            <span>Hey there, would it be possible to borrow your bicycle, i really need...</span>
                                            <span class="time">Jun 03 2018</span>
                                        </div>
                                        <div class="media-right is-centered">
                                            <div class="added-icon">
                                                <i data-feather="message-square"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-drop-footer">
                                    <a href="#">Clear All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item is-cart">
                        <div class="cart-button">
                        <i class="fa-duotone fa-bitcoin-sign fa-2x bitcoin"></i>
                            <div class="cart-count">
                            </div>
                        </div>

                         <!-- Cart dropdown -->
                        <div class="shopping-cart">
                            <div class="cart-inner">

                                <!--Loader-->
                                <div class="navbar-cart-loader is-active">
                                    <div class="loader is-loading"></div>
                                </div>

                                <div class="shopping-cart-header">
                                    <a href="#" class="cart-link">Cashier</a>
                                    <div class="shopping-cart-total">
                                        <span class="lighter-text">Balance:</span>
                                        <span class="main-color-text"><?php echo $balance;?></span>
                                    </div>
                                </div>
                              
                                

                                <a href="cashier.php" class="button primary-button is-raised">Visit Cashier</a>
                            </div>
                        </div>
                           </div>
                    <div id="account-dropdown" class="navbar-item is-account drop-trigger has-caret">
                        <div class="user-image">
                            <img src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" data-demo-src="https://bataboom.bet/assets/profile/<?php echo $uid;?>.png" alt="">
                            <span class="indicator"></span>
                        </div>

                        <div class="nav-drop is-account-dropdown">
                            <div class="inner">
                                <div class="nav-drop-header">
                                     <span class="username"><?php echo $_SESSION['username'];?> </span>
                                    <label class="theme-toggle">
                                        <input type="checkbox">
                                        <span class="toggler">
                                                <span class="dark">
                                                    <i data-feather="moon"></i>
                                                </span>
                                        <span class="light">
                                                    <i data-feather="sun"></i>
                                                </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="nav-drop-body account-items">
                            <a class="account-item" href="profile.php?uid=<?php echo $_SESSION['uid'];?>">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i class="fa-duotone fa-user-visor fa-2x"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3><?php echo $_SESSION['username'];?>'s Profile</h3>
                                                <small>View your profile</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="settings.php" class="account-item">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="settings"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3>Settings</h3>
                                                <small>Access widget settings.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="life-buoy"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3>Help</h3>
                                                <small>Contact our support.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="account-item" href="login/logout.php">
                                        <div class="media">
                                            <div class="icon-wrap">
                                                <i data-feather="power"></i>
                                            </div>
                                            <div class="media-content">
                                                <h3>Log out</h3>
                                                <small>Log out from your account.</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Load Mapbox-->

    <!-- Concatenated js plugins and jQuery -->
    <script src="https://bataboom.bet/assets/fresh/js/app.js"></script>
    <script src="https://bataboom.bet/assets/data/tipuedrop_content.js"></script>

    <!-- Core js -->
    <script src="https://bataboom.bet/assets/fresh/js/global.js"></script>


    <!-- Navigation options js -->
    <script src="https://bataboom.bet/assets/fresh/js/navbar-v1.js"></script>
    <script src="https://bataboom.bet/assets/fresh/js/navbar-v2.js"></script>
    <script src="https://bataboom.bet/assets/fresh/js/navbar-mobile.js"></script>
    <script src="https://bataboom.bet/assets/fresh/js/navbar-options.js"></script>
    <script src="https://bataboom.bet/assets/fresh/js/sidebar-v1.js"></script>

    
        <!-- Core instance js -->
    <script src="assets/fresh/js/main.js"></script>
  



 

</body>

</html>
