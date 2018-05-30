<?php
/**
* sales-query-daily-total.php
*
* Selects the total daily sales from the database
* 
* @author Darren Sison
* @author Joneil Argao
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT COUNT(voucherCode) as totalvoucher, voucherType, SUM(voucherAmount) as totalsales FROM vouchers WHERE dateSold=CURDATE() and voucherStatus='Sold' GROUP BY 2 ORDER BY dateSold");
$query->execute();
$result = $query->fetchAll();
$now = new DateTime(null, new DateTimeZone('Asia/Manila'));
echo $now->format('D M-j-G:i:sa');    // MySQL datetime format
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
$query2 = $pdo->prepare("SELECT COUNT(voucherCode) as totalVoucherCode, SUM(voucherAmount) as totalAmount FROM vouchers  WHERE dateSold=CURDATE() and voucherStatus='Sold' ");
$query2->execute();
$result2 = $query2->fetchAll();
foreach($result2 as $query2){
    $totalVoucherCode = $query2['totalVoucherCode'];
    $totalAmount = $query2['totalAmount'];
    
}
echo "<tr>";
echo "<td><b>Total: </b>" . $totalVoucherCode . "</td>";
echo "<td> </td>";
echo "<td><b>Total: </b>". $totalAmount ."</td>";
//echo "</td>";
echo "</tr>";
?>
