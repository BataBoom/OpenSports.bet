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
                   
                $gid = $_REQUEST['gameid'];
                $readMatch = fetchGID("$gid");
                $winner = $readMatch[0]["winner"];
                $sport = $readMatch[0]["sport"];
                $start = $readMatch[0]["start"];
?>
<section class="section">
  
     <h1 class="title">Edit <?php echo $gid;?></h1>
       <h2 class="subtitle">Winner & Sport is editable</h2>
       <?php if (isset($_SESSION['edit_success'])){ ?>
       <div class="notification is-primary">
  <button class="delete"></button>
   <strong><?php echo $_SESSION['edit_success']; unset($_SESSION['edit_success']);?></strong>
</div>
<?php } ?>
      
         <form  action="forms/updateScore.php" method="post">
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
      <label class="label">Sport</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="sport" value="<?php echo $sport;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Start</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="start" value="<?php echo $start;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
      <label class="label">Winner</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="winner" value="<?php echo $winner;?>">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control">
    <button class="button is-success">
      Edit Winner
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