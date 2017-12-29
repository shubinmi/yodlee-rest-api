<?php

namespace YodleeRestApi\services;

use YodleeRestApi\api\AccountsYodleeApi;
use YodleeRestApi\api\CoreYodleeApi;
use YodleeRestApi\api\ProvidersYodleeApi;
use YodleeRestApi\api\UserYodleeApi;
use YodleeRestApi\dto\config\YodleeConfig;
use YodleeRestApi\dto\request\User;
use YodleeRestApi\dto\response\FastLink;
use YodleeRestApi\dto\response\LoanAccountDto;
use YodleeRestApi\interfaces\YodleeLogger;

class YodleeUserStory
{
    /**
     * @var CoreYodleeApi
     */
    private $coreClient;

    public function __construct(
        YodleeConfig $config, YodleeLogger $logger = null
    ) {
        $this->coreClient = new CoreYodleeApi($config, $logger);
    }

    /**
     * @param string      $login
     * @param string      $pass
     * @param string      $email
     * @param string      $name
     * @param string|null $local
     *
     * @return User|null
     */
    public function create($login, $pass, $email, $name, $local = null)
    {
        $user = (new User())
            ->setPassword($pass)
            ->setName($name)
            ->setLoginName($login)
            ->setEmail($email);
        if ($local) {
            $user->setLocale($local);
        }
        if (!UserYodleeApi::register($this->coreClient, $user)) {
            return null;
        }
        return clone UserYodleeApi::$user;
    }

    /**
     * @param $login
     * @param $pass
     *
     * @return null|User
     */
    public function login($login, $pass)
    {
        if (!UserYodleeApi::login($this->coreClient, $login, $pass)) {
            return null;
        }
        return clone UserYodleeApi::$user;
    }

    /**
     * @return null|FastLink
     */
    public function myFastLink()
    {
        return ProvidersYodleeApi::getFastLink($this->coreClient);
    }

    /**
     * @return LoanAccountDto[]
     */
    public function myLoans()
    {
        return AccountsYodleeApi::getUserLoanAccounts($this->coreClient);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->coreClient->getErrors();
    }
}