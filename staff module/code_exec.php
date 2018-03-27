<?php
/**
* code_exec.php
*
* Insert users in accounts table in the database
* 
* @author Darren Sison
*/
session_start();
include('connection.php');
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$middle_name=$_POST['middle_name'];
$address=$_POST['address'];
$phone_number=$_POST['phone_number'];
$email_address=$_POST['email_address'];
$birthday=$_POST['birthday'];
$username=$_POST['username'];
$password=$_POST['password'];
$role_id=$_POST['role_id'];
mysql_query("INSERT INTO user_account(first_name, last_name, middle_name, address, phone_number, email_address, birthday, username, password, status, role_id)VALUES('$first_name', '$last_name', '$middle_name', '$address', '$phone_number', '$email_address', '$birthday', '$username', '$password', 01, 2)");
header("location: signup.php?remarks=success");
mysql_close(1);
?>