<?php
/**
* voucher-sold.php
*
* Select sold vouchers from the database
* 
* @author Alfa Leones
*/
include 'connection.php';

$id=$_GET['id'];

$query = $pdo->prepare("UPDATE vouchers SET voucherStatus='Sold' WHERE voucherId=$id");
$query->execute();

header("location:../vouchers-unsold.php");

?>
