<?php
/**
* voucher-unsold.php
*
* Displays all unsold vouchers
* 
* @author Darren Sison
* @author Alfa Leones
*/
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
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
              <h1 style = "font-family: special elite; color:#000000">Vouchers
              </h1>
              <form action="search-voucher-unsold.php" method="get">
                Voucher Search: <input type="text" name="su1" class="tcal" value="" /> 
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                (xxxxx-xxxxx format)
              </form>
              <form id="search-form" name="search" action="vouchers-entity.php" method="get">
                <select name = "entity">
                  <option value="">Choose Status
                  </option>
				   <!-- /. Selects all unsold vouchers from the database -->
                  <?php 
require_once 'fragments/connection.php';
$usersQuerry = $pdo->prepare("SELECT DISTINCT voucherstatus FROM vouchers; ");
$usersQuerry->execute();
$users = $usersQuerry->fetchAll();
foreach ($users as $user){
echo "<option>" . $user['voucherstatus'] . "</option>";
}
?>
                </select>
                <input type="submit" name='submit' class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
              </form>	
            </div>    
          </div>
          <div class="jumbotron"> 
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
              <?php
include 'fragments/vouchers-unsold-query.php';
?>
            </table>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
          <a class="btn btn-primary" href="#">
            <i class="fa fa-plus-square fa-lg">
            </i> Update Status
          </a>
          <a class="btn btn-success" href="#">
            <i class="fa fa-file-text fa-lg">
            </i> Generate
          </a>
        </div>
      </div>
    </div>
    <!-- The Modal -->
    <div id="reply_modal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
            </button>
            <h4 class="modal-title">Request Details
            </h4>
          </div>
          <div class="modal-body">
            <p>
              <?php
require_once 'fragments/connection.php';
echo "</table>";
?>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Accept
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Reject
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>    
