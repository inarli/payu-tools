<?php
require_once "./vendor/autoload.php";
use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Token\HistoryRequest;

$merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
$historyRequest = new HistoryRequest('8fb4f690b90bcf822b338af35b85a5c3');
$client = new Client($merchant);
$response = $client->send($historyRequest);
var_dump($response);

