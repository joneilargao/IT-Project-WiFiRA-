<?php
/**
* voucher-sold.php
*
* Select sold vouchers from the database
* 
* @author Alfa Leones
* @author Cyrene Dispo
*/
include 'connection.php';

$id=$_GET['id'];

$query = $pdo->prepare("UPDATE vouchers SET voucherStatus='Unsold' WHERE voucherId=$id");
$query->execute();

if($query){
        echo '<script type="text/javascript">
              alert("Voucher declared as Unsold!");
              location="../vouchers-sold.php";
              </script>';
    } else {
        echo '<script>alert("Voucher Unsold Failed.")</script>';
    }
?>