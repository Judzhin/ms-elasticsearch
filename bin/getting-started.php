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
    'index' => 'some_index', // 'project_name'
    'type' => 'some_type', // 'product, order, sale ...'
    'id' => 'some_id', // sha???, md5, 1, 2, 3 ...
    'body' => [
        'Field 1' => 'Value 1',
        'Field 2' => 'Value 2',
        'Field 3' => 'Value 3'
        /**
         * Object() {
         *     public $field => "value",
         *     public $field => "value",
         *     public $field => "value"
         * }
         */
    ]
];

/** @var array $response */
$response = $client->index($params); // Update or Inser if not exist

/**
 * Array(
 *     [_index] => some_index
 *     [_type] => some_type
 *     [_id] => some_id 1
 *     [_version] => 3
 *     [_shards] => Array(
 *                      [total] => 2
 *                      [successful] => 1
 *                      [failed] => 0
 *                  )
 *     [created] =>
 * )
 * <code>
 *     print_r($response);
 * </code>
 */

unset ($params['body']);
/** @var array $response */
$response = $client->delete($params); // Delete