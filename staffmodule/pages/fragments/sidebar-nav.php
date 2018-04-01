<?php
/**
* sidebar-nav.php
*
* Side navigation bar of the page
* 
* @author Darren Sison
* @author Katherine Turqueza
* @author Maureen Calpito
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
  </head>
    
  <nav class="dropdown menu" role="navigation" >
      
    <div class="sidenav">
        
        <a href=index.php>
            <i class="glyphicon glyphicon-stats"></i>  Dashboard
        </a>
    
        <!--Sales-->
        <button class="dropdown-btn">
          <a href=sales.php>
            <i class="glyphicon glyphicon-shopping-cart"></i>  Sales
            </a>
        </button>
          <div class="dropdown-container">
            <a  href="sales-daily.php"><i class="glyphicon glyphicon-time text-success"></i>
            Daily</a>
            <a  href="sales-weekly.php"><i class="glyphicon glyphicon-time text-success"></i>
            Weekly</a>
            <a  href="sales-monthly.php"><i class="glyphicon glyphicon-time text-success"></i>
            Monthly</a>
            <a  href="sales-yearly.php"><i class="glyphicon glyphicon-time text-success"></i>
            Yearly</a>
        </div>
            
        <!--Vouchers-->
        <a href=vouchers.php>
            <i class="glyphicon glyphicon-list-alt"></i>  Vouchers 
        </a>
        <div class="dropdown-container">
           <a  href="vouchers-sold.php"><i class="glyphicon glyphicon-ok-sign text-success"></i>
           Sold Vouchers</a>
            <a  href="vouchers-unsold.php">
              <i class="glyphicon glyphicon-remove-sign text-success"></i>
            Unsold Voucher</a>
            <a  href="vouchers-create.php"><i class="glyphicon glyphicon-pencil text-success"></i>
              Create Voucher</a>
        </div>
        <!--Accounts-->   
        <button class="dropdown-btn">
            <i class="fa fa-user"></i>  Accounts 
        </button>
        <div class="dropdown-container">
            <a  href="view-profile.php"><i class="glyphicon glyphicon-eye-open text-success"></i>
            View Profile</a>
            <a href="edit-profile.php"><i class="glyphicon glyphicon-edit text-success"></i>
            Edit Profile</a>
        </div>
      </div>
    </nav>
        
      
<style>
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
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: white;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: #117A65;
  background-color:#117A65;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover  { transform: scale(1.1); color: #E67E22 ;}

.dropdown-container a:hover  { transform: scale(1.1); color: #CA6F1E  ;}

/* Dropdown container */
.dropdown-container a{
  display: block;
  background-color: #262626;
  color: #818181;
  padding-left: 30px;
  padding-right: 30px;
}

::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Make the scrollbar invisible */

/** End of Side Navigation **/
</style>  
</html>
