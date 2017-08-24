<?php

namespace PayuTools\Request\v1\Token;


use PayuTools\Merchant;
use PayuTools\Request\AbstractRequest;

class AbstractTokenRequest extends AbstractRequest
{
    protected $endpoint = 'https://secure.payu.com.tr/order/tokens/';

    public function signature(Merchant $merchant)
    {
        $requestParams = $this->buildRequestParams();
        $requestParams['MERCHANT'] = $merchant->getMerchantCode();
        $requestParams['TIMESTAMP'] = gmdate('YmdHis');
        ksort($requestParams);
        $hashString = '';
        foreach ($requestParams as $param) {
            $hashString .= strlen($param) . $param;
        }
        $requestParams['SIGN'] = hash_hmac('md5', $hashString, $merchant->getSecretKey());
        return $requestParams;
    }
}
