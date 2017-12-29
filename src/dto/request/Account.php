<?php

namespace YodleeRestApi\dto\request;

class Account extends CoreRequestDto
{
    /**
     * @var string
     */
    protected $container = Accounts::CONTAINER_LOAN;

    /**
     * @return string
     */
    public function getContainer()
    {
        return $this->container;
    }
}