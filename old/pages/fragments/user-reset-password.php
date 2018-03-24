<?php

include 'connection.php';

$id = $_GET['id'];

$query = $pdo->prepare("UPDATE accounts SET password = '000' WHERE accountNo=$id");
$query->execute();

//header("location:../view-staff-profile.php");

?>