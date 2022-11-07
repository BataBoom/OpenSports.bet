
<?php
$time_start = microtime(true);
error_reporting(1);
ini_set('display_errors', 1);
/*
include_once 'phpformbuilder/phpformbuilder/Form.php';

include_once 'ncaafOdds.php';
include_once('espnNCAA.php');
include_once('combinencaa.php');

require '../../init.php';

\IPS\Session\Front::i();

$member = \IPS\Member::loggedIn();

$uid = $member->member_id;
$user_id = $member->name;
*/
$user_id ='C4';
$uid = 2;
$where = array('week'=>$weeknum, 'user_id'=>$uid);
$framework = 'bs4';
$dbhost = 'localhost';
$dbname = 'bookie';
$dbuser = 'bookie';
$dbpass = 'NAA1lLOFlel1lbej';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/*
$email = $member->email;
$memberID = $member->mgroup_others;
$groupID = $member->groups;


    if(!($groupID[0] == '3' || $groupID[0] == '4')) {
    header('Location: https://nobuff.zone/bet/picks/locked.php'); 
}
*/

?>
<html>
  <head>

 <!-- CSS only -->
   <link rel="stylesheet" href="https://nobuff.zone/bet/test/style003.css">
<link href="https://bootswatch.com/5/superhero/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://bootswatch.com/5/superhero/bootstrap.css" rel="stylesheet" crossorigin="anonymous">

    <title>NBZ $urvivor</title>
    <style> 
    #Higlights {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
  display: none;
}
   #ScoresInfo {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: yellow;
  margin-top: 20px;
  display: none;
}
   #BonusInfo {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: red;
  margin-top: 20px;
  display: none;
}
   .wrapper {
  margin: 0 auto;
  width: 90%;
}

.cards {
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards li {
  background-color: #20374c;
  color: #fff;
  flex: 1 1 200px;
}

.cards h2 {
  background-color: #314659;
  margin: 0;
  padding: 5px;
}

.cards p {
  padding: 5px;
  line-height: 0px;
  font: 300 1em/1 "Oswald", sans-serif;
}
.cards p2 {
  font: 400 1.2em/1 "Oswald", sans-serif;
  background-color: #000;
  margin: 0;
  padding: 5px;
}

.flex {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -10px;
}

.flex li {
  flex: 1 1 200px;
  margin: 10px;
}

.grid {
  display: grid;
  grid-template-columns: repeat(4,1fr);
  /*grid-template-columns: repeat(auto-fill, minmax(200px 1fr));*/
  grid-gap: 20px;
}

  img {
 width: 20%;

 opacity: 1.0;

}

img:hover {
    width: 30%;
  opacity: 1.0;
 -webkit-filter: grayscale(100%);

}



a  {
    color: #a8fffb;
    text-decoration: underline;     
    text-decoration-color: yellow;
}
a:hover  {
    color:#a8acff;
    text-decoration: underline;     
    text-decoration-color: #a8fffb;
}
   
   #selection.form-control {
  
  height: 80%;
  background-color: #1e1e1e;
  border: 6px solid transparent;
  border-color: #00bc8c;
  color: white;
    text-align: center;
      font-size: 24px;
  font-weight: bold;
  letter-spacing: 3px;
}

/* Animate Background Image */

@-webkit-keyframes aitf {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
}


</style>
<script src="https://kit.fontawesome.com/8861fe9653.js" crossorigin="anonymous"></script>
  </head>
 

  <body>

  <!-- Tabs navs -->
    <ul class="nav nav-tabs">
 <li class="nav-item">
    <a class="nav-link"><span style="color:#e3ff48">Welcome Back <?php echo $user_id;?></span><a>
  </li>
 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars">&nbsp; Menu</a></i>
         
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://nobuff.zone/bet/picks/survivor.php" target="new_window"><i class="fas fa-crosshairs">&nbsp; NBZ $urivor</a></i>
            <a class="dropdown-item" href="https://nobuff.zone/bet/picks/pickem.php" target="new_window"><i class="fas fa-football-ball">&nbsp; NFL Pick'em</a></i>
            <a class="dropdown-item" href="https://nobuff.zone/bet/picks/index.php" target="new_window"><i class="fas fa-baseball-ball">&nbsp; MLB Picks</a></i>
            <a class="dropdown-item" href="https://nobuff.zone/bet/picks/ufc.php" target="new_window"><i class="far fa-hand-rock">&nbsp;UFC Picks</a></i>
             <a class="dropdown-item" href="https://nobuff.zone/" target="new_window"><i class="far fa-comments" aria-hidden="true">
&nbsp; Forum</a></i>
            <a class="dropdown-item" href="https://sportsaccess.se/player" target="new_window"><i class="fas fa-tv" aria-hidden="true">
