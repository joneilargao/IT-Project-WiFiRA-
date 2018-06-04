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
    $kioskId = $query['kioskId'];
    $kioskName = $query['kioskName'];
    $totalVoucherCode = $query['totalVoucherCode'];
    $totalAmount = $query['totalAmount'];
    
}
echo "<tr>";
echo "<td>" . $kioskId . "</td>";
echo "<td>" . $kioskName . "</td>";
echo "<td>" . $totalVoucherCode . "</td>";
echo "<td>". $totalAmount ."</td>";
echo "</tr>";
?>