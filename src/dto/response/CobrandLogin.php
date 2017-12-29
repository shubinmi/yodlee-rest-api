<?php

namespace YodleeRestApi\dto\response;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;
use YodleeRestApi\dto\header\Authorization;

class CobrandLogin extends ConstructFromArrayOrJson
{
    /**
     * @var int
     */
    public $cobrandId;

    /**
     * @var string
     */
    public $applicationId;

    /**
     * @var string
     */
    public $locale;

    /**
     * @var Authorization
     */
    public $session;

    /**
     * @return int
     */
    public function getCobrandId()
    {
        return $this->cobrandId;
    }

    /**
     * @param int $cobrandId
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
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return Authorization
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param string|array $session
     *
     * @return $this
     */
    public function setSession($session)
    {
        $this->session = new Authorization($session);
        return $this;
    }
}