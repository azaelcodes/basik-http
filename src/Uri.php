<?php

declare(strict_types=1);

namespace AzaelCodes\BasikHttp;

use Psr\Http\Message\UriInterface;

/**
 * Class Uri
 * @package AzaelCodes\BasikHttp
 */
class Uri implements UriInterface
{
    /**
     * @var string $uri
     */
    private $uri;

    /**
     * @var void
     */
    private $uriParts;

    /**
     * Uri constructor.
     * @param string $uri
     */
    public function __construct(string $uri = '')
    {
        $this->uriParts = parse_url($uri);
        if (!$this->uriParts) {
            throw new \InvalidArgumentException('Invalid URI String');
        }

        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    public function getScheme()
    {
        return strtolower($this->uriParts['scheme']) ?? '';
    }

    public function getAuthority()
    {
        // TODO: Implement getAuthority() method.
    }

    public function getUserInfo()
    {
        // TODO: Implement getUserInfo() method.
    }

    public function getHost()
    {
        return strtolower($this->uriParts['host']);
    }

    public function getPort()
    {
        return strtolower($this->uriParts['port']);
    }

    public function getPath()
    {
        return strtolower($this->uriParts['path']);
    }

    public function getQuery()
    {
        return strtolower($this->uriParts['query']);
    }

    public function getFragment()
    {
        // TODO: Implement getFragment() method.
    }

    public function withScheme($scheme)
    {
        // TODO: Implement withScheme() method.
    }

    public function withUserInfo($user, $password = null)
    {
        // TODO: Implement withUserInfo() method.
    }

    public function withHost($host)
    {
        // TODO: Implement withHost() method.
    }

    public function withPort($port)
    {
        // TODO: Implement withPort() method.
    }

    public function withPath($path)
    {
        // TODO: Implement withPath() method.
    }

    public function withQuery($query)
    {
        // TODO: Implement withQuery() method.
    }

    public function withFragment($fragment)
    {
        // TODO: Implement withFragment() method.
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        echo $this->uri;
    }
}