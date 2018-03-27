<?php
/**
* index-monthly.php
*
* Shows the monthly sales for the graph
* 
* @author Joneil Argao
*/
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
    <style type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      #chart-container {
        width: 640px;
        height: auto;
      }
    </style>
  </head>
  <?php
include 'fragments/head.php';
?>
  <body id="index">
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
          <div class="row">
            <div class="col-md-12">
              <h1 style = "font-family: special elite; color:#4A8162;">Dashboard
              </h1>
              <h4 style = "font-family: Jazz LET, fantasy; color:#4A8162;">Welcome    
                <?php  
echo  $_SESSION["username"];
?> 
              </h4>
            </div>
          </div>              
          <!-- /. ROW  -->
          <hr/> 
          <div class="row" style = "font-family: special elite; color:#0F4D2A;">    
            <div class="col-md-3 col-sm-6 col-xs-6" >           
              <div class="alert alert-success">
                <div class="text-box">
                  <h4 align="center">
                    <i class="fa fa-tags fa-2x pull-left">
                    </i>
                    <strong>
					  <!-- /. Displays the number of vouches sold -->
                      <?php
$datenow = date("Y-m");
require_once 'fragments/connection.php';
$query = $pdo->prepare("SELECT * FROM vouchers WHERE voucherStatus='Sold' ");
$query->execute();
$result = $query->fetchAll();
echo count($result);                                          
?> Vouchers Sold Today
                    </strong>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">      
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
?> Kiosks Enabled
                    </strong>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6"> 
              <div class="text-box" >
                <h4 align="center">
                  <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal">Print Voucher
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;
                          </button>
                          <h4 class="modal-title">Print Voucher
                          </h4>
                          <form role="form" method="post" action="" autocomplete="off">
                            <div class="form-group">
                              <label for="kiosId" class="col-lg-2 control-label">
                              </label>
                              <select class="form-control input-lg" name="kioskId" id="KiosID"  placeholder="Types of Voucher" value="<?php if(isset($error)){ echo $_POST['kioskId']; } ?>" tabindex="2">			 
                                <option class="form-control input-lg" value="10peso">10 Peso
                                </option>
                                <option class="form-control input-lg" value="20peso">20 Peso
                                </option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="number" name="kioskId" id="KioskID" class="form-control input-lg" placeholder="No. of Voucher" value="<?php if(isset($error)){ echo $_POST['kioskId']; } ?>" tabindex="2">
                            </div>
                            <div class="form-group">
                              <input type="number" name="kioskId" id="KioskID" class="form-control input-lg" placeholder="Quota" value="<?php if(isset($error)){ echo $_POST['kioskId']; } ?>" tabindex="2">
                            </div>
                            <div class="row">
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                  <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Expiration Time" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="2">
                                </div>
                              </div>
                              <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                  <input type="float" name="ipadd" id="ipaddress" class="form-control input-lg" placeholder="Notes" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="2">
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="modal-footer">
                            <button class="btn btn-default" onclick="location.href='print.php'" type="button">Submit
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </h4>
                  </div>
                </a>
            </div>
            <br>
            <div class="col-md-3 col-sm-6 col-xs-6"> 
              <div class="text-box" >
                <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal2">
                  <strong>Add Kiosk
                  </strong>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal2" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <button type="button" class="close" data-dismiss="modal">&times;
                      </button>
                      <form role="form" method="post" action="" autocomplete="off">
                        <div class="form-group">
                          <input type="text" name="kioskname" id="kioskName" class="form-control input-lg" placeholder="Kiosk Name" value="<?php if(isset($error)){ echo $_POST['kioskName']; } ?>" tabindex="1">
                        </div>
                        <div class="form-group">
                          <input type="number" name="kioskId" id="KioskID" class="form-control input-lg" placeholder="Kiosk ID" value="<?php if(isset($error)){ echo $_POST['kioskId']; } ?>" tabindex="2">
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Location" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="2">
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <input type="float" name="ipadd" id="ipaddress" class="form-control input-lg" placeholder="IP Address" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="2">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" align = "center">Submit
                          </button>
                        </div>
                        </div>
                    </div>
                  </div>
                  </h4>
              </div>
              </a>
          </div>  
        </div>
        <div class="text-box" >
          <h4 align="left">
           <a href="index-daily.php" class="btn btn-warning"  class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>Daily</a>
            <a href="index-weekly.php" class="btn btn-warning"  class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>Weekly</a>
            <a href="index-monthly.php" class="btn btn-warning"class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>Monthly</a>
            <a href="index-yearly.php" class="btn btn-warning" class="col s6" style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>Yearly</a>
            <br>
            <br>
          </h4>
          <div id="chart-container">
            <canvas id="mycanvas">
            </canvas>
          </div>
          <script type="text/javascript" src="jscript/jquery.min.js">
          </script>
          <script type="text/javascript" src="jscript/Chart.min.js">
          </script>
          <script type="text/javascript" src="jscript/app-monthly.js">
          </script>
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
