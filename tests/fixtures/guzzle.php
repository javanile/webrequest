<?php

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'https://swapi.dev/api/planets/1/?format=json');

$json = json_decode($response->getBody(), true);

echo $json['name'];
