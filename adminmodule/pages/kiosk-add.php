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
    <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
    <?php   
    include_once 'fragments/connection.php';  
    ?>
  </head>
  <?php
    include 'fragments/head.php';
   ?>
  <body>
    <?php

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
                
                
                <?php
                    if(isset($errMsg)){
                    echo '<div style="color:black;text-align:center;font-size:120px;">'.$errMsg.'</div>';
                    }
                ?>
                <fieldset>
                    
                    <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Add Kiosk</h1>
                    
                    <div class="jumbotron">
                    <form name="reg" onsubmit="return validateForm()" role="form" method="post" action="" autocomplete="off">
                          <?php
                              if(isset($errMsg)){
                                  echo '<div style="color:black;text-align:center;font-size:120px;">'.$errMsg.'</div>';
                                  }
                          ?>
                          <div class="form-group" style="margin-top:10px;padding-left:20px;padding-right:20px;">
                            <input type="text" name="kioskName" id="kioskName" class="form-control input-lg" placeholder="Kiosk Name" value="<?php if(isset($error)){ echo $_POST['kioskName']; } ?>" tabindex="1">
                          </div>
                          <div class="row" >
                            <div class="col-xs-6 col-sm-6 col-md-6" >
                              <div class="form-group" style="padding-left:20px;padding-right:20px;">
                                <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Location" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="3">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6" >
                              <div class="form-group" style="padding-right:20px;">
                                <input type="float" name="ipAddress" id="ipAddress" class="form-control input-lg" placeholder="IP Address" value="<?php if(isset($error)){ echo $_POST['ipAddress']; } ?>" tabindex="4">
                              </div>
                            </div>
                          </div>
                          <div class="row" style="padding-left:20px; padding-right:20px;">
                            <div class="col-xs-6 col-sm-6 col-md-6" style="padding-left:20px; padding-right:20px;" >
                              <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5">
                            </div>
                          </div>
                    </form>
                </div>
                </fieldset>
          
                </div>
              </div>
              </div>
        </div>
      </div>
      </body>
</html>

<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["kioskName"].value;
var b=document.forms["reg"]["location"].value;
var c=document.forms["reg"]["ipAddress"].value;
if ((a==null || a=="") && (b==null || b=="") && (c==null || c==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Kiosk name must be filled out.");
  return false;
  }
if (b==null || b=="")
  {
  alert("Location must be filled out.");
  return false;
  }
if (c==null || c=="")
  {
  alert("IP address must be filled out.");
  return false;
  }
}
</script>
