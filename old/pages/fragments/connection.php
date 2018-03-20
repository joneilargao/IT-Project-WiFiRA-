<?php
/**
* Establishes connection.
* 
* @author Joneil Argao
*/
try{
$pdo = new PDO("mysql:host=localhost;dbname=wifira","root","");
} catch (PDOException $e) {
exit("Error: Could not establish connection to database.");
}
?>
