<?php
/**
* 
*
*
* 
* 
*/ 
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT voucherType, sum(voucherAmount) from vouchers where (voucherStatus = 'Sold') and (WEEK(datePrinted)=WEEK(CURRENT_DATE())) and ((MONTH(datePrinted)=MONTH(CURRENT_DATE())) AND (YEAR(datePrinted)=YEAR(CURRENT_DATE()))) group by 1;");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Voucher Type</th>";
echo "<th>Sales</th>";
echo "</tr>";
foreach($result as $query){
$rid = $query['voucherType'];
echo "<tr>";
echo "<td>" . $query['voucherType'] . "</td>";
echo "<td>" . $query['sum(voucherAmount)'] . "</td>";


}

?>

