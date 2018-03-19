<?php
header('Content-Type: application/json');
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'wifira');
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
die("Connection failed: " . $mysqli->error);
}
$squery = sprintf("SELECT salesID, dateUsed FROM `sales` ORDER BY salesId");
$sresult = $mysqli->query($squery);
$sdata = array();
foreach ($sresult as $srow) {
$sdata[] = $srow;
}
$sresult->close();
$mysqli->close();
print json_encode($sdata);
?>
