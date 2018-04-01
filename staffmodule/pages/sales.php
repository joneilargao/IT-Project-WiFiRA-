<?php
/**
* sales.php
* 
* Displays the sold vouchers
* 
* @author Darren Sison
* @author Joneil Argao
*/
require '../classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
    <link rel="stylesheet" type="text/css" href="../fragments/assets/css/style2.css">
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
              
              <h1 style = "font-family: Palatino; color:#4A8162; font-size: 250%;">Sales</h1>
             
              <form action="sales-search.php" method="get" style="height:40px;">
                From : 
                <input type="date" name="d1" class="tcal" value="" placeholder="yyyy-mm-dd" style="height:29px;"/> To: 
                <input type="date" name="d2" class="tcal" value="" placeholder="yyyy-mm-dd" style="height:29px;"/>
                <button type="submit"><i class="fa fa-search" style=" margin-top:5px;margin-bottom: 5px;  "></i></button>
                
              
              <form action="search-voucher.php" method="get" style="height:35px; ">
                &nbsp;&nbsp; Voucher Search: <input type="text" name="s1" class="tcal" value="" placeholder="xxxxx-xxxxx" style="height:29px; "/> 
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
              <?php
include 'fragments/sales-query.php';
?>
            </table>
          </div>
          <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
          
        </div>
      </div>
    </div>
  </body>
</html>    
