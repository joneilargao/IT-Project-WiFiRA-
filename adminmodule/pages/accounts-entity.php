<?php
/**
* accounts-entity.php
*
* Selects accounts with specified address
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
              <h1 style = "font-family: Palatino; color:#000000">Manage Staff Accounts
              </h1>
              <form id="search-form" name="search" action="accounts-entity.php" method="get">
                <select name = "entity" style="height:35px;">
                  <option value="">Choose Address
                  </option> 
				  <!-- /. Selects all enabled accounts from the database -->
                  <?php 
require_once 'fragments/connection.php';
$usersQuerry = $pdo->prepare("SELECT DISTINCT address FROM accounts; ");
$usersQuerry->execute();
$users = $usersQuerry->fetchAll();
foreach ($users as $user){
echo "<option>" . $user['address'] . "</option>";
}
?>
                  </form>
                <input type="submit" name='submit' class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
                <a class="btn btn-primary" href="#">
                  <i class="fa fa-pencil fa-lg">
                  </i> Edit Account
                </a>
                <a class="btn btn-danger" href="#">
                  <i class="fa fa-trash-o fa-lg">
                  </i> Delete
                </a>             
               </div>    
            </div>
            <div class="jumbotron"> 
              <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                <thead>
                  <tr>
                    <th> Account Number 
                    </th>
                    <th> Role ID 
                    </th>
                    <th> Name 
                    </th>
                    <th> Address 
                    </th>
                    <th> Username 
                    </th>
                    <th>Password
                    </th>
                  </tr>
                </thead>
                <tbody>
                
				  <!-- /. Select attributes from accounts entity  -->
                  <?php
include('fragments/connection.php');
if (isset($_GET["entity"])) { $entity  = $_GET["entity"]; } else { $entity=0; }; 
$result = $pdo->prepare("SELECT accountNo, roleId, name, address, username, password FROM accounts WHERE roleId='Staff' and address=:a");
$result->bindParam(':a', $entity);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>
                  <tr class="record">
                    <td>
                      <?php echo $row['accountNo']; ?>
                    </td>
                    <td>
                      <?php echo $row['roleId']; ?>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['address']; ?>
                    </td>
                    <td>
                      <?php echo $row['username']; ?>
                    </td>
                    <td>
                      <?php echo $row['password']; ?>
                    </td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </body>
    </html>    
