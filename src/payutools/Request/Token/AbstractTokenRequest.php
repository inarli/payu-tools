<?php
/**
 * PayU Abstract Token Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools\Request\Token;


use PayuTools\Merchant;
use PayuTools\Request\AbstractRequest;

class AbstractTokenRequest extends AbstractRequest
{
    protected $endpoint = 'https://secure.payu.com.tr/order/token/v2/merchantToken';

    public function signature(Merchant $merchant)
    {
        $requestParams = array_unique($this->buildRequestParams());
        $requestParams['merchant'] = $merchant->getMerchantCode();
        $requestParams['timestamp'] = time();
        ksort($requestParams);
        $hashString = '';
        foreach ($requestParams as $param) {
            $hashString .= $param;
        }
        $requestParams['signature'] = hash_hmac('SHA256', $hashString, $merchant->getSecretKey());
        return $requestParams;
    }
}
