<?php

namespace YodleeRestApi\dto\config;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class YodleeConfig extends ConstructFromArrayOrJson
{
    /**
     * @var string
     */
    protected $apiEndpoint;

    /**
     * @var string
     */
    protected $apiVersion;

    /**
     * @var string
     */
    protected $applicationId;

    /**
     * @var string
     */
    protected $cobrandId;

    /**
     * @var string
     */
    protected $cobrandLogin;

    /**
     * @var string
     */
    protected $cobrandPass;

    /**
     * @return string
     */
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     *
     * @return $this
     */
    public function setApiEndpoint($apiEndpoint)
    {
        $this->apiEndpoint = $apiEndpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @param string $apiVersion
     *
     * @return $this
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     *
     * @return $this
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCobrandId()
    {
        return $this->cobrandId;
    }

    /**
     * @param string $cobrandId
     *
     * @return $this
     */
    public function setCobrandId($cobrandId)
    {
        $this->cobrandId = $cobrandId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCobrandLogin()
    {
        return $this->cobrandLogin;
    }

    /**
     * @param string $cobrandLogin
     *
     * @return $this
     */
    public function setCobrandLogin($cobrandLogin)
    {
        $this->cobrandLogin = $cobrandLogin;
        return $this;
    }

    /**
     * @return string
     */
    public function getCobrandPass()
    {
        return $this->cobrandPass;
    }

    /**
     * @param string $cobrandPass
     *
     * @return $this
     */
    public function setCobrandPass($cobrandPass)
    {
        $this->cobrandPass = $cobrandPass;
        return $this;
    }
}