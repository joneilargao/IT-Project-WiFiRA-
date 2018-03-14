<?php
    $user= $_SESSION['userAccount'];
    $usr = $_SESSION['username'];
    $user_id = $user->getAccountId();
    $query = $pdo->prepare("SELECT COUNT(voucherCode) as totalvoucher, voucherType, SUM(voucherAmount) as totalsales FROM vouchers  GROUP BY 2 ORDER BY datePrinted");
    $query->execute();
    $result = $query->fetchAll();
    $now = new DateTime(null, new DateTimeZone('Asia/Manila'));
    
    echo $now->format('D M-j-G:i:sa');    // MySQL datetime format
    echo "<tr>";
    echo "<th>Voucher Code</th>";
    echo "<th>Voucher Type</th>";
    echo "<th>Amount </th>";
    echo "</tr>";

    foreach($result as $query){
        $rid = $query['totalvoucher'];
        echo "<tr>";
        echo "<td>" . $query['totalvoucher'] . "</td>";
        echo "<td>" . $query['voucherType'] . "</td>";
        echo "<td> Php " . $query['totalsales'] . ".00</td>";

        echo "</td>";
        echo "</tr>";
        
    }
?>