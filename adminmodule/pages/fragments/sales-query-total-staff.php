<?php
/**
* sales-query-total.php
*
* Selects the total sales
* 
* @author Joneil Argao
*/


$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query3 = $pdo->prepare("SELECT vouchers.accountNo as IDno, accounts.name as name, COUNT(vouchers.voucherCode) as totalvoucher, SUM(voucherAmount) as totalsales FROM vouchers inner join accounts on vouchers.accountNo = accounts.accountNo where voucherStatus='Sold' 
group by accounts.accountNo Asc");
$query3->execute();
$result3 = $query3->fetchAll();

echo "<tr>";
echo "<th>Account ID</th>";
echo "<th>Account Name</th>";
echo "<th>Number of Vouchers</th>";
echo "<th>Total Amount</th>";
echo "</tr>";
foreach($result3 as $query3){
$rid3 = $query3['totalvoucher'];
echo "<tr>";
echo "<td>" . $query3['IDno'] . "</td>";
echo "<td>" . $query3['name'] . "</td>";
echo "<td>" . $query3['totalvoucher'] . "</td>";
echo "<td> Php " . $query3['totalsales'] . ".00</td>";
echo "</td>";
echo "</tr>";
}
$query1 = $pdo->prepare("SELECT COUNT(voucherCode) as totalVoucherCode, SUM(voucherAmount) as totalAmount FROM vouchers  WHERE voucherStatus='Sold' and accountNo is not null");
$query1->execute();
$result1 = $query1->fetchAll();
foreach($result1 as $query1){
    $totalVoucherCode = $query1['totalVoucherCode'];
    $totalAmount = $query1['totalAmount'];
    
}
echo "<tr>";
echo "<td><b>Total Vouchers Sold: </b>" . $totalVoucherCode . "</td>";
echo "<td> </td>";
echo "<td><b>Total: </b>Php ". $totalAmount .".00</td>";
//echo "</td>";
echo "</tr>";
?>