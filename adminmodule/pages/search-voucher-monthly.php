<?php
/**
* sales-yearly.php
*
* Displays the sold vouchers for the year
* 
* @author Cyrene Jane Dispo
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
              <h1 style = "font-family: Palatino; color:#000000">Monthly Sales
              </h1>
                <form action="search-voucher-monthly.php" method="get">

                <input type="text" name="sm1" class="tcal" value="" placeholder="xxxxx-xxxxx" style="height:30px;" >
                <input type="submit" name="Search" class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
              </form>   
              <form action="sales-monthly-entity.php" method="get">
                <select name="entity" style="height:35px;">
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
              </form>
            </div>    
          </div>
          <div class="jumbotron"> 
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
if (isset($_GET["sm1"])) { $sm1  = $_GET["sm1"]; } else { $sm1=0; }; 
$result = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers where (voucherCode =:a) and 
((MONTH(vouchers.datePrinted)=MONTH(CURRENT_DATE())) AND (YEAR(vouchers.datePrinted)=YEAR(CURRENT_DATE()))) and (vouchers.voucherStatus='sold') ");
$result->bindParam(':a', $sm1);
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
          <a class="btn btn-primary" href="sales-yearly-total.php">
            <i class="fa fa-plus-square fa-lg">
            </i>Total
          </a>
        </div>
      </div>
    </div>
  </body>
</html>    
