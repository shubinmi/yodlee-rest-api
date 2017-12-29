<?php

namespace YodleeRestApi\dto\request;

use YodleeRestApi\dto\header\Authorization;
use YodleeRestApi\dto\request\objects\Name;

class User extends CoreRequestDto
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $loginName;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $locale = 'en_US';

    /**
     * @var Name
     */
    public $name;

    /**
     * @var Authorization
     */
    public $session;

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
     * @return string
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * @param string $loginName
     *
     * @return $this
     */
    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array|string (json) $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = new Name($name);
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
     * @param array|string (json) $session
     *
     * @return $this
     */
    public function setSession($session)
    {
        $this->session = new Authorization($session);
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}