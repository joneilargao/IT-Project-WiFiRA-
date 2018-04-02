<?php
/**
* index.php
*
* Main page of the system
* 
* @author Darren Sison
* @author Joneil Argao
* @author James Anonuevo
* @author Maureen Calpito
* @author Cyrene Dispo
* @author Katherine Turqueza
*/
require('fragments/data-daily.php');
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>

     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <style type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      #chart-container {
        width: 100%;
        height: auto;
      }
    </style>
    <?php   
include_once 'fragments/connection.php';  
?>
  </head>
<body>
  <?php
include 'fragments/head.php';

?>

      <?php 
session_start();
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
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

          <div class="row" align="center"  style="padding-left:2%; padding-right:2%; margin-top:3%;">   

            <div class="col-md-4 col-sm-4 col-xs-4"  >           
              <div class="alert alert-success">
                <div class="text-box">
                  <h4 align="center">
                    <i class="fa fa-ticket fa-2x fa-spin pull-left" >
                    </i>
                    <strong>
                      <!-- /. Displays the number of vouches sold -->
                      <?php
						$datenow = date("Y-m");
						require_once 'fragments/connection.php';
						$query = $pdo->prepare("SELECT * FROM vouchers WHERE voucherStatus='Sold' AND dateSold=CURDATE() AND accountNo = '$user_id'");
						$query->execute();
						$result = $query->fetchAll();
						echo count($result);                                          
						?> <br>
						Sold Vouchers 
                    </strong>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4"  >           
              <div class="alert alert-success">
                <div class="text-box">
                  <h4 align="center">
                    <i class="fa fa-list-alt fa-2x pull-left" >
                    </i>
                    <strong>
                      <!-- /. Displays the number of vouches sold -->
                      <?php
						$datenow = date("Y-m");
						require_once 'fragments/connection.php';
						$query = $pdo->prepare("SELECT * FROM vouchers WHERE voucherStatus='Unsold' AND accountNo = '$user_id'");
						$query->execute();
						$result = $query->fetchAll();
						echo count($result);                                          
						?> <br>
                        Unsold Vouchers
                    </strong>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" >      
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
	            <div id="containerChart" style=" width:100%; height:45%; background:#ffffff;">
	              <div class="container" style="width:900px;">
               <div id="chart"></div>
              </div>
                <script>
                  Morris.Bar({
                   element : 'chart',
                   data:[<?php echo $chart_data; ?>],
                   xkey:'dateSold',
                   ykeys:['totalsales'],
                   labels:['totalsales'],
                   barColors: ["#009973"],
                   hoverBarColor: ["#ffff99"],
                   hideHover:'auto',
                   stacked:true
                  });
                  </script>
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