<?php
/**
* user-query.php
*
* Select user accounts from the database
* 
* @author Darren Sison
* @author Cyrene Jane Dispo
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT accountNo, roleId, name, address, username, password, visibility, accountStatus FROM accounts WHERE roleId='Staff' AND (visibility='Visible') and (accountStatus='Enable') ");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Account Number</th>";
echo "<th>Role ID</th>";
echo "<th>Name </th>";
echo "<th>Staff Location</th>";
echo "<th>Username</th>";
echo "<th>Actions</th>";
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
echo "<td>";
	echo '<a href="fragments/account-hide.php?id='.$query['accountNo'].'"><button class="btn btn-success">Deactivate</button></a>';
?>
</div>
</label>
</td>

<?php
echo "</td>";
echo "</tr>";
}
?>



