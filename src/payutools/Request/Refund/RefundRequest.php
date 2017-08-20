<?php
/**
 * PayU Refund Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Request\Refund;


use GuzzleHttp\Psr7\Response;

use PayuTools\Response\Refund\RefundResponse;

class RefundRequest extends AbstractRefundRequest
{
    static $HTTP_REQUEST_METHOD = 'POST';
    /**
     * @var
     */
    private $orderRef;
    /**
     * @var
     */
    private $orderAmount;
    /**
     * @var
     */
    private $orderCurrency;
    /**
     * @var
     */
    private $amount;

    public function __construct($orderRef, $orderAmount, $orderCurrency, $amount)
    {
        $this->orderRef = $orderRef;
        $this->orderAmount = $orderAmount;
        $this->orderCurrency = $orderCurrency;
        $this->amount = $amount;
    }

    public function buildRequestParams()
    {
        $this->requestArray['ORDER_REF'] = $this->orderRef;
        $this->requestArray['ORDER_AMOUNT'] = $this->orderAmount;
        $this->requestArray['ORDER_CURRENCY'] = $this->orderCurrency;
        $this->requestArray['AMOUNT'] = $this->amount;
        return $this->requestArray;
    }

    public function buildResponse(Response $response)
    {
        return $this->response = new RefundResponse($response);
    }
}
