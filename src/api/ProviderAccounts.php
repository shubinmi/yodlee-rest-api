<?php

namespace YodleeRestApi\api;

use YodleeRestApi\dto\response\ProviderAccount;

class ProviderAccounts
{
    /**
     * @param CoreYodleeApi $yodleeApi
     *
     * @return ProviderAccount[]
     */
    public function getProviderAccounts(CoreYodleeApi $yodleeApi)
    {
        $yodleeApi->send('/providerAccounts', null, 'GET');
        $result = json_decode($yodleeApi->getLastResponseBody(), true);
        if (empty($result['providerAccount']) || !is_array($result['providerAccount'])) {
            return [];
        }
        $accounts = [];
        foreach ($result['providerAccount'] as $account) {
            $accounts[] = new ProviderAccount($account);
        }

        return $accounts;
    }
}