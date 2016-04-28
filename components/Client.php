<?php
namespace funcraft\raent\components;

use funcraft\raent\interfaces\IClient;
use funcraft\raent\interfaces\IUser;
use GuzzleHttp\ClientInterface;

class Client implements IClient
{
    use ErrorableTrait;

    /**
     * @var $this
     */
    protected static $instance = null;

    /**
     * @var ClientInterface
     */
    protected $httpClient = null;

    /**
     * Client constructor.
     */
    protected function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://auth.funcraft.ru'
        ]);
    }

    /**
     * @return Client
     */
    public function getInstance()
    {
        return self::$instance ?: self::$instance = new self();
    }

    /**
     * @return \GuzzleHttp\Client|ClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param string $response
     * @return array
     */
    public function parseResponse($response)
    {
        return \GuzzleHttp\json_decode($response, true);
    }

    /**
     * @param string $token
     * @param string $secret
     * @return string
     */
    public static function authPlease($token, $secret)
    {
        $self = self::getInstance();

        $response = $self->getHttpClient()->post('/get/key', [
            'form_params' => [
                'token' => $token,
                'hash'  => sha1($token . $secret)
            ]
        ]);

        return $response->getStatusCode() == 200
                    ? $self->parseResponse($response->getBody())['key']
                    : false;
    }

    /**
     * @param string $identity
     * @param string $secret
     * @return IUser
     */
    public static function createUserPlease($identity, $secret)
    {
        return new User($identity, $secret);
    }
}