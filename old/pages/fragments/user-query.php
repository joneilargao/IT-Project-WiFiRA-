<?php
/**
* Select user accounts from the databasee.
* 
* @author Darren Sison
		  Cyrene Jane Dispo
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT accountNo, roleId, name, address, username, password, visibility FROM accounts WHERE roleId='Staff' AND visibility='Visible' ");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Account Number</th>";
echo "<th>Role ID</th>";
echo "<th>Name </th>";
echo "<th>Address</th>";
echo "<th>Username</th>";
echo "<th>Actions</th>";
echo "<th> </th>";
echo "<th></th>";
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
echo "<button class='btn btn-primary' data-toggle='modal' data-target='#myModal3'>Reset Password</button>
      <div class='modal fade' data-toggle='modal' id='myModal3' role='dialog'>
            <div class='modal-dialog'>
                  <div class='modal-content'>
                  <div class='modal-header' align='center'>
                  <h4 class='modal-title'>Password has been reset.</h4>";
                      echo '<a href="fragments/user-reset-password.php?id='.$query['accountNo'].'"><button class="btn btn-success">Okay</button></a>';
echo             "</div>
                  </div>
            </div>  
        </div>";
echo "</td>";
echo "<td>";
	echo '<a href="fragments/account-hide.php?id='.$query['accountNo'].'"><button class="btn btn-success">Archive</button></a>';
?>
</div>
</label>
</td>

<?php
echo "</td>";
echo "</tr>";
}
?>



