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
                <?php
                   
$prefixG = 'OSB-Custom-';
$gid = uniqid($prefixG);
              
?>
<section class="section">
  
     <h1 class="title">Create Bet</h1>
       <h2 class="subtitle"><i>iMAGiNATiON</i></h2>
       <h4 class="subtitle">Don't include "+" only "-" when creating odds</h4>
       <?php if (isset($_SESSION['edit_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['edit_success']; unset($_SESSION['edit_success']);?></strong>
</div>
<?php } ?>
      
         <form  action="forms/createBet.php" method="post">
        <div class="field">
              <label class="label">GameID</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="gameid" type="text" value="<?php echo $gid;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Away Team</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="awayTM">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Home Team</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="homeTM">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Away Odds</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="awayO" placeholder="180">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Home Odds</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="homeO" placeholder="-190">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>

<div class="field">
  <div class="select is-info">
  <select name="sport">
    <option>Select Sport</option>
    <option>Boxing</option>
    <option>NBA</option>
    <option>NHL</option>
    <option>NFL</option>
    <option>UFC</option>
    <option>NCAAB</option>
    <option>NCAAF</option>
    <option>E-Sports</option>
    <option>Custom</option>
  </select>
</div>
</div>
<div class="field">
      <label class="label">Start</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="start" placeholder="YYYY-MM-DD">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control">
    <button class="button is-success">
      Create Bet
    </button>
  </p>
</div>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>