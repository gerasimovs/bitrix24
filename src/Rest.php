<?php

namespace GerasimovS\Bitrix24;

/**
 * Class Rest Класс для работы с методами REST в Bitrix24
 */
class Rest
{
    /**
     * @var Entity
     */
    public $api;

    /**
     * @var Rest
     */
    private static $instance;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $refreshToken;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var bool
     */
    protected $sslVerify = false;

    /**
     * @var bool
     */
    protected $useWebHook = false;

    /**
     * @var int
     */
    protected $requestInSecond = 0;

    /**
     * @var int
     */
    protected $firstRequest = true;


    /**
     * @throws \Exception
     */
    public function __construct()
    {
        if (extension_loaded('curl') == false) {
            $errorMsg = 'You must have the cURL extension enabled to use this library';
            throw new \Exception($errorMsg);
        }

        self::$instance = $this;
    }

    /**
     * @return Rest
     */
    public static function getInstance()
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        } else {
            return new self;
        }
    }

    /**
     * Выполнить REST-метод через API Bitrix24
     *
     * @param string $methodName
     * @param array $parameters
     * @throws \Exception
     * @return array
     */
    public function request($methodName, array $parameters = [])
    {
        if ($this->firstRequest) {
            //$this->refreshToken();
            $this->firstRequest = false;
        }

        if (null == $this->getAccessToken()) {
            $errorMsg = 'Access token is not found, you must set the access token using the setAccessToken method';
            throw new \Exception($errorMsg);
        }

        if ($methodName == '') {
            $errorMsg = 'Method name not found';
            throw new \Exception($errorMsg);
        }

        $url = sprintf('https://%s/rest/', $this->getDomain());

        if ($this->useWebHook) {
            $url .= $this->getAccessToken() . '/';
        } else {
            $parameters['auth'] = $this->getAccessToken();
        }

        $url .= $methodName;

        try {
            $request = $this->execute($url, $parameters);
        } catch (\Exception $exception) {
            throw $exception;
        }

        if (!isset($request['result'])) {
            throw new \Exception($request['error_description']);
        }

        return $request;
    }

    /**
     * Выполнить HTTPS-запрос к порталу Bitrix24 с использованием cURL
     *
     * @param $url
     * @throws \Exception
     * @param $parameters
     * @return array
     */
    private function execute($url, $parameters)
    {
        if ($this->requestInSecond > 2) {
            $this->requestInSecond = 0;
        } else {
            $this->requestInSecond++;
            sleep(1);
        }

        $curlOptions = [
            \CURLOPT_FOLLOWLOCATION => true,
            \CURLOPT_RETURNTRANSFER => true,
            \CURLOPT_CONNECTTIMEOUT => 65,
            \CURLOPT_TIMEOUT => 70,
            \CURLOPT_POST => true,
            \CURLOPT_HEADER => false,
            \CURLOPT_POSTFIELDS => http_build_query($parameters),
            \CURLOPT_URL => $url
        ];

        if ($this->sslVerify == false) {
            $curlOptions[\CURLOPT_SSL_VERIFYPEER] = false;
            $curlOptions[\CURLOPT_SSL_VERIFYHOST] = false;
        }

        $curl = \curl_init();
        curl_setopt_array($curl, $curlOptions);

        $curlResult = curl_exec($curl);

        if ($curlResult === false) {
            throw new \Exception(curl_error($curl));
        }

        $curlInfo = curl_getinfo($curl);
        curl_close($curl);

        switch ($curlInfo['http_code']) {
            case 403:
                $errorMsg = 'Доступ к порталу запрещен';
                throw new \Exception($errorMsg);
                break;

            case 502:
                $errorMsg = 'Проблема с доступом к порталу';
                throw new \Exception($errorMsg);
                break;
        }

        if ($curlResult === '') {
            $errorMsg = 'Пустой ответ с портала';
            throw new \Exception($errorMsg);
        }

        $jsonResult = json_decode($curlResult, true);
        unset($curlResult);

        $jsonErrorCode = json_last_error();
        if ($jsonResult === null && ($jsonErrorCode !== JSON_ERROR_NONE)) {
            $errorMsg = sprintf('Ошибка при выполнении функции json_decode (код: %s)', $jsonErrorCode);
            throw new \Exception($errorMsg);
        }

        return $jsonResult;
    }

    /**
     * Обновление токена для доступа к методам API Bitrix24
     *
     * @throws \Exception
     */
    private function refreshToken()
    {
        $this->getRefreshToken();
        $url = 'https://oauth.bitrix.info/oauth/token/';
        $postFields = http_build_query([
            'grant_type' => 'refresh_token',
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'refresh_token' => $this->getRefreshToken(),
        ]);

        $result = json_decode(file_get_contents($url . '?' . $postFields), 1);

        $this->setAccessToken($result['access_token']);
        $this->setRefreshToken($result['refresh_token']);
    }

    /**
     * Установить входящий вебхук
     *
     * @param string $url
     * @throws \Exception
     */
    public function setAccessHook($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED) == false) {
            throw new \Exception('Вебхук не является допустимым URL-адресом');
        }

        $parseUrl = parse_url($url);

        if (!preg_match('#^/rest/(\d+/[^/]*)#', $parseUrl['path'], $matches)) {
            throw new \Exception('Некорректный токен доступа');
        }

        $accessToken = $matches[1];

        $this->setDomain($parseUrl['host']);
        $this->setAccessToken($accessToken);
        $this->useWebHook = true;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }
}
