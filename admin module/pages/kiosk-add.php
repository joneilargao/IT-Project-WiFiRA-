<?php
/**
* kiosk-add.php
*
* New kiosk machines are added
*
* @author Cyrene Dispo
*/
require '../classes/UserAccount.php';
session_start();
$sessionUserAccount = $_SESSION["userAccount"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
    <?php   
include_once 'fragments/connection.php';  
?>
  </head>
  <?php
include 'fragments/head.php';
?>
  <body>
    <?php
//Start your session
if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
echo "You are logged in as, " . $_SESSION['username'] . "!";
} else {
header("location: login.php");
}
function echoActiveClassIfRequestMatches($requestUri){
$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
if ($current_file_name == $requestUri)
echo 'class="active-menu"';
}
?>
    <div id="wrapper">
      <?php include 'fragments/page-head.php'; ?>
      <?php include 'fragments/sidebar-nav.php'; ?>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h1 style = "font-family: Palatino; color:#000000">Add Kiosk
              </h1>
              <?php
$user = $_SESSION["userAccount"];
$user_id = $user->getAccountId();
$qry = $pdo->prepare("select * accounts where accounts.accountNo = '$user_id'");
$qry->execute();
$profileqry = $qry->fetch();                                               
?>  
			  <!-- /. Registers kiosk machine and adds it to the database -->
              <?php
if(! empty($_POST)){
$mysqli = new mysqli('localhost', 'root', '', 'wifira');
$kioskName = $_POST['kioskName'];
$location = $_POST['location'];
$ipAddress = $_POST['ipAddress'];
$sql = "INSERT INTO kioskmachine (kioskId, kioskName, location, ipAddress, kioskStatus)VALUES(default, '$kioskName', '$location', '$ipAddress', 'Enable') ";
$insert = $mysqli->query($sql);
if ( $insert ) {
echo '<script type="text/javascript">
              alert("New Kiosk Added Successfully!");
              location="../pages/kiosk-manage.php";
              </script>';
} else {
die ("Error: {$mysqli->errno} : {$mysqli->error}");
}
$mysqli->close();
}
?>
              <form role="form" method="post" action="" autocomplete="off">
                <?php
if(isset($errMsg)){
echo '<div style="color:black;text-align:center;font-size:120px;">'.$errMsg.'</div>';
}
?>
                <div class="form-group">
                  <input type="text" name="kioskName" id="kioskName" class="form-control input-lg" placeholder="Kiosk Name" value="<?php if(isset($error)){ echo $_POST['kioskName']; } ?>" tabindex="1">
                </div>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Location" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="3">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="float" name="ipAddress" id="ipAddress" class="form-control input-lg" placeholder="IP Address" value="<?php if(isset($error)){ echo $_POST['ipAddress']; } ?>" tabindex="4">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 col-md-6">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </body>
    </html>
