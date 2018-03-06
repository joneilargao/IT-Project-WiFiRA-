<?php
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
        <style type="text/css">
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
                     <h1 style = "font-family: special elite; color:#4A8162;">Dashboard</h1>
                        <h4 style = "font-family: Jazz LET, fantasy; color:#4A8162;">Welcome    
                            <?php  
                                    
                                    echo  $_SESSION["username"];

                            ?> </h4>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/> 

                           <div class="row" style = "font-family: special elite; color:#0F4D2A;">    
                <div class="col-md-3 col-sm-6 col-xs-6" >           
                    <div class="alert alert-success">
                        <div class="text-box">
                            <h4 align="center">
                                <i class="fa fa-tags fa-2x pull-left"></i>
                                <strong>
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
                                <i class="fa fa-barcode fa-2x pull-left"></i>
                                <strong>
                                    <?php
                                    $datenow = date("Y-m");
                                    require_once 'fragments/connection.php';
                                    $query = $pdo->prepare("SELECT * FROM `kiosk machine` WHERE kioskStatus='Enable' "); 
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
                    <a class="btn btn-lg btn-success" href="#">

                        <div class="text-box" >

                            <h4 align="center">
                                <i class="fa fa-print fa-2x pull-left"></i>
                                <strong>
                                     Print Voucher
                                </strong>
                            </h4>
                        </div>
                     </a>
                 </div>

                 <div class="col-md-3 col-sm-6 col-xs-6"> 
                    <a class="btn btn-lg btn-success" href="#">

                        <div class="text-box" >

                            <h4 align="center">
                                <i class="fa fa-plus fa-2x pull-left"></i>
                                <strong>
                                     Add Kiosk
                                </strong>
                            </h4>
                        </div>
                     </a>
                 </div>
            






                          
                
        </div>


                    
                        <div class="text-box" >
                            <h4 align="left">

<input type="submit" name='submit' class="btn btn-warning" value="Daily" class="col s6" class='submit' style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>
                        <input type="submit" name='submit' class="btn btn-warning" value="Weekly" class="col s6" class='submit' style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>
<input type="submit" name='submit' class="btn btn-warning" value="Monthly" class="col s6" class='submit' style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/>
                        <input type="submit" name='submit' class="btn btn-warning" value="Yearly" class="col s6" class='submit' style="background-color:#4DD14D; font-family:monospace; font-size:18px;"/><br />
								<br>
							    </h4>


                                <div id="chart-container">
                                    <canvas id="mycanvas"></canvas>
                                </div>

                                <script type="text/javascript" src="js/jquery.min.js"></script>
                                <script type="text/javascript" src="js/Chart.min.js"></script>
                                <script type="text/javascript" src="js/app.js"></script>

                            
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

