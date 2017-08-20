<?php
/**
 * PayU Abstract Refund Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Request\Refund;


use PayuTools\Merchant;
use PayuTools\Request\AbstractRequest;

class AbstractRefundRequest extends AbstractRequest
{
    protected $endpoint = 'https://secure.payu.com.tr/order/irn.php';

    /**
     * @param \PayuTools\Merchant $merchant
     *
     * @return array
     */
    public function signature(Merchant $merchant)
    {
        $requestParams = array_unique($this->buildRequestParams());
        $requestParams['MERCHANT'] = $merchant->getMerchantCode();
        $requestParams['IRN_DATE'] = date('Y-m-d H:i:s');

        $hashString = strlen($requestParams['MERCHANT']) . $requestParams['MERCHANT'] . strlen($requestParams['ORDER_REF']) . $requestParams['ORDER_REF'];
        $hashString .= strlen($requestParams['ORDER_AMOUNT']) . $requestParams['ORDER_AMOUNT'] . strlen($requestParams['ORDER_CURRENCY']) . $requestParams['ORDER_CURRENCY'];
        $hashString .= strlen($requestParams['IRN_DATE']) . $requestParams['IRN_DATE'] . strlen($requestParams['AMOUNT']) . $requestParams['AMOUNT'];

        $requestParams['ORDER_HASH'] = hash_hmac('md5', $hashString, $merchant->getSecretKey());
        return $requestParams;
    }
}
