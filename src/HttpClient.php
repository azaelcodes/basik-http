<?php

declare(strict_types=1);

namespace AzaelCodes\BasikHttp;

use AzaelCodes\BasikHttp\Factories\RequestFactory;
use AzaelCodes\BasikHttp\Factories\UriFactory;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClient
 * @package AzaelCodes\BasikHttp
 */
class HttpClient
{
    /**
     * Make an HTTP GET Request
     *
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        return $this->makeRequest('GET', $url);
    }

    /**
     * @param $url
     * @param array $payload
     */
    public function post($url, array $payload)
    {
        return $this->makeRequest('POST', $url, $payload);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $payload
     * @return mixed
     */
    private function makeRequest(string $method, string $url, array $payload = [])
    {
        $uriFactory     = (new UriFactory())->createUri($url);
        $requestFactory = (new RequestFactory())->createRequest($method, $uriFactory);
        return $requestFactory->make($payload);
    }
}
