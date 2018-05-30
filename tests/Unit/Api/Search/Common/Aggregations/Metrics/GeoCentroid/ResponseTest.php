<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\GeoCentroid;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoCentroid\Response;
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
            'location' => [
                'lat' => 51.00982963107526,
                'lon' => 3.9662130922079086,
            ],
            'count' => 6,
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}