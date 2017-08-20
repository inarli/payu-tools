<?php
require_once "./vendor/autoload.php";
use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Refund\RefundRequest;

$merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
$refundRequest = new RefundRequest(38821779, '241.94', 'TRY', '100');
$client = new Client($merchant);
$response = $client->send($refundRequest);
var_dump($response);

