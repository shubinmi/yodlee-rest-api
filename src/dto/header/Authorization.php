<?php

namespace YodleeRestApi\dto\header;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class Authorization extends ConstructFromArrayOrJson
{
    /**
     * @var string
     */
    public $cobSession;

    /**
     * @var string
     */
    public $userSession;

    /**
     * @return string
     */
    public function getCobSession()
    {
        return $this->cobSession;
    }

    /**
     * @param string $cobSession
     *
     * @return $this
     */
    public function setCobSession($cobSession)
    {
        $this->cobSession = $cobSession;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserSession()
    {
        return $this->userSession;
    }

    /**
     * @param string $userSession
     *
     * @return $this
     */
    public function setUserSession($userSession)
    {
        $this->userSession = $userSession;
        return $this;
    }

    /**
     * @return string
     */
    public function toHeaderParam()
    {
        $params = $this->toArray();
        $value = '{';
        foreach ($params as $property => $param) {
            $value .= $property . '=' . $param . ',';
        }
        $value .= '}';

        return $value;
    }
}