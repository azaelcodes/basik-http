# basik-http - A simple yet powerful Http Client for PHP.
Okurrr!

## A simple GET request
```php
use AzaelCodes\BasikHttp\Client;

$client = new Client();
$url    = 'https://postman-echo.com/get';

// GET request with query parameters as array
$queryParams = [
    'query' => [
        'foo1' => 'bar1',
        'foo2' => 'bar2'
    ]
];

$client->get($url, $queryParams);
$responseArray = $client->getBody('array');

```

The result:

```
Array
(
    [args] => Array
        (
            [foo1] => bar1
            [foo2] => bar2
        )

    [headers] => Array
        (
            [x-forwarded-proto] => https
            [host] => postman-echo.com
            [accept] => */*
            [content-type] => application/json
            [x-forwarded-port] => 443
        )

    [url] => https://postman-echo.com/get?foo1=bar1&foo2=bar2
)

```

## Work in progress...

 

