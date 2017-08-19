<?php
/**
 * PayU History Response Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools\Response\Token;

use GuzzleHttp\Psr7\Response;
use PayuTools\Response\AbstractResponse;

class HistoryResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $responseData = $this->decodeResponse($response);
        if ($response->getStatusCode() === 200) {
            $this->setStatus(self::SUCCESS_RESPONSE);
            $this->setData($responseData['info']);
        } else {
            $this->setStatus(self::FAIL_RESPONSE);
            $message = isset($responseData['meta']['status']['message']) ?
                $responseData['meta']['status']['message'] : null;
            $this->setError($message);
        }
    }
}
