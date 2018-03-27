<?php
/**
* user-reset-password.php
*
* Select user accounts from the database
* 
* @author Darren Sison
* @author Katherine Turqueza
*/
include 'connection.php';

$id = $_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET password = '000' WHERE accountNo=$id");
$query->execute();

    if($query){
        echo '<script type="text/javascript">
              alert("Password Reset Successful!");
              location="../view-staff-profile.php";
              </script>';
    } else {
        echo '<script>alert("Password Reset Failed.")</script>';
    }

?>