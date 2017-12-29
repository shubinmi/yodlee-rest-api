<?php

namespace YodleeRestApi\dto\request\objects;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class Name extends ConstructFromArrayOrJson
{
    /**
     * @var string
     */
    public $first;

    /**
     * @var string
     */
    public $last;
}