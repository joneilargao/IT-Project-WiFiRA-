<?php
/**
* kiosk-query.php 
*
* Select kiosks from the database
* 
* @author Darren Sison
* @author Cyrene Dispo
*/ 
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT kioskId, kioskName, location, ipAddress, kioskStatus FROM `kioskmachine` ");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Kiosk ID</th>";
echo "<th>Kiosk Name</th>";
echo "<th>Location </th>";
echo "<th>IP Address</th>";
echo "<th>Status</th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['kioskId'];
echo "<tr>";
echo "<td>" . $query['kioskId'] . "</td>";
echo "<td>" . $query['kioskName'] . "</td>";
echo "<td>" . $query['location'] . "</td>";
echo "<td>" . $query['ipAddress'] . "</td>";
echo "<td>" . $query['kioskStatus'] . "</td>";
echo "</td>";

?>
</div>
</label>
</td>

<?php
echo "</td>";
echo "</tr>";
}
?>
