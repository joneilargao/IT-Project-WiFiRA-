<?php
/**
* sales-yearly.php
*
* Displays the sold vouchers for the year
* 
* @author Joneil Argao
*/
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
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
              <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Yearly Sales</h1>
              <form action="search-voucher-yearly.php" method="get" style="height:29px; margin-bottom: 5px;" >
                
                <input type="text" name="sy1" class="tcal" value="" placeholder="xxxxx-xxxxx" style="height:29px;"/>
                <button type="submit"><i class="fa fa-search" style=" margin-top:5px;margin-bottom: 5px; "></i></button>
                &nbsp;&nbsp;
                
                </form>                
              <form action="sales-yearly-entity.php" method="get">
                <select name="entity" style="height:29px;">
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
                <button type="submit"><i class="fa fa-search" style=" margin-top:5px;margin-bottom: 5px; "></i></button>
              </form>
            </div>    
          </div>
          <div class="jumbotron"> 
            <div style="float:right; margin-bottom: 15px;">
          <a class="btn btn-success" href="#">
            <i class="fa fa-file-text fa-lg" >
            </i> Generate
          </a> 
          &nbsp;
            <a class="btn btn-primary" href="sales-total.php"  ">
              <i class="">
              </i>Total Sales
            </a>
          </div>
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
                </tr>
              </thead>
              <tbody>
                <?php
include('fragments/connection.php');
if (isset($_GET["sy1"])) { $sy1  = $_GET["sy1"]; } else { $sy1=0; }; 
$result = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers where (voucherCode =:a)
   and (voucherStatus='sold') and (YEAR(datePrinted)=YEAR(CURRENT_DATE()))");
$result->bindParam(':a', $sy1);
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
                </tr>
                <?php
}
?>
              </tbody>
            </table>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
          
        </div>
      </div>
    </div>
  </body>
</html>    
