<!DOCTYPE html>
<?php
/**
* This page selects accounts with specified address.
* 
* @author Cyrene Dispo
*/ 
require '../classes/UserAccount.php';
?>
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
              <h1 style = "font-family: special elite; color:#4A8162">Manage Staff Accounts
              </h1>
              <form id="search-form" name="search" action="accounts-entity.php" method="get">
                <select name = "entity" style="height:29px;margin-bottom: 5px">
                  <option value="">Choose Address</option> 
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
                </select>
                  
                <button type="submit"><i class="fa fa-search" style="margin-top:5px;margin-bottom: 5px;"></i></button>
                </form>

                <form id="search-form" name="search" action="accounts-entity-name.php" method="get" >
                <select name = "entity" style="height:29px;">
                  <option value="">Choose Staff Name</option> 
          <!-- /. Selects all accounts from the database -->
                    <?php 
                      require_once 'fragments/connection.php';
                      $usersQuerry = $pdo->prepare("SELECT DISTINCT name FROM accounts where roleId='Staff'; ");
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
              <a class="btn btn-danger" href="view-staff-profile-archive.php" style="float:right; margin-bottom: 15px;">
                  <i class="fa fa-archive fa-lg">
                  </i> Archive
                </a>
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
                  <?php
                  include 'fragments/connection.php';

if(isset($_POST['archiveAccount'])){

    $archivequery = $pdo->prepare(" UPDATE visibility SET visibility = 'Hidden' WHERE username=$username ");

}
}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      </body>
    </html>    
 