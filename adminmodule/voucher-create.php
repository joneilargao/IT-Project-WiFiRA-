<!DOCTYPE html>

<?php
 //   require '../classes/UserAccount.php';
 //   session_start();
 //   $sessionUserAccount = $_SESSION["userAccount"];
?>

<html lang="en">

<head>
      <title>WiFiRA ISP</title><meta charset="UTF-8" />

      <link rel="stylesheet" type="text/css" href="pages/assets/css/style.css"/>
      <link rel="stylesheet" type="text/css" href="pages/assets/css/style2.css"/>
</head>
    
<?php
    include 'fragments/head.php';
?>

<body>
           
           <?php
            //Start your session

            if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
               
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
                <?php include 'fragments/sidebar-nav.php'; ?>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper" >
                    <div id="page-inner">
                    <?php
                        
                        $user = $_SESSION["userAccount"];
                        $user_id = $user->getAccountId();
                        
                        $qry = $pdo->prepare("select * accounts where accounts.accountNo = '$user_id'");
                        $qry->execute();
                        $profileqry = $qry->fetch();     
                        
                    ?> 
                    <div class="jumbotron">
                        <form class="form-horizontal" action="" method="post">
                          <fieldset>
                            <legend style = "font-family: special elite;">Create Voucher</legend>
                              
                              
                              <div class="form-group">
                              <label for="voucher_count" class="col-lg-2 control-label" style = "font-size: 110%;">No. of Voucher</label>
                              <div class="col-lg-10">
                                <input type="number" class="form-control" name="voucher_count">
                              </div>
                              </div> 
                              
                             <div class="form-group">
                              <label for="voucher_quota" class="col-lg-2 control-label" style = "font-size: 110%;">Quota </label>
                              <div class="col-lg-10">
                                <input type="number" class="form-control" name="voucher_quota">
                              </div>
                            </div>    
                                  

                            <div class="form-group">
                              <label for="voucher_expiration" class="col-lg-2 control-label" style = "font-size: 110%;">Expiration Time</label>
                              <div class="col-lg-10">
                                <input type="number" class="form-control" name="voucher_expiration">
                              </div>
                            </div>  
                            
                            <div class="form-group">
                              <label for="voucher_note" class="col-lg-2 control-label" style = "font-size: 110%;">Notes</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="voucher_note">
                              </div>
                            </div>
                              
                              <?php
                                include 'draft.php';
                              ?>
                              
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="createaccount" class="btn btn-primary" id="createaccount" value="submit">Create Account</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                        
                                    
                        <?php
							include 'create_voucher.php';
							
                        ?>
                </div>
            </div>
        </div>
    </body>

</html>