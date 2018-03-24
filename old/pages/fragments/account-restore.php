<?php
/**
* Updates the visibility of the account to be Hidden.
* 
* @author Darren Sison
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET visibility='Visible' WHERE accountNo=$id");
$query->execute();

header("location:../view-staff-profile-archive.php");
?>
