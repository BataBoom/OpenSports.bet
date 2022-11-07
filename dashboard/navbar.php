<head>
<link rel="stylesheet" href="assets/fontawesome/css/solid.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/regular.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/light.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/duotone.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/brands.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="assets/fontawesome/css/all.min.css" crossorigin="anonymous">
<script src="assets/fontawesome/all.js"></script>
<script src="assets/fontawesome/all.min.js"></script>

<link rel="stylesheet" href="css/nav.css">
<style>
  .footy {
    background: url('assets/futbol-regular.svg');
    height: 20px;
    width: 20px;
    display: block;
    margin-right: 5px;
    /* Other styles here */
}
</style>
</head>

 <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
  <div class="container">
    
    <!-- logo or branding image on left side -->
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src="assets/logo_white.png" alt="">
      </a>
      <div class="navbar-burger"  data-target="navbar-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <!-- children of navbar-menu must be navbar-start and/or navbar-end -->
    <div class="navbar-menu" id="navbar-menu">
      <!-- navbar items | left side -->
      <a class="navbar-item"><span style="color:#e3ff48">Welcome <?php echo strtoupper($username);?></span></a>

    <a class="navbar-item" href="../cashier/index.php" target="_blank"><span style="color:#11d448">Balance: <?php echo "$".round($balance, 2);?></span></a>
      <div class="navbar-start">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">Menu</a>
            <div class="navbar-dropdown">
                 <div class="navbar-item"> BOOKiE</div>
              <a class="navbar-item" href="nba.php"><i class="fas fa-basketball-ball">&nbsp; Basketball Picks</i></a>
              <a class="navbar-item" href="ncaab.php"><i class="fas fa-basketball-ball">&nbsp; College Basketball Picks</i></a>
              <a class="navbar-item" href="nhl.php"><i class="fas fa-hockey-puck">&nbsp; Hockey Picks</i></a>
              <a class="navbar-item" href="#"><i class="fas fa-football-ball">&nbsp; Football Picks</i></a>
              <a class="navbar-item" href="ufc.php"><i class="far fa-hand-rock">&nbsp; MMA Picks</i></a>

              <a class="navbar-item" href="epl.php"><span class='footy'>&nbsp;  </span> EPL Picks</a>
              <a class="navbar-item" href="laliga.php"><span class='footy'>&nbsp;  </span> La Liga Picks</a>
              <a class="navbar-item" href="bl.php"><ion-icon name="football"></ion-icon>&nbsp; Bundesliga Picks</a>
              <a class="navbar-item" href="customView.php"><ion-icon name="football"></ion-icon>&nbsp; Custom Matches</a>

              <hr class="navbar-divider">
              <div class="navbar-item"> PROPS</div>
              <a class="navbar-item" href="#"><i class="fas fa-football-ball">&nbsp; NFL Survivor</i></a>
              <a class="navbar-item" href="#"><i class="fas fa-football-ball">&nbsp; NFL Pick'em</i></a>
              <a class="navbar-item" href="#"><i class="fas fa-running">&nbsp; Player Pass+Recieve Picks</i></a>
              <hr class="navbar-divider">
              <a class="navbar-item" href="cashier.php"><i class="fas fa-hand-holding-dollar">&nbsp; Withdrawl</i></a>
              <a class="navbar-item" href="#"><i class="fas fa-chart-column">&nbsp; Stats</i></a>
               <div class="navbar-item"> BATABOOM</div>
            </div>
          </div>

      </div>

      <!-- navbar items | right side -->
      <div class="navbar-end">
        <a class="navbar-item is-active" href="/"> Dashboard</a>
        <a class="navbar-item" href="cashier.php">Cashier</a>
        <a class="navbar-item" href="#">Stats</a>
        <a class="navbar-item" href="#">Profile</a>
        <a class="navbar-item" href="mailto:contact@opensports.bet">Contact</a>
      </div>

    </div>
  </div>
</nav>
<div class="block"></div>


<!-- Bulma Navbar JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {

      // Get all "navbar-burger" elements
      var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
          $el.addEventListener('click', function () {

            // Get the target from the "data-target" attribute
            var target = $el.dataset.target;
            var $target = document.getElementById(target);

            // Toggle the class on both the "navbar-burger" and the "navbar-menu"
            $el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

          });
        });
      }

    });
  </script>
