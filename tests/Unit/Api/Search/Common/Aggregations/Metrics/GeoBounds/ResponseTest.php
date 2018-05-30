<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\GeoBounds;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoBounds\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    /**
     * @return void
     * @throws \CodeSolo\Elasticsearch\Exception\InvalidRawData
     */
    public function test1()
    {
        $data = [
            'bounds' => [
                'top_left' => [
                    'lat' => 48.86111099738628,
                    'lon' => 2.3269999679178
                ],
                'bottom_right' => [
                    'lat' => 48.85999997612089,
                    'lon' => 2.3363889567553997
                ]
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}