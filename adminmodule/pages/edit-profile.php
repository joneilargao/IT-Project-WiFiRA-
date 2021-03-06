<?php
/**
* edit-profile.php
*
* Account profile is edited
* 
* @author Darren Sison
* @author Maureen Calpito
* @author Katherine Turqueza
*/
    require '../classes/UserAccount.php';
    session_start();
    $sessionUserAccount = $_SESSION["userAccount"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link href="https://fonts.googleapis.com/css?family=Allura|Arima+Madurai|Cinzel+Decorative|Corben|Dancing+Script|Galindo|Gentium+Book+Basic|Great+Vibes|Henny+Penny|Indie+Flower|Kaushan+Script|Kurale|Life+Savers|Love+Ya+Like+A+Sister|Milonga|Miltonian+Tattoo|Niconne|Oregano|Original+Surfer|Pangolin|Parisienne|Philosopher|Princess+Sofia|Rancho|Risque|Salsa|Schoolbell|Special+Elite" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
    </head>
<?php
    include 'fragments/head.php';
?>

    <body>
           

           <?php
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
                
                if(isset($_POST['saveprofile'])){
                    $account = $_SESSION["userAccount"];
                    $accountNo = $account->getAccountId();
                    $username = $_POST['inputUsername'];
                    $password = $_POST['inputPassword'];
                    $rePassword = $_POST['inputRePassword'];
                    $address = $_POST['inputAddress'];
                    $name = $_POST['inputname'];
                    $emailAddress = $_POST['inputEmailAddress'];
                    $contactNumber = $_POST['inputContactNumber'];

                    include "fragments/connection.php";

                    if($password == $rePassword && $password != ''){
                        $updateWithPass = "UPDATE accounts set username=:username, password=:password, rePassword=:rePassword, address=:address, name=:name, emailAddress=:emailAddress, contactNumber=:contactNumber where accountNo = '$accountNo';";
                        $sql = $pdo->prepare($updateWithPass);
                        $sql->bindParam(':username', $username);
                        $sql->bindParam(':password', $password);
                        $sql->bindParam(':rePassword', $rePassword);
                        $sql->bindParam(':address', $address);
                        $sql->bindParam(':name', $name);
                        $sql->bindParam(':emailAddress', $emailAddress);
                        $sql->bindParam(':contactNumber',$contactNumber);
                        $sql->execute();

                        $accountStatus = $account->getStatus();
                        $roleId = $account->getRoleId();
                        $image = $account->getUserPicture();

                        $_SESSION["userAccount"] = new UserAccount($accountNo, $username, '', $address, $name,
                            $accountStatus, $roleId, $image);
                        header('view-profile.php');

                    }else{
                        $updateWithoutPass = "UPDATE accounts SET username=:username, password=:password, rePassword=:rePassword, address=:address, name=:name, emailAddress=:emailAddress, contactNumber=:contactNumber WHERE accountNo = '$accountNo';";
                        $sql = $pdo->prepare($updateWithoutPass);
                        $sql->bindParam(':username', $username);
                        $sql->bindParam(':password', $password);
                        $sql->bindParam(':rePassword', $rePassword);
                        $sql->bindParam(':address', $address);
                        $sql->bindParam(':name', $name);
                        $sql->bindParam(':emailAddress', $emailAddress);
                        $sql->bindParam(':contactNumber',$contactNumber);
                        $sql->execute();

                        $accountStatus = $account->getStatus();
                        $roleId = $account->getRoleId();
                        $image = $account->getUserPicture();

                        $_SESSION["userAccount"] = new UserAccount($accountNo, '', $name, $address, $username, '',  
                            $accountStatus, $roleId, $image, '');

                        header('view-profile.php');
                    }
                }

                ?>
                <?php include 'fragments/sidebar-nav.php'; ?>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper" >
                    <div id="page-inner">
                    <?php
                        
                        $user = $_SESSION["userAccount"];
                        $user_id = $user->getAccountId();
                        
                        //QUERY THE ACCOUNT DATA
                        $qry = $pdo->prepare("SELECT accountNo, name, username, address, contactNumber, emailAddress, password, rePassword FROM accounts WHERE accountNo = '$user_id'");
                        $qry->execute();
                        $profileqry = $qry->fetch(); 
                        
                    ?> 
                        
                    <div class="row">
                        <div class="col-md-12">
                          <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Edit Profile</h1>   
                        </div>    
                    </div>
                        
                    <div class="jumbotron">
                        <form class="form-horizontal" action="" method="post">
                          <fieldset>
                            
                             <div class="form-group">
                              <label for="inputname" class="col-lg-2 control-label" style = "font-family: verdana; font-size: 110%;">Name</label>
                              <div class="col-lg-10">
                                <input type="text" maxlength="45" class="form-control" name="inputname" value="<?php echo $profileqry['name'] ?>">
                              </div>
                              </div>     

                            <div class="form-group">
                              <label for="inputUsername" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Username</label>
                              <div class="col-lg-10">
                                <input type="text" min="10" maxlength="20" class="form-control" name="inputUsername" value="<?php echo $profileqry['username'] ?>">
                              </div>
                            </div>  
                              
                            <div class="form-group">
                              <label for="inputAddress" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Address</label>
                              <div class="col-lg-10">
                                <input type="text" maxlength="50" class="form-control" name="inputAddress" value="<?php echo $profileqry['address'] ?>">
                              </div>
                              </div>
                              
                              <div class="form-group">
                              <label for="inputContactNumber" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Contact Number</label>
                              <div class="col-lg-10">
                                <input type="number" maxlength="50" class="form-control" name="inputContactNumber" value="<?php echo $profileqry['contactNumber'] ?>">
                              </div>
                              </div>
                              
                              <div class="form-group">
                              <label for="inputEmailAddress" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Email Address</label>
                              <div class="col-lg-10">
                                <input type="email" maxlength="50" class="form-control" name="inputEmailAddress" value="<?php echo $profileqry['emailAddress'] ?>">
                              </div>
                              </div>

                            <div class="form-group">
                              <label for="inputPassword" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Password</label>
                              <div class="col-lg-10">
                                <input type="password" min="8" max="20" maxlength="20" class="form-control" name="inputPassword" value="<?php echo $profileqry['password'] ?>">
                              </div>
                            </div>

                              <div class="form-group">
                                  <label for="inputRePassword" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Re-enter Password</label>
                                  <div class="col-lg-10">
                                      <input type="password" min="8" max="20" maxlength="20" class="form-control" name="inputRePassword" value="<?php echo $profileqry['password'] ?>">
                                  </div>
                            </div>
                            
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" name="saveprofile" class="btn btn-primary" id="saveprofile" value="submit">Confirm</button>
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