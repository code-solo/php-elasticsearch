<?php

$client1 = new \CodeSolo\Elasticsearch\Client\Client('client1');
$client2 = new \CodeSolo\Elasticsearch\Client\Client('client2');

$api = new \CodeSolo\Elasticsearch\Api();
$api
    ->addClient($client1, true)
    ->addClient($client2);

try {
    $api->doc()->index();

} catch (\CodeSolo\Elasticsearch\Exception\ClientNotFound $e) {

}
