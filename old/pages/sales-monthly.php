<!DOCTYPE html>
<?php
require '../classes/UserAccount.php';
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
                        <h1 style = "font-family: special elite; color:#000000">Monthly Sales</h1>
                        
    <form id="search-form" name="search" action="" method="get">
    <input id="search-input" name="search" type="text">
    <input type="submit" name='submit' class="btn btn-warning" value="Search" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/>
    </form>               
                    <form action="sales-monthly-entity.php" method="get">
                        <select name="entity">
                            <option value="">Choose Entity</option>
                            <?php 
                                require_once 'fragments/connection.php';
                                $usersQuerry = $pdo->prepare("SELECT name FROM wifira.accounts  union SELECT kioskName FROM wifira.`kioskmachine`;");
                                $usersQuerry->execute();
                                $users = $usersQuerry->fetchAll();
                            foreach ($users as $user){
                                echo "<option>" . $user['name'] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="submit" value="Search" style=" font-family:monospace; font-size:18px;">
                    </form>
                    
                    </div>    
                </div>
                <div class="jumbotron"> 
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">
                        <?php
                            include 'fragments/request-query-monthly.php';

                        ?>
                    </table>
                </div>
                       <!--  <input type="submit" name='submit' class="btn btn-warning" value="Print" class="col s6" class='submit' style="background-color:#686667; font-family:monospace; font-size:18px;"/><br />    -->
                    <a class="btn btn-primary" href="sales-monthly-total.php">
                    <i class="fa fa-plus-square fa-lg"></i>Total</a>
            </div>
        </div>
    </div>

    <!-- The Modal -->
   <div id="reply_modal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Request Details</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                         require_once 'fragments/connection.php';

                         $usr = $_SESSION['username'];
                         echo $usr;

                        $query = $pdo->prepare("
                                      SELECT b.username AS sp_username, a.username AS cust_username, 
                                      request_status, pet_service.service_name, start_servicing, end_servicing,  service_price 
                                              FROM service_request 
                                              INNER JOIN user_account AS b ON service_request.sp_id = b.account_id  
                                              INNER JOIN user_account AS a ON service_request.account_id = a.account_id  
                                              INNER JOIN pet_service ON service_request.service_id = pet_service.service_id 
                                              WHERE request_status = 03 AND b.username = '$usr';");
                        $query->execute();
                        $result = $query->fetchAll();

                        
                        foreach($result as $query){
                            echo "<tr>";
                            echo "<td>" . $query['start_servicing'] . "</td>";
                            echo "<td>" . $query['end_servicing'] . "</td>";
                            echo "<td>" . $query['request_status'] . "</td>";
                            echo "<td>" . $query['service_name'] . "</td>";
                            echo "<td>" . $query['cust_username'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";

                        ?>


                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Accept</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Reject</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>    
