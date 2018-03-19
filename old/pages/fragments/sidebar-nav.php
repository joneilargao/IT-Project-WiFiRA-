<!-- /. NAV SIDE  -->
<?php
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
  <nav class="navbar-default navbar-side" role="navigation" >
    <div class="sidebar-collapse" style="background-color: #E95819;">
      <ul class="nav" id="main-menu" >
        <li>
          <a href=index.php>
            <i class="fa fa-tachometer">
            </i> Dashboard
            <span class="fa arrow">
            </span>
          </a>
        </li>
        <li>
          <a href="sales.php">
            <i class="fa fa-usd ">
            </i> Sales
            <span class="fa arrow">
            </span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a  href="sales-daily.php">
                <i class="fa fa-calendar-o ">
                </i>Daily
              </a>
            </li>
            <li>
              <a  href="sales-weekly.php">
                <i class="fa fa-calendar ">
                </i>Weekly
              </a>
            </li>
            <li>
              <a  href="sales-monthly.php">
                <i class="fa fa-calendar ">
                </i>Monthly
              </a>
            </li>
            <li>
              <a  href="sales-yearly.php">
                <i class="fa fa-calendar ">
                </i>Yearly
              </a>
            </li>
          </ul>				
        </li>
        <li>
          <a href="#">
            <i class="fa fa-tachometer">
            </i> Vouchers
            <span class="fa arrow">
            </span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a  href="vouchers-unsold.php">
                <i class="fa fa-barcode">
                </i>Unsold Vouchers
              </a>
            </li>
            <li>
              <a  href="vouchers-create.php">
                <i class="fa fa-barcode">
                </i>Create Voucher
              </a>
            </li>
          </ul>
        </li>		
        <li>
          <a href="#">
            <i class="fa fa-barcode">
            </i>Kiosks
            <span class="fa arrow">
            </span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a  href="kiosk-manage.php">
                <i class="fa fa-barcode">
                </i>Manage Kiosks
              </a>
            </li>
            <li>
              <a  href="kiosk-add.php">
                <i class="fa fa-barcode">
                </i>Add Kiosk
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-user" >
            </i> Accounts
            <span class="fa arrow">
            </span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a  href="view-profile.php">
                <i class="fa fa-user fa-2x">
                </i> View Profile
              </a>
            </li>
            <li>
              <a  href="view-staff-profile.php">
                <i class="fa fa-user fa-2x">
                </i>Manage Staff Accounts
              </a>
            </li>
            <li>
              <a href="edit-profile.php">
                <i class="fa fa-pencil-square fa-2x">
                </i> Edit Profile
              </a>
            </li>
            <li>
              <a href="add-account.php">
                <i class="fa fa-plus-circle fa-2x">
                </i> Add Account
              </a>
            </li>
          </ul>            
        </li>
        <li>
        </li>			
      </ul>
    </div>
  </nav> 
</html>
