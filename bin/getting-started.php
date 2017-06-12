<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
require 'vendor/autoload.php';

/** @var \Elasticsearch\Client $client */
$client = \Elasticsearch\ClientBuilder::create()
    ->build();

/** @var array $params */
$params = [
    'index' => 'some_index',
    'type' => 'some_type',
    'id' => 'some_id 1',
    'body' => [
        'Field 1' => 'Value 1',
        'Field 2' => 'Value 2',
        'Field 3' => 'Value 3'
    ]
];

/** @var array $response */
$response = $client->index($params);
print_r($response);