<?php
/**
* sales-daily-entity.php
*
* Displays the daily sales of specified entity
* 
* @author Joneil Argao
* @author Cyrene Dispo
* @author Katherine Turqueza
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
            <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Daily Sales</h1>
            <div>
                <form action="search-voucher-daily.php" method="get"  style="height:29px; margin-bottom:.5%;">
                  <input type="text" name="sd1" class="tcal" value="" placeholder="xxxxxxxxxx" style="height:29px;"> 
                  <button type="submit"><i class="fa fa-search" style=" margin-top:5px;margin-bottom: 5px; "></i></button>
                </form>
                  
                <form action="sales-daily-entity.php" method="get"  style="height:29px;margin-right:64%; ">
                  <select name="entity" style="height:29px">
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
          </div>
            
          <div class="jumbotron"> 
            <div style="float:right; margin-bottom: 15px;">
          <a class="btn btn-success" href="#null" onclick="printContent('print')">
            <i class="fa fa-print fa-lg" >
            </i> Print
          </a>&nbsp;
            <a class="btn btn-primary" href="sales-total.php">
              <i class="">
              </i>Total Sales
            </a>
          </div>
            <div id="print">
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
                  <th> Account Name 
                  </th>
                  <th> Kiosk Name 
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
include('fragments/connection.php');
if (isset($_GET["entity"])) { $entity  = $_GET["entity"]; } else { $entity=0; }; 
$result = $pdo->prepare("SELECT vouchers.voucherCode, vouchers.voucherType, vouchers.voucherAmount, 
vouchers.dateSold, vouchers.accountNo, vouchers.kioskId, accounts.name, kioskmachine.kioskName 
FROM vouchers LEFT OUTER JOIN accounts ON vouchers.accountNo = accounts.accountNo LEFT OUTER JOIN kioskmachine 
ON vouchers.kioskId = kioskmachine.kioskId WHERE (accounts.name=:a OR kioskmachine.kioskName=:a) and 
(vouchers.dateSold=CURDATE()) and (vouchers.voucherStatus='sold') ORDER BY vouchers.dateSold DESC");
$result->bindParam(':a', $entity);
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
                    <?php echo $row['dateSold']; ?>
                  </td>
                  <td>
                    <?php echo $row['name']; ?>
                  </td>
                  <td>
                    <?php echo $row['kioskName']; ?>
                  </td>
                </tr>
                <?php
}
?>
              </tbody>
            </table>
            </div>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
        </div>
      </div>
    </div>
  </body>
</html>    

<script type="text/javascript">
function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<TITLE>Print Page</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()
}
</script>