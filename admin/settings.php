
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
    <link rel="stylesheet" type="text/css" href="bulma/node_modules/bulma-quickview-master/dist/css/bulma-quickview.min.css">
    <link rel="stylesheet" type="text/css" href="bulma/node_modules/bulma-accordion-master/dist/css/bulma-accordion.min.css">
     <link rel="stylesheet" type="text/css" href="css/bulma-divider.min.css">
</head>

<body>
<?php require_once 'includes/admin_config.php'; ?>

<div class="column is-12">
    <div class="column">
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
</div>
<div class="columns is-centered">
                    <div class="column is-3">

                            <div id="quickviewDefault" class="quickview">
  <header class="quickview-header">
    <p class="title">Update Winners1</p>
    <span class="delete" data-dismiss="quickview"></span>
  </header>

  <div class="quickview-body">
    <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?></div>
    <div class="quickview-block">
     <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?>
    </div></div>
    <button class="button is-primary" data-show="quickview" data-target="quickviewDefault">Show quickview</button>
    
    <div id="quickviewDefaultTwo" class="quickview">
  <header class="quickview-header">
    <p class="title">Update Losers2</p>
    <span class="delete" data-dismiss="quickview"></span>
  </header>

  <div class="quickview-body">
    <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?></div>
    <div class="quickview-block">
     <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?>
    </div>
  

  <footer class="quickview-footer">

  </footer>

</div>

<button class="button is-primary" data-show="quickview" data-target="quickviewDefaultTwo">Show quickview2</button>
</div>

  <div class="is-divider-vertical" data-content="OR"></div>
 <div class="column is-3">
        <div id="quickviewDefaultThree" class="quickview">
  <header class="quickview-header">
    <p class="title">Update Losers3</p>
    <span class="delete" data-dismiss="quickview"></span>
  </header>

  <div class="quickview-body">
    <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?></div>
    <div class="quickview-block">
     <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?>
    </div>
  

  <footer class="quickview-footer">

  </footer>

</div>

<button class="button is-primary" data-show="quickview" data-target="quickviewDefaultThree">Show quickview3</button>

        <div id="quickviewDefaultFour" class="quickview">
  <header class="quickview-header">
    <p class="title">Update Losers4</p>
    <span class="delete" data-dismiss="quickview"></span>
  </header>

  <div class="quickview-body">
    <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?></div>
    <div class="quickview-block">
     <?php 
    $bytes = random_bytes(6);
    $gg = bin2hex($bytes);


echo $gg;
?>
    </div>
  

  <footer class="quickview-footer">

  </footer>

</div>

<button class="button is-primary" data-show="quickview" data-target="quickviewDefaultFour">Show quickview4</button>
<script type="text/javascript" src="https://opensports.bet/admin/bulma/node_modules/bulma-quickview-master/dist/js/bulma-quickview.js"></script>
<script type="text/javascript">
bulmaQuickview.attach();
</script>
</div></div>
<div class="column">
    <section class="accordions">

  <article class="accordion is-active">
    <div class="accordion-header toggle">
      <p>Invoice Log</p>
    </div>
    <div class="accordion-body">
      <div class="accordion-content">
           <div class="table-container">
   <table class="table is-fullwidth is-striped">
   <thead>
    <tr>
      <th scope="col">Invoice#</th>
      <th scope="col">Username</th>
      <th scope="col">Amount</th>
      <th scope="col">Expires (EST)</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
           <?php
    $readInvoices = readInvoicess();
    $end = count($readInvoices);
    for ($i = 0; $i < $end; ++$i){ ?>
    <tr>
   <?php echo "<td>".$readInvoices[$i]['id']."</td>";?>
      <?php echo "<td>".$readInvoices[$i]['username']."</td>";?>
    <?php echo "<td>".$readInvoices[$i]['amount']."</td>";?>
     <?php echo "<td>".$readInvoices[$i]['expires']."</td>";?>
    <?php echo "<td>".$readInvoices[$i]['status']."</td>";?>
    <?php echo "<td><a href=" . "edit_payment.php?id=$readInvoices[$i]['id']" . "><ion-icon name='create-outline'></ion-icon>
</span></a></td>";?>
    </tr>
   
  <?php };?>
  </tbody>
</table>

</div>

</div>
      </div>

   
  </article>
  <article class="accordion">
    <div class="accordion-header toggle">
      <p>Hello World</p>
      <button class="toggle" aria-label="toggle"></button>
    </div>
    <div class="accordion-body">
      <div class="accordion-content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </div>
  </article>
  <article class="accordion">
    <div class="accordion-header toggle">
      <p>Hello World</p>
      <button class="toggle" aria-label="toggle"></button>
    </div>
    <div class="accordion-body">
      <div class="accordion-content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </div>
  </article>
</section>
  <script type="text/javascript" src="https://opensports.bet/admin/bulma/node_modules/bulma-accordion-master/dist/js/bulma-accordion.js"></script>
<script type="text/javascript">
bulmaAccordion.attach();
</script>              

                                    </div>
                                    <div class="columns">
  <div class="column">Column 1</div>
  <div class="is-divider-vertical" data-content="OR"></div>
  <div class="column">
    Column 2 <br/>
    Note: divider stretches to parent's height.
  </div>
</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="https://opensports.bet/admin/bulma/node_modules/bulma-quickview-master/dist/js/bulma-quickview.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>