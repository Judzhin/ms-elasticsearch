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
    'index' => 'blog', // 'project_name'
    'type' => 'post', // 'product, order, sale ...'
    'id' => '1', // sha???, md5, 1, 2, 3 ...
    'body' => [
        "title" => "Веселые котята",
        "content" => "<p>Смешная история про котят<p>",
        "tags" => [
            "котята", "смешная история"
        ],
        "published_at" => "2014-09-12T20:44:42+00:00"
        // ...
    ]
];

/** @var array $response */
$response = $client->index($params); // Update or Inser if not exist

// GET <server_address>/blog/_mapping?pretty fetch mapping
// GET <server_address>/blog/post/1?pretty - fetch row by id
// GET <server_address>/blog/post/1/_source?pretty - fetch only source
// GET <server_address>/blog/post/1?_source=title&pretty - fetch with need fields

/** @var array $posts */
$posts = [
    2 => [
        "title" => "Веселые щенки",
        "content" => "<p>Смешная история про щенков<p>",
        "tags" => [
            "щенки",
            "смешная история"
        ],
        "published_at" => "2014-08-12T20:44:42+00:00"
    ],
    3 => [
        "title" => "Как у меня появился котенок",
        "content" => "<p>Душераздирающая история про бедного котенка с улицы<p>",
        "tags" => [
            "котята"
        ],
        "published_at" => "2014-07-21T20:44:42+00:00"
    ]
];

/**
 * @var int $key
 * @var array $post
 */
foreach ($posts as $key => $post) {

    /** @var array $params */
    $params = [
        'index' => 'blog',
        'type' => 'post',
        'id' => $key,
        'body' => $post
    ];
    $response = $client->index($params);
}

// GET <server_address>/blog/post/_search?pretty&size=1&_source=["title", "published_at"]&sort=[{"published_at": "desc"}]

// unset ($params['body']);
// /** @var array $response */
// $response = $client->delete($params); // Delete