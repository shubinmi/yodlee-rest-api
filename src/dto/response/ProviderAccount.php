<?php

namespace YodleeRestApi\dto\response;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;
use YodleeRestApi\dto\response\objects\RefreshInfoDto;

class ProviderAccount extends ConstructFromArrayOrJson
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $providerId;

    /**
     * @var string
     */
    protected $lastUpdated;

    /**
     * @var bool
     */
    protected $isManual;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @var string
     */
    protected $aggregationSource;

    /**
     * @var RefreshInfoDto
     */
    protected $refreshInfo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param int $providerId
     *
     * @return $this
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param string $lastUpdated
     *
     * @return $this
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return bool
     */
    public function isManual()
    {
        return $this->isManual;
    }

    /**
     * @param bool $isManual
     *
     * @return $this
     */
    public function setIsManual($isManual)
    {
        $this->isManual = $isManual;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param string $createdDate
     *
     * @return $this
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getAggregationSource()
    {
        return $this->aggregationSource;
    }

    /**
     * @param string $aggregationSource
     *
     * @return $this
     */
    public function setAggregationSource($aggregationSource)
    {
        $this->aggregationSource = $aggregationSource;
        return $this;
    }

    /**
     * @return RefreshInfoDto
     */
    public function getRefreshInfo()
    {
        return $this->refreshInfo;
    }

    /**
     * @param array|string $refreshInfo
     *
     * @return $this
     */
    public function setRefreshInfo($refreshInfo)
    {
        $this->refreshInfo = new RefreshInfoDto($refreshInfo);
        return $this;
    }
}