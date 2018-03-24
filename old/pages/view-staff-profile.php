<!DOCTYPE html>
<?php
/**
* This page views staff profile.
* 
* @author Darren Sison
		  Joneil Argao
		  Katherine Turqueza
		  Dispo Cyrene
*/
require '../classes/UserAccount.php';
?>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">	
    <link rel="stylesheet" type="text/css" href="assets/css/style2.css"/>	
  </head>
  <?php
include 'fragments/head.php';
?>
  <body>
    <?php
//Start your session
session_start();
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
              <h1 style = "font-family: special elite; color:#000000">Manage Staff Accounts
              </h1>
              <form id="search-form" name="search" action="accounts-entity.php" method="get">
                <select name = "entity">
                  <option value="">Choose Address
                  </option> 
				  <!-- /. Selects all accounts from the database -->
                  <?php 
require_once 'fragments/connection.php';
$usersQuerry = $pdo->prepare("SELECT DISTINCT address FROM accounts; ");
$usersQuerry->execute();
$users = $usersQuerry->fetchAll();
foreach ($users as $user){
echo "<option>" . $user['address'] . "</option>";
}
?>
                <input type="submit" name='submit' class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
                <a class="btn btn-danger" href="view-staff-profile-archive.php">
                  <i class="fa fa-archive fa-lg">
                  </i> Archive
                </a>
                </form>
                </div>    
            </div>
            <div class="jumbotron"> 
              <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                <?php
include 'fragments/user-query.php';
?>
              </table>
            </div>
          </div>
        </div>
      </div>

      </body>
    </html>    
