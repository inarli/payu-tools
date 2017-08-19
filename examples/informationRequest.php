<?php
require_once "./vendor/autoload.php";
use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Token\InformationRequest;

$merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
$informationRequest = new InformationRequest('8fb4f690b90bcf822b338af35b85a5c3', 'olmadı');
$client = new Client($merchant);
$response = $client->send($informationRequest);
var_dump($response);

