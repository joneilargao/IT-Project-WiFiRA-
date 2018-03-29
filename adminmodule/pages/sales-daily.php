<?php
/**
* sales-daily.php
*
* Displays the sold vouchers for the day
* 
* @author Darren Sison
* @author Joneil Argao
* @author Cyrene Dispo
*/
require '../classes/UserAccount.php';
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
              <h1 style = "font-family: Palatino; color:#000000">Daily Sales
              </h1> 
              <form action="search-voucher-daily.php" method="get" >

                <input type="text" name="sd1" class="tcal" value="" placeholder="xxxxx-xxxxx" style="height:30px;" >
                <input type="submit" name="Search" class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
              </form>   
              <form action="sales-daily-entity.php" method="get">
                <select name="entity" style="height:30px">
                  <option value="">Choose Entity
                  </option>
                  <?php 
require_once 'fragments/connection.php';
$usersQuerry = $pdo->prepare("SELECT name FROM wifira.accounts  union SELECT kioskName FROM wifira.`kioskmachine`;");
$usersQuerry->execute();
$users = $usersQuerry->fetchAll();
foreach ($users as $user){
echo "<option>" . $user['name'] . "</option>";
}
?>
                </select>
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                <a class="btn btn-primary" href="sales-daily-total.php">
            <i class="">
            </i>Total Sales
          </a>
              </form>
            </div>    
          </div>
          <div class="jumbotron"> 
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
              <?php
include 'fragments/sales-query-daily.php';
?>
            </table>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
          
        </div>
      </div>
    </div>
  </body>
</html>    