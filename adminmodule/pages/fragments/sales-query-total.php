<?php
/**
* sales-query-total.php
*
* Selects the total sales
* 
* @author Darren Sison
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT COUNT(voucherCode) as totalvoucher, voucherType, SUM(voucherAmount) as totalsales FROM vouchers WHERE voucherStatus='Sold'  GROUP BY 2 ORDER BY dateSold");
$query->execute();
$result = $query->fetchAll();

echo "<tr>";
echo "<th>Number of Vouchers</th>";
echo "<th>Voucher Type</th>";
echo "<th>Amount </th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['totalvoucher'];
echo "<tr>";
echo "<td>" . $query['totalvoucher'] . "</td>";
echo "<td>" . $query['voucherType'] . "</td>";
echo "<td> Php " . $query['totalsales'] . ".00</td>";
echo "</td>";
echo "</tr>";
}
?>
