<?php
require_once "./vendor/autoload.php";

use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\v1\Token\PaymentRequest;

$merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
$refundRequest = new PaymentRequest(50, 'TRY', '34294641', 'ASD');
$client = new Client($merchant);
$response = $client->send($refundRequest);
var_dump($response);

