<?php

namespace YodleeRestApi\dto\request;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class CoreRequestDto extends ConstructFromArrayOrJson
{
    /**
     * @return string
     */
    protected function getParamsWrapperName()
    {
        $className = get_class($this);
        $className = explode('\\', $className);
        $className = strtolower((string)end($className));

        return $className;
    }

    /**
     * @return string
     */
    public function toRequestParams()
    {
        return json_encode([$this->getParamsWrapperName() => $this->toArray()]);
    }
}