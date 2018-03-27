<?php
/**
* edit-kiosk.php
*
* Edit kiosk machine information
* 
* @author Cyrene Dispo
*/
    require '../classes/UserAccount.php';
    session_start();
    $sessionUserAccount = $_SESSION["userAccount"];
?>
<!DOCTYPE html>
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

            if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
                echo "You are logged in as, " . $_SESSION['userAccount']->getUsername() . "!";
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
                <?php
                
                	if(isset($_POST['savekiosk'])){
                    	$kiosk = $_SESSION["userAccount"];
                    	$kioskId = $_GET['id'];

                    	$kioskName = $_POST['inputKioskName'];
                    	$location = $_POST['inputLocation'];
                    	$ipAddress = $_POST['inputIpAddress'];

                    	include 'fragments/connection.php';

                    	$sql = $pdo->prepare("UPDATE kioskmachine SET kioskName='$kioskName', location='$location', ipAddress='$ipAddress' WHERE kioskId='$kioskId'");
                        $sql->execute();
                        header("location:kiosk-manage.php");
                    }
                ?>
                <?php include 'fragments/sidebar-nav.php'; ?>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper" >
                    <div id="page-inner">
                    <?php
                        $kioskId = $_GET['id'];
                        
                        //QUERY THE ACCOUNT DATA
                        $qry = $pdo->prepare("SELECT kioskId, kioskName, location, ipAddress FROM kioskmachine WHERE kioskId = '$kioskId'");
                        $qry->execute();
                        $kioskqry = $qry->fetch(); 


                    ?> 
                        
                    <div class="row">
                        <div class="col-md-12">
                        	<h2 style = "font-family: Cinzel Decorative; color:#000000">Edit Profile</h2>   
                        </div>    
                    </div>
                        
                    <div class="jumbotron">
                        <form class="form-horizontal" action="" method="post">
                          <fieldset>
                            <legend style = "font-family: special elite;">Kiosk Information</legend>

                             <div class="form-group">
                              <label for="inputKioskName" class="col-lg-2 control-label" style = "font-family: milonga; font-size: 110%;">Kiosk Name</label>

                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputKioskName" value="<?php echo $kioskqry['kioskName'] ?>">
                              </div>
                              </div>     

                            <div class="form-group">
                              <label for="inputLocation" class="col-lg-2 control-label" style = "font-family: milonga;font-size: 110%;">Location</label>

                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputLocation" value="<?php echo $kioskqry['location'] ?>">
                              </div>
                            </div>  
                              
                            <div class="form-group">
                              <label for="inputIpAddress" class="col-lg-2 control-label" style = "font-family: milonga;font-size: 110%;"> IP Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputIpAddress" value="<?php echo $kioskqry['ipAddress'] ?>">
                              </div>
                              </div>

                            
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" name="savekiosk" class="btn btn-primary" id="savekiosk" value="submit">Confirm</button>
                                  </div>
                                </div>
                              
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>    