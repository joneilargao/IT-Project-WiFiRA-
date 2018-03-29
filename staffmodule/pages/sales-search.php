<?php
/**
* sales-search.php
*
* Selects sales with specified date from sales.php
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
              <h1 style = "font-family: Palatino; color:#000000">Sales
              </h1>
              <form action="sales-search.php" method="get" style="height:35px;">
                From : 
                <input type="text" name="d1" class="tcal" value="" placeholder="yyyy-mm-dd" style="height:35px;"/> To: 
                <input type="text" name="d2" class="tcal" value="" placeholder="yyyy-mm-dd" style="height:35px;"/>
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                </form>
              
              <form action="search-voucher.php" method="get" style="height:35px;">
                Voucher Search: <input type="text" name="s1" class="tcal" value="" placeholder="xxxxx-xxxxx" style="height:30px;"/> 
                <input type="submit" value="Search"  style=" font-family:monospace; font-size:18px;">
              </form>
              <!--
<form id="search-form" name="search" action="" method="get">
<input id="search-input" name="search" type="text">
<input type="submit" name='submit' class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/> -->
              <form action="sales-entity.php" method="get">
                <select name="entity">
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
if (isset($_GET["d1"])) { $d1  = $_GET["d1"]; } else { $d1=0; }; 
if (isset($_GET["d2"])) { $d2  = $_GET["d2"]; } else { $d2=0; }; 
$result = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers WHERE (datePrinted BETWEEN :a AND :b) 
  and (voucherStatus='sold')");
$result->bindParam(':a', $d1);
$result->bindParam(':b', $d2);
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
  </body>
</html>    