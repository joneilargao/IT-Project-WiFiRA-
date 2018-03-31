<?php
/**
* search-voucher-unsold.php 
*
* Displays all unsold vouchers
* 
* @author Joneil Argao
* @author Alfa Leones
*/
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">    
    <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style2.css"/> 
 </head>
  <?php
include 'fragments/head.php';
?>
  <body>
    <?php
//Start your session
session_start();

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
              <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Unsold Vouchers</h1>
              <form action="search-voucher-unsold.php" method="get">
                <input type="text" name="su1" class="tcal" value="" placeholder="xxxxx-xxxxx" /> 
                <button type="submit"><i class="fa fa-search" style=" margin-top:5px;margin-bottom: 5px; "></i></button>
              </form>
            </div>    
          </div>
          <div class="jumbotron"> 
             <a class="btn btn-success" href="#" style="float:right; margin-bottom: 15px;">
            <i class="fa fa-file-text fa-lg" >
            </i> Generate
          </a> 
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                          <thead>
                            <tr>
                              <th> Voucher Code 
                              </th>
                              <th> Voucher Type 
                              </th>
                              <th> Amount 
                              </th>
                              <th> Date 
                              </th>
                              <th> Status 
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                include('fragments/connection.php');
                if (isset($_GET["su1"])) { $su1  = $_GET["su1"]; } else { $su1=0; }; 
                $result = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, voucherstatus, datePrinted FROM vouchers where (voucherCode =:a) and (voucherStatus='Unsold')");
                $result->bindParam(':a', $su1);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                ?>
                            <tr class="record">
                              <td>
                                <?php echo $row['voucherCode']; ?>
                              </td>
                              <td>
                                <?php echo $row['voucherType']; ?>
                              </td>
                              <td>
                                <?php echo $row['voucherAmount']; ?>
                              </td>
                              <td>
                                <?php echo $row['datePrinted']; ?>
                              </td>
                              <td>
                                <?php echo $row['voucherstatus']; ?>
                              </td>
                </tr>
                <?php
}
?>
              </tbody>
              <?php
?>
            </table>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
          
          
        </div>
      </div>
    </div>
  </body>
</html>    
