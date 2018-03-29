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
                
                if(isset($_POST['saveprofile'])){
                    $account = $_SESSION["userAccount"];
                    $accountNo = $account->getAccountId();

                    $username = $_POST['inputUsername'];
                    $password = $_POST['inputPassword'];
                    $rePassword = $_POST['inputRePassword'];
                    $address = $_POST['inputAddress'];
                    $name = $_POST['inputname'];

                    include "fragments/connection.php";

                    if($password == $rePassword && $password != ''){
                        $updateWithPass = "update accounts set username=:username, password=:password, address=:address, name=:name where accountNo = '$accountNo';";
                        $sql = $pdo->prepare($updateWithPass);
                        $sql->bindParam(':username', $username);
                        $sql->bindParam(':password', $password);
                        $sql->bindParam(':address', $address);
                        $sql->bindParam(':name', $name);
                        $sql->execute();

                        $accountStatus = $account->getStatus();
                        $roleId = $account->getRoleId();
                        $image = $account->getUserPicture();

                        $_SESSION["userAccount"] = new UserAccount($accountNo, $username, '', $address, $name,
                            $accountStatus, $roleId, $image);
                        header('view-profile.php');

                    }else{
                        $updateWithoutPass = "update accounts set username=:username, password=:password, address=:address, name=:name where accountNo = '$accountNo';";
                        $sql = $pdo->prepare($updateWithoutPass);
                        $sql->bindParam(':username', $username);
                        $sql->bindParam(':password', $password);
                        $sql->bindParam(':address', $address);
                        $sql->bindParam(':name', $name);
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
                        $qry = $pdo->prepare("SELECT accountNo, name, username, address, password FROM accounts WHERE accountNo = '$user_id'");
                        $qry->execute();
                        $profileqry = $qry->fetch(); 
                        
                    ?> 
                        
                    <div class="row">
                        <div class="col-md-12">
                        <h1 style = "font-family: Palatino; color:#000000">Edit Profile</h1>   
                        </div>    
                    </div>
                        
                    <div class="jumbotron">
                        <form class="form-horizontal" action="" method="post">
                          <fieldset>
                            <legend style = "font-family: Helvetica;">Profile</legend>

                             <div class="form-group">
                              <label for="inputname" class="col-lg-2 control-label" style = "font-family: verdana; font-size: 110%;">Name</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputname" value="<?php echo $profileqry['name'] ?>">
                              </div>
                              </div>     

                            <div class="form-group">
                              <label for="inputUsername" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Username</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputUsername" value="<?php echo $profileqry['username'] ?>">
                              </div>
                            </div>  
                              
                            <div class="form-group">
                              <label for="inputAddress" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputAddress" value="<?php echo $profileqry['address'] ?>">
                              </div>
                              </div>

                            <div class="form-group">
                              <label for="inputPassword" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Password</label>
                              <div class="col-lg-10">
                                <input type="password" class="form-control" name="inputPassword" value="<?php echo $profileqry['password'] ?>">
                              </div>
                            </div>

                              <div class="form-group">
                                  <label for="inputRePassword" class="col-lg-2 control-label" style = "font-family: verdana;font-size: 110%;">Re-enter Password</label>
                                  <div class="col-lg-10">
                                      <input type="password" class="form-control" name="inputRePassword" value="<?php echo $profileqry['password'] ?>">
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