
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

</head>

<body>
<?php require __DIR__ . '/includes/admin_config.php'; ?>
<div class="column is-9">
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
                       <div class="column">
                   
                    <h1 class="title">API Keys</h1>
       <h2 class="subtitle">Manage Captcha, Micro Services, Odds Data, Scores, and More!</h2>
   </div>
   <?php if (isset($_SESSION['api_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['api_success']; unset($_SESSION['api_success']);?></strong>
</div>
<?php } ?>
               <div class="column">
                <div class="field">
                    <h2 class="subtitle is-2">Captcha</h2>
                    <form  action="saveAPI.php" method="post">
        <label class="label">H-Captcha</label>
    <input class="input is-rounded is-info is-normal" name="hcaptcha" type="text" placeholder="Your Site Key">
    <label class="label">Other Captcha</label>
    <input class="input is-rounded is-info is-normal" name="other" type="text" placeholder="">

            </div>
            <div class="field">
             <h2 class="subtitle is-2">M3O.com</h2>
        <label class="label">DB Key</label>
    <input class="input is-rounded is-info is-normal" name="m3odb" type="text" placeholder="Rounded input">
    <label class="label">User Key</label>
    <input class="input is-rounded is-info is-normal" name="m3ouser" type="text" placeholder="Rounded input">
            </div>
            <div class="field">
                <h2 class="subtitle is-2">DataFeeds.net</h2>
        <label class="label">OddsData Key</label>
    <input class="input is-rounded is-info is-normal" name="oddsdata" type="text" placeholder="Rounded input">
            </div>
            <div class="field">
                <h2 class="subtitle is-2">Payment Gateway</h2>
        <label class="label">Cryptonator Key</label>
    <input class="input is-rounded is-info is-normal" name="paymentKey" type="text" placeholder="Rounded input">
             <label class="label">Cryptonator Secret</label>
    <input class="input is-rounded is-info is-normal" name="paymentShh" type="text" placeholder="Rounded input">
            </div>
            <div class="field">
                <h2 class="subtitle is-2">Webhook.site</h2>
        <label class="label">Key</label>
    <input class="input is-rounded is-info is-normal" name="hookKey" type="text" placeholder="Rounded input">
             <label class="label">Secret</label>
    <input class="input is-rounded is-info is-normal" name="hookShh" type="text" placeholder="Rounded input">
            </div>
                    <input class="button is-success is-focused" type="submit" value="Save">
</form>
<form  action="goUFC.php" method="post">
             <div class="field">
                <h2 class="subtitle is-2">UFC Grader</h2>
        <label class="label">Insert Sherdog Event Results URL</label>
    <input class="input is-rounded is-info is-normal" name="sherdog" type="text" placeholder="https://www.sherdog.com/events/UFC-271-Adesanya-vs-Whittaker-2-90742">
             
            </div>
        <input class="button is-success is-focused" type="submit" value="Grade UFC">
</form>
               





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
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>