<?php

namespace PayuTools\Response\v1\Token;


use GuzzleHttp\Psr7\Response;
use PayuTools\Response\AbstractResponse;

class TokenV1PaymentResponse extends AbstractResponse
{
    private $transferRefNo;

    /**
     * TokenV1PaymentResponse constructor.
     *
     * @param $response
     */
    public function __construct(Response $response)
    {
        $responseData = $this->decodeResponse($response);
        if ($responseData['code'] == 0 && $responseData['message'] == 'Operation successful') {
            $this->setStatus(AbstractResponse::SUCCESS_RESPONSE);
            $this->setTransferRefNo($responseData['tran_ref_no']);
        } else {
            $this->setStatus(AbstractResponse::FAIL_RESPONSE);
            $this->setErrorCode($responseData['code']);
            $this->setError($responseData['message']);
        }
    }

    /**
     * @return mixed
     */
    public function getTransferRefNo()
    {
        return $this->transferRefNo;
    }

    /**
     * @param mixed $transferRefNo
     */
    public function setTransferRefNo($transferRefNo)
    {
        $this->transferRefNo = $transferRefNo;
    }

}
