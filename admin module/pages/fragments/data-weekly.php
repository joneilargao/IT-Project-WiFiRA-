<?php
/**
* data-weekly.php
*
* Selects weekly sales from the database
* 
* @author Joneil Argao
*/
header('Content-Type: application/json');

define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'wifira');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

$squery = sprintf("SELECT COUNT(salesID) as totalsales, dateUsed FROM `sales` WHERE  
(WEEK(dateUsed)=WEEK(CURRENT_DATE())) and ((MONTH(dateUsed)=MONTH(CURRENT_DATE())) AND (YEAR(dateUsed)=YEAR(CURRENT_DATE())))
 group by dateUsed ORDER BY dateUsed");

$sresult = $mysqli->query($squery);

$sdata = array();
foreach ($sresult as $srow) {
	$sdata[] = $srow;
}

$sresult->close();

$mysqli->close();

print json_encode($sdata);
?>