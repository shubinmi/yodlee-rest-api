<?php

namespace YodleeRestApi\interfaces;

interface YodleeLogger
{
    const LEVEL_NONE  = 0;
    const LEVEL_DEBUG = 1;
    const LEVEL_ERROR = 2;

    /**
     * @param string $uri
     * @param string $method
     * @param array  $options
     * @param int    $responseStatus
     * @param string $responseBody
     */
    public function log($uri, $method, array $options, $responseStatus, $responseBody);

    /**
     * @return int 0,1,2
     */
    public function getLevel();
}