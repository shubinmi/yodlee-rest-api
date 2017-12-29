<?php

namespace YodleeRestApi\api;

use YodleeRestApi\dto\config\YodleeConfig;
use YodleeRestApi\dto\header\Authorization;
use YodleeRestApi\dto\request\Cobrand;
use YodleeRestApi\dto\request\CoreRequestDto;
use YodleeRestApi\dto\response\CobrandLogin;
use YodleeRestApi\interfaces\YodleeLogger;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class CoreYodleeApi
{
    /**
     * @var string
     */
    private $restEndpoint;

    /**
     * @var string
     */
    private $restVersion;

    /**
     * @var Cobrand
     */
    private $cobrandRequest;

    /**
     * @var Authorization
     */
    private $restAuthorization;

    /**
     * @var ResponseInterface
     */
    private $lastResponse;

    /**
     * @var string
     */
    private $lastResponseBody;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $applicationId;

    /**
     * @var string
     */
    private $cobrandId;

    /**
     * @var YodleeLogger
     */
    private $logger;

    /**
     * CoreYodleeApi constructor.
     *
     * @param YodleeConfig      $config
     * @param YodleeLogger|null $logger
     *
     * @throws \Exception
     */
    public function __construct(YodleeConfig $config, YodleeLogger $logger = null)
    {
        $this->checkParams($config);
        $this->httpClient        = new Client();
        $this->restEndpoint      = $config->getApiEndpoint();
        $this->restVersion       = $config->getApiVersion();
        $this->cobrandRequest    = (new Cobrand)
            ->setCobrandLogin($config->getCobrandLogin())
            ->setCobrandPassword($config->getCobrandPass());
        $this->applicationId     = $config->getApplicationId();
        $this->cobrandId         = $config->getCobrandId();
        $this->restAuthorization = new Authorization();
        $this->logger            = $logger;
    }

    /**
     * @return bool
     */
    public function getAppSession()
    {
        if (!$this->send('/cobrand/login', $this->cobrandRequest)) {
            return false;
        }

        $cobLogin = new CobrandLogin($this->getLastResponseBody());
        if (
            $cobLogin->getApplicationId() != $this->applicationId
            || $cobLogin->getCobrandId() != $this->cobrandId
        ) {
            $this->errors[] = 'Incorrect response "cobrandId" or "applicationId"';
            return false;
        }

        $this->restAuthorization = $cobLogin->getSession();

        return true;
    }

    /**
     * @param string              $uri
     * @param CoreRequestDto|null $dto
     * @param string              $method
     *
     * @return bool
     */
    public function send($uri, CoreRequestDto $dto = null, $method = 'POST')
    {
        if (!$dto) {
            $dto = new CoreRequestDto();
        }
        $options = $this->getOptions($dto, strtolower($method) == 'get');
        try {
            $this->lastResponse     = $this->httpClient->request(
                $method, $this->restEndpoint . $this->restVersion . $uri,
                $options
            );
            $this->lastResponseBody = $this->lastResponse->getBody()->getContents();
            $this->log($uri, $method, $options, $this->lastResponseBody);
        } catch (\Exception $e) {
            if ($this->lastResponse && $this->lastResponse->getStatusCode() < 300) {
                $this->lastResponse = $this->lastResponse->withStatus(500);
            }
            $this->errors[] = $e->getMessage();
            $this->log($uri, $method, $options, $e->getMessage());
            return false;
        }
        if ($this->lastResponse->getStatusCode() >= 300) {
            $this->errors[] = $this->lastResponse->getReasonPhrase();
            $this->log($uri, $method, $options, $this->lastResponse->getReasonPhrase());
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getLastResponseBody()
    {
        return $this->lastResponseBody;
    }

    /**
     * @return ResponseInterface
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @return Authorization
     */
    public function getRestAuthorization()
    {
        return $this->restAuthorization;
    }

    /**
     * @return bool
     */
    public function hasLastErrorContentAsAlreadyExist()
    {
        return strpos(end($this->errors), 'already exists') !== false;
    }

    /**
     * @return bool
     */
    public function hasLastErrorContentAsNotFound()
    {
        return strpos(end($this->errors), 'not found') !== false;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param string $msg
     *
     * @return $this
     */
    public function addError($msg)
    {
        $this->errors[] = $msg;
        return $this;
    }

    /**
     * @param string $uri
     * @param string $method
     * @param array  $options
     * @param string $response
     */
    private function log($uri, $method, array $options, $response)
    {
        if (!$this->logger instanceof YodleeLogger) {
            return;
        }
        if ($this->logger->getLevel() == YodleeLogger::LEVEL_NONE) {
            return;
        }
        if ($this->logger->getLevel() == YodleeLogger::LEVEL_ERROR && $this->lastResponse->getStatusCode() < 300) {
            return;
        }
        $status = 500;
        if ($this->lastResponse && $this->lastResponse instanceof ResponseInterface) {
            $status = $this->lastResponse->getStatusCode();
        }
        $this->logger->log($uri, $method, $options, $status, $response);
    }

    /**
     * @param CoreRequestDto $dto
     * @param bool           $isGET
     *
     * @return array
     */
    private function getOptions(CoreRequestDto $dto, $isGET)
    {
        $result = [
            'connect_timeout' => '3.14',
            'headers'         =>
                [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => $this->restAuthorization->toHeaderParam()
                ]

        ];
        if ($isGET) {
            $result['query'] = $dto->toArray();
        } else {
            $result['body'] = $dto->toRequestParams();
        }

        return $result;
    }

    /**
     * @param YodleeConfig $config
     *
     * @throws \Exception
     */
    private function checkParams(YodleeConfig $config)
    {
        if (!$config->getApiEndpoint()) {
            throw new \Exception('"yodlee:api-endpoint" param in config is required');
        }
        if (!$config->getCobrandLogin()) {
            throw new \Exception('"yodlee:co-login" param in config is required');
        }
        if (!$config->getCobrandPass()) {
            throw new \Exception('"yodlee:co-password" param in config is required');
        }
        if (!$config->getCobrandId()) {
            throw new \Exception('"yodlee:co-id" param in config is required');
        }
        if (!$config->getApplicationId()) {
            throw new \Exception('"yodlee:app-id" param in config is required');
        }
        if (!$config->getApiVersion()) {
            throw new \Exception('"yodlee:api-version" param in config is required');
        }
    }
}