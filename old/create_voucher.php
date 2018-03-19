<?php
/**
 * PHP API usage example
 *
 * contributed by: Art of WiFi
 * description: example basic PHP script to create a set of vouchers, returns an array containing the newly created vouchers
 */

/**
 * using the composer autoloader
 */
require_once('vendor/autoload.php');
require_once('vendor/art-of-wifi/unifi-api-client/src/Client.php');




/**
 * include the config file (place your credentials etc. there if not already present)
 * see the config.template.php file for an example
 */
require_once('config.php');

/**
 * minutes the voucher is valid after activation (expiration time)
 */

$voucher_expiration = $_POST['voucher_expiration'];

/**
 * the number of vouchers to create
 */
$voucher_count = $_POST['voucher_count'];

/**
 * The site where you want to create the voucher(s)
 */
$site_id = 'kfg3z2jg';

$controlleruser = 'SLU_OJT';
$controllerpassword = 'Password1';
$controllerurl = 'https://unifi.wifirawireless.com:8443';
$controllerversion = '5.6.30';

$voucher_note = $_POST['voucher_note'];
$voucher_quota = $_POST['voucher_quota'];

/**
 * initialize the UniFi API connection class and log in to the controller
 */
$unifi_connection = new UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion);
$set_debug_mode   = $unifi_connection->set_debug($debug);
$loginresults     = $unifi_connection->login();

/**
 * then we create the required number of vouchers with the requested expiration value
 */
$voucher_result = $unifi_connection->create_voucher($voucher_expiration, $voucher_count, $voucher_quota, $voucher_note);

/**
 * we then fetch the newly created vouchers by the create_time returned
 */
$vouchers = $unifi_connection->stat_voucher($voucher_result[0]->create_time);

/**
 * provide feedback (the newly created vouchers) in json format
 */
echo json_encode($vouchers, JSON_PRETTY_PRINT);
//echo print_r($vouchers);
//var_dump($data);
//var_export($data);

//echo print_r($vouchers[code]);
//echo $vouchers[0]['code'];
//echo $vouchers['code'];
//echo $vouchers->code;