<?php
/**
* account-hide.php
*
* Updates the visibility of the accounts to Visible
* 
* @author Cyrene Dispo
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET visibility='Hidden' WHERE accountNo=$id");
$query->execute();

if($query){
        echo '<script type="text/javascript">
              alert("Account has deactivate successfully!");
              location="../view-staff-profile.php";
              </script>';
    } else {
        echo '<script>alert("Archive Failed.")</script>';
    }

?>
