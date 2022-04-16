<?php

use GuzzleHttp\Client;

$http = new Http();

$response = $http->request('GET', 'https://swapi.dev/api/planets/1/?format=json');

$json = json_decode($response->getBody(), true);

echo $json['name'];
