<?php
/**
 * PayU Merchant Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools;

class Merchant
{

    private $merchantCode;
    private $secretKey;

    public function __construct($merchantCode = null, $secretKey = null)
    {
        $this->setMerchantCode($merchantCode);
        $this->setSecretKey($secretKey);
    }

    /**
     * @return string
     */
    public function getMerchantCode()
    {
        return $this->merchantCode;
    }

    /**
     * @param string $merchantCode
     */
    public function setMerchantCode($merchantCode)
    {
        $this->merchantCode = $merchantCode;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }
}
