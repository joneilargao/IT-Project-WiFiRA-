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

$squery = sprintf("SELECT COUNT(voucherId) as totalsales, dateSold as dateUsed FROM vouchers WHERE (dateSold is not null) and  
((MONTH(dateSold)=MONTH(CURRENT_DATE())) AND (YEAR(dateSold)=YEAR(CURRENT_DATE())))
 group by dateSold ORDER BY dateSold");

$sresult = $mysqli->query($squery);

$sdata = array();
foreach ($sresult as $srow) {
	$sdata[] = $srow;
}

$sresult->close();

$mysqli->close();

print json_encode($sdata);
?>