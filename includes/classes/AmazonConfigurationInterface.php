<?php

/**
 * Created by PhpStorm.
 * User: lsmykla
 * Date: 14.03.18
 * Time: 12:15
 */
interface AmazonConfigurationInterface
{
    /**
     * @return string
     */
    public function getMerchantId();

    /**
     * @return string
     */
    public function getMarketplaceId();

    /**
     * @return string
     */
    public function getAccessKeyId();

    /**
     * @return string
     */
    public function getSecretKey();

    /**
     * @return string
     */
    public function getServiceUrl();

    /**
     * @return string
     */
    public function getAuthToken();

    /**
     * @return string
     */
    public function getStoreName();

    /**
     * @return boolean
     */
    public function getIsLoggingMuted();

    /**
     * @param string $merchantId
     * @return void
     */
    public function setMerchantId($merchantId = '');

    /**
     * @param string $marketplaceId
     * @return void
     */
    public function setMarketplaceId($marketplaceId = '');

    /**
     * @param string $accessKeyId
     * @return void
     */
    public function setAccessKeyId($accessKeyId = '');

    /**
     * @param string $secretKeyId
     * @return void
     */
    public function setSecretKey($secretKeyId = '');

    /**
     * @param string $serviceUrl
     * @return void
     */
    public function setServiceUrl($serviceUrl = '');

    /**
     * @param string $authToken
     * @return void
     */
    public function setAuthToken($authToken = '');

    /**
     * @param string $storeName
     * @return void
     */
    public function setStoreName($storeName = '');

    /**
     * @param boolean $isMuted
     * @return void
     */
    public function setIsLoggingMuted($isMuted = true);
}