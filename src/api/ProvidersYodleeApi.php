<?php

namespace YodleeRestApi\api;

use YodleeRestApi\dto\response\FastLink;

class ProvidersYodleeApi
{
    /**
     * @param CoreYodleeApi $yodleeCore
     *
     * @return FastLink|null
     */
    public static function getFastLink(CoreYodleeApi $yodleeCore)
    {
        if (!$yodleeCore->send('/providers/token', null, 'GET')) {
            return null;
        }

        return new FastLink($yodleeCore->getLastResponseBody());
    }
}