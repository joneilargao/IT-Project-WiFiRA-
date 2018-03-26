<?php
/**
* view-profile.php
*
* Displays user information
* 
* @author Darren Sison
*/
require '../classes/UserAccount.php';
session_start();
$sessionUserAccount = $_SESSION["userAccount"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">		
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
      <!-- /. NAV TOP  -->
      <?php include 'fragments/sidebar-nav.php'; ?>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2 style = "font-family: special elite; color:#000000">View Profile
              </h2>   
            </div>    
          </div>
          <div class="jumbotron">
            <div class="container" >
              <div class="panel panel-info">
                <?php 
$user = $_SESSION["userAccount"];
$user_id = $user->getAccountId();
$qry = $pdo->prepare("SELECT accountNo, name as Name, username, address, image from accounts where accounts.accountNo = '$user_id'");
$qry->execute();
$profileqry = $qry->fetch();   
echo '<div class="panel-heading">
<h3 class="panel-title" style = "font-family: salsa;">' . $profileqry['Name'] . '</h3>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-3 col-lg-3 " align="center"> '; 
echo '<img class="profile_pic" style="width:100%;" src="data:image/jpeg;base64,'.base64_encode($profileqry['image']).'"/>';
echo "</div>
<div class='col-md-9 col-lg-9'> 
<table class='table table-user-information'>
<tbody>
<tr>
<td>Username:</td>
<td>" .  $profileqry['username']  ."</td>
</tr>
<tr>
<td>Address:</td>
<td>" . $profileqry['address'] . "</td>
</tr>
</tbody>
</table>";
?>
                <!--<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> --> 
                <a href="edit-profile.php" class="btn btn-primary">Edit Profile Info
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>    
