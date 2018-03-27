<?php
/**
* Daily sales report
*
*
* 
* 
*/ 
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT voucherType, sum(voucherAmount) from vouchers where voucherStatus = 'Sold'and (dateUsed=CURDATE()) group by 1;");
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

