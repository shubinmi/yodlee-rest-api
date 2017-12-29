<?php

namespace YodleeRestApi\api;

use YodleeRestApi\dto\request\Account;
use YodleeRestApi\dto\request\Accounts;
use YodleeRestApi\dto\response\LoanAccountDto;

class AccountsYodleeApi
{
    /**
     * @param CoreYodleeApi $yodleeCore
     *
     * @return LoanAccountDto[]
     */
    public static function getUserLoanAccounts(CoreYodleeApi $yodleeCore)
    {
        $accountsDto = (new Accounts)->setStatus(Accounts::STATUS_ACTIVE)->setContainer(Accounts::CONTAINER_LOAN);
        $i           = 1;
        while (!$yodleeCore->send('/accounts', $accountsDto, 'GET')) {
            if ($i >= 3) {
                return [];
            }
            ++$i;
        }
        $result       = json_decode($yodleeCore->getLastResponseBody(), true);
        $loanAccounts = [];
        if (empty($result['account'])) {
            return $loanAccounts;
        }
        foreach ($result['account'] as $item) {
            if ($item['CONTAINER'] != 'loan') {
                continue;
            }
            $item           = array_filter($item);
            $loanAccounts[] = new LoanAccountDto($item);
        }
        return $loanAccounts;
    }

    /**
     * @param CoreYodleeApi $yodleeCore
     * @param int           $id
     *
     * @return LoanAccountDto|null
     */
    public static function getLoanAccount(CoreYodleeApi $yodleeCore, $id)
    {
        $account = new Account();
        $yodleeCore->send('/accounts/' . $id, $account, 'GET');
        $result = json_decode($yodleeCore->getLastResponseBody(), true);
        if (empty($result['account'])) {
            return null;
        }
        $data = array_shift($result['account']);
        return new LoanAccountDto($data);
    }

    /**
     * @param CoreYodleeApi $yodleeCore
     * @param int           $accountId
     *
     * @return bool
     */
    public static function deleteAccount(CoreYodleeApi $yodleeCore, $accountId)
    {
        if (!$yodleeCore->send('/accounts/' . $accountId, null, 'DELETE')) {
            return false;
        }
        return true;
    }
}