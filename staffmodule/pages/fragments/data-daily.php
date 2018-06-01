<?php 
//index.php
//$user = $_SESSION["userAccount"];
//$user_id = $user->getAccountId();
$connect = mysqli_connect("localhost", "root", "", "wifira");
$query = "SELECT COUNT(voucherId) as totalsales, dateSold FROM vouchers WHERE (dateSold is not NULL) and (WEEK(dateSold )=WEEK(CURRENT_DATE())) and ((MONTH(dateSold )=MONTH(CURRENT_DATE())) AND (YEAR(dateSold )=YEAR(CURRENT_DATE())) and (accountNo = '$user_id')) group by dateSold ORDER BY dateSold asc";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ dateSold:'".$row["dateSold"]."', totalsales:".$row["totalsales"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>