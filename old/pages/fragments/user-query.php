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
echo "<td>";
echo '<a href="fragments/user-reset-password.php?id='.$query['accountNo'].'"><button class="btn btn-primary">Reset Password</button></a>';
echo "</td>";
echo "<td><button id='archive' type='button' class='btn btn-success' name='archiveAccount' onclick='ArchiveAccount()';>
	Archive</button></td>";
echo "</tr>";
}


?>
