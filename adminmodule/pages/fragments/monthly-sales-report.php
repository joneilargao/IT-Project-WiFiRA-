<?php
/**
* 
* monthly-sales-report.php
*
* Code for the monthly sales report of the system.
*
* @author Darren Sison
*/ 
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT count(voucherCode), voucherType, sum(voucherAmount) from vouchers where (voucherStatus = 'Sold')and ((MONTH(datePrinted)=MONTH(CURRENT_DATE())) AND (YEAR(datePrinted)=YEAR(CURRENT_DATE())))
group by 2;");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Voucher Type</th>";
echo "<th>Vouchers Sold</th>";
echo "<th>Sales</th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['voucherType'];
echo "<tr>";
echo "<td>" . $query['voucherType'] . "</td>";
echo "<td>" . $query['count(voucherCode)'] . "</td>";
echo "<td>" . $query['sum(voucherAmount)'] . "</td>";
echo "</tr>";

}

?>

