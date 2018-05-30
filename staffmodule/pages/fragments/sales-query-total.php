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
$query = $pdo->prepare("SELECT COUNT(voucherCode) as totalvoucher, voucherType, SUM(voucherAmount) as totalsales FROM vouchers  where accountNo='$user_id' GROUP BY 2 ORDER BY dateSold");
$query->execute();
$result = $query->fetchAll();
$now = new DateTime(null, new DateTimeZone('Asia/Manila'));
echo "<tr>";
echo "<th>Voucher Code</th>";
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

$query1 = $pdo->prepare("SELECT COUNT(voucherCode) as totalVoucherCode, SUM(voucherAmount) as totalAmount FROM vouchers  where accountNo='$user_id' ");
$query1->execute();
$result1 = $query1->fetchAll();
foreach($result1 as $query1){
    $totalVoucherCode = $query1['totalVoucherCode'];
    $totalAmount = $query1['totalAmount'];
    
}
echo "<tr>";
echo "<td><b>Total: </b>" . $totalVoucherCode . "</td>";
echo "<td> </td>";
echo "<td><b>Total: </b>". $totalAmount ."</td>";
//echo "</td>";
echo "</tr>";
?>
