
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
<?php require_once 'includes/admin_config.php'; ?>
<div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hello, Admin.
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
    $readCustomBets = readW("winner", "NA", "custommatches", "100");
    $end = count($readCustomBets);
    $betID = array_column($readCustomBets, 'id');
    $awayTM = array_column($readCustomBets, 'awayTM');
    $homeTM = array_column($readCustomBets, 'homeTM');

    ?>
                    <h1 class="title"><?php echo $end . " Open Custom Bets";?></h1>
       <h2 class="subtitle">Update Custom Match Results</h2>
   </div>
               <div class="column">
                    <div class="table-container">
  <table class="table">
   <thead>
    <tr>
      <th scope="col">GameID</th>
      <th scope="col">Sport</th>
      <th scope="col">Start</th>
      <th scope="col">Game</th>
      <th scope="col">Winner</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
     <?php for ($i = 0; $i < $end; ++$i){ ?>
    <tr>
     <?php echo "<td>".$readCustomBets[$i]['id']."</td>";?>
     <?php echo "<td>".$readCustomBets[$i]['sport']."</td>";?>
     <?php echo "<td>".$readCustomBets[$i]['start']."</td>";?>
     <?php echo "<td>".$awayTM[$i]." @ ".$homeTM[$i]."</td>";?>
      <?php echo "<td>".$readCustomBets[$i]['winner']."</td>";?>
     <?php echo "<td><a href=" . "edit_bet.php?id=$betID[$i]" . "><ion-icon  name='create'></span></a></ion-icon></td>";?>
    </tr>
   
  <?php };?>
  </tbody>
</table>
</div></div>
<div class="column">
<nav class="pagination" role="navigation" aria-label="pagination">
  <a class="pagination-previous is-disabled" title="This is the first page">Previous</a>
  <a class="pagination-next">Next page</a>
  <ul class="pagination-list">
    <li>
      <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 2">2</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 3">3</a>
    </li>
     <li>
      <a class="pagination-link" aria-label="Goto page 4">4</a>
    </li>
     <li>
      <a class="pagination-link" aria-label="Goto page 5">5</a>
    </li>
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