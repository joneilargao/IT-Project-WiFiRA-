<?php
/**
* sales-query-monthly-total.php
*
* Selects total monthly sales from the database
* 
* @author Darren Sison
* @author Joneil Argao
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT COUNT(voucherCode) as totalvoucher, voucherType, SUM(voucherAmount) as totalsales FROM vouchers WHERE MONTH(dateSold)=MONTH(CURRENT_DATE()) AND voucherStatus='Sold' AND YEAR(dateSold)=YEAR(CURRENT_DATE()) group by 2");  
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
echo "<td>" . $query['totalsales'] . ".00</td>";
echo "</td>";
echo "</tr>";
}
$query1 = $pdo->prepare("SELECT COUNT(voucherCode) as totalVoucherCode, SUM(voucherAmount) as totalAmount FROM vouchers  WHERE MONTH(dateSold)=MONTH(CURRENT_DATE()) AND voucherStatus='Sold' AND YEAR(dateSold)=YEAR(CURRENT_DATE()) ");
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
