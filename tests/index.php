<?php
require '../vendor/autoload.php';

use AzaelCodes\BasikHttp\HttpClient;



$client = new HttpClient();
$url    = 'https://postman-echo.com/get?foo=bar';

// Get request with query parameters as array
$queryParams = [
    'query' => [
        'foo1' => 'bar1',
        'foo2' => 'bar2'
    ]
];

echo $client->get($url);


//$client->get($url, $queryParams);
//$responseArray = $client->getBody('array');
//print_r($responseArray);
