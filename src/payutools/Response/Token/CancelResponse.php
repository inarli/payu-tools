<?php
/**
 * PayU Cancel Response Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools\Response\Token;

use GuzzleHttp\Psr7\Response;
use PayuTools\Response\AbstractResponse;

class CancelResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        if ($response->getStatusCode() === 204) {
            $this->setStatus(self::SUCCESS_RESPONSE);
        } else {
            $this->setStatus(self::FAIL_RESPONSE);
            $responseData = $this->decodeResponse($response);
            $message = isset($responseData['meta']['status']['message']) ?
                $responseData['meta']['status']['message'] : null;
            $this->setError($message);
        }
    }
}