&nbsp; Streams</a></i>

            <div class="dropdown-divider"></div>
            <p class="dropdown-item">More Coming Soon</p>
         <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="https://nobuff.zone/bet/picks/nba.php" target="new_window"><i class="fas fa-basketball-ball">&nbsp; NBA Picks</a></i>

        <a class="dropdown-item" href="https://nobuff.zone/bet/picks/ncaapage.php" target="new_window"><i class="fas fa-football-ball">&nbsp; NCAA Picks</a></i>
        <a class="dropdown-item" href="https://nobuff.zone/bet/picks/pprpage.php" target="new_window"><i class="fas fa-running">&nbsp; Player Pass+Recieve Picks</a></i>
        <a class="dropdown-item" href="https://nobuff.zone/bet/picks/f5ml.php" target="new_window"><i class="fas fa-baseball-ball">&nbsp; MLB Props</a></i>
        <a class="dropdown-item" href="https://nobuff.zone/bet/picks/vid.php" target="new_window"><i class="fas fa-film">&nbsp; Page</a></i>
   
  </div>
      
      </li>
   <li class="nav-item">
     <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle $urvivor Picks Menu</button>
  </li>
   
      <li class="nav-item">
   <button onclick="myFunction()" class="btn btn-info">Toggle Higlights</button>
  </li>
      <li class="nav-item">
   <button onclick="myFunction2()" class="btn btn-secondary">Toggle Scores</button>
  </li>
    <li class="nav-item">
   <button onclick="myFunction3()" class="btn btn-success">Bonus Wagers</button>
  </li>


</ul>

<div id="Higlights">
  This is Highlights
  <?php
echo "yellow";
  ?>
</div>
<div id="ScoresInfo">
  This is the Scores
</div>
<div id="BonusInfo">
  This is Live odds
</div>
<div class="wrapper">
<div class="row">
  <div class="col">

    <div class="collapse multi-collapse" id="multiCollapseExample1">
<center>

  <div class="bcell" data-title="Game">
    

</div>
     
      </center>
    </div>
  </div>
 
  <div class="col">

    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <?php echo $msg; ?>
        <center>
         <p class="bg-info text-dark">Status: <b><?php echo $UserStatus[$endStatus]['Status'];?> | <b><?php echo $alive;?></b> Dead | <b><?php echo $dead;?> Alive | </p>
       <p class="bg-primary text-white">Your Selection Week <?php echo $weeknum;?>: <b><i><?php echo $CurrentPick; ?></p></b></i></b></b></b></b>
              
              
                <p class="bg-warning text-black"><b>Your Previous Selections: </b><i><?php for ($win = 0; $win < $endOldPicks; ++$win) { echo "<br>".$reverseOldy[$win]; } ?></p></i>
        
                   <p class="bg-dark text-white"><b>Last Weeks Biggest Loser: </b>
                     <?php echo '<br><b>'.$losers['loser'].'<br></b> Claimed: '.'<i>'.$losers['claimed'];   ?>
                    </p>
            </center>
      </div>
    </div>
  </div>
</div>
</center>
<br>
<br>


<ul class="grid cards">

<?php for($i=0; $i < 20; ++$i){ ?>
  <center><li><h2>
 
    <img src="<?php echo $homeLogo[$i]; ?>">
   <img src="<?php  echo $awayLogo[$i]; ?>"></h2>

  <p class="bg-success"><?php echo $start[$i];?></p>
 
  <p class="list-group-item list-group-item-action"><?php echo $venueLoc[$i]; ?>
                <?php echo $line;?><?php echo ",";?>
                <?php echo $venueState[$i]; ?>
                 |
                Venue: <?php echo $venue[$i];?>
                <?php echo $line;?>
                |
                Capacity: <?php echo $fans[$i];?>
                <?php echo $line;?>
                |
                Weather: <?php echo $weather[$i];?></p>

   <p class="bg-dark text-white">Depth Chart:
             <a href="https://www.espn.com/college-football/team/roster/_/id/<?php echo "$awayID[$i]"; ?>" target="new_window"><?php echo $away[$i];?> </a>
             <?php echo "/";?>
            <a href="https://www.espn.com/college-football/team/roster/_/id/<?php echo "$homeID[$i]"; ?>" target="new_window"><?php echo $home[$i];?> </a>
             <br>

         </p>
          <p class="bg-danger">Stats:
             <a href="https://www.espn.com/college-football/team/stats/_/id/<?php echo "$awayID[$i]"; ?>" target="new_window"><?php echo $away[$i];?> </a>
             <?php echo "/";?>
                <a href="https://www.espn.com/college-football/team/stats/_/id/<?php echo "$homeID[$i]"; ?>" target="new_window"><?php echo $home[$i];?> </a></p>


     <p class="bg-secondary"><?php print_r($chunk[$i][0]['betName'].': '.$chunk[$i][0]['betPrice']);
     echo "<br>";
     print_r($chunk[$i][1]['betName'].': '.$chunk[$i][1]['betPrice']);
     echo "<br>";
     print_r($chunk[$i][2]['betName'].': '.$chunk[$i][2]['betPrice']);
     echo "<br>";
     print_r($chunk[$i][3]['betName'].': '.$chunk[$i][3]['betPrice']);
     echo "<br>";
     print_r($chunk[$i][4]['betName'].': '.$chunk[$i][4]['betPrice']);
   
   ?></p>
         


</li>
</center>
<?php } ?>

</ul>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://nobuff.zone/bet/test/script10.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("Higlights");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction2() {
  var x = document.getElementById("ScoresInfo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction3() {
  var x = document.getElementById("BonusInfo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
  <?php
    
  

  
   
    $time_end = microtime(true);
  $execution_time = ($time_end - $time_start)/60; 

echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
   

    ?>

  </body>
</html>

