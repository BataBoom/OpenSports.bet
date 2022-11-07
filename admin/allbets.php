
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
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/bulma-checkradio.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>  

</head>

<body>
<?php require_once 'includes/admin_config.php'; ?>
<div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hello, BataBoom.
                            </h1>
                            <h2 class="subtitle">
                                I hope you are having a great day!
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
    $readTodaysBets = listOpenBets();
    $end = count($readTodaysBets);
    $betID = array_column($readTodaysBets, 'id');
    $totalPages = round($end / 30) + 1;
    ?>
                    <h1 class="title"><?php echo $end . " Open Bets";?></h1>
       <h2 class="subtitle">Amount, Odds & Status is Editable</h2>
                 <div class="field">
  <input class="is-checkradio is-medium" id="exampleCheckboxMedium" type="checkbox" name="exampleCheckboxMedium" checked="checked">
  <label for="exampleCheckboxMedium">Checkbox - medium</label>
</div>
   </div>
               <div class="column">

                    <div class="table-container">
  <table class="table">
   <thead>
    <tr>
      <th scope="col">Bet#</th>
      <th scope="col">Username</th>
      <th scope="col">GameID</th>
      <th scope="col">Option</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
     <?php   


        if ($page === '1'){
                $pageClass[0] = "pagination-link is-current";
                $pageClass[1] = "pagination-link";
                $checkBox = '<input type="checkbox" class="is-checkradio" id="exampleCheckboxNormal" type="checkbox" name="exampleCheckboxNormal"></input>';

     for ($i = 0; $i < 30; ++$i){ 
    echo "<tr>";
    
    echo "<td>".$readTodaysBets[$i]['id']."</td>";
    echo "<td>".$readTodaysBets[$i]['username']."</td>";
    echo "<td>".$readTodaysBets[$i]['gameid']."</td>";
    echo "<td>".$readTodaysBets[$i]['option']."</td>";
    echo "<td>".$readTodaysBets[$i]['amount']."</td>";
    echo "<td>".$readTodaysBets[$i]['win_status']."</td>";
    /* echo "<td><a href=" . "edit_bet.php?id=$betID[$i]" . "><ion-icon name='create-outline'></ion-icon>
</span></a></td>";*/
 //echo "<td><input type"."=checkbox" . " class=" . "s-checkradio is-medium" . " id="."exampleCheckboxMedium"." name="."exampleCheckboxMedium"."></input></td>";
  ?>
  <td>
            <div class="field">
  <input class="is-checkradio has-background-color is-info" id="<?php echo $i;?>" type="checkbox" name="<?php echo $i;?>" checked="unchecked">
  <label for="<?php echo $i;?>"></label>
</div>
</td>
<?php }
    } elseif($page === '2'){
        
        $pageClass[0] = "pagination-link";
        $pageClass[1] = "pagination-link is-current";
        for ($i = 30; $i < 60; ++$i){ 
    echo "<tr>";
    echo "<td>".$readTodaysBets[$i]['id']."</td>";
    echo "<td>".$readTodaysBets[$i]['username']."</td>";
    echo "<td>".$readTodaysBets[$i]['gameid']."</td>";
    echo "<td>".$readTodaysBets[$i]['option']."</td>";
    echo "<td>".$readTodaysBets[$i]['amount']."</td>";
    echo "<td>".$readTodaysBets[$i]['win_status']."</td>";
    echo "<td><a href=" . "edit_bet.php?id=$betID[$i]" . "><ion-icon name='create-outline'></ion-icon>
</span></a></td>";
 echo "<td><input type='checkbox'><a href=" . "edit_bet.php?id=$betID[$i]" . "></a></input></td>";
    echo "</tr>";
}
} elseif($page === '3'){
        
        $pageClass[0] = "pagination-link";
        $pageClass[1] = "pagination-link is-current";
        for ($i = 60; $i < $end; ++$i){ 
    echo "<tr>";
    echo "<td>".$readTodaysBets[$i]['id']."</td>";
    echo "<td>".$readTodaysBets[$i]['username']."</td>";
    echo "<td>".$readTodaysBets[$i]['gameid']."</td>";
    echo "<td>".$readTodaysBets[$i]['option']."</td>";
    echo "<td>".$readTodaysBets[$i]['amount']."</td>"; 
    echo "<td>".$readTodaysBets[$i]['win_status']."</td>";
    echo "<td><a href=" . "edit_bet.php?id=$betID[$i]" . "><ion-icon name='create-outline'></ion-icon>
</span></a></td>";
 echo "<td><input type='checkbox'><a href=" . "edit_bet.php?id=$betID[$i]" . "></a></input></td>";
    echo "</tr>";
}
}

            ?>

  
   
  
  </tbody>
</table>
</div></div>
<div class="column">

<nav class="pagination" role="navigation" aria-label="pagination">
  <a class="pagination-previous" href="<?php echo "$script"."?page="."$prevPage";?>"> Previous page</a>
  <a class="pagination-next" href="<?php echo "$script"."?page="."$nextPage";?>"> Next page</a>
  <ul class="pagination-list">
    <?php for ($i = 1; $i < 5; ++$i){ ?>
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