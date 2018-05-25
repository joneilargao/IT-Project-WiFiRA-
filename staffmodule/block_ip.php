<?php
$deny = array("119.93.131.36", "192.168.10.45", "333.333.333");
if (!in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
   header("location: http://www.google.com/");
   exit();
}
?>