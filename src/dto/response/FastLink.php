<?php

namespace YodleeRestApi\dto\response;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class FastLink extends ConstructFromArrayOrJson
{
    /**
     * @var string
     */
    public $url;

    /**
     * @var string for parse_str($parameters)
     */
    public $parameters;

    /**
     * @var string
     */
    public $help;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        parse_str($this->parameters, $array);
        return $array;
    }

    /**
     * @return string
     */
    public function getParametersAsString()
    {
        return $this->parameters;
    }

    /**
     * @param string $parameters
     *
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return $this
     */
    public function addParameter($name, $value)
    {
        $params        = $this->getParameters();
        $params[$name] = $value;
        return $this->setParameters(http_build_query($params));
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * @param string $help
     *
     * @return $this
     */
    public function setHelp($help)
    {
        $this->help = $help;
        return $this;
    }
}