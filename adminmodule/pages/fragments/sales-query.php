<?php
/**
* sales-query.php
*
* Selects the sales
* 
* @author Darren Sison
* @author Joneil Argao
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers where voucherStatus='sold' order by dateprinted DESC");
$query->execute();
$result = $query->fetchAll();

echo "<tr>";
echo "<th>Voucher Code</th>";
echo "<th>Voucher Type</th>";
echo "<th>Amount </th>";
echo "<th>Date</th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['voucherCode'];
echo "<tr>";
echo "<td>" . $query['voucherCode'] . "</td>";
echo "<td>" . $query['voucherType'] . "</td>";
echo "<td>" . $query['voucherAmount'] . "</td>";
echo "<td>" . $query['datePrinted'] . "</td>";
echo "</td>";
echo "</tr>";
}
?>
