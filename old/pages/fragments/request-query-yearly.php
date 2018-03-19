<!-- Selects the yearly sales from the database -->
<?php
    $user= $_SESSION['userAccount'];
    $usr = $_SESSION['username'];
    $user_id = $user->getAccountId();
    $query = $pdo->prepare("SELECT voucherCode, voucherType, voucherAmount, datePrinted FROM vouchers WHERE YEAR(datePrinted)=YEAR(CURRENT_DATE()) AND voucherStatus='sold' ORDER BY datePrinted DESC");
    $query->execute();
    $result = $query->fetchAll();
    $now = new DateTime(null, new DateTimeZone('Asia/Manila'));
    
    echo $now->format('D M-j-G:i:sa');    // MySQL datetime format
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