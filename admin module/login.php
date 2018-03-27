<?php
/**
* login.php
*
* Login for admin module
* 
* @author Darren Sison
*/
require 'classes/UserAccount.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <title>WiFiRA ISP</title><meta charset="UTF-8" />

      <link rel="stylesheet" type="text/css" href="pages/assets/css/style.css"/>
      <link rel="stylesheet" type="text/css" href="css/style2.css"/>

    
</head>
<body background="pages/assets/img/background1.jpg" id="bg" >
  
  <div class="backimage fright" align="center">
  <img src="pages/assets/img/logo.png" alt="Avatar" class="image1">
  <div class="overlay">Wireless Internet Service Provider</div>
  </div>
  <div class="fleft" align="left">
    <div id="loginborder" align="left">
      <?php
        if(isset($errMsg)){
          echo '<div style="color:black;text-align:center;font-size:120px;">'.$errMsg.'</div>';
        }
      ?>
      <div class="headergreen"><b>WiFiRA Login</b></div>
      <div style="margin:30px">
          <form action="" method="post">
          <label class="userin"><b> Username: </b></label><input type="text" name="username" class="box"/><br /><br />
          <label class="userin"><b>Password:</b></label><input type="password" name="password" class="box" /><br/><br />
          <input type="submit" name='submit' class="btn btn-warning" value="Submit" class="col s6" class='submit' id="submit1" /><br />
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
      $errMsg .= 'You must enter your Username<br>';

    if($password == '')
      $errMsg .= 'You must enter your Password<br>';

    //if($errMsg == ''){
        if($username && $password){
            require "pages/fragments/connection.php";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryLogin = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' and accountStatus='Enable' ";
            $queryFail = "SELECT * FROM accounts WHERE username='$username' AND password='$password' and roleId='Admin' and 
              accountStatus='Enable' ";
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
                        header('location:pages/index.php');

                    }else{
                       $errMsg .= "User Credentials Not Found!";
                    }
                }
            }

    }

  }

?>
    <?php
    $errMsg = "";
    if(isset($_GET['submit'])){
        //username and password sent from Form
        $username = trim($_GET['username']);
        $password = trim($_GET['password']);

        if($username == '')
            $errMsg .= 'You must enter your Username<br>';

        if($password == '')
            $errMsg .= 'You must enter your Password<br>';

        //if($errMsg == ''){
        if($username && $password){
            require "pages/fragments/connection.php";
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
                        header('location:pages/index.php');

                    }else{
                        $errMsg .= "User Credentials Not Found!";
                    }
                }
            }

        }

    }

    ?>


    </body>

</html>
