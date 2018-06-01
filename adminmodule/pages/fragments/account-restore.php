<?php
/**
* account-restore.php
*
* Updates the visibility of the account to be Hidden
* 
* @author Darren Sison
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET visibility='Visible', accountStatus='Enable' WHERE accountNo=$id");
$query->execute();

if($query){
        echo '<script type="text/javascript">
              alert("Account has restored successfully!");
              location="../view-staff-profile-archive.php";
              </script>';
    } else {
        echo '<script>alert("Restoring Failed.")</script>';
    }
?>
