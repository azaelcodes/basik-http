<?php
require '../vendor/autoload.php';

use AzaelCodes\BasikHttp\Client;



$client = new Client();
$url    = 'https://postman-echo.com/get';

// Get request with query parameters as array
$queryParams = [
    'query' => [
        'foo1' => 'bar1',
        'foo2' => 'bar2'
    ]
];

$client->get($url, $queryParams);
$responseArray = $client->getBody('array');
print_r($responseArray);
