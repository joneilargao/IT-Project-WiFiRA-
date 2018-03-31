<!-- /. NAV TOP  -->
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
  </head>
    
  <nav class="navbar navbar-default navbar-cls-top " id=topnav role="navigation" style="margin-bottom: 0; position: sticky; width: 100%; top: 0; z-index:2;  background-color: #686667;">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style ="font-family:life savers; background-color: #686667;">WiFiRA WISP
      </a>
    </div>
    <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px; font-family:pangolin;">
      <?php 
        echo "Welcome, " . $_SESSION['userAccount']->getUsername() . "!";
      ?>
      <div class="w3-bar" style="font-size:12px";>
          <?php echo date("F d, Y"); ?>
          <a href="logout.php" onclick="return confirm('Are you sure you want to log out?');"><button class="btn btn-danger btn-xs" style="float: right;">Logout</button>
          </a>
      </div>
    </div>
  </nav> 

</html>
<style>a.navbar-brand:hover {
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine 2s infinite;
}

@-webkit-keyframes shine {
  from {
    -webkit-mask-position: 150%;
  }
  
  to {
    -webkit-mask-position: -50%;
  }
}

</style>