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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/fresh/app.css">
    <link rel="stylesheet" href="assets/fresh/mycore.css">
    <link rel="stylesheet" href="assets/new-css/contests.css">
    <link rel="stylesheet" href="assets/new-css/stats.css">

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
 
    
     </style>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/ff83cd2b21.js" crossorigin="anonymous"></script>
    <!-- Apex Charts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://bataboom.bet/assets/stats/apex-data.js" async></script>
</head>

<body class="is-dark">


    <?php 
    //require 'includes/config/config.php';
    require 'sidenav.php';
/*
    $c = new slipResults();
    $red = call_user_func($c, 'NEW');
    $readBets = array_values(array_filter($red, function($var) {
    return ($var['start'] >= $today);

}));
*/
$readBets = readW("start", "$today", "bets", "1000");
$cntBetz = count($readBets);


    ?>

       
             <div class="column features is-12">
                <?php if (isset($_SESSION['create_comment'])){?>
                <div class="notification is-success is-dark is-centered has-text-centered">
             <button class="delete"></button>
   <p style="color:black;">  <?php
            echo $_SESSION['create_comment'];
            unset($_SESSION['create_comment']);
        }
        ?>
  </p>
</div>
                 <div class="dashboard-cta">
                                            <div class="dashboard-cta-img">
                                                <img alt="" src="https://bataboom.bet/assets/img/jordan.png" data-demo-src="https://bataboom.bet/assets/img/jordan.png">
                                            </div>
                                            <h2 class="dashboard-cta-title">
                                                Win awesome prizes in our contest
                                            </h2>
                                            <p class="dashboard-cta-text">
                                                Predict who will win and how a match will end and get a chance to
                                                win incredible crypto prizes.
                                            </p>
                                            <button class="button h-button is-light raised">Learn More</button>
                                        </div>
                </div>
          
             
                
<div class="columns is-multiline is-centered">

     <?php 
      
        $avaz = array('bataboom-d631625fd38d.png', 'finzer-e70a7190e8c0.png','fish-d2685245d8ba.png','kinzer-228e5aea96c5.png','linz-1567253ab058.png','winzer-b8394298646a.png','bataboom-d631625fd38d.png', 'finzer-e70a7190e8c0.png','fish-d2685245d8ba.png','kinzer-228e5aea96c5.png','linz-1567253ab058.png','winzer-b8394298646a.png','bataboom-d631625fd38d.png', 'finzer-e70a7190e8c0.png','fish-d2685245d8ba.png','kinzer-228e5aea96c5.png','linz-1567253ab058.png','winzer-b8394298646a.png','bataboom-d631625fd38d.png', 'finzer-e70a7190e8c0.png','fish-d2685245d8ba.png','kinzer-228e5aea96c5.png','linz-1567253ab058.png','winzer-b8394298646a.png','bataboom-d631625fd38d.png', 'finzer-e70a7190e8c0.png','fish-d2685245d8ba.png','kinzer-228e5aea96c5.png','linz-1567253ab058.png','winzer-b8394298646a.png');
        $uza = array('bataboom','BookieKiller','Juche','Milton Mayer', 'Carl Jung', 'Nietzsche', 'Stefan Zweig', 'Frank Furedi', 'Rudyard Kipling');
         
$count = count($readBets);

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
        <img class="pfp" src="https://bataboom.bet/tmp/<?php echo $avaz[$i];?>">
        <!-- OSB NAME -->
        <div class="OSB-name" id="proftext"><?php echo strtoupper($uza[$i]);?></div>
        <!-- OSB LOCATION -->
        <div class=" OSB-summary mx-auto" id="proftext2">Avid Sports fan and Developer from Mars</div>
        <!-- OSB DESCRIPTION -->
        <p class="OSB-record mx-auto" id="proftext3">104 Wins - 76 Losses - 5 Draws </p>
        <!-- OSB ICONS -->
        <div class="betslip mx-auto">
          <div class="list-view">
                 <i class="fa-duotone <?php echo $clazz;?> fa-<?php echo $icon;?> fa-2x <?php echo $spin;?>" alt="<?php echo $sports[$i];?>"></i>

            <div id="bet-money"> <i class="fa-solid fa-dollar" style="color: lime; padding-bottom: 10px;"></i> <?php echo $readBets[$i]['amount'];?></div>

            <div id="bet-pick"><i class="fa-solid fa-bolt" style="color: #ccef34;"></i> <?php echo $readBets[$i]['option'] ." ". $readBets[$i]['ratio'];?> (+185)</div>

            <div id="bet-time"> <i class="fa-solid fa-clock" style="color: white;"></i> <?php echo date("jS F, Y", strtotime($readBets[$i]['start']));?></div>
            <div id="#uid" style="display: none;"><?php echo $_SESSION['uid'];?></div>
            <div id="#betid-<?php echo $i;?>" style="display: none;"><?php echo $gameid[$i];?></div>
            <button onClick="firePost(<?php echo $i;?>);" class="button icon is-large is-warning is-clickable"> <i class="fa-solid fa-fire-flame-curved fa-beat" id="fire"></i></button>
            <button onClick="retweetPost(<?php echo $i;?>)" class="button icon is-large is-dark is-clickable" id="#repost"><i class="fa-solid fa-retweet fa-beat" style="color: #18ec94;"></i></button>
              <button onClick="slide(<?php echo $i;?>);" class="button icon is-large is-link is-clickable"><i class="fa-solid fa-plus fa-beat" style="color: lightblue;"></i></button>
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

 
    <?php } ?>

                </div>
            </div>
        </div>
    
    

 <script type="text/javascript">

    for (let i = 0; i < <?php echo $cntBetz;?>; ++i) {
    function slide(i) {
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

    </script>
  
<script src="assets/fresh/js/custom.js"></script>
 <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
   
</body>

</html>
