
<?php
/**
* voucher-unsold-query.php
*
* Select unsold vouchers from the database
* 
* @author Joneil Argao
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT * FROM vouchers where accountNo='$user_id' order by datePrinted desc;");
$query->execute();
$result = $query->fetchAll();

echo "<tr>";
echo "<th>Voucher Id</th>";
echo "<th>Voucher Code</th>";
echo "<th>Voucher Type</th>";
echo "<th>Amount </th>";
echo "<th>Date Created</th>";
echo "<th>Status</th>";
echo "<th></th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['voucherId'];
echo "<tr>";
echo "<td>" . $query['voucherId'] . "</td>";
echo "<td>" . $query['voucherCode'] . "</td>";
echo "<td>" . $query['voucherType'] . "</td>";
echo "<td>" . $query['voucherAmount'] . "</td>";
echo "<td>" . $query['datePrinted'] . "</td>";
echo "<td>" . $query['voucherStatus'] . "</td>";
echo "<td>";
	if ($query['voucherStatus']=='Sold'){
		echo '<a href="fragments/vouchers-sold.php?id='.$query['voucherId'].'"><button class="btn">Unsold</button></a>';
	}
	else{
		echo '<a href="fragments/vouchers-unsold.php?id='.$query['voucherId'].'"><button class="btn">Sold</button></a>';
	}
echo "</td>";
echo "</tr>";
}
?>
