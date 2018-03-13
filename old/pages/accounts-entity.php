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
                        <h1 style = "font-family: special elite; color:#000000">Manage Staff Accounts</h1>
                        
                        <form id="search-form" name="search" action="accounts-entity.php" method="get">
                            <select name = "entity">
                                <option value="">Choose Address</option> 
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
                        <i class="fa fa-pencil fa-lg"></i> Edit Account</a>
                        <a class="btn btn-danger" href="#">
                        <i class="fa fa-trash-o fa-lg"></i> Delete</a>

                        <form action="">
                            <a class="btn btn-info" name="archive" value="archive" onclick="archive()" >
                            <i class="fa fa-archive fa-lg"></i> Archive </a>
                        </form>

                    </div>    
                </div>
                <div class="jumbotron"> 
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="anothercontent">


                        <thead>
                                <tr>
                                    <th> Account Number </th>
                                    <th> Role ID </th>
                                    <th> Name </th>
                                    <th> Address </th>
                                    <th> Username </th>
                                    <th>Password</th>
                                 </tr>
                            </thead>

                            <tbody>
                                    <?php
                                    include('fragments/connection.php');
                                    if (isset($_GET["entity"])) { $entity  = $_GET["entity"]; } else { $entity=0; }; 
                                    $result = $pdo->prepare("SELECT accountNo, roleId, name, address, username, password FROM accounts WHERE roleId='Staff' and address=:a");
                                    $result->bindParam(':a', $entity);
                                    $result->execute();
                                    for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td><?php echo $row['accountNo']; ?></td>
                                        <td><?php echo $row['roleId']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                
                        
                        
                    </table>
                    </div>
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
                                      SELECT * from accounts;");
                        $query->execute();
                        $result = $query->fetchAll();

                        
                        foreach($result as $query){
                            echo "<tr>";
                            echo "<td>" . $query['roleId'] . "</td>";
                            echo "<td>" . $query['name'] . "</td>";
                            echo "<td>" . $query['address'] . "</td>";
                            echo "<td>" . $query['accountStatus'] . "</td>";
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
