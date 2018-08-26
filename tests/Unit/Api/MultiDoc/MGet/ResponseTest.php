<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\MultiDoc\MGet;

use CodeSolo\Elasticsearch\Api\MultiDoc\MGet\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    public function test1()
    {
        $data = [
            'docs' => [
                [
                    '_index' => 'twitter',
                    '_type' => '_doc',
                    '_id' => '0',
                    '_version' => 1,
                    '_routing' => 'user1',
                    'found'=> true,
                    '_source' => [
                        'user' => 'kimchy',
                        'date' => '2009-11-15T14=>12=>12',
                        'likes'=> 0,
                        'message' => 'trying out Elasticsearch',
                    ],
                    'fields' => [
                        'tags' => [
                            'white'
                        ],
                    ],
                ]
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}