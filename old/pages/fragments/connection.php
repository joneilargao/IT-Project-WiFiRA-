<?php
/**
* Establishes connection.
* 
* @author Darren Sison
*/
try{
$pdo = new PDO("mysql:host=localhost;dbname=wifira","root","");
} catch (PDOException $e) {
exit("Error: Could not establish connection to database.");
}
?>
