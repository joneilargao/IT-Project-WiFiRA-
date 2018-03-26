<?php
include 'connection.php';

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image= $pdo->prepare("INSERT INTO accounts VALUES('$imagetmp','$imagename') where accountNo = '1'");
// $query = $pdo->prepare("UPDATE accounts SET visibility='Hidden' WHERE accountNo=$id");
$insert_image->execute();

//mysql_query($insert_image);

?>