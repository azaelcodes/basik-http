<?php
require '../vendor/autoload.php';

use AzaelCodes\BasikHttp\Client;

$client = new Client();
$client->get('https://api.darksky.net/forecast/0476fc447deaef9c5047a81b56609d3b/37.8267,-122.4233');
print_r($client->getBody('array'));
