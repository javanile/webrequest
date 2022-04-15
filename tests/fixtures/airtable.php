<?php

$airtable = new Airtable([
    'api_key' => input('AIRTABLE_API_KEY'),
    'base'    => input('AIRTABLE_BASE_ID'),
]);

$request = $airtable->getContent('Logs');

do {
    $response = $request->getResponse();
    //var_dump( $response[ 'records' ] );
} while( $request = $response->next() );

$response = $airtable->saveContent('Logs', [
    'date()'          => date('Y-m-d H:i:s'),
    '$_GET'           => json_encode($_GET),
    '$_POST'          => json_encode($_POST),
    'getallheaders()' => json_encode(getallheaders()),
    '$_SERVER'        => json_encode($_SERVER, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
    'php://input'     => json_encode(file_get_contents('php://input')),
]);

var_dump($response);

die();
