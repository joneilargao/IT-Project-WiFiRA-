<?php
$deny = array("119.93.131.36", "124.104.99.239", "13.251.17.193", "122.54.75.66");
if (!in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
   header("location: http://www.google.com/");
   exit();
}
?>