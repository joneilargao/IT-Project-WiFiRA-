<?php
/**
* code_exec2.php
*
* Insert kiosks in kioskmachine table in the database
* 
* @author Darren Sison
*/
session_start();
include('connection.php');
$kioskId=$_POST['kioskId'];
$kioskName=$_POST['kioskName'];
$location=$_POST['location'];
$IpAddress=$_POST['IpAddress'];
$kioskStatus=$_POST['kioskStatus'];
$email_address=$_POST['email_address'];
$birthday=$_POST['birthday'];
$username=$_POST['username'];
$password=$_POST['password'];
$role_id=$_POST['role_id'];
mysql_query("INSERT INTO user_account(kioskId, kioskName, location, IpAddress, kioskStatus)VALUES('$kioskId', '$kioskName', '$location', '$IpAddress', 'Enable')");
header("location: signup.php?remarks=success");
mysql_close(1);
?>