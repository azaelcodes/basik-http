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
     * @param string $method
     * @param string $url
     * @return mixed
     */
    private function makeRequest(string $method, string $url)
    {
        $uriFactory     = (new UriFactory())->createUri($url);
        $requestFactory = (new RequestFactory())->createRequest($method, $uriFactory);
        return $requestFactory->make();
    }
}
