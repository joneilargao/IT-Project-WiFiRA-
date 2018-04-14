<?php
/*------------------------------------------------------------------------
January 2016
To suit Version 4.x.x of Unifi Controller, will NOT work on 3.x.x i dont think, not tried.
Version 4.0 of Unifi Easy Voucher Creator, written by Wozzzzz from UBNT UniFi Forums.
Change these 3 variables below, line 33-40, to suit your unifi setup
That is it, all you have to do, then run the script, dont rename it else it wont work.
This is an easy to use script for any front desk staff to creat vouchers instantly for any guests who want to use the internet.
No passwords needed to login, not good for security though but easy and safe in my setup any way. i have added security in a way that
if you set it up on your local server if anyone else tries to acess it the script will not work, lines 19-22
Logo escposlogo.png at top of voucher is maximum 384 pixels wide 
------------------------------------------------------------------------
*/
	
//This line will allow access to this script ONLY from the IP address specified else it will not work.
//Change this IP address if you will use this script from another computer and not the local machine the webserver is installed on.
//Uncomment these 4 lines to implement the security function

//if($_SERVER["REMOTE_ADDR"] != "127.0.0.1"){
//	echo"You do not have access to this script.";
// 	exit();
//}

	require("/unifi/unifi/phpapi/class.unifi.php");

	session_start();
	$time_start = microtime(true);
	
	/*
	assign variables required later on  together with their default values
	*/

	$ssid = 'WIFIRA';
	$siteid = 'kfg3z2jg'; 										//The name of your site
	$username = 'SLU_OJT';								//username for controller
	$password = 'Password1';								//Password for controller
	$baseurl = 'https://unifi.wifirawireless.com:8443';	//URL to access controller
	$controllerversion = "4.7.6";						//Version of controller
    $printername = "VoucheerPrinter";				//Name of the printer from PC


	$unifidata = new unifiapi($username, $password, $baseurl, $siteid, $controllerversion);
	$loginresults = $unifidata->login();
	if($loginresults === 400) {
	    echo '<div class="alert alert-danger" role="alert">HTTP response status: 400<br>This is probably caused by a Unifi controller login failure, please check your credentials in config.php</div>';
	}


////////////////////////////////////
//
//You shouldn't need to change anything under this line unless you want to customize the script.
//
////////////////////////////////////
    
		
            $voucherlength='120';
            $number = '1';
            $notes='';
            $up='';
            $down='';
            $mb='';
			 $vouchers = $unifidata->create_voucher($voucherlength, $number, $notes, $up, $down, $mb);

			$voucherstring = "";
                foreach($vouchers as $data){	
				$voucherstring .= $data."\n";

	
		//send info to printer for printing vouchers.
                }
		require_once(dirname(__FILE__) . "/unifi/escpos/Escpos.php");
		$connector = null;
		$connector = new WindowsPrintConnector($printername);
		
		$printer = new Escpos($connector);
		
		/* Initialize Printer */
		$printer -> initialize();
		$printer -> setJustification(Escpos::JUSTIFY_CENTER);		
		
		$printer -> setTextSize(1, 1);
		$printer -> text("WiFiRa WISP\n");

	
		$printer -> setTextSize(2, 2);
		$printer -> text($voucherstring."\n");
		
		$printer -> setTextSize(1, 1);
		$printer -> text("Valid For 2 Hours from Login\n\n");

		$printer -> setTextSize(1, 1);
		$printer -> text("Connect to Hotspot\n");
		$printer -> text("'".$ssid."'\n");
		
		$printer -> text("\n\n\n\n");
		
		$printer -> cut();
		$printer -> close();		
		
		

				    
        $vouchers1 = json_decode(json_encode($vouchers), true);
//        echo $vouchers1[0];

    	$voucherType = "A";
		$voucherAmount = "10";

	$voucherCode = $vouchers1[0];
	$db = mysqli_connect("localhost", "root", "", "wifira");

	$voucherStatus = "Sold";
//	$accountNo = $user->getAccountId();
    $kioskId = '101';

	$query = "INSERT INTO vouchers(voucherCode, voucherType, voucherAmount, voucherStatus, datePrinted, accountNo, kioskId, dateSold) VALUES ('$voucherCode', '$voucherType', '$voucherAmount', '$voucherStatus', CURDATE(), NULL, '$kioskId', CURDATE())";
                            $insert = $db->query($query);

                            if($insert){
                                echo "Success!";
                            } else {
                                die ("Error: {$db->errno} : {$db->error}");
                            }

                            $db->close();
?>
