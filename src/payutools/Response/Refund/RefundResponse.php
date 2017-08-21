<?php
/**
 * PayU Refund Response Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Response\Refund;

use GuzzleHttp\Psr7\Response;
use PayuTools\Exceptions\ResponseParserException;
use PayuTools\Response\AbstractResponse;

class RefundResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $responseParams = $this->responseParser($response->getBody()->getContents());

        if ($responseParams[2] === 'OK') {
            $this->setStatus(self::SUCCESS_RESPONSE);
            $this->setData([
                'order_ref' => $responseParams[0],
                'response_code' => $responseParams[1],
                'response_msg' => $responseParams[2],
                'idn_date' => $responseParams[3],
                'order_hash' => $responseParams[4]
            ]);
        } else {
            $this->setStatus(self::FAIL_RESPONSE);
            $this->setError($responseParams[2]);
            $this->setErrorCode($responseParams[1]);
        }
    }

    /**
     * @param $xmlContent
     *
     * @return array
     * @throws \PayuTools\Exceptions\ResponseParserException
     */
    private function responseParser($xmlContent)
    {
        $xml = simplexml_load_string($xmlContent);
        $parsedParams = explode('|', $xml);
        if (count($parsedParams) < 5) {
            throw new ResponseParserException('Payu Response Parse Failed.');
        }

        return $parsedParams;
    }
}
