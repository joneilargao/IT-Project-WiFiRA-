<?php
/**
* sales-query-weekly.php
*
* Selects the weekly sales from the database
* 
* @author Darren Sison
* @author Joneil Argao
*/
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, dateSold FROM vouchers WHERE WEEK(dateSold)=WEEK(CURRENT_DATE()) AND MONTH(dateSold)=MONTH(CURRENT_DATE()) AND YEAR(dateSold)=YEAR(CURRENT_DATE()) AND voucherStatus='Sold' AND accountNo='$user_id' ORDER BY dateSold DESC");
$query->execute();
$result = $query->fetchAll();
$now = new DateTime(null, new DateTimeZone('Asia/Manila'));
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
echo "<td>" . $query['dateSold'] . "</td>";
echo "</td>";
echo "</tr>";
}
?>
