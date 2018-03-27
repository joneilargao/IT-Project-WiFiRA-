<?php
/**
* sales-total.php
*
* Displays the total sales
* 
* @author Darren Sison
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
              <h1 style = "font-family: special elite; color:#000000">Total Sales
              </h1>
              <form action="sales-search.php" method="get">
                From : 
                <input type="text" name="d1" class="tcal" value="" /> To: 
                <input type="text" name="d2" class="tcal" value="" />
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                (yyyy-mm-dd format)
              </form>
              <form action="sales-entity.php" method="get">
                <select name="entity">
                  <option value="">Choose Entity
                  </option>
                  <?php 
require_once 'fragments/connection.php';
$usersQuerry = $pdo->prepare("SELECT accountNo FROM wifira.accounts  union SELECT kioskId FROM wifira.`kioskmachine`;");
$usersQuerry->execute();
$users = $usersQuerry->fetchAll();
foreach ($users as $user){
echo "<option>" . $user['accountNo'] . "</option>";
}
?>
                </select>
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
              </form>
            </div>    
          </div>
          <div class="jumbotron"> 
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
              <?php
include 'fragments/sales-query-total.php';
if(isset($_POST['request_done'])){
$rid=$_POST['requestId'];
$sql = $pdo->prepare("update service_request set request_status=4, end_servicing = curdate()  where request_id = '$rid';");
$sql->execute();
//echo "<meta http-equiv='refresh' content='0'>";
}
if(isset($_POST['request_cancel'])){
$rid=$_POST['requestId'];
$sql = $pdo->prepare("update service_request set request_status=5 where request_id = '$rid';");
$sql->execute();
//echo "<meta http-equiv='refresh' content='0'>";
}
?>
            </table>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
          <a class="btn btn-primary" href="sales-total.php">
            <i class="fa fa-plus-square fa-lg">
            </i>Total
          </a>
        </div>
      </div>
    </div>
  </body>
</html>    
