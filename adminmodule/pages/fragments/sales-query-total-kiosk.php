<?php
/**
* sales-query-total.php
*
* Selects the total sales
* 
* @author Katherine A. Turqueza
*/
$query = $pdo->prepare("SELECT  vouchers.kioskId as kioskId, kioskName AS kioskName, COUNT(voucherCode) AS totalVoucherCode, 
        SUM(voucherAmount) AS totalAmount FROM vouchers INNER JOIN kioskmachine ON kioskmachine.kioskId = vouchers.kioskId WHERE vouchers.voucherStatus = 'Sold' GROUP BY kioskId ASC;");
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
?>