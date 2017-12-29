<?php

namespace YodleeRestApi\dto\request;

class Accounts extends CoreRequestDto
{
    const STATUS_ACTIVE  = 'ACTIVE';
    const CONTAINER_LOAN = 'loan';

    const AVAILABLE_STATUSES   = [self::STATUS_ACTIVE, 'INACTIVE', 'TO_BE_CLOSED', 'CLOSED'];
    const AVAILABLE_CONTAINERS = [
        self::CONTAINER_LOAN, 'bank', 'creditCard', 'investment', 'insurance', 'reward', 'bill'
    ];

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $container;

    /**
     * @var int
     */
    protected $providerAccountId;

    /**
     * @return string
     */
    public function getStatus()
    {
        return strtoupper($this->status);
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $status = strtoupper($status);
        if (in_array($status, self::AVAILABLE_STATUSES)) {
            $this->status = $status;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getContainer()
    {
        return strtolower($this->container);
    }

    /**
     * @param string $container
     *
     * @return $this
     */
    public function setContainer($container)
    {
        $container = strtolower($container);
        if (in_array($container, self::AVAILABLE_CONTAINERS)) {
            $this->container = $container;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getProviderAccountId()
    {
        return $this->providerAccountId;
    }

    /**
     * @param int $providerAccountId
     *
     * @return $this
     */
    public function setProviderAccountId($providerAccountId)
    {
        $this->providerAccountId = (int)$providerAccountId;
        return $this;
    }
}