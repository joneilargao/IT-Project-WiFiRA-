<?php
/**
* index-weekly.php
*
* Shows the weekly sales for the graph
* 
* @author Joneil Argao
* @author Cyrene Dispo
*/
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
    <style type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      #chart-container {
        width: 640px;
        height: auto;
      }
    </style>
    <?php   
include_once 'fragments/connection.php';  
?>
  </head>
  <?php
include 'fragments/head.php';

?>

     <?php 
session_start();
function echoActiveClassIfRequestMatches($requestUri)
{
$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
if ($current_file_name == $requestUri)
echo 'class="active-menu"';
}
$user = $_SESSION["userAccount"];
$user_id = $user->getAccountId();
?>
    <div id="wrapper">
      <?php include 'fragments/page-head.php'; ?>
      <!-- /. NAV TOP  -->
      <?php include 'fragments/sidebar-nav.php'; ?>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper" >
        <div id="page-inner"> 
        <div class="col-md-12">

            <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Dashboard</h1>
        </div>             

          <div class="row" align="center"  style="padding-left:5%;margin-top:3%;">   

            <div class="col-md-3 col-sm-6 col-xs-6"  >           
              <div class="alert alert-success">
                <div class="text-box">
                  <h4 align="center">
                    <i class="fa fa-ticket fa-2x pull-left" >
                    </i>
                    <strong>
                      <!-- /. Displays the number of vouches sold -->
                      <?php
						$datenow = date("Y-m");
						require_once 'fragments/connection.php';
						$query = $pdo->prepare("SELECT * FROM vouchers WHERE voucherStatus='Sold' AND dateSold=CURDATE()");
						$query->execute();
						$result = $query->fetchAll();
						echo count($result);                                          
						?> 
						Vouchers Sold Today
                    </strong>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6" >      
              <div class="alert alert-success">
                <div class="text-box"  >
                  <h4 align="center">
                    <i class="fa fa-barcode fa-2x pull-left">
                    </i>
                    <strong>
                      <!-- /. Displays the number of kiosk enabled -->
                      <?php
						$datenow = date("Y-m");
						require_once 'fragments/connection.php';
						$query = $pdo->prepare("SELECT * FROM `kioskmachine` WHERE kioskStatus='Enable' "); 
						$query->execute();
						$result = $query->fetchAll();
						echo count($result);                                          
						?> <br>Kiosks Enabled
                    </strong>
                  </h4>
                </div>
              </div>
            </div>
        </div>

            
            
        <div class="text-box" > 
        	<div>
	        	<div id="DWMY" style="position:center; background:#ffffff;  float:left; padding-top:5%; padding-left:5%" >
		          	<form style=" width:60%; height:50%; position:center; background:#ffffff;   ">
		            	<a href="index-daily.php" class="btn btn-warning"  class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:130%;  margin:10%; " />Daily</a>
		            </form>

		            <form style=" width:60%; height:50%; position:center; background:#ffffff;    ">
		            	<a href="index-weekly.php" class="btn btn-warning"  class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:130%;  margin:15%; "/>Weekly</a>
		        	</form>

		        	<form style=" width:60%; height:50%; position:center; background:#ffffff;    ">
		            	<a href="index-monthly.php" class="btn btn-warning" class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:130%;  margin:15%;"/>Monthly</a>
		        	</form>

		        	<form style=" width:60%; height:50%; position:center; background:#ffffff;    ">
		            	<a href="index-yearly.php" class="btn btn-warning" class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:130%;  margin:15%; "/>Yearly</a>
		        	</form>
		        </div>
	          	
	            <div id="containerChart" style=" width:75%; height:45%; position:center; background:#ffffff;  float:right; margin-right:7%; ">
	              <div id="chart-container">
	                <canvas id="mycanvas">
	                </canvas>
                </div>
                <script type="text/javascript" src="jscript/jquery.min.js">
                </script>
                <script type="text/javascript" src="jscript/Chart.min.js">
                </script>
                <script type="text/javascript" src="jscript/app-weekly.js">
                </script>
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <!-- /. PAGE INNER  -->
  </div>
<!-- /. PAGE WRAPPER  -->
</div>
</body>
</html>