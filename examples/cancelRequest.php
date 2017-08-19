<?php
require_once "./vendor/autoload.php";
use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Token\CancelRequest;

$merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
$tokenCancel = new CancelRequest('8fb4f690b90bcf822b338af35b85a5c3', 'token cancelled');
$client = new Client($merchant);
$response = $client->send($tokenCancel);
var_dump($response);
