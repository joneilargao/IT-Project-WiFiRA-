		<?php
/**
* Updates the visibility of the account to be Hidden.
* 
* @author Cyrene Jane Dispo
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET visibility='Hidden' WHERE accountNo=$id");
$query->execute();

header("location:../view-staff-profile.php");
?>
