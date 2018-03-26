<?php

include 'connection.php';

$id=$_GET['id'];

$query = $pdo->prepare("UPDATE vouchers SET voucherStatus='Sold' WHERE voucherId=$id");
$query->execute();

header("location:../vouchers-unsold.php");

?>
