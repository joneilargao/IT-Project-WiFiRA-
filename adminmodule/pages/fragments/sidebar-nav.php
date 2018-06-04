<?php
/**
* sidebar-nav.php
*
* Side navigation bar of the page
* 
* @author Darren Sison
* @author Katherine Turqueza
* @author Cyrene Dispo
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
            <i class="fa fa-tachometer"></i>&nbsp;  Dashboard
        </a>
    
        <!--Sales-->
        <a href=sales.php>
            <i class="fa fa-money"></i>&nbsp; Sales 
        </a>
        <div class="dropdown-container">
            <a  href="sales-daily.php">Daily</a>
            <a  href="sales-weekly.php">Weekly</a>
            <a  href="sales-monthly.php">Monthly</a>
            <a  href="sales-yearly.php">Yearly</a>
        </div>
            
        <!--Vouchers-->
		<a href=vouchers.php>
            <i class="fa fa-ticket"></i>&nbsp;  Vouchers 
        </a>
        <div class="dropdown-container">
            <a  href="vouchers-sold.php">Sold Vouchers</a>
            <a  href="vouchers-unsold.php">Unsold Voucher</a>
            <a  href="vouchers-create.php">Create Voucher</a>
        </div>
            
        <!--Kiosks-->
      <a href=kioks.php>
            <i class="fa fa-barcode"></i>&nbsp;  Kiosks
        </a>
        <div class="dropdown-container">
            <a  href="kiosk-manage.php">Manage Kiosks</a> 
            <a  href="kiosk-add.php">Add Kiosk</a>
        </div>
            
            
        <!--Accounts-->   
        <button class="dropdown-btn">
            <i class="fa fa-user"></i>&nbsp;  Accounts 
        </button>
        <div class="dropdown-container">
            <a  href="view-profile.php">View Profile</a>
            <a  href="view-staff-profile.php">Manage Staff Accounts</a>
            <a href="edit-profile.php">Edit Profile</a>
            <a href="user-add-account.php">Add Account</a>
        </div>
      </div>
    </nav>

<style>
/** Side Navigation **/
      
/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 260px;
  position: fixed;
  z-index: 2;
  top: 1;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-bottom: 8%;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: white;
  display: block;
  border: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: green;
  background-color: green;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  font-size: 15px;
}
    
.dropdown-container a:hover {
  color: white;  
}

/* Dropdown container */
.dropdown-container a{
  display: block;
  background-color: #262626;
  color: #818181;
  padding-left: 39px;
}

::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Make the scrollbar invisible */

/** End of Side Navigation **/
</style>

</html>