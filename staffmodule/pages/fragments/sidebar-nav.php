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
            <i class="fa fa-tachometer"></i>  Dashboard
        </a>
    
        <!--Sales Dropdown-->
        <button class="dropdown-btn">
            <i class="fa fa-usd "></i>  Sales 
        </button>
          <div class="dropdown-container">
            <a  href="sales-daily.php">Daily</a>
            <a  href="sales-weekly.php">Weekly</a>
            <a  href="sales-monthly.php">Monthly</a>
            <a  href="sales-yearly.php">Yearly</a>
        </div>
            
        <!--Vouchers Dropdown-->
        <button class="dropdown-btn">
            <i class="fa fa-tachometer"></i>  Vouchers
        </button>
        <div class="dropdown-container">
            <a  href="vouchers-sold.php">Sold Vouchers</a>
            <a  href="vouchers-unsold.php">Unsold Vouchers</a>
            <a  href="vouchers-create.php">Create Voucher</a>
        </div>
            
        <!--Kiosks Dropdown-->
        <button class="dropdown-btn">
            <i class="fa fa-barcode"></i>  Kiosks 
        </button>
        <div class="dropdown-container">
            <a  href="kiosk-manage.php">Manage Kiosks</a>
            <a  href="kiosk-add.php">Add Kiosk</a>
        </div>
            
            
        <!--Accounts Dropdown-->   
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
        
      
<style>
/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 19%;
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
  outline: none;
  background-color:#117A65  ;
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
</style>
      
<script>
//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "block";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
      
</html>
