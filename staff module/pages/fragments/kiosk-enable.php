<?php
/**
* kiosk-enable.php
*
* Updates the status of the kiosk
* 
* @author Darren Sison
*/ 
include 'connection.php';
$id=$_GET['id'];

$query = $pdo->prepare("UPDATE kioskmachine SET kioskStatus='Enable' WHERE kioskId=$id");
$query->execute();

if($query){
        echo '<script type="text/javascript">
              alert("Kiosk Enabled!");
              location="../kiosk-manage.php";
              </script>';
    } else {
        echo '<script>alert("Kiosk Enable Failed.")</script>';
    }
?>
