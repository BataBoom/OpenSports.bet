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
                   
$slipID = $_REQUEST['id'];
$formatSlip = readW("id", "$slipID", "custommatches", "100");
$id = $formatSlip[0]['id'];
$awayOdds = $formatSlip[0]['awayOdds'];
$awayTM = $formatSlip[0]['awayTM'];
$homeOdds = $formatSlip[0]['homeOdds'];
$homeTM = $formatSlip[0]['homeTM'];
$sport = $formatSlip[0]['sport'];
$start = $formatSlip[0]['start'];
$winner = $formatSlip[0]['winner'];


?>
<section class="section">
     <h1 class="title"><?php echo "Edit " . $id;?></h1>
       <h2 class="subtitle">All Fields are Editable</h2>
       <?php if (isset($_SESSION['edit_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['edit_success']; unset($_SESSION['edit_success']);?></strong>
</div>
<?php } ?>
      
         <form  action="forms/updateCustomBet.php" method="post">
        <div class="field">
              <label class="label">BetID</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" name="id" type="id" value="<?php echo $slipID;?>" readonly>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Away</label>
  <p class="control has-icons-left">
    <input class="input" type="username" name="awayO" value="<?php echo $awayOdds;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
   <p class="control has-icons-left">
    <input class="input" type="username" name="awayTM" value="<?php echo $awayTM;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Home</label>
  <p class="control has-icons-left">
    <input class="input" type="username" name="homeO" value="<?php echo $homeOdds;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
   <p class="control has-icons-left">
    <input class="input" type="username" name="homeTM" value="<?php echo $homeTM;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
  <div class="select is-info">
  <select name="sport">
    <option><?php echo $sport;?></option>
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
              <label class="label">Bet Start</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="id" name="start" value="<?php echo $start;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>

  <div class="field">
              <label class="label">Winner</label>
  <p class="control has-icons-left has-icons-right">
   
    <div class="select is-info">
  <select name="winner">
    <option name="winner">NA</option>
    <option name="winner"><?php echo $awayTM;?></option>
    <option name="winner"><?php echo $homeTM;?></option>
    <option name="winner">DRAW</option>
  </select>
</div>
  </p>
</div>

<div class="field">
  <p class="control">
    <button class="button is-success">
      Update
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