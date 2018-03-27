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

if($query){
        echo '<script type="text/javascript">
              alert("Kiosk Disabled!");
              location="../kiosk-manage.php";
              </script>';
    } else {
        echo '<script>alert("Kiosk Disable Failed.")</script>';
    }
?>
