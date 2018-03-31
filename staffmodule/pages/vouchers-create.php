<?php
/**
* voucher-create.php
*
* Create vouchers
* 
* @author Darren Sison
*/
    require '../classes/UserAccount.php';
    session_start();
    $sessionUserAccount = $_SESSION["userAccount"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <link rel="shortcut icon" type="image/png" href="assets/img/wifira_logo.png"/>
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
                   
                        <h1 style = "font-family: special elite; color:#4A8162; font-size: 250%;">Create Vouchers</h1>
                   
                    <div class="jumbotron">
                        <form class="form-horizontal" action="" method="post" name="reg" onsubmit="return validateForm()">
                          <fieldset>   
                              
                              <div class="form-group">
                              <label for="voucher_count" class="col-lg-2 control-label" style = "font-size: 110%;">No. of Voucher</label>
                              <div class="col-lg-10">
                                <input type="number" min="1" max="99" maxlength="2" id="voucher_count" class="form-control" name="voucher_count" value="<?php if(isset($error)){ echo $_POST['voucher_count']; } ?>">
                              </div>
                              </div> 
                              
                             <div class="form-group">
                              <label for="voucher_quota" class="col-lg-2 control-label" style = "font-size: 110%;">Quota </label>
                              <div class="col-lg-10">
                              <select class="form-control" name="voucher_quota">
                                    <option value="1">One time</option>
                                    <option value="0">Multi use</option>
                              </select>
                              </div>
                            </div>    
                                  

                            <div class="form-group">
                              <label for="voucher_expiration" class="col-lg-2 control-label" style = "font-size: 110%;">Expiration Time</label>
                              <div class="col-lg-10">
                              <select class="form-control" name="voucher_expiration">
                                    <option value="120">2 Hours</option>
                                    <option value="1440">24 Hours</option>
                              </select>
                              </div>
                            </div>  
                            
                            <div class="form-group">
                              <label for="voucher_note" class="col-lg-2 control-label" style = "font-size: 110%;">Notes</label>
                              <div class="col-lg-10">
                                <input type="text" maxlength="50" id="voucher_note" class="form-control" name="voucher_note" value="<?php if(isset($error)){ echo $_POST['voucher_note']; } ?>">
                              </div>
                            </div>
                              
                            
                              
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="createaccount" class="btn btn-primary" id="createaccount" value="submit">Create</button>
                                  </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                        
                                    
                        <?php
							if(! empty($_POST)){
								include '../create_voucher.php';
							}
							
                        ?>
                </div>
            </div>
        </div>
    </body>

</html>

<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["voucher_count"].value;
if ((a==null || a==""))
  {
  alert("Number of vouchers must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Please enter the desired number of vouchers.");
  return false;
  }
}
</script>