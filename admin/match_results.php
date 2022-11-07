
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Open Bet Administrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
<?php require_once 'includes/admin_config.php';
/* 
   if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page === '0'){
        unset($page);
        $page = '1';
    } 
    } 
    elseif(!(isset($_GET["page"]))) { 
    $page = '1';
    }

    $pageClass = array(range(0,20));
    $script = $_SERVER['SCRIPT_NAME'];
    $nextPage = $page + 1;
    $prevPage = $page - 1;
*/

?>
<div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Welcome BataBoom
                            </h1>
                            <h2 class="subtitle">
                                Scores Log <?php echo $nextPage;?>
                            </h2>
                        </div>
                    </div>
                </section>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?php countDB("users"); ?></p>
                                <p class="subtitle">Users</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?php countDB("bets"); ?></p>
                                <p class="subtitle">Bets</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?php countNewBets(); ?></p>
                                <p class="subtitle">Open Bets</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title"><?php echo countLoseBets(); ?></p>
                                <p class="subtitle">Bookie Wins</p>
                            </article>
                        </div>
                    </div>
                </section>
                       <div class="column">
                    <?php
    $today = date('Y-m-d');
    $yday = date('Y-m-d', strtotime( $today . " -1 days"));



    $readTodaysScores = readW("start", "$yday", "scores", "1000");
    $end = count($readTodaysScores);
    $totalPages = round($end / 30) + 1;

    $filterLeague = $_REQUEST['selectleague'];
    $fetchBetz = readW("start", "$yday", "scores", "1000");
    $readBetz = array_values(array_filter($fetchBetz, function($var) use ($filterLeague) {
            return ($var['sport'] == $filterLeague);

}));



    ?>
                    <h1 class="title"><?php echo $end . " Matches Yesterday";?></h1>
       
   </div>
    <?php

 if (isset($filterLeague)) {
    unset($readTodaysScores);
    $readTodaysScores = $readBetz;
    //print_r($readBetz);
}

  ?>
  <form action="match_results.php" method="post">
  <div class="select is-primary">
  <select name="selectleague">
    <option>Select League</option>
    <option>NHL</option>
    <option>NBA</option>
    <option>NCAAB</option>
    <option>MLB</option>
    <option>UFC</option>
    <option>MMA</option>
    <option>NCAAF</option>
  </select>


</div>
<button class="button">Select League</button>
</form>
               <div class="column">
                    <div class="table-container">
  <table class="table">
   <thead>
    <tr>
      <th scope="col">Sport</th>
      <th scope="col">Game ID</th>
      <th scope="col">Game</th>
      <th scope="col">Winner</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    
            <?php   


        if ($page === '1'){
                $pageClass[0] = "pagination-link is-current";
                $pageClass[1] = "pagination-link";
     for ($i = 0; $i < 30; ++$i){ 
         echo "<tr>";
    echo "<td>".$readTodaysScores[$i]['sport']."</td>";
    echo "<td>".$readTodaysScores[$i]['gameid']."</td>";
    echo "<td>".$readTodaysScores[$i]["awayTM"] . " vs " . $readTodaysScores[$i]["homeTM"] . "</td>";
    echo "<td>".$readTodaysScores[$i]['winner']."</td>";
    echo "<td>".$readTodaysScores[$i]['start']."</td>";
    echo "<td><a href=" . "edit_bet.php?id=$betID[$i]" . "><ion-icon name='create'></ion-icon>
</span></a></td>";

 echo "</tr>";
 
    

}

    } elseif($page === '2'){
        
        $pageClass[0] = "pagination-link";
        $pageClass[1] = "pagination-link is-current";
        for ($i = 30; $i < $end; ++$i){ 
            echo "<tr>";
      echo "<td>".$readTodaysScores[$i]['sport']."</td>";
    echo "<td>".$readTodaysScores[$i]['gameid']."</td>";
    echo "<td>".$readTodaysScores[$i]["awayTM"] . " vs " . $readTodaysScores[$i]["homeTM"] . "</td>";
    echo "<td>".$readTodaysScores[$i]['winner']."</td>";
    echo "<td>".$readTodaysScores[$i]['start']."</td>";
    echo "<td><a href=" . "edit_bet.php?id=$betID[$i]" . "><ion-icon name='create'></ion-icon>
</span></a></td>";
    echo "<td><a href=" . "delte_match.php?id=$betID[$i]" . "><ion-icon name='delete'></ion-icon>
</span></a></td>";
 echo "</tr>";
 
}
}

            ?>

  
   
  
  </tbody>
</table>
</div></div>
<div class="column">

  <?php

 if (isset($filterLeague) || isset($filterDate)) {
    unset($readTodaysBets);
    $readTodaysBets = $readBetz;
    //print_r($readBetz);
}

  ?>
  <form action="test.php" method="post">
  <div class="select is-primary">
  <select name="selectleague">
    <option>NHL</option>
    <option>NBA</option>
    <option>NCAAB</option>
    <option>MLB</option>
    <option>UFC</option>
    <option>MMA</option>
    <option>NCAAF</option>
  </select>

   <select name="selectdate">
    <option><?php echo $today;?></option>
    <option><?php echo $yday;?></option>
    <option><?php echo $yday2;?></option>
    <option><?php echo $yday3;?></option>
    <option><?php echo $yday4;?></option>
  </select>

</div>
<button class="button">Select League</button>

<nav class="pagination" role="navigation" aria-label="pagination">
  <a class="pagination-previous" href="<?php echo "$script"."?page="."$prevPage";?>"> Previous page</a>
  <a class="pagination-next" href="<?php echo "$script"."?page="."$nextPage";?>"> Next page</a>
  <ul class="pagination-list">
    <?php for ($i = 1; $i < $totalPages; ++$i){ ?>
    <li>
      <a class="pagination-link" aria-label="Goto page <?php echo $i;?>" href="<?php echo "$script"."?page="."$i";?>"><?php echo $i;?></a>
    </li>
    <?php } ?>
    
  </ul>
</nav>

  


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>