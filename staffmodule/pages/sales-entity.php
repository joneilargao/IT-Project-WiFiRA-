<?php
/**
* sales-entity.php 
*
* Select sales with specified entity from sales.php
* 
* @author Darren Sison
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
              <h1 style = "font-family: palatino; color:#4A8162; font-size: 250%;">Sales
              </h1>
              <div>
                  <form action="sales-search.php" method="get" style="height:29px; margin-bottom: 5px;float:left;">
                    From : 
                    <input type="date" name="d1" class="tcal" value="" placeholder="yyyy-mm-dd" style="height:29px;"/> To: 
                    <input type="date" name="d2" class="tcal" value="" placeholder="yyyy-mm-dd" style="height:29px;"/>
                    <button type="submit"><i class="fa fa-search" style=" margin-top:5px;margin-bottom: 5px;  "></i></button>
                  </form>
                  
                  <form action="search-voucher.php" method="get" style="height:35px;float:right;margin-right:38%; ">
                    &nbsp;&nbsp; Voucher Search: <input type="text" name="s1" class="tcal" value="" placeholder="xxxxxxxxxx" style="height:29px; "/> 
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
                  </a> &nbsp;
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
                vouchers.datePrinted, vouchers.accountNo, vouchers.kioskId, accounts.name, kioskmachine.kioskName 
                FROM vouchers LEFT OUTER JOIN accounts ON vouchers.accountNo = accounts.accountNo LEFT OUTER JOIN kioskmachine 
                ON vouchers.kioskId = kioskmachine.kioskId WHERE (accounts.name=:a OR kioskmachine.kioskName=:a) and 
                (vouchers.voucherStatus='Sold')");
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
                    <?php echo $row['datePrinted']; ?>
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