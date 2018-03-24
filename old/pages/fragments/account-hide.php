<?php
/**
* Updates the visibility of the accounts to Visible.
* 
* @author Cyrene Jane Dispo
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET visibility='Visible' WHERE accountNo=$id");
$query->execute();

header("location:../view-staff-profile.php");
?>
