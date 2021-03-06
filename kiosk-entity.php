<!DOCTYPE html>
<?php
require '../classes/UserAccount.php';
/**
* kiosk-entity.php
*
* Displays the kiosk entities.
* 
* @author Darren Sison
*/
?>
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
                        <h1 style = "font-family: special elite; color:#000000">Manage Kiosks</h1>
                        
                            <form id="search-form" name="search" action="kiosk-entity.php" method="get">
                                <select name = "entity">
                                    <option value="">Choose Kiosk Machine Location</option> 
                                    <?php 
                                        require_once 'fragments/connection.php';
                                        $usersQuerry = $pdo->prepare("SELECT DISTINCT location FROM kioskmachine; ");
                                        $usersQuerry->execute();
                                        $users = $usersQuerry->fetchAll();

                                        foreach ($users as $user){
                                            echo "<option>" . $user['location'] . "</option>";
                                        }
                                    ?>
                                </select>
                            <input type="submit" name='submit' class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>  
                    </div>    
                </div>

                <div class="jumbotron"> 
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">

                            <thead>
                                <tr>
                                    <th> Kiosk Id </th>
                                    <th> Kiosk Name </th>
                                    <th> Location </th>
                                    <th> IP Address </th>
                                    <th> Status </th>
                                 </tr>
                            </thead>

                            <tbody>
                                    <?php
                                    include('fragments/connection.php');
                                    if (isset($_GET["entity"])) { $entity  = $_GET["entity"]; } else { $entity=0; }; 
                                    $result = $pdo->prepare("SELECT kioskId, kioskName, location, ipAddress, kioskStatus FROM kioskmachine WHERE location=:a");
                                    $result->bindParam(':a', $entity);
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['kioskId']; ?></td>
                                        <td><?php echo $row['kioskName']; ?></td>
                                        <td><?php echo $row['location']; ?></td>
                                        <td><?php echo $row['ipAddress']; ?></td>
                                        <td><?php echo $row['kioskStatus']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                

                             

                        
                    
                        <?php
                             //include 'fragments/kiosk-query.php';
                            
                        ?>


                    </table>
                </div>
                       <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->

                     <?php



                     ?>

                    <a class="btn btn-primary" href="#">
                    <i name="edit" class="fa fa-pencil fa-lg"></i> Edit Kiosk</a>
                    <a class="btn btn-danger" href="#">
                    <i name="delete" class="fa fa-trash-o fa-lg"></i> Delete</a>
            </div>
        </div>
    </div>

    
</body>
</html>    
