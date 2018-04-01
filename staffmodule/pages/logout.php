<?php
/**
* logout.php
*
* Ends user session
* 
* @author Darren Sison
*/
session_start();
session_destroy();
header("location: ../../index.php");
?>
