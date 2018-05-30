<?php
/**
* sales-query-yearly-total.php
*
* Selects the total yearly sales from the database
* 
* @author Darren Sison
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT COUNT(voucherCode) as totalvoucher, voucherType, SUM(voucherAmount) as totalsales FROM vouchers WHERE YEAR(dateSold)=YEAR(CURRENT_DATE()) AND accountNo='$user_id' GROUP BY 2");
$query->execute();
$result = $query->fetchAll();
$now = new DateTime(null, new DateTimeZone('Asia/Manila'));
echo "<tr>";
echo "<th>Number of Vouchers</th>";
echo "<th>Voucher Type</th>";
echo "<th>Total Sales </th>";
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
$query1 = $pdo->prepare("SELECT COUNT(voucherCode) as totalVoucherCode, SUM(voucherAmount) as totalAmount FROM vouchers  WHERE YEAR(dateSold)=YEAR(CURRENT_DATE()) AND accountNo='$user_id' ");
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
