<?php

namespace YodleeRestApi\dto\request;

class Cobrand extends CoreRequestDto
{
    /**
     * @var string
     */
    public $cobrandLogin;

    /**
     * @var string
     */
    public $cobrandPassword;

    /**
     * @var string
     */
    public $locale = "en_US";

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
    public function getCobrandPassword()
    {
        return $this->cobrandPassword;
    }

    /**
     * @param string $cobrandPassword
     *
     * @return $this
     */
    public function setCobrandPassword($cobrandPassword)
    {
        $this->cobrandPassword = $cobrandPassword;
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
}