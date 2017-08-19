### PHP Client For PayU

You can send request to PayU Rest API with this library;

Example;
```php
<?php
require_once '../vendor/autoload.php';
    $merchant = new \PayuTools\Merchant('OPU_TEST', 'SECRET_KEY');
    $client = new \PayuTools\Client($merchant);
    $cancelRequest = new \PayuTools\Request\Token\CancelRequest('5213b33bad3c07e87e8f032c94452bdc', 'Token cancelled');
    $response = $client->send($cancelRequest);
    var_dump($response->getStatus());
    var_dump($response->getError());
    var_dump($response->getData());
?>
```
