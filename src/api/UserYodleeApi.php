<?php

namespace YodleeRestApi\api;

use YodleeRestApi\dto\request\User as UserDto;

class UserYodleeApi
{
    /**
     * @var UserDto
     */
    public static $user;

    /**
     * @param CoreYodleeApi $yodleeCore
     * @param string        $login
     * @param string        $password
     *
     * @return bool
     */
    public static function login(CoreYodleeApi $yodleeCore, $login, $password)
    {
        if (!$yodleeCore->send('/user/login', (new UserDto)->setLoginName($login)->setPassword($password))) {
            return false;
        }
        $response = json_decode($yodleeCore->getLastResponseBody(), true);
        if (empty($response['user'])) {
            $yodleeCore->addError('Response of Yodlee REST API has not required field "user".');
            return false;
        }
        $user = new UserDto($response['user']);
        $user->setPassword($password);
        $yodleeCore->getRestAuthorization()->setUserSession($user->getSession()->getUserSession());
        self::$user = $user;

        return true;
    }

    /**
     * @param CoreYodleeApi $yodleeCore
     * @param UserDto       $user
     *
     * @return bool
     */
    public static function register(CoreYodleeApi $yodleeCore, UserDto $user)
    {
        if (!$yodleeCore->send('/user/register', $user)) {
            return false;
        }
        $response = json_decode($yodleeCore->getLastResponseBody(), true);
        if (empty($response['user'])) {
            $yodleeCore->addError('Response of Yodlee REST API has not required field "user".');
            return false;
        }
        $user = new UserDto($response['user']);
        $yodleeCore->getRestAuthorization()->setUserSession($user->getSession()->getUserSession());
        self::$user = $user;

        return true;
    }

    private function __construct()
    {
    }
}