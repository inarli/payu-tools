<?php

namespace PayuTools\Request\v1\Token;

use GuzzleHttp\Psr7\Response;
use PayuTools\Response\v1\Token\TokenV1PaymentResponse;

class PaymentRequest extends AbstractTokenRequest
{
    static $HTTP_REQUEST_METHOD = 'POST';

    protected $externalRef;
    private $amount;
    private $currency;
    private $refNo;

    public function __construct($amount, $currency, $refNo, $externalRef)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->refNo = $refNo;
        $this->externalRef = $externalRef;
    }

    public function buildRequestParams()
    {
        $this->requestArray['METHOD'] = 'TOKEN_NEWSALE';
        $this->requestArray['REF_NO'] = $this->refNo;
        $this->requestArray['AMOUNT'] = $this->amount;
        $this->requestArray['CURRENCY'] = $this->currency;
        $this->requestArray['EXTERNAL_REF'] = $this->externalRef;
        return $this->requestArray;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return \GuzzleHttp\Psr7\Response|void
     */
    public function buildResponse(Response $response)
    {
        $this->response = new TokenV1PaymentResponse($response);
    }
}
