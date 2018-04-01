<?php
require('fpdf17/fpdf.php');
require('fragments/connection.php');
include 'fragments/connection.php';

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'wifira');

//get invoices data
require '../classes/UserAccount.php';
session_start();
function echoActiveClassIfRequestMatches($requestUri){
$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
if ($current_file_name == $requestUri)
echo 'class="active-menu"';
}
$user= $_SESSION['userAccount'];
$usr = $_SESSION['username'];
$user_id = $user->getAccountId();
$query = mysqli_query($con,"SELECT * FROM vouchers WHERE datePrinted is NULL and accountNo = '$user_id'");




//db connection

//get invoices data



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

	while($result = mysqli_fetch_array($query)){
						
		
        // Go to next column
        
    			
		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','B',10);
		//Cell(width , height , text , border , end line , [align] )
		$pdf->Cell(30	,5,'WiFiRA Wireless','LTR',0,'C');
		$pdf->Cell(0	,5,'',0,1);//end of line
		//set font to arial, regular, 12pt
		$pdf->Cell(30	,5,'Voucher','LR',0,'C');
		$pdf->Cell(0	,5,'',0,1);
		$pdf->SetFont('Times','',9);
		$pdf->Cell(30	,5,'Valid for 1 day','LR',0,'C');
		$pdf->Cell(0	,5,'',0,1);//end of line
		$pdf->SetFont('Arial','BU',12);
		$pdf->Cell(30	,5,$result['voucherCode'],'LR',0,'C');
		$pdf->Cell(0	,5,'',0,1);//end of line
		$pdf->SetFont('Times','',8);
		$pdf->Cell(30	,5,'Byte Quota: Unlimited','LRB',0,'C');
		$pdf->Cell(0	,5,'',0,1);//end of line
		$pdf->Cell(30	,5,'',0,0,'C');
		$pdf->Cell(0	,5,'',0,1);
        $query1 = $pdo->prepare("UPDATE vouchers SET datePrinted=CURDATE() WHERE accountNo = '$user_id' ");
        $query1->execute();

	
}





$pdf->Output();
?>
