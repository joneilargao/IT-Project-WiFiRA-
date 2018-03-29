<?php
/**
* sidebar-nav.php
*
* Side navigation bar of the page
* 
* @author Darren Sison
* @author Katherine Turqueza
*/
require_once 'connection.php'; 
$query = $pdo->prepare("SELECT * FROM user WHERE username='".$_SESSION['username']."';");
$query->execute();
$print = $query->fetch();
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">	
    <link rel="stylesheet" type="text/css" href="../assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style2.css">
  </head>
    
  <nav>
      
    <div class="sidenav">
        
        <!--Dashboard-->
        <a href=index.php>
            <i class="fa fa-tachometer"></i>  Dashboard
        </a>
    
        <!--Sales-->
        <button class="dropdown-btn">
            <i class="fa fa-ticket"></i>  Sales 
        </button>
        <div class="dropdown-container">
            <a  href="sales-daily.php">Daily</a>
            <a  href="sales-weekly.php">Weekly</a>
            <a  href="sales-monthly.php">Monthly</a>
            <a  href="sales-yearly.php">Yearly</a>
        </div>
            
        <!--Vouchers-->
        <button class="dropdown-btn">
            <i class="fa fa-tachometer"></i>  Vouchers
        </button>
        <div class="dropdown-container">
            <a  href="vouchers-sold.php">Sold Vouchers</a>
            <a  href="vouchers-unsold.php">Unsold Vouchers</a>
            <a  href="vouchers-create.php">Create Voucher</a>
        </div>
            
        <!--Kiosks-->
        <button class="dropdown-btn">
            <i class="fa fa-barcode"></i>  Kiosks 
        </button>
        <div class="dropdown-container">
            <a  href="kiosk-manage.php">Manage Kiosks</a>
            <a  href="kiosk-add.php">Add Kiosk</a>
        </div>
            
            
        <!--Accounts-->   
        <button class="dropdown-btn">
            <i class="fa fa-user"></i>  Accounts 
        </button>
        <div class="dropdown-container">
            <a  href="view-profile.php">View Profile</a>
            <a  href="view-staff-profile.php">Manage Staff Accounts</a>
            <a href="edit-profile.php">Edit Profile</a>
            <a href="user-add-account.php">Add Account</a>
        </div>
      </div>
    </nav>
              
</html>