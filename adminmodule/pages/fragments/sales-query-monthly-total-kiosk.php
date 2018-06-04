<?php
/**
* sales-query-total.php
*
* Selects the total sales
* 
* @author Joneil Argao
*/
$query = $pdo->prepare("SELECT  vouchers.kioskId as kioskId, kioskName AS kioskName, COUNT(voucherCode) AS totalVoucherCode, 
        SUM(voucherAmount) AS totalAmount FROM vouchers INNER JOIN kioskmachine ON kioskmachine.kioskId = vouchers.kioskId WHERE MONTH(vouchers.dateSold)=MONTH(CURRENT_DATE()) AND vouchers.voucherStatus = 'Sold' GROUP BY kioskId ASC;");
$query->execute();
$result = $query->fetchAll();
echo "<tr>";
echo "<th>Kiosk ID</th>";
echo "<th>Kiosk Name</th>";
echo "<th>Number of Vouchers</th>";
echo "<th>Total Amount</th>";
echo "</tr>";


foreach($result as $query){
$rid = $query['totalVoucherCode'];
echo "<tr>";
echo "<td>" . $query['kioskId'] . "</td>";
echo "<td>" . $query['kioskName'] . "</td>";
echo "<td>" . $query['totalVoucherCode'] . "</td>";
echo "<td> Php " . $query['totalAmount'] . ".00</td>";
echo "</td>";
echo "</tr>";
}
$query1 = $pdo->prepare("SELECT COUNT(voucherCode) as totalVoucherCode, SUM(voucherAmount) as totalAmount FROM vouchers  WHERE MONTH(vouchers.dateSold)=MONTH(CURRENT_DATE()) and voucherStatus='Sold' and kioskId is not null");
$query1->execute();
$result1 = $query1->fetchAll();
foreach($result1 as $query1){
    $totalVoucherCode = $query1['totalVoucherCode'];
    $totalAmount = $query1['totalAmount'];
    
}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td><b>Total Vouchers Sold: </b>" . $totalVoucherCode . "</td>";
echo "<td><b>Total: </b>Php ". $totalAmount .".00</td>";
//echo "</td>";
echo "</tr>";
?>
