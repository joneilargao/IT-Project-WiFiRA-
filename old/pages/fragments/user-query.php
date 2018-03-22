<?php
/**
* Select user accounts from the databasee.
* 
* @author Darren Sison
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT accountNo, roleId, name, address, username, password FROM accounts WHERE roleId='Staff' ");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Account Number</th>";
echo "<th>Role ID</th>";
echo "<th>Name </th>";
echo "<th>Address</th>";
echo "<th>Username</th>";
echo "<th>Password</th>";
echo "<th> </th>";
echo "<th> </th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['accountNo'];
echo "<tr>";
echo "<td>" . $query['accountNo'] . "</td>";
echo "<td>" . $query['roleId'] . "</td>";
echo "<td>" . $query['name'] . "</td>";
echo "<td>" . $query['address'] . "</td>";
echo "<td>" . $query['username'] . "</td>";
echo "<td><input type='submit'name='ResetPasswordForm' value='Reset Password' query='update password from accounts'></td>";
echo "<td><button id='archive' type='button' class='btn btn-success' name='archiveAccount' onclick='ArchiveAccount()';>
	Archive</button></td>";
echo "</td>";
echo "</tr>";
}


function updater($value,$id){
    // Create connection
    $conn = new mysqli( 'localhost' , 'root' , '' ,'wifira' );
    $value =mysqli_real_escape_string($conn,$value);
    $id =mysqli_real_escape_string($conn,$accountNo);
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }   
    $sql = "UPDATE accounts SET visibility='Hidden' WHERE accountNo='{$accountNo}'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}   

if(isset($_POST['visibility'])){
    updater($_POST['visibility'],$_POST['accountNo']);
}
  


?>
