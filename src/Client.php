<?php
namespace AzaelCodes\BasikHttp;

class Client
{
    private $statusCode;
    private $body;
    private $response;

    private $query;
    private $header;
    private $timeout;
    private $verifyHost;
    private $verifyPeer;

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PU = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * @param $url
     * @param array $options
     */
    public function get($url, array $options = [])
    {
        $this->formatOptions();

        // Curl Options
        $curlOptions = [
            CURLOPT_CUSTOMREQUEST   => static::METHOD_GET,
            CURLOPT_URL             => $url . $this->query,
            CURLOPT_HTTPHEADER      => $this->header,
            CURLOPT_TIMEOUT         => $this->timeout,
            CURLOPT_SSL_VERIFYHOST  => $this->verifyHost,
            CURLOPT_SSL_VERIFYPEER  => $this->verifyPeer,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HEADER          => true
        ];

        // Make CURL request
        $curl = curl_init();
        curl_setopt_array($curl, $curlOptions);

        $exec = curl_exec($curl);
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($exec, 0, $headerSize);
        $body = substr($exec, $headerSize);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

    }

    /**
     * @param array $options
     */
    private function formatOptions(array $options)
    {
        $this->query = array_key_exists('query', $options)
            ? '?' . http_build_query($options['query'])
            : null;

        $this->header = array_key_exists('header', $options)
            ? $options['header']
            : 'Content-Type: application/json';

        $this->timeout = array_key_exists('timeout', $options)
            ? $options['timeout']
            : 30;

        $this->verifyHost = array_key_exists('verify_host', $options)
            ? $options['verify_hosts']
            : false;

        $this->verifyHost = array_key_exists('verify_peer', $options)
            ? $options['verify_peer']
            : false;
    }
}
