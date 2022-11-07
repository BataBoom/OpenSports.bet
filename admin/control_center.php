
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Open Bet Administrator - API Settings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="bulma/node_modules/bulma-quickview-master/dist/css/bulma-quickview.min.css">
    <link rel="stylesheet" type="text/css" href="bulma/node_modules/bulma-accordion-master/dist/css/bulma-accordion.min.css">
     <link rel="stylesheet" type="text/css" href="css/bulma-divider.min.css">
      <style type="text/css">
        #tab-content p {
  display: none;
}

#tab-content p.is-active {
  display: block;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>
<?php require __DIR__ . '/includes/admin_config.php'; ?>
<div class="column is-12">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h6 class="title">
                                BATABOOM 
                            </h6>
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
            
            <div class="columns is-centered">
                <div class="column">
                    <div class="card">
  <div class="card-content">
    <p class="title">
      “There are two hard things in computer science: cache invalidation, naming things, and off-by-one errors.”
    </p>
    <p class="subtitle">
      Jeff Atwood
    </p>
  </div>
  <footer class="card-footer">
    <p class="card-footer-item">
      <span>
        View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a>
      </span>
    </p>
    <p class="card-footer-item">
      <span>
        Share on <a href="#">Facebook</a>
      </span>
    </p>
  </footer>
</div>
</div>
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

   <?php if (isset($_SESSION['api_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['api_success']; unset($_SESSION['api_success']);?></strong>
</div>
<?php } ?>
               <div class="column">
                <div class="field">
                    <h2 class="subtitle is-2">Bet Settings</h2>
                    <form  action="saveBet.php" method="post">
        <label class="label">Min Bet</label>
    <input class="input is-rounded is-info is-normal" name="min-bet" type="text" placeholder="5">
    <label class="label">Max Bet</label>
    <input class="input is-rounded is-info is-normal" name="max-bet" type="text" placeholder="500">

            </div>
             <input class="button is-success is-focused" type="submit" value="Update">
        </form>
  </div></div></div>


<?php
/*
   <div class="column">
        <div class="card">
  <footer class="card-footer">
    <a href="#" class="card-footer-item">Save</a>
    <a href="#" class="card-footer-item">Edit</a>
    <a href="#" class="card-footer-item">Delete</a>
  </footer>
</div>
*/  ?>

               <div class="column is-12">
                    <div class="tabs is-toggle is-fullwidth" id="tabs">
  <ul>
    <li class="is-active" data-tab="1">
      <a>
        <span class="icon is-small"><i class="fa fa-image"></i></span>
        <span>Pictures</span>
      </a>
    </li>
    <li data-tab="2">
      <a>
        <span class="icon is-small"><i class="fa fa-music"></i></span>
        <span>Music</span>
      </a>
    </li>
    <li data-tab="3">
      <a>
        <span class="icon is-small"><i class="fa fa-film"></i></span>
        <span>Videos</span>
      </a>
    </li>
    <li data-tab="4">
      <a>
        <span class="icon is-small"><i class="fa fa-file-text-o"></i></span>
        <span>Documents</span>
      </a>
    </li>
  </ul>
</div>
<div id="tab-content">
  <p class="is-active" data-content="1">
    Pictures
  </p>
  <p data-content="2">
    Music
  </p>
  <p data-content="3">
    Videos
  </p>
  <p data-content="4">
    Documents
  </p>
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
        </div>
    </div>
     <script>
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
  <script>
        $(document).ready(function() {
  $('#tabs li').on('click', function() {
    var tab = $(this).data('tab');

    $('#tabs li').removeClass('is-active');
    $(this).addClass('is-active');

    $('#tab-content p').removeClass('is-active');
    $('p[data-content="' + tab + '"]').addClass('is-active');
  });
});
</script>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>