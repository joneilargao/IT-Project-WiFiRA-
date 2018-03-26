<?php
/**
* kiosk-disable.php
*
* Updates the status of the kiosk
* 
* @author Darren Sison
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE kioskmachine SET kioskStatus='Disable' WHERE kioskId=$id");
$query->execute();


header("location:../kiosk-manage.php");
?>
