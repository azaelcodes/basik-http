<?php
namespace AzaelCodes\BasikHttp;

use AzaelCodes\BasikHttp\Factories\RequestFactory;
use AzaelCodes\BasikHttp\Factories\UriFactory;

class Client
{
    /**
     * @var RequestFactory $requestFactory
     */
    private $requestFactory;

    /**
     * @var UriFactory $uriFactory
     */
    private $uriFactory;

    public function __construct()
    {
    }

    public function get($url)
    {
        $this->factoryCreate('GET', $url);
        return $this->requestFactory->get();
    }

    /**
     * @param string $method
     * @param string $uri
     */
    private function factoryCreate(string $method, $uri = '')
    {
        $this->requestFactory = (new RequestFactory())->createRequest($method, $uri);
        $this->uriFactory = (new UriFactory())->createUri($uri);
    }
}
