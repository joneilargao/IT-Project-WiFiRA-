<?php
/**
* voucher-unsold-query.php
*
* Select unsold vouchers from the database
* 
* @author Darren Sison
* @author Alfa Leones
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT * FROM vouchers where voucherStatus = 'Sold'");
$query->execute();
$result = $query->fetchAll();

echo "<tr>";
echo "<th>Voucher Code</th>";
echo "<th>Voucher Type</th>";
echo "<th>Amount </th>";
echo "<th>Date</th>";
echo "<th>Status</th>";
echo "<th></th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['voucherId'];
echo "<tr>";
echo "<td>" . $query['voucherCode'] . "</td>";
echo "<td>" . $query['voucherType'] . "</td>";
echo "<td>" . $query['voucherAmount'] . "</td>";
echo "<td>" . $query['dateSold'] . "</td>";
echo "<td>" . $query['voucherStatus'] . "</td>";
echo "<td>";
echo '<a href="fragments/vouchers-sold.php?id='.$query['voucherId'].'"><button class="btn">Unsold</button></a>';
echo "</td>";
echo "</tr>";
}
?>
