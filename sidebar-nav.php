<!-- /. NAV SIDE  -->

<?php
    require_once 'connection.php'; 
    
    $query = $pdo->prepare("SELECT * FROM user WHERE username='".$_SESSION['username']."';");
    $query->execute();
    $print = $query->fetch();
/**
* sidebar-nav.php
*
* The sidebar navigation of the system.
* 
* @author Darren Sison
*/
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">		
    </head>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

        <li style ="font-family:Cinzel Decorative; font-size:18px">
            <a href=index.php><i class="fa fa-tachometer"></i> Dashboard<span class="fa arrow"></span></a>
        </li>
        <li style ="font-family: Cinzel Decorative; font-size:18px">
            <a href="sales.php"><i class="fa fa-usd "></i> Sales<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                 <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-daily.php"><i class="fa fa-usd "></i>Daily</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-weekly.php"><i class="fa fa-usd "></i>Weekly</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-monthly.php"><i class="fa fa-usd "></i>Monthly</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="sales-yearly.php"><i class="fa fa-usd "></i>Yearly</a>
                </li>
            </ul>				
        </li>

        <li  style ="font-family: Cinzel Decorative;">
            <a href="#"  style ="font-family: Cinzel Decorative; font-size:18px"><i class="fa fa-user" ></i> Accounts<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li style ="font-family: Cinzel Decorative;">
                    <a  href="view-profile.php"><i class="fa fa-user fa-3x"></i> View Profile</a>
                </li>
                <li style ="font-family: Cinzel Decorative;">
                    <a href="edit-profile.php"><i class="fa fa-pencil-square fa-3x"></i> Edit Profile</a>
                </li>
            </ul>            
        </li>
        <li style ="font-family: Cinzel Decorative;">
            
        </li>			
        </ul>
    </div>
</nav> 
</html>