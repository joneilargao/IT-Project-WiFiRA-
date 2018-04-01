<?php
/**
* login.php
*
* Login for staff module
* 
* @author Darren Sison
*/ 
require 'classes/UserAccount.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <title>WiFiRA ISP</title><meta charset="UTF-8" />
      <link rel="stylesheet" type="text/css" href="adminmodule/pages/assets/css/login.css"/>
      <link rel="shortcut icon" type="image/png" href='adminmodule/pages/assets/img/wifira_logo.png'/>
</head>

<body id="bg" >
  <div align="center">
  <img src="adminmodule/pages/assets/img/logo.png" alt="Avatar" class="image1">
  </div>
  <div align="center">
    <div id="loginborder" align="center">
      <?php
        if(isset($errMsg)){
          echo '<div>'.$errMsg.'</div>';
        }
      ?>
      <div class="headergreen"><i class="fa fa-lock"></i>LOGIN</div>
      <div style="margin:30px">
          
          <form action="" method="post" name="reg" onsubmit="return validateForm()">
            <div class="form-group">
                <div class="col-lg-10">
                <input type="text" name="username" placeholder="Username">
                <br/><br />
                </div>
            </div>  
            <div class="form-group">
                <div class="col-lg-10">
                <input type="password" name="password" placeholder="Password"><br/><br />
                </div>
            </div>  
            <input type="submit" name='submit' value="Submit" class="btn"/><br />
          </form>
          
      </div>
    </div>
  </div>
    
  <?php
  $errMsg = "";
  if(isset($_POST['submit'])){
    //username and password sent from Form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
   
    if($username == '')
      echo '<script type="text/javascript">
            alert("You must enter your username!");
            </script>';

    if($password == '')
      echo '<script type="text/javascript">
            alert("You must enter your password!");
            </script>';

    if($username && $password){
        require "adminmodule/pages/fragments/connection.php";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryLogin = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' and accountStatus='Enable' ";
        $queryFail = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' and accountStatus='Enable' ";
        $records = $pdo->query($queryLogin);
        $records->execute();
        $counter = $records->rowCount();
            
        $record = $pdo->query($queryFail);
        $record->execute();
        $counters = $record->rowCount();

        if ($counters >= 1) {
            while($rows = $record->fetch(PDO::FETCH_ASSOC)){
                $dbuser = $rows["username"];
                $dbpass = $rows["password"];
                if($username == $dbuser && $password == $dbpass ) {
                    $message = "Your Account has not yet been approved. Please contact your system Administrator";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    }
            }
        }
        
        if($counter != 0){
            while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                $dbuser = $rows["username"];
                $dbpass = $rows["password"];
                
                if($username == $dbuser && $password == $dbpass ) {
                    session_start();
                    /*
                    * The whole userAccount information pack into an object and place inside the user session for further usage
                    * */
                    $accountNo = $rows["accountNo"];
                    $roleId = $rows["roleId"];
                    $name = $rows["name"];
                    $address = $rows["address"];
                    $username = $rows["username"];
                    $password = $rows["password"];
                    $accountStatus = $rows["accountStatus"];
                    $image = $rows["image"];

                    $userAccount = new UserAccount($accountNo, $dbuser, '', $roleId, $name,
                    $address, $accountStatus, $image);

                    $_SESSION["userAccount"] = $userAccount;

                    $_SESSION["username"]=$dbuser;
                    header('location:adminmodule/pages/index.php');

                }else{
                    echo '<script type="text/javascript">
                          alert("You must enter your Password!");
                          </script>';
                }
            }
        }

    }
      
    /*----For Staff-----*/
    if($username && $password){
        require "staffmodule/pages/fragments/connection.php";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryLogin = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND roleId='Staff' AND accountStatus='Enable' ";
        $queryFail = "SELECT * FROM accounts WHERE username='$username' AND password='$password' AND roleId='Staff' AND accountStatus='Enable' ";
        $records = $pdo->query($queryLogin);
        $records->execute();
        $counter = $records->rowCount();
            
        $record = $pdo->query($queryFail);
        $record->execute();
        $counters = $record->rowCount();

        if ($counters >= 1) {
            while($rows = $record->fetch(PDO::FETCH_ASSOC)){
                $dbuser = $rows["username"];
                $dbpass = $rows["password"];
                if($username == $dbuser && $password == $dbpass ) {
                    $message = "Your Account has not yet been approved. Please contact your system Administrator";         
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
        
        if($counter != 0){
            while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                $dbuser = $rows["username"];
                $dbpass = $rows["password"];
                if($username == $dbuser && $password == $dbpass ) {
                    session_start();
                    /*
                     * The whole userAccount information pack into an object and place inside the user session for further usage
                     * */
                    $accountNo = $rows["accountNo"];
                    $roleId = $rows["roleId"];
                    $name = $rows["name"];
                    $address = $rows["address"];
                    $username = $rows["username"];
                    $password = $rows["password"];
                    $accountStatus = $rows["accountStatus"];
                    $image = $rows["image"];

                    $userAccount = new UserAccount($accountNo, $dbuser, '', $roleId, $name,
                    $address, $accountStatus, $image);

                    $_SESSION["userAccount"] = $userAccount;

                    $_SESSION["username"]=$dbuser;
                    header('location:staffmodule/pages/index.php');

                }else{
                    echo '<script type="text/javascript">
                          alert("You must enter your Password!");
                          </script>';
                }
            }
        }

    } //End of Staff

  }
  ?>
  <?php
    $errMsg = "";
    /*----For Admin----*/
    if(isset($_GET['submit'])){
        //username and password sent from Form
        $username = trim($_GET['username']);
        $password = trim($_GET['password']);
        $accountStatus = $_GET['accountStatus'];
        
        //Validate if the user entered his/her Username
        if($username == '')
            echo '<script type="text/javascript">
                  alert("You must enter your Username!");
                  </script>';
        
        //Validate if the user entered his/her Password
        if($password == '')
            echo '<script type="text/javascript">
                  alert("You must enter your Password!");
                  </script>';
        
        //Query login for Admin
        if($username && $password){
            require "adminmodule/pages/fragments/connection.php";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryLogin = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' ";

            $records = $pdo->query($queryLogin);
            $records->execute();
            $counter = $records->rowCount();

            if($counter != 0){
                while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                    $dbuser = $rows["username"];
                    $dbpass = $rows["password"];
                    if($username == $dbuser && $password == $dbpass ) {
                        session_start();
                        /*
                         * The whole userAccount information pack into an object and place inside the user session for further usage
                         * */
                        $accountNo = $rows["accountNo"];
                        $roleId = $rows["roleId"];
                        $name = $rows["name"];
                        $address = $rows["address"];
                        $username = $rows["username"];
                        $password = $rows["password"];
                        $accountStatus = $rows["accountStatus"];
                        $image = $rows["image"];

                        $userAccount = new UserAccount($accountNo, $dbuser, '', $roleId, $name,
                        $address, $accountStatus, $image);

                        $_SESSION["userAccount"] = $userAccount;

                        $_SESSION["username"]=$dbuser;
                        header('location:adminmodule/pages/index.php');

                    }else{
                        echo '<script type="text/javascript">
                              alert("User not found!");
                              </script>';
                    }
                }
            }
        }
        
    } //End of Admin
  ?>

</body>

</html>

<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["username"].value;
var b=document.forms["reg"]["password"].value;
if ((a==null || a=="") && (b==null || b==""))
  {
  alert("All fields must be filled.");
  return false;
  }
}
</script>