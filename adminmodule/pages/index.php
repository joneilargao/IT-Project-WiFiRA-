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
        width: 100%;
        height: auto;
      }
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

          <div class="row" >   

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
$query = $pdo->prepare("SELECT * FROM vouchers WHERE voucherStatus='Sold' AND dateSold=CURDATE()");
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
                  <button type="button" class="btn btn-lg btn-success" style = "font-family: Audrey;" data-toggle="modal" data-target="#myModal">Print Voucher
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;
                          </button>
                          <h2 style = "font-family: Palatino;" class=" modal-title"><font color ="#000000">Print Voucher</font>
                          </h2>
                          <form class="form-horizontal" action="" method="post">
                          <fieldset>
      
                              <div class="form-group">
                              <label for="voucher_count" class="col-lg-2 control-label" style = "font-family: Audrey;" style = "font-size: 110%;">No. of Voucher</label>
                              <div class="col-lg-10">
                                <input type="number" id="voucher_count" class="form-control" name="voucher_count" value="<?php if(isset($error)){ echo $_POST['voucher_count']; } ?>">
                              </div>
                              </div> 
                              
                             <div class="form-group">
                              <label for="voucher_quota" class="col-lg-2 control-label" style = "font-family: Audrey;" style = "font-size: 110%;">Quota </label>
                              <div class="col-lg-10">
                              <select class="form-control" name="voucher_quota">
                                    <option value="1">One time</option>
                                    <option value="0">Multi use</option>
                              </select>
                              </div>
                            </div>    
                                  

                            <div class="form-group">
                              <label for="voucher_expiration" class="col-lg-2 control-label" style = "font-family: Audrey;" style = "font-size: 110%;">Expiration Time</label>
                              <div class="col-lg-10">
                              <select class="form-control" name="voucher_expiration">
                                    <option value="120">2 Hours</option>
                                    <option value="1440">24 Hours</option>
                              </select>
                              </div>
                            </div>  
                            
                            <div class="form-group">
                              <label for="voucher_note" class="col-lg-2 control-label" style = "font-family: Audrey;" style = "font-size: 110%;">Notes</label>
                              <div class="col-lg-10">
                                <input type="text" id="voucher_note" class="form-control" name="voucher_note" value="<?php if(isset($error)){ echo $_POST['voucher_note']; } ?>">
                              </div>
                            </div>
                  
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="createaccount" class="btn btn-primary" style = "font-family: Audrey;" id="createaccount" value="submit">Create Voucher</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                      </div>
                    </div>
                    </h4>
                  </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 col-xs-6" style="margin-top:1.5%;"> 
              <div class="text-box" >
                <button type="button" class="btn btn-lg btn-success" style = "font-family: Audrey;" data-toggle="modal" data-target="#myModal2">
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
                       <h2 align= "center" style="font-family: special elite; margin-bottom: 5%; margin-top:5%;padding-left:1%;padding-right:1%; color:#4A8162">Add Kiosk</h2>
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
                        $kioskName= $_POST['kioskName'];
                        $location= $_POST['location'];
                        $ipAddress= $_POST['ipAddress'];
                        $sql= "INSERT INTO kioskmachine (kioskId, kioskName, location, ipAddress, kioskStatus)VALUES(default, '$kioskName', '$location', '$ipAddress', 'Enable') ";
                        $insert = $mysqli->query($sql);
                        if ( $insert ) {
                        echo "New Kiosk Added!";
                        } else {
                        die ("Error: {$mysqli->errno} : {$mysqli->error}");
                        }
                        $mysqli->close();
                        }
                        ?>
                                      <form role="form" method="post" action="" autocomplete="off">
                <?php
                    if(isset($errMsg)){
                        echo '<div style="color:black;text-align:center;font-size:5%;">'.$errMsg.'</div>';
                        }
                ?>
                        <div class="form-group" style=" margin-top:3%;padding-left:5%;padding-right:3%; margin-right:3%;">
                            <input type="text" name="kioskName" id="kioskName" class="form-control input-lg" placeholder="Kiosk Name"  value="<?php if(isset($error)){ echo $_POST['kioskName']; } ?>" tabindex="1">
                          </div>
                        
                        <div class="row" >
                            <div class="col-xs-6 col-sm-6 col-md-6" >
                              <div class="form-group" style=" margin-top:2%;padding-left:5%; margin-right:3%; margin-left:5%">
                                <input type="text" name="location" id="location" class="form-control input-lg" placeholder="Location" value="<?php if(isset($error)){ echo $_POST['location']; } ?>" tabindex="3">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6" >
                              <div class="form-group" style=" margin-top:2%;padding-right:6%; margin-right:6%; margin-left:5%">
                                <input type="float" name="ipAddress" id="ipAddress" class="form-control input-lg" placeholder="IP Address" value="<?php if(isset($error)){ echo $_POST['ipAddress']; } ?>" tabindex="4">
                              </div>
                            </div>
                          </div>
                        <div class="row" style="padding-left:4%; padding-right:5%;" align="center">
                            <div class="col-xs-6 col-sm-6 col-md-6" style="margin-top:2%; margin-right:6%; margin-bottom:5%;"  >
                              <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5">
                            </div>
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
        	<div>
	        	<div id="DWMY" style="position:center; background:#ffffff;  float:left; padding-top:5%;" >
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
	          	
	            <div id="containerChart" style=" width:75%; height:50%; position:center; background:#ffffff;  float:right; margin-right:10%; ">
	              <div id="chart-container">
	                <canvas id="mycanvas">
	                </canvas>
	              </div>
	              <script type="text/javascript" src="jscript/jquery.min.js">
	              </script>
	              <script type="text/javascript" src="jscript/Chart.min.js">
	              </script>
	              <script type="text/javascript" src="jscript/app.js">
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