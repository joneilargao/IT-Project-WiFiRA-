<?php
/**
* sales-query-monthly.php
*
* Selects the monthly sales from the database
* 
* @author Darren Sison
* @author Joneil Argao
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers WHERE MONTH(datePrinted)=MONTH(CURRENT_DATE()) AND YEAR(datePrinted)=YEAR(CURRENT_DATE()) AND voucherStatus='sold' ORDER BY datePrinted DESC");
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
