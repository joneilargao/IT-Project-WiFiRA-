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
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
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
              <h1 style = "font-family: Palatino; color:#4A8162; font-size: 250%;">Unsold Vouchers</h1>
              <div>
              <form action="search-voucher-unsold.php" method="get" style="float:left;">
                <input type="text" name="su1" class="tcal" value="" placeholder="xxxxxxxxxx" style="height:29px;"/> 
                <button type="submit"><i class="fa fa-search" style="margin-top:5px;margin-bottom: 5px;"></i></button>
              
               </form> 
            </div>
            </div>    
          </div>
          <div class="jumbotron"> 
             <a class="btn btn-success" href="#" style="float:right; margin-bottom: 15px;">
            <i class="fa fa-print fa-lg" >
            </i> Print
          </a> 
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
                              <th> Status 
                              </th>
                              <th>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                include('fragments/connection.php');
                if (isset($_GET["su1"])) { $su1  = $_GET["su1"]; } else { $su1=0; }; 
                $result = $pdo->prepare("SELECT * FROM vouchers where (voucherCode =:a) and (voucherStatus='Unsold') AND (accountNo='$user_id')");
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
                                <?php echo $row['voucherStatus']; ?>
                              </td>
                              <td>
                                <?php echo '<a href="fragments/vouchers-unsold.php?id='.$row['voucherId'].'"><button class="btn">Sold</button></a>';
                                ?>
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