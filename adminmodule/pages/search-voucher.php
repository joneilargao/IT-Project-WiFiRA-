<?php
/**
* search-voucher.php
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
              <h1 style = "font-family: special elite; color:#000000">Sales
              </h1>
              <form action="sales-search.php" method="get">
                From : 
                <input type="text" name="d1" class="tcal" value="" /> To: 
                <input type="text" name="d2" class="tcal" value="" />
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                (yyyy-mm-dd format)
              </form>
              
              <form action="search-voucher.php" method="get">
                Voucher Search: <input type="text" name="s1" class="tcal" value="" /> 
                <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                (xxxxx-xxxxx format)
              </form>
              
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
                </tr>
              </thead>
              <tbody>
                <?php
                include('fragments/connection.php');
                if (isset($_GET["s1"])) { $s1  = $_GET["s1"]; } else { $s1=0; }; 
                $result = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers where (voucherCode =:a) and (voucherStatus='sold')");
                $result->bindParam(':a', $s1);
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
          </div>
          <a class="btn btn-primary" href="#">
            <i class="fa fa-plus-square fa-lg">
            </i> Update Status
          </a>
          <a class="btn btn-success" href="#null" onclick="printContent('print')">
            <i class="fa fa-print fa-lg">
            </i> Print
          </a>
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